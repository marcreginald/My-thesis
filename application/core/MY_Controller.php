<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function system() {
		$data = [
			"system_title" 	=> "Tesda Affiliated School",
			"system_logo"	=> base_url("assets/images/tesda_logo.png")
		];
		return $data;
	}

	public function create_page($data = []) {
		$data += [
			"user_name" 	=> $this->user_full_name($this->user_ids()["id"]),
			"images"		=> $this->user_ids()["location_path"],
			"gender"		=> $this->user_ids()["gender"],
			"login_date"	=> $this->user_ids()["login_date"]
		];
		return $this->load->view('interface/system/layout/Page', $data, false);
	}

	public function user_ids() {
		$ids = [
			"id" 		=> $this->session->login_id, 
			"location_path" => "",
			"gender"		=> "",
			"login_date"	=> ""
		];

		foreach ($this->model_user->query("SELECT gender, date_login FROM users WHERE user_id=".$this->session->login_id)->result() as $key => $value) {
			$ids["gender"] 			= $value->gender;
			$ids["login_date"] 		= $value->date_login;
			break;
		}
		foreach ($this->model_user_image->query("SELECT location_path FROM user_images WHERE user_id=".$ids["id"])->result() as $key => $value) {
			$ids["location_path"] = $value->location_path;
			break;
		}
		return $ids;
	}

    public function user_full_name($user_id)
    {
    	$fn = ""; $mn = ""; $ln = ""; $ext = "";
		foreach ($this->model_user->query("SELECT firstname, middlename, lastname, name_ext FROM users WHERE user_id=$user_id")->result() as $key => $value) {
			$fn = $value->firstname;
			$mn = $value->middlename;
			$ln = $value->lastname;
			$ext = $value->name_ext;
		}
		if(!empty($mn)) {
			$mn = $mn[0].". ";
		}
		return ucfirst($ln).", ".ucfirst($fn)." ".ucfirst($mn).ucfirst($ext);
    }

    public function student_full_name($student_id) {
		$fn = ""; $mn = ""; $ln = ""; $ext = "";
		foreach ($this->model_student->query("SELECT firstname, middlename, lastname, name_ext FROM students WHERE student_id='$student_id'")->result() as $key => $value) {
			$fn = $value->firstname;
			$mn = $value->middlename;
			$ln = $value->lastname;
			$ext = $value->name_ext;
		}
		if(!empty($mn)) {
			$mn = $mn[0].". ";
		}
		return ucfirst($ln).", ".ucfirst($fn)." ".ucfirst($mn).ucfirst($ext);
	}

	public function user_log($action) {
    	$this->load->model('model_user_log');
    	$login_id = $this->session->login_id;
    	$now = $this->now();
    	$action = addslashes($action);
    	$this->model_user_log->query("INSERT INTO user_logs (`date`, `action`, `user_id`) VALUES ('$now', '$action', '$login_id')");
    }

	public function now() {
		date_default_timezone_set("Asia/Manila");
		$now = date("Y-m-d H:i:s");
		return $now;
	}

	public function do_upload($input_name, $upload_path, $file_name) {
		$path = "";
		// $num = mt_rand(1, 1000000);

		$config['upload_path'] 		= $upload_path;
		$config['allowed_types'] 	= 'pdf|docx|xls|ppt|jpg|png|jpeg|txt';
		$config['max_size']     	= '100000';
		$config['overwrite'] 		= true;
		$config['file_name'] 		= $file_name;
		// $config['max_width'] 		= '5000';
		// $config['max_height'] 		= '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		$upload = $this->upload->do_upload($input_name);
		if($upload) {
			$path = $file_name;
		}
		return $path;
    }

	public function redirect() {
		if(!$this->session->login_id) {
			redirect(base_url('/'));
		}		
	}

	public function redirect_home() {
		if(isset($this->session->login_id) && $this->uri->segment(1) == "" || $this->uri->segment(1) == "main") {
			redirect(base_url('dashboard'));
		}
	}

	public function get_ip() {
		$ip = "";
		if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		} elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif(!empty($_SERVER["HTTP_X_FORWARDED"])) {
			$ip = $_SERVER["HTTP_X_FORWARDED"];
		} elseif(!empty($_SERVER["REMOTE_ADDR"])){
			$ip = $_SERVER["REMOTE_ADDR"];
		}
		if($ip == "::1") {
			$ip = "127.0.0.1";
		}
		return $ip;
	}

}

/* End of file Core_controller.php */
/* Location: ./application/core/Core_controller.php */