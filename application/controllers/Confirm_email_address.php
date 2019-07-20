<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_email_address extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect_home();
		$this->load->model('model_student');
	}

	public function index()
	{
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		if ($this->input->post("student_id") != null) {
			if ($this->check_email_confirm($this->input->post("student_id")) == 0) {
				date_default_timezone_set("Asia/Manila");
				$now = date("Y-m-d");
				$this->model_student->update([
														"uli_number"	=> $this->generate_number($now),
														"entry_date"	=> $now,
														"status" 		=> 1
													],
													[
														"student_id" => $this->input->post("student_id")
													]);
				$ret = [
					"success" 		=> true,
					"msg"			=> "Your email address has confirm ".$this->input->post("email_address")
				];
			} else {
				$ret = [
					"success" 		=> true,
					"msg"			=> "This email address already confirm ".$this->input->post("email_address")
				];
			}
		}
		$data = $this->system();
		$data += [
			"page_title" 	=> "Confirm Email Address",
			"data_confirm"	=> $ret
		];
		$this->load->view('interface/public_website/Confirm_email_address', $data);
	}

	public function check_email_confirm($student_id)
	{
		$data = "";
		foreach ($this->model_student->query("SELECT status FROM students WHERE student_id='$student_id'")->result() as $key => $value) {
			$data = $value->status;
		}
		return $data;
	}

	public function generate_number($date)
	{
		$last_num = 1;
		foreach ($this->db->query("SELECT uli_number FROM students ORDER BY entry_date DESC LIMIT 1")->result() as $key => $value) {
			if ($value->uli_number !== null) {
				$uli_number = explode("-", $value->uli_number);
				$last_num = $uli_number[2]+1;				
			}
		}
		$num = "ULI-".date("mdy", strtotime($date))."-".sprintf("%04d", $last_num);
		return $num;
	}

}

/* End of file Confirm_email_address.php */
/* Location: ./application/controllers/Confirm_email_address.php */