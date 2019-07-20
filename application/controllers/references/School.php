<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_school');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "School",
			"content"		=> 	[$this->load->view('interface/references/school/School', [], TRUE)]
		];
		$this->create_page($page_data);		
	}

	function get_schools() {
		$data = ["data" => []];
		foreach ($this->model_school->query("SELECT * FROM schools WHERE soft_deleted<>1")->result() as $key => $value) {
			$id = $value->school_id;
			$url_delete = "\"references/school/delete_school\"";
			$url_edit = "\"references/school/get_school_info\"";
			$form_id = "\"form_school\"";
			$tbl_id = "[tbl_school]";
			$modal = "modal_school";

			$data["data"][] = [
				$value->school,
				$value->contact_no,
				$value->email_address,
				$value->address,
				"<div class='text-center'>
					<button class='btn btn-success btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
					<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
				</div>"
			];
		}
		echo json_encode($data);
	}

	function get_school_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_school->query("SELECT * FROM schools WHERE school_id='$id'")->result() as $key => $value) {
			$data = [
				"school_id" 	=> $value->school_id,
				"school" 		=> $value->school,
				"contact_no"	=> $value->contact_no,
				"email_address"	=> $value->email_address,
				"address"		=> $value->address
			];
		}
		echo json_encode($data);
	}

	function delete_school() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted School</strong> \"".$this->get_school($this->input->post("value"))."\"");
		if ($this->model_school->update(['soft_deleted' => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()], ["school_id" => $this->input->post("value")])) {
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

	function insert_school() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$school_id 	= $this->input->post("school_id");
		$school 	= $this->input->post("school");
		$data = [
			"school" 			=> $school,
			"contact_no" 		=> $this->input->post("contact_no"),
			"email_address" 	=> $this->input->post("email_address"),
			"address" 			=> $this->input->post("address")
		];

		if($school_id == null) {
			if ($this->check_school($school) == 0) {
				$data += [
					"created_by" 	=> $this->session->login_id,
					"date_created" 	=> $this->now()
				];
				$this->model_school->insert($data);

				$this->user_log("<strong>Inserted School</strong> '$school'");
				$ret = [
					"success" 	=> true,
					"msg"		=> "Success"
				];
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "School ".$school." already exist"
				];
			}
		} else {
			if ($this->get_school($school_id) == $school) {
				$data += [
					"modified_by" 	=> $this->session->login_id,
					"date_modified" => $this->now()
				];
				$this->model_school->update($data, ["school_id" => $school_id]);

				$this->user_log("<strong>Updated School</strong> '$school'");	
				$ret = [
					"success" 	=> true,
					"msg"		=> "Updated"
				];			
			} else {
				if ($this->check_school($school) == 0) {
					$data += [
						"modified_by" 	=> $this->session->login_id,
						"date_modified" => $this->now()
					];
					$this->model_school->update($data, ["school_id" => $school_id]);	

					$this->user_log("<strong>Updated School</strong> '$school'");	
					$ret = [
						"success" 	=> true,
						"msg"		=> "Updated"
					];
				} else {
					 $ret = [
						"success" 	=> false,
						"msg"		=> "School ".$school." already exist"
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

	function check_school($school){
		$count = 0;
		foreach ($this->model_school->query("SELECT COUNT(*) AS count FROM schools WHERE school='$school'")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_school($school_id){
		$data = "";
		foreach ($this->model_school->query("SELECT school FROM schools WHERE school_id=$school_id")->result() as $key => $value) {
			$data = $value->school;
			break;
		}
		return $data;
	}

}

/* End of file School.php */
/* Location: ./application/controllers/references/School.php */