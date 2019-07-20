<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();	
		$this->load->model("model_school");
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Logs",
			"content"		=> 	[$this->load->view('interface/logs/Logs', [
									// "schools"	=> $this->get_school_select()
								], TRUE)]
		];
		$this->create_page($page_data);			
	}

	function get_user_logs(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT * FROM user_logs WHERE soft_delete=0")->result() as $key => $value) {
			$id = $value->user_log_id;
			$data["data"][] = [
				$this->user_full_name($value->user_id),
				$value->action,
				date("Y m, d", strtotime($value->date))
			];
		}
		echo json_encode($data);
	}

	function get_certificates(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT
									certificates.*,
									qualification_program_titles.qualification_program_title,
									(SELECT school FROM schools WHERE schools.school_id=students.school_id) AS school
								FROM
									`certificates`
								LEFT JOIN qualification_program_titles ON certificates.qualification_program_title_id = qualification_program_titles.qualification_program_title_id
								LEFT JOIN students ON certificates.student_id = students.student_id
								WHERE certificates.soft_deleted=1")->result() as $key => $value) {
			$id = $value->certificate_id;
			$data["data"][] = [
				$this->student_full_name($value->student_id).' <br> '.$value->qualification_program_title.' <br> '.$value->school.' <br> '.date("M d, Y", strtotime($value->date_received)).' <br> '.date("M d, Y", strtotime($value->date_from)).' <br> '.date("M d, Y", strtotime($value->date_to)),
				$value->modified_by ? $this->user_full_name($value->modified_by) : "",
				date("Y m, d", strtotime($value->date_modified))
			];
		}
		echo json_encode($data);
	}

	function get_users(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT
									*
								FROM
									`users`
								WHERE soft_deleted=1")->result() as $key => $value) {
			$id = $value->user_id;
			$data["data"][] = [
				$this->user_full_name($value->user_id),
				$value->modified_by ? $this->user_full_name($value->modified_by) : "",
				date("Y m, d", strtotime($value->date_modified))
			];
		}
		echo json_encode($data);
	}

	function get_schools(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT
									*
								FROM
									`schools`
								WHERE soft_deleted=1")->result() as $key => $value) {
			$id = $value->school_id;
			$data["data"][] = [
				$value->school.'<br>'.$value->address.'<br>',$value->email_address.'<br>'.$value->contact_no,
				$value->modified_by ? $this->user_full_name($value->modified_by) : "",
				date("Y m, d", strtotime($value->date_modified))
			];
		}
		echo json_encode($data);
	}

	function get_qualification_program_titles(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT
									*
								FROM
									`qualification_program_titles`
								WHERE soft_deleted=1")->result() as $key => $value) {
			$id = $value->qualification_program_title_id;
			$data["data"][] = [
				$value->qualification_program_title,
				$value->modified_by ? $this->user_full_name($value->modified_by) : "",
				date("Y m, d", strtotime($value->date_modified))
			];
		}
		echo json_encode($data);
	}

	function get_user_roles(){
		$data = ["data" => []];
		foreach ($this->db->query("SELECT
									*
								FROM
									`user_roles`
								WHERE soft_deleted=1")->result() as $key => $value) {
			$id = $value->user_role_id;
			$data["data"][] = [
				$value->user_role,
				$value->modified_by ? $this->user_full_name($value->modified_by) : "",
				date("Y m, d", strtotime($value->date_modified))
			];
		}
		echo json_encode($data);
	}

}

/* End of file Logs.php */
/* Location: ./application/controllers/Logs.php */