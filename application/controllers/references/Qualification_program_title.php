<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualification_program_title extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
		$this->load->model('model_qualification_program_title');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Qualification / Program Title",
			"content"		=> 	[$this->load->view('interface/references/qualificationProgramTitle/Qualification_program_title', [
				"schools"	=> $this->get_school_select()
			], TRUE)]
		];
		$this->create_page($page_data);		
	}

	function get_qualification_program_titles() {
		$data = ["data" => []];
		foreach ($this->db->query("SELECT 
									* 
									FROM 
									qualification_program_titles 
									LEFT JOIN schools ON qualification_program_titles.school_id=schools.school_id
									WHERE 
										qualification_program_titles.soft_deleted<>1")->result() as $key => $value) {

			$id = $value->qualification_program_title_id;
			$url_delete = "\"references/qualification_program_title/delete_qualification_program_title\"";
			$url_edit = "\"references/qualification_program_title/get_qualification_program_title_info\"";
			$form_id = "\"form_qualification_program_title\"";
			$tbl_id = "[tbl_qualification_program_title]";
			$modal = "modal_qualification_program_title";

			$data["data"][] = [
				$value->qualification_program_title,
				$value->school,
				"<div class='text-center'>
					<button class='btn btn-success btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
					<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
				</div>"
			];
		}
		echo json_encode($data);
	}

	function get_qualification_program_title_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->db->query("SELECT * FROM qualification_program_titles WHERE qualification_program_title_id='$id'")->result() as $key => $value) {
			$data = [
				"qualification_program_title_id" 	=> $value->qualification_program_title_id,
				"qualification_program_title"		=> $value->qualification_program_title,
				"school_id"							=> $value->school_id
			];
		}
		echo json_encode($data);
	}

	function delete_qualification_program_title() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted Qualification / Program Title</strong> \"".$this->get_qualification_program_title($this->input->post("value"))."\"");
		if ($this->model_qualification_program_title->update(["soft_deleted" => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()], ["qualification_program_title_id" => $this->input->post("value")])) {
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

	function insert_qualification_program_title() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$qualification_program_title_id 	= $this->input->post("qualification_program_title_id");
		$qualification_program_title 		= $this->input->post("qualification_program_title");
		$school_id							= $this->input->post("school_id");
		$data = [
			"qualification_program_title" 	=> $qualification_program_title,
			"school_id"						=> $school_id
		];

		if($qualification_program_title_id == null) {
			if ($this->check_qualification_program_title($qualification_program_title, $school_id) == 0) {
				$data += [
					"created_by" 	=> $this->session->login_id,
					"date_created" 	=> $this->now()
				];
				$this->model_qualification_program_title->insert($data);

				$this->user_log("<strong>Inserted Qualification / Program Title</strong> '$qualification_program_title'");
				$ret = [
					"success" 	=> true,
					"msg"		=> "Success"
				];
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "Qualification / Program Title ".$qualification_program_title." already exist"
				];
			}
		} else {
			if ($this->get_qualification_program_title($qualification_program_title_id) == $qualification_program_title.$school_id) {
				$data += [
					"modified_by" 	=> $this->session->login_id,
					"date_modified" => $this->now()
				];
				$this->model_qualification_program_title->update($data, ["qualification_program_title_id" => $qualification_program_title_id]);

				$this->user_log("<strong>Updated Qualification / Program Title</strong> '$qualification_program_title'");	
				$ret = [
					"success" 	=> true,
					"msg"		=> "Updated"
				];			
			} else {
				if ($this->check_qualification_program_title($qualification_program_title, $school_id) == 0) {
					$data += [
						"modified_by" 	=> $this->session->login_id,
						"date_modified" => $this->now()
					];
					$this->model_qualification_program_title->update($data, ["course_id" => $course_id]);	

					$this->user_log("<strong>Updated Qualification / Program Title</strong> '$qualification_program_title'");	
					$ret = [
						"success" 	=> true,
						"msg"		=> "Updated"
					];
				} else {
					 $ret = [
						"success" 	=> false,
						"msg"		=> "Qualification / Program Title ".$qualification_program_title." already exist"
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

	function check_qualification_program_title($qualification_program_title, $school_id){
		$count = 0;
		foreach ($this->db->query("SELECT COUNT(*) AS count FROM qualification_program_titles WHERE qualification_program_title='$qualification_program_title AND school_id=$school_id'")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_qualification_program_title($qualification_program_title_id){
		$data = "";
		foreach ($this->db->query("SELECT qualification_program_title, school_id FROM qualification_program_titles WHERE qualification_program_title_id='$qualification_program_title_id'")->result() as $key => $value) {
			$data = $value->qualification_program_title.$value->school_id;
			break;
		}
		return $data;
	}

	// others
	function get_school_select()
	{
		$data = [];
		foreach ($this->db->query("SELECT * FROM schools")->result() as $key => $value) {
			$data[] = [
				"id"	=> $value->school_id,
				"text"	=> $value->school
			];
		}
		return json_encode( $data );
	}

}

/* End of file Qualification_program_title.php */
/* Location: ./application/controllers/references/Qualification_program_title.php */