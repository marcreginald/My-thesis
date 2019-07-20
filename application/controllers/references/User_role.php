<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_user_role');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "User Role",
			"content"		=> 	[$this->load->view('interface/references/userRole/User_role', [], TRUE)]
		];
		$this->create_page($page_data);		
	}

	function get_user_roles() {
		$data = ["data" => []];
		foreach ($this->model_user_role->query("SELECT * FROM user_roles WHERE soft_deleted<>1")->result() as $key => $value) {
			$id = $value->user_role_id;
			$url_delete = "\"references/user_role/delete_user_role\"";
			$url_edit = "\"references/user_role/get_user_role_info\"";
			$form_id = "\"form_user_role\"";
			$tbl_id = "[tbl_user_role]";
			$modal = "modal_user_role";

			$data["data"][] = [
				$value->user_role,
				"<div class='text-center'>
					<button class='btn btn-success btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
					<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
				</div>"
			];
		}
		echo json_encode($data);
	}

	function get_user_role_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_user_role->query("SELECT * FROM user_roles WHERE user_role_id='$id'")->result() as $key => $value) {
			$data = [
				"user_role_id" 	=> $value->user_role_id,
				"user_role"		=> $value->user_role
			];
		}
		echo json_encode($data);
	}

	function delete_user_role() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted User Role</strong> \"".$this->get_user_role($this->input->post("value"))."\"");
		if ($this->model_user_role->update(['soft_deleted' => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()],["user_role_id" => $this->input->post("value")])) {
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

	function insert_user_role() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$user_role_id 	= $this->input->post("user_role_id");
		$user_role 		= $this->input->post("user_role");
		$data = [
			"user_role" => $user_role
		];

		if($user_role_id == null) {
			if ($this->check_user_role($user_role) == 0) {
				$data += [
					"created_by" 	=> $this->session->login_id,
					"date_created" 	=> $this->now()
				];
				$this->model_user_role->insert($data);

				$this->user_log("<strong>Inserted User Role</strong> '$user_role'");
				$ret = [
					"success" 	=> true,
					"msg"		=> "Success"
				];
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "User Role ".$user_role." already exist"
				];
			}
		} else {
			if ($this->get_user_role($user_role_id) == $user_role) {
				$data += [
					"modified_by" 	=> $this->session->login_id,
					"date_modified" => $this->now()
				];
				$this->model_user_role->update($data, ["user_role_id" => $user_role_id]);

				$this->user_log("<strong>Updated User Role</strong> '$user_role'");	
				$ret = [
					"success" 	=> true,
					"msg"		=> "Updated"
				];			
			} else {
				if ($this->check_user_role($user_role) == 0) {
					$data += [
						"modified_by" 	=> $this->session->login_id,
						"date_modified" => $this->now()
					];
					$this->model_user_role->update($data, ["user_role_id" => $user_role_id]);	

					$this->user_log("<strong>Updated User Role</strong> '$user_role'");	
					$ret = [
						"success" 	=> true,
						"msg"		=> "Updated"
					];
				} else {
					 $ret = [
						"success" 	=> false,
						"msg"		=> "User Role ".$user_role." already exist"
					];
				}
			}
		}

		if($this->db->trans_status() === false) {
			$this->db->trans_rollback();
		}
		else {
		    $this->db->trans_commit();
		}
		echo json_encode($ret);
	}

	function check_user_role($user_role){
		$count = 0;
		foreach ($this->model_user_role->query("SELECT COUNT(*) AS count FROM user_roles WHERE user_role=$user_role")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_user_role($user_role_id){
		$data = "";
		foreach ($this->model_user_role->query("SELECT user_role FROM user_roles WHERE user_role_id=$user_role_id")->result() as $key => $value) {
			$data = $value->user_role;
			break;
		}
		return $data;
	}

}

/* End of file User_role.php */
/* Location: ./application/controllers/registration/User_role.php */