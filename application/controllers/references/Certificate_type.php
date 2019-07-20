<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_type extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_certificate_type');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Certificate Type",
			"content"		=> 	[$this->load->view('interface/references/certificateType/Certificate_type', [], TRUE)]
		];
		$this->create_page($page_data);		
	}

	function get_certificate_types() {
		$data = ["data" => []];
		foreach ($this->model_certificate_type->query("SELECT * FROM certificate_types WHERE soft_deleted<>1")->result() as $key => $value) {
			$id = $value->certificate_type_id;
			$url_delete = "\"references/certificate_type/delete_certificate_type\"";
			$url_edit = "\"references/certificate_type/get_certificate_type_info\"";
			$form_id = "\"form_certificate_type\"";
			$tbl_id = "[tbl_certificate_type]";
			$modal = "modal_certificate_type";

			$data["data"][] = [
				$value->certificate_type,
				"<div class='text-center'>
					<button class='btn btn-success btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
					<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
				</div>"
			];
		}
		echo json_encode($data);
	}

	function get_certificate_type_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_certificate_type->query("SELECT * FROM certificate_types WHERE certificate_type_id='$id'")->result() as $key => $value) {
			$data = [
				"certificate_type_id" 	=> $value->certificate_type_id,
				"certificate_type" 		=> $value->certificate_type
			];
		}
		echo json_encode($data);
	}

	function delete_certificate_type() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted Certificate Type</strong> \"".$this->get_certificate_type($this->input->post("value"))."\"");
		if ($this->model_certificate_type->update(["soft_deleted" => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()],["certificate_type_id" => $this->input->post("value")])) {
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

	function insert_certificate_type() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$certificate_type_id 	= $this->input->post("certificate_type_id");
		$certificate_type 	= $this->input->post("certificate_type");
		$data = [
			"certificate_type" 			=> $certificate_type
		];

		if($certificate_type_id == null) {
			if ($this->check_certificate_type($certificate_type) == 0) {
				$data += [
					"created_by" 	=> $this->session->login_id,
					"date_created" 	=> $this->now()
				];
				$this->model_certificate_type->insert($data);

				$this->user_log("<strong>Inserted Certificate Type</strong> '$certificate_type'");
				$ret = [
					"success" 	=> true,
					"msg"		=> "Success"
				];
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "Certificate Type ".$certificate_type." already exist"
				];
			}
		} else {
			if ($this->get_certificate_type($certificate_type_id) == $certificate_type) {
				$data += [
					"modified_by" 	=> $this->session->login_id,
					"date_modified" => $this->now()
				];
				$this->model_certificate_type->update($data, ["certificate_type_id" => $certificate_type_id]);

				$this->user_log("<strong>Updated Certificate Type</strong> '$certificate_type'");	
				$ret = [
					"success" 	=> true,
					"msg"		=> "Updated"
				];			
			} else {
				if ($this->check_certificate_type($certificate_type) == 0) {
					$data += [
						"modified_by" 	=> $this->session->login_id,
						"date_modified" => $this->now()
					];
					$this->model_certificate_type->update($data, ["certificate_type_id" => $certificate_type_id]);	

					$this->user_log("<strong>Updated Certificate Type</strong> '$certificate_type'");	
					$ret = [
						"success" 	=> true,
						"msg"		=> "Updated"
					];
				} else {
					 $ret = [
						"success" 	=> false,
						"msg"		=> "Certificate Type ".$certificate_type." already exist"
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

	function check_certificate_type($certificate_type){
		$count = 0;
		foreach ($this->model_certificate_type->query("SELECT COUNT(*) AS count FROM certificate_types WHERE certificate_type='$certificate_type'")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_certificate_type($certificate_type_id){
		$data = "";
		foreach ($this->model_certificate_type->query("SELECT certificate_type FROM certificate_types WHERE certificate_type_id=$certificate_type_id")->result() as $key => $value) {
			$data = $value->certificate_type;
			break;
		}
		return $data;
	}

}

/* End of file Certificate_type.php */
/* Location: ./application/controllers/references/Certificate_type.php */