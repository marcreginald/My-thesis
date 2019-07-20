<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_user');
		$this->load->model('model_user_image');
		$this->load->model('model_user_role');
		$this->load->model('model_school');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "User",
			"content"		=> 	[$this->load->view('interface/user/User', [
									"user_roles"	=> $this->get_user_role_select(),
									"schools"		=> $this->get_school_select()
								], TRUE)]
		];
		$this->create_page($page_data);	
	}

	function get_users()
	{
		$data = ['data' => []]; 

		foreach ($this->model_user->query("SELECT * FROM users LEFT JOIN user_roles ON users.user_role_id = user_roles.user_role_id LEFT JOIN schools ON users.school_id = schools.school_id WHERE users.soft_deleted<>1 ".( $this->session->login_school_id != 1 ? "AND users.school_id=".$this->session->login_school_id:"" ))->result() as $key => $value) {
			$id = $value->user_id;
			$url_delete = "\"user/delete_user\"";
			$url_edit = "\"user/get_user_info\"";
			$form_id = "\"form_user\"";
			$tbl_id = "[tbl_user]";
			$modal = "modal_user";

			$status = ['<label class="label label-danger block">Not Active</label>', '<label class="label label-success block">Active</label>'];

			if ($this->session->login_school_id == 1) {
				$data["data"][] = [
					$value->username,
					$this->user_full_name($id),
					$value->gender,
					$value->address,
					$value->email_address,
					$value->mobile_number,
					$value->user_role,
					( $value->school_id == 1 ? "Administrator":$value->school ),
					$status[$value->status],
					"<div class='text-center'>
						<button class='btn btn-primary btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
						<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
					</div>"
				];
			} else {
				$data["data"][] = [
					$value->username,
					$this->user_full_name($id),
					$value->gender,
					$value->address,
					$value->email_address,
					$value->mobile_number,
					$value->user_role,
					$status[$value->status],
					"<div class='text-center'>
						<button class='btn btn-primary btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
						<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
					</div>"
				];
			}
		}
		echo json_encode($data);
	}

	function get_user_info(){
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_user->query("SELECT * FROM users WHERE user_id=$id")->result() as $key => $value) {
			$data = [
				"user_id" 		=> $value->user_id,
				"username" 		=> $value->username,
				"firstname" 	=> $value->firstname,
				"middlename" 	=> $value->middlename,
				"lastname" 		=> $value->lastname,
				"name_ext" 		=> $value->name_ext,
				"gender" 		=> $value->gender,
				"address" 		=> $value->address,
				"email_address" => $value->email_address,
				"mobile_number" => $value->mobile_number,
				"user_role_id" 	=> $value->user_role_id,
				"status" 		=> $value->status,
				"school_id"		=> $value->school_id
			];
		}
		echo json_encode($data);
	}

	function delete_user()
	{
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted User</strong> \"".$this->user_full_name($this->input->post("value"))."\"");
		if ($this->model_user->update(["soft_deleted" => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()], ["user_id" => $this->input->post("value")])) {
			$ret = [
				"success" 	=> true,
				"msg"		=> "Success"
			];
		}

		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
		}
		else {
		    $this->db->trans_commit();
		}
		echo json_encode($ret);
	}

	function insert_user()
	{
		$this->db->trans_begin();

		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$user_id = $this->input->post("user_id");
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$firstname = $this->input->post("firstname");
		$middlename = $this->input->post("middlename");
		$lastname = $this->input->post("lastname");
		$name_ext = $this->input->post("name_ext");

		$data = [
			"username"		=> $username,
			"firstname"		=> $firstname,
			"middlename"	=> $middlename,
			"lastname"		=> $lastname,
			"name_ext"		=> $name_ext,
			"gender"		=> $this->input->post("gender"),
			"address"		=> $this->input->post("address"),
			"email_address"	=> $this->input->post("email_address"),
			"mobile_number"	=> $this->input->post("mobile_number"),
			"status"		=> $this->input->post("status"),
			"user_role_id" 	=> $this->input->post("user_role_id"),
			"school_id" 	=> ( $this->session->login_school_id == 1 ? $this->input->post("school_id"):$this->session->login_school_id ),
		];

		if($user_id == null) {
			if($this->check_username($username) == 0) {
				if ($this->check_fullname($firstname, $middlename, $lastname, $name_ext) == 0) {
					if($password !== "") {
						$data += [
							"password" 		=> $password, 
							"created_by"	=> $this->session->login_id,
							"date_created" 	=> $this->now()
						];
						if($this->model_user->insert($data)) {
							$this->user_log("<strong>Inserted User</strong> '".$username."'");
							$ret = [
								"success" 	=> true,
								"msg"		=> "Success"
							];
						}
					} else {
						$ret = [
							"success" 	=> false,
							"msg"		=> "Please enter the password"
						];
					}						
				} else {
					$ret = [
						"success" 	=> false,
						"msg"		=> "Firstname, Middlename, Lastname and Name Extension already exist"
					];
				}
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "Username is already taken"
				];
			}
		} else {

			$data += [
				"modified_by"	=> $this->session->login_id,
				"date_modified" => $this->now()
			];

			if($this->get_cur_username($user_id) == $username) {
				if ($this->get_cur_fullname($user_id) == $firstname.$middlename.$lastname.$name_ext) {
					if($password !== "") {
						$data += ["password" => $password];
					}
					if($this->model_user->update($data, ["user_id" => $user_id])) {
						$this->user_log("<strong>Updated User</strong> '".$username."'");
						$ret = [
							"success" 	=> true,
							"msg"		=> "Updated"
						];
					}
				} else {
					if ($this->check_fullname($firstname, $middlename, $lastname, $name_ext) == 0) {
						if($password !== "") {
							$data += ["password" => $password];
						}
						if($this->model_user->update($data, ["user_id" => $user_id])) {
							$this->user_log("<strong>Updated User</strong> '".$username."'");
							$ret = [
								"success" 	=> true,
								"msg"		=> "Updated"
							];
						}
					} else {
						$ret = [
							"success" 	=> false,
							"msg"		=> "Firstname, Middlename, Lastname and Name Extension already exist"
						];
					}
				}
			} else {
				if($this->check_username($username) == 0) {
					if($password !== "") {
						$data += ["password" => $password];
					}
					if($this->model_user->update($data, ["user_id" => $user_id])) {
						$this->user_log("<strong>Updated User</strong> '".$username."'");
						$ret = [
							"success" 	=> true,
							"msg"		=> "Updated"
						];
					}
				} else {
					$ret = [
						"success" 	=> false,
						"msg"		=> "Username is already taken"
					];
				}
			}

		}

		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}
		echo json_encode($ret);
	}

	function check_username($username) {
		$count = 0;
		foreach ($this->model_user->query("SELECT COUNT(username) as count FROM users WHERE username='$username'")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_cur_username($user_id) {
		$username = "";
		foreach ($this->model_user->query("SELECT username FROM users WHERE user_id=$user_id")->result() as $key => $value) {
			$username = $value->username;
			break;
		}
		return $username;
	}

	function check_fullname($firstname, $middlename, $lastname, $name_ext) {
		$count = 0;
		foreach ($this->model_user->query("SELECT COUNT(*) AS count FROM users WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND name_ext='$name_ext'")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_cur_fullname($user_id) {
		$fullname = "";
		foreach ($this->model_user->query("SELECT firstname, middlename, lastname, name_ext FROM users WHERE user_id=$user_id")->result() as $key => $value) {
			$fullname = $value->firstname.$value->middlename.$value->lastname.$value->name_ext;
			break;
		}
		return $fullname;
	}

	// others
	function get_user_role_select()
	{
		$data = [];
		foreach ($this->model_user_role->query("SELECT * FROM user_roles WHERE soft_deleted<>1")->result() as $key => $value) {
			$data[] = [
				"id"	=> $value->user_role_id,
				"text"	=> $value->user_role
			];
		}
		return json_encode($data);
	}

	function get_school_select(){
		$data = [];
		foreach ($this->model_school->query("SELECT * FROM schools WHERE soft_deleted<>1")->result() as $key => $value) {
			$data[] = [
				"id"	=> $value->school_id,
				"text"	=> $value->school
			];
		}
		return json_encode($data);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/registration/User.php */