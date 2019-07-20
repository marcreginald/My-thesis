<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

class Cron_job extends MY_Controller {

	function send_email(){
		$this->load->model('model_student');
		
		foreach ($this->db->query("SELECT
										*
									FROM
										certificates
									LEFT JOIN students ON certificates.student_id=students.student_id
									LEFT JOIN qualification_program_titles ON certificates.qualification_program_title_id=qualification_program_titles.qualification_program_title_id
									WHERE certificates.soft_deleted<>1")->result() as $key => $value) {

			$to_name = $this->student_full_name($value->student_id);

			$to_email = $value->email_address;
			$date_to = $value->date_to;
			$date_now = date("Y-m");

			$three_months = date("Y-m", strtotime($date_to.'-3 months'));
			$two_months = date("Y-m", strtotime($date_to.'-2 months'));
			$one_month = date("Y-m", strtotime($date_to.'-1 months'));

			echo "Expired Date In 3: ".date("Y-m", strtotime($date_to.'-3 months'));
			echo '<br>';
			echo "Expired Date In 2: ".date("Y-m", strtotime($date_to.'-2 months'));
			echo '<br>';
			echo "Expired Date In 1: ".date("Y-m", strtotime($date_to.'-1 months'));
			echo '<br>';
			echo "Expired Date In Now: ".date("Y-m", strtotime($date_to));
			echo '<br>';
			echo "Now Date: ".date("Y-m");
			echo '<br>';
			echo "Three Months: ".$three_months;
			echo '<br>';
			echo "Two Months: ".$two_months;
			echo '<br>';
			echo "One Month: ".$one_month;
			echo '<br>';

			if ($value->email_address != null && $date_to != "" && $date_to != "0000-00-00") {
				if(date("Y-m") == $three_months) {

					if ($value->email_sent_status != 4) {
						$content = "Your certificate for \"".$value->qualification_program_title."\" will be expired in 3 months!";

						echo '<br>';
						print_r($this->send_mail($to_email, $to_name, $content));
						echo '<br>';

						if ($this->send_mail($to_email, $to_name, $content) == 'success') {
							$this->send_sms($value->contact_no, $to_name, $content);
							$this->db->query("UPDATE certificates SET email_sent_status=4 WHERE certificate_id=".$value->certificate_id);
						}
					}

				} 
				elseif (date("Y-m") == $two_months) {

					if ($value->email_sent_status != 3) {
						$content = "Your certificate for \"".$value->qualification_program_title."\" will be expired in 2 months!";

						echo '<br>';
						print_r($this->send_mail($to_email, $to_name, $content));
						echo '<br>';

						if ($this->send_mail($to_email, $to_name, $content) == 'success') {
							$this->send_sms($value->contact_no, $to_name, $content);
							$this->db->query("UPDATE certificates SET email_sent_status=3 WHERE certificate_id=".$value->certificate_id);
						}
					}

				} 
				elseif (date("Y-m") == $one_month) {

					if ($value->email_sent_status != 2) {
						$content = "Your certificate for \"".$value->qualification_program_title."\" will be expired in 1 months!";

						echo '<br>';
						print_r($this->send_mail($to_email, $to_name, $content));
						echo '<br>';

						if ($this->send_mail($to_email, $to_name, $content) == 'success') {
							$this->send_sms($value->contact_no, $to_name, $content);
							$this->db->query("UPDATE certificates SET email_sent_status=2 WHERE certificate_id=".$value->certificate_id);
						}
					}

				} 
				elseif (date("Y-m", strtotime($date_to)) == $date_now) {

					if ($value->email_sent_status != 1) {
						$content = "Your certificate for \"".$value->qualification_program_title."\" will be expired in this months!";

						echo '<br>';
						print_r($this->send_mail($to_email, $to_name, $content));
						echo '<br>';

						if ($this->send_mail($to_email, $to_name, $content) == 'success') {
							$this->send_sms($value->contact_no, $to_name, $content);
							$this->db->query("UPDATE certificates SET email_sent_status=1 WHERE certificate_id=".$value->certificate_id);
						}
					}

				}
			}
		}
	}

	public function send_mail($to_email, $to_name, $content){

		$this->load->library('email');
		$config = Array(
					'mailtype' 	=> 'html'
				);

		$this->email->initialize($config);
		
		$this->email->from('tesda.affiliated@gmail.com', 'Tesda Affiliated Schools');
		$this->email->to($to_email);
		$this->email->subject("Tesda Email Test");

		$body = $this->load->view('interface/cronJob/Email_template', ["to_name" => $to_name, "to_email" => $to_email, "content" => $content], true);

		$this->email->message($body);
		// ini_set("SMTP","ssl://smtp.gmail.com");
		// ini_set("smtp_port","465");
		$this->email->set_newline("\r\n");

		$data = '';
		if($this->email->send())
		{
			$data = 'success';
		}
		else
		{
			$data = $this->email->print_debugger();
		}
		return $data;
	}

	function test(){
		$this->send_sms("639560331298","test", "TESDA test");
	}


	public function send_sms($to_number, $to_name, $to_message){
		// Authorisation details.

		// Authorisation details.
		$username = "jovani.dimaangay@urios.edu.ph";
		$hash = "e2604b5bbb3a7d330ffefbd2d02a547ee4ca7f908f433569531babba4626210d";

		// Config variables. Consult http://api.txtlocal.com/docs for more info.
		$test = "1";

		// Data for text message. This is the text message data.
		$sender = "TESDA SMS NOTICATION"; // This is who the message appears to be from.
		$numbers = $to_number; // A single number or a comma-seperated list of numbers
		$message = $to_message;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.txtlocal.com/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API

		echo '<pre>';
		print_r(json_decode($result, true));
		echo '</pre>';

		curl_close($ch);

	}


}

/* End of file Cron_job.php */
/* Location: ./application/controllers/Cron_job.php */