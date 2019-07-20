<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
        $this->load->library('excel'); 
		$this->load->model('model_certificate');
		$this->load->model('model_student');
		$this->load->model('model_qualification_program_title');
		$this->load->model('model_school');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Certificate",
			"content"		=> 	[$this->load->view('interface/certificate/Certificate', [
									"students" 						=> $this->get_student_select(),
									"qualification_program_titles" 	=> $this->get_qualification_program_title_select(),
									"schools"						=> $this->get_school_select()
								], TRUE)]
		];
		$this->create_page($page_data);	
	}

	function get_certificates(){
		$data = ['data' => []]; 

		$where = "WHERE certificates.soft_deleted<>1";

		$qualification_program_title_id = $this->input->post("f_qualification_program_title_id");
		$status = $this->input->post("f_status");
		$school_id = $this->input->post("f_school_id");


		if ($this->session->login_school_id != 1) {
			$where .= " AND students.school_id=".$this->session->login_school_id;
		} else {
			if ($school_id != null) {
				$where .= " AND students.school_id=".$school_id;
			}
		}

		if ($qualification_program_title_id != null) {
			$where .= " AND certificates.qualification_program_title_id=".$qualification_program_title_id;
		}

		foreach ($this->db->query("SELECT
										*,
										(SELECT school FROM schools WHERE schools.school_id=students.school_id) AS school
									FROM
										certificates
									LEFT JOIN students ON certificates.student_id = students.student_id
									LEFT JOIN qualification_program_titles ON certificates.qualification_program_title_id = qualification_program_titles.qualification_program_title_id $where")->result() as $key => $value) {
			$id = $value->certificate_id;
			$url_delete = "\"certificate/delete_certificate\"";
			$url_edit = "\"certificate/get_certificate_info\"";
			$form_id = "\"form_certificate\"";
			$tbl_id = "[tbl_certificate]";
			$modal = "modal_certificate";

			$show_notif = "Active";
			$expire_notif = "<label class='label label-md label-success'>Active</label>";

			$date_now = date("Y-m");
			$date_to = $value->date_to;

			$three_months = date("Y-m", strtotime($date_to.'-3 months'));
			$two_months = date("Y-m", strtotime($date_to.'-2 months'));
			$one_month = date("Y-m", strtotime($date_to.'-1 months'));

			if($date_to != "" && $date_to != "0000-00-00") {
				if(date("Y-m") == $three_months) {

					$show_notif = "Expired in 3 months";
					$expire_notif = "<label class='label label-md label-success'>Expired in 3 months</label>";

				} 
				elseif (date("Y-m") == $two_months) {

					$show_notif = "Expired in 2 months";
					$expire_notif = "<label class='label label-md label-success'>Expired in 2 months</label>";

				} 
				elseif (date("Y-m") == $one_month) {

					$show_notif = "Expired in 1 month";
					$expire_notif = "<label class='label label-md label-warning'>Expired in 1 month</label>";

				} 
				elseif (date("Y-m", strtotime($date_to)) == $date_now) {

					$show_notif = "Expired";
					$expire_notif = "<label class='label label-md label-danger'>Expired</label>";

				}
			}

			if ($this->session->login_school_id == 1) {
				$data["data"][] = [
					$this->student_full_name($value->student_id),
					$value->qualification_program_title,
					$value->school,
					date("M d, Y", strtotime($value->date_received)),
					date("M d, Y", strtotime($value->date_from)),
					date("M d, Y", strtotime($value->date_to)),
					$expire_notif,
					"<div class='text-center'>
						<button class='btn btn-primary btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_certificate_info($id)' title='Edit'><span class='fa fa-edit'></span></button>
						<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
					</div>"
				];				
			} else {
				$data["data"][] = [
					$this->student_full_name($value->student_id),
					$value->qualification_program_title,
					date("M d, Y", strtotime($value->date_received)),
					date("M d, Y", strtotime($value->date_from)),
					date("M d, Y", strtotime($value->date_to)),
					$expire_notif
				];			
			}

		}
		echo json_encode($data);
	}

	function get_certificate_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_certificate->query("SELECT * FROM certificates WHERE certificate_id='$id'")->result() as $key => $value) {
			$data = [
				"certificate_id" 					=> $value->certificate_id,
				"student_id"						=> $value->student_id,
				"qualification_program_title_id" 	=> $value->qualification_program_title_id,
				"date_received"						=> $value->date_received,
				"date_from"							=> $value->date_from,
				"date_to"							=> $value->date_to
			];
		}
		echo json_encode($data);
	}

	function delete_certificate() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "<span class='fa fa-warning'></span> Something went wrong"
		];

		$this->user_log("<strong>Deleted Certificate</strong> \"".$this->get_certificate_del($this->input->post("value"))."\"");
		if ($this->model_certificate->update(["soft_deleted" => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()], ["certificate_id" => $this->input->post("value")])) {
			$ret = [
				"success" 	=> true,
				"msg"		=> "<span class='fa fa-check'></span> Success"
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

	function get_certificate_del($certificate_id) {
		$data = "";
		foreach ($this->model_certificate->query("SELECT student_id FROM certificates WHERE certificate_id='$certificate_id'")->result() as $key => $value) {
			$data = $this->student_full_name($value->student_id);
			break;
		}
		return $data;
	}

	function insert_certificate()
	{
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];
		$certificate_id = $this->input->post("certificate_id");
		$student_id 	= $this->input->post("student_id");


		$data = [ 
			"student_id" 						=> $student_id,
			"qualification_program_title_id" 	=> $this->input->post("qualification_program_title_id"),
			"date_received" 					=> $this->input->post("date_received"),
			"date_from" 						=> $this->input->post("date_from"),
			"date_to" 							=> $this->input->post("date_to")
		];

		if($certificate_id == null) {
			$data += [
				"created_by" 	=> $this->session->login_id,
				"date_created" 	=> $this->now()
			];
			$this->model_certificate->insert($data);

			$this->user_log("<strong>Inserted Certificate</strong> '".$this->student_full_name($student_id)."'");
			$ret = [
				"success" 	=> true,
				"msg"		=> "Success"
			];
		} else {
			$data += [
				"modified_by" 	=> $this->session->login_id,
				"date_modified" => $this->now()
			];
			$this->model_certificate->update($data, ["certificate_id" => $certificate_id]);

			$this->user_log("<strong>Updated Certificate</strong> '".$this->student_full_name($student_id)."'");	
			$ret = [
				"success" 	=> true,
				"msg"		=> "Updated"
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

	function upload_certificate()
	{
		$this->db->trans_begin();
        $ret = [
            "success"   => false,
            "msg"       => "Something went wrong"
        ];

        $school_id = "";
        if ($this->session->login_school_id != 1) {
        	$school_id = $this->session->login_school_id;
        } else {
        	$school_id = $this->input->post("m_school_id");
        }

        $count = 0;

        if ($school_id != "") {
        	if (!empty($_FILES["file"]["name"])) { 
	            $path_parts = pathinfo($_FILES["file"]["name"]);
	            $extension = $path_parts['extension'];

	            if ($extension == "xls" || $extension == "xlsx" || $extension == "csv"){
	                $path = $_FILES["file"]["tmp_name"];
	                $object = PHPExcel_IOFactory::load($path);
	                $count = $object->setActiveSheetIndex(0)->getHighestRow() - 1;  

	                try {
	                    foreach($object->getWorksheetIterator() as $worksheet) {
	                        $a = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(0,1)->getValue()));
	                        $b = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(1,1)->getValue()));
	                        $c = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(2,1)->getValue()));
	                        $d = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(3,1)->getValue()));
	                        $e = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(4,1)->getValue()));
	                        $f = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(5,1)->getValue()));
	                        $g = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(6,1)->getValue()));
	                        $h = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(7,1)->getValue()));

	                        $highestRow = $worksheet->getHighestRow();
	                        $highestColumn = $worksheet->getHighestColumn();

	                        if ($a == "FIRSTNAME" && $b == "MIDDLENAME" && $c == "LASTNAME" && $d == "NAME_EXT" && $e == "QUALIFICATION_PROGRAM_TITLE" && $f == "DATE_RECEIVED" && $g == "EXPIRED_FROM" && $h == "EXPIRED_UNTIL") {
	                            $data_excel = [];
	                            for($row=2; $row<=$highestRow; $row++)
	                            {
	                                $firstname   					= $worksheet->getCellByColumnAndRow(0,$row)->getValue();       
	                                $middlename         			= $worksheet->getCellByColumnAndRow(1,$row)->getValue(); 
	                                $lastname           			= $worksheet->getCellByColumnAndRow(2,$row)->getValue(); 
	                                $name_ext           			= $worksheet->getCellByColumnAndRow(3,$row)->getValue(); 
	                                $qualification_program_title   	= $worksheet->getCellByColumnAndRow(4,$row)->getValue(); 
	                                $date_received         			= $worksheet->getCellByColumnAndRow(5,$row)->getValue(); 
	                                $expired_from      				= $worksheet->getCellByColumnAndRow(6,$row)->getValue(); 
	                                $expired_until      			= $worksheet->getCellByColumnAndRow(7,$row)->getValue(); 

	                                $unix_received_date = "";
	                                if (preg_replace('/\s+/', '', $date_received) != "") {
										$unix_received_date = ($date_received - 25569) * 86400;
										$date_received = 25569 + ($unix_received_date / 86400);
										$unix_received_date = ($date_received - 25569) * 86400;
	                                }

	                                $unix_expired_from_date = "";
	                                if (preg_replace('/\s+/', '', $expired_from) != "") {
										$unix_expired_from_date = ($expired_from - 25569) * 86400;
										$expired_from = 25569 + ($unix_expired_from_date / 86400);
										$unix_expired_from_date = ($expired_from - 25569) * 86400;
	                                }

	                                $unix_expired_until_date = "";
	                                if (preg_replace('/\s+/', '', $expired_until) != "") {
										$unix_expired_until_date = ($expired_until - 25569) * 86400;
										$expired_until = 25569 + ($unix_expired_until_date / 86400);
										$unix_expired_until_date = ($expired_until - 25569) * 86400;
	                                }

	                                $qualification_program_title_id = $this->get_qualification_program_title_id(strtoupper(preg_replace('/\s+/', '', $qualification_program_title)), $school_id);

	                                $student_id = $this->get_student_id(strtoupper(preg_replace('/\s+/', '', $firstname)), strtoupper(preg_replace('/\s+/', '', $middlename)), strtoupper(preg_replace('/\s+/', '', $lastname)), strtoupper(preg_replace('/\s+/', '', $name_ext)), $school_id);

	                                $checked = 0;
	                                if ($qualification_program_title_id != "" && $student_id != "") {
	                                	$checked = $this->check_certificate_multiple($student_id, $qualification_program_title_id, $expired_from, $expired_until);
	                                }


	                                if (preg_replace('/\s+/', '', $firstname) != "" && preg_replace('/\s+/', '', $lastname) != "") {
	                                    $data_excel[] = [
	                                        "firstname"  						=> $firstname,
	                                        "middlename"        				=> $middlename,
	                                        "lastname"          				=> $lastname,
	                                        "name_ext"          				=> $name_ext,
	                                        "qualification_program_title"   	=> $qualification_program_title,
	                                        "date_received"        				=> date("Y-m-d", $unix_received_date),
	                                        "expired_from"        				=> date("Y-m-d", $unix_expired_from_date),
	                                        "expired_until"     				=> date("Y-m-d", $unix_expired_until_date),
	                                        "student_id"						=> $student_id,
	                                        "qualification_program_title_id" 	=> $qualification_program_title_id,
	                                        "checked"       					=> $checked
	                                    ];                                        
	                                }
	                            }

	                            $ret = [
	                                "success"       => true,
	                                "msg"           => "Showing data from excel you uploaded. Please check your data before submit, thank you!",
	                                "count"         => $count,
	                                "data_excel"    => $data_excel
	                            ]; 

	                        } else {
	                            $ret = [
	                                "success"       => false,
	                                "msg"           => "Your file uploaded is wrong format! Please use the correct format"
	                            ];                              
	                        }

	                    }

	                } catch (Exception $e) {
	                    $ret = [
	                        "success"   => false,
	                        "msg"       => "Something went wrong with API: ".$e->getMessaage()
	                    ];
	                }
	            } else {
	                $ret = [
	                    "success"       => false,
	                    "msg"           => "Your file uploaded is not allowed!"
	                ];
	            }
	                
	        } else {
	            $ret = [
	                "success"   => false,
	                "msg"       => "Please, add files"
	            ];
	        }
        } else {
        	$ret = [
                "success"   => false,
                "msg"       => "Please, select school"
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

	function insert_certificate_multiple()
	{
		$this->db->trans_begin();
        $ret = [
            "success"   => false,
            "msg"       => "Something went wrong"
        ];

        $login_school_id  = "";

        if ($this->session->login_school_id != 1) {
	        $login_school_id  = $this->session->login_school_id;
        } else {
			$login_school_id  = $this->input->post("im_school_id");
        }

        if ($this->input->post("student_id") != null && $this->input->post("qualification_program_title_id") != null) {
        	foreach ($this->input->post("student_id") as $key => $value) {
        		$data = [
        			"student_id" 						=> $value,
        			"qualification_program_title_id"	=> $this->input->post("qualification_program_title_id")[$key],
        			"date_received"						=> $this->input->post("date_received")[$key],
        			"date_from"							=> $this->input->post("expired_from")[$key],
        			"date_to"							=> $this->input->post("expired_until")[$key]
        		];

        		if ($this->input->post("checked")[$key] == 0) {
        			$data += [
        				"created_by"	=> $this->session->login_id,
        				"date_created"	=> $this->now()
        			];
        			$this->model_certificate->insert($data);

        			$this->user_log("<strong>Inserted Certificate</strong> '".$this->student_full_name($value)."'");
					
        		} else {
        			$data += [
        				"modified_by"	=> $this->session->login_id,
        				"date_modified"	=> $this->now()
        			];

        			$certificate_id = $this->get_certificate_id($value, $this->input->post("qualification_program_title_id")[$key], $this->input->post("date_received")[$key], $this->input->post("expired_from")[$key], $this->input->post("expired_until")[$key]);

        			$this->model_certificate->update($data, ["certificate_id" => $certificate_id]);

        			$this->user_log("<strong>Updated Certificate</strong> '".$this->student_full_name($value)."'");
        		}
        	}
        }

        if($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $ret = [
	            "success"   => false,
	            "msg"       => "Something went wrong"
	        ];
        }
        else {
            $this->db->trans_commit();
            $ret = [
				"success" 	=> true,
				"msg"		=> "Success"
			];
        }
        echo json_encode($ret);
	}

	function get_certificate_id($student_id, $qualification_program_title_id, $date_received, $expired_from, $expired_until)
	{
		$data = "";
		$where = "student_id = ".$student_id;
		$where .= " AND qualification_program_title_id = ".$qualification_program_title_id;
		$where .= " AND date_received = '$date_received'";
		$where .= " AND date_from = '$expired_from'";
		$where .= " AND date_to = '$expired_until'";
		foreach ($this->model_certificate->query("SELECT certificate_id FROM certificates WHERE $where")->result() as $key => $value) {
			$data = $value->certificate_id;
		}
		return $data;
	}

	function get_school_id($school){
		$data = "";
		foreach ($this->db->query("SELECT school_id FROM schools WHERE school='$school'")->result() as $value) {
			$data = $value->school_id;
		}
		return $data;
	}

	function get_student_id($firstname, $middlename, $lastname, $name_ext, $school_id){
		$data = "";
		foreach ($this->db->query("SELECT
									student_id
								FROM
									`students`
								WHERE
									UPPER(REPLACE(firstname, ' ', '')) = '$firstname'
								AND UPPER(REPLACE(middlename, ' ', '')) = '$middlename'
								AND UPPER(REPLACE(lastname, ' ', '')) = '$lastname'
								AND UPPER(REPLACE(name_ext, ' ', '')) = '$name_ext'
								AND school_id=".$school_id)->result() as $key => $value) {

			$data = $value->student_id;

		}
		return $data;
	}

	function get_qualification_program_title_id($qualification_program_title, $school_id){
		$data = "";
		foreach ($this->db->query("SELECT
									qualification_program_title_id
								FROM
									`qualification_program_titles`
								WHERE
									UPPER(REPLACE(qualification_program_title, ' ', '')) = '$qualification_program_title'
								AND school_id = $school_id")->result() as $key => $value) {

			$data = $value->qualification_program_title_id;

		}
		return $data;
	}

	function check_certificate_multiple($student_id, $qualification_program_title_id, $expired_from, $expired_until) {
		$count = 0;
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
									`certificates`
								WHERE
									student_id = $student_id
								AND qualification_program_title_id = $qualification_program_title_id
								AND date_from = '$expired_from'
								AND date_to='$expired_until'")->result() as $key => $value) {

			$count = $value->count;

		}
		return $count;
	}

	// others
	function get_student_select()
	{
		$data = [];
		foreach ($this->db->query("SELECT
									*
								FROM
									students
								LEFT JOIN schools ON students.school_id=schools.school_id
								WHERE
									students.soft_deleted <> 1")->result() as $key => $value) {
			$data[] = [
				"id" 	=> $value->student_id,
				"text" 	=> $this->student_full_name($value->student_id).' FROM: '.$value->school,
				"col1"	=> $value->school
			];
		}
		return json_encode($data);
	}

	function get_qualification_program_title_select()
	{
		$data = [];
		foreach ($this->db->query("SELECT * FROM qualification_program_titles WHERE qualification_program_titles.soft_deleted<>1")->result() as $key => $value) {
			$data[] = [
				"id" 	=> $value->qualification_program_title_id,
				"text" 	=> $value->qualification_program_title
			];
		}
		return json_encode($data);
	}

	function get_school_select()
	{
		$data = [];
		foreach ($this->db->query("SELECT * FROM schools WHERE soft_deleted<>1")->result() as $key => $value) {
			$data[] = [
				"id" 	=> $value->school_id,
				"text" 	=> $value->school
			];
		}
		return json_encode($data);
	}

}

/* End of file Certificate.php */
/* Location: ./application/controllers/Certificate.php */