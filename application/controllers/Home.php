<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect_home();
	}

	public function index()
	{
		$data = $this->system();
		$data += [
			"page_title" 	=> "Home",
			"schools"		=> $this->get_school_select()
		];
		$this->load->view('interface/publicWebsite/Home', $data);
	}

	function get_school_select()
	{
		$data = [];
		foreach ($this->db->query("SELECT * FROM schools WHERE school_id<>1 AND soft_deleted<>1")->result() as $key => $value) {
			$data[] = [
				"id" 	=> $value->school_id,
				"text" 	=> $value->school
			];
		}
		return json_encode($data);
	}

	function get_courses()
	{
		$data = ["data" => []];
		$where = "qualification_program_titles.soft_deleted<>1";
		if ($this->input->post("f_school_id") != null) {
			$where .= " AND qualification_program_titles.school_id=".$this->input->post("f_school_id");
		}
		foreach ($this->db->query("SELECT
									 * 
									FROM 
										qualification_program_titles 
										LEFT JOIN schools ON qualification_program_titles.school_id=schools.school_id
									WHERE 
									$where")->result() as $key => $value) {
			$data["data"][] = [
				$value->school,
				$value->qualification_program_title
			];
		}
		echo json_encode($data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */