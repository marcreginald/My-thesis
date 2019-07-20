<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect_home();
	}

	public function index()
	{
		$data = $this->system();
		$data += [
			"page_title" 	=> "Login"
		];
		$this->load->view('interface/system/Login', $data);
	}

	public function request_login() { 
		$username = $this->input->post("username");
		$password = trim($this->input->post("password"));
		if($result = $this->model_user->query("SELECT * FROM users WHERE username='$username' AND password='$password'")->result()) {
			foreach ($result as $key => $value) {
				if ($value->status == 1) {
					$data = [
					        'login_id'  		=> $value->user_id,
					        'login_school_id'  	=> $value->school_id
					];
					$this->session->set_userdata($data);	
					$this->model_user->update(["is_active" => "1", "date_login" => $this->now()], ["user_id" => $value->user_id]);				
					$this->user_log("User has logged in.");
					redirect(base_url('dashboard'));
				} else {
					redirect(base_url().'login?login_attempt='.md5(1));
				}
			}
		} else {
			redirect(base_url().'login?login_attempt='.md5(0));
		}
	}

	public function request_logout() {
		$this->model_user->update(["is_active" => "0"], ["user_id" => $this->session->login_id]);
		$this->user_log("User has logged out.");
		$array_logout = ['login_id' => '', 'login_as' => ''];
		$this->session->unset_userdata($array_logout);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */