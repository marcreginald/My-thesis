<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();
        $this->load->library('excel'); 
		$this->load->model('model_student');
		$this->load->model('model_school');
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Student",
			"content"		=> 	[$this->load->view('interface/student/Student', [
									"schools"		=> $this->get_school_select()
								], TRUE)]
		];
		$this->create_page($page_data);	
	}

	function get_students(){
		$data = ['data' => []]; 
		$where = "students.soft_deleted = 0";
		if ($this->session->login_school_id != 1) {
			$where .= " AND students.school_id=".$this->session->login_school_id;
		} else {
			if ($this->input->post("f_school_id") != null) {
				$where .= " AND students.school_id=".$this->input->post("f_school_id");
			}
		}
		if ($this->input->post("f_gender") != null) {
			$where .= " AND gender='".$this->input->post("f_gender")."'";
		}
		if ($this->input->post("f_graduate_status") != null) {
			$where .= " AND is_graduate=".$this->input->post("f_graduate_status");
		}
		if ($this->input->post("f_assessed_status") != null) {
			$where .= " AND is_assessed=".$this->input->post("f_assessed_status");
		}
		foreach ($this->db->query("SELECT
										*
									FROM
										students
									LEFT JOIN schools ON students.school_id = schools.school_id
									WHERE
										$where")->result() as $key => $value) {

			$id = $value->student_id;

			$url_delete = "\"student/delete_student\"";
			$url_edit = "\"student/get_student_info\"";
			$form_id = "\"form_student\"";
			$tbl_id = "[tbl_student]";
			$modal = "modal_student";

			$status = ['<label class="label label-danger block">Not Enrolled</label>', '<label class="label label-success block">Enrolled</label>', '<label class="label label-danger block">Dropped Out</label>'];

			$graduate_status = "<div class='text-center'><input type='checkbox' onclick='change_status($id, $value->is_graduate, 1)' name='is_graduate' class='is_graduate' ".($value->is_graduate == 1 ? "checked":"")."></div>";
			$assessed_status = "<div class='text-center'><input type='checkbox' onclick='change_status($id, $value->is_assessed, 2)' name='is_assessed' class='is_graduate' ".($value->is_assessed == 1 ? "checked":"")."></div>";

			$data["data"][] = [
				$this->student_full_name($id),
				$value->gender,
				date("M d, Y", strtotime($value->birthdate)),
				$value->mobile_no,
				$value->email_address,
				$value->address,
				$value->school,
				$status[$value->status],
				$graduate_status,
				$assessed_status,
				"<div class='text-center'>
					<button class='btn btn-primary btn-sm' name='btn_edit' data-toggle='modal' href='#$modal' onclick='get_info($url_edit, $id, $form_id)' title='Edit'><span class='fa fa-edit'></span></button>
					<button class='btn btn-danger btn-sm' name='btn_delete' onclick='delete_this($url_delete, $id, $tbl_id)' title='Delete'><span class='fa fa-trash'></span></button>
				</div>"
			];
		}
		echo json_encode($data);
	}

	function get_student_info() {
		$id = $this->input->post("value");
		$data = [];
		foreach ($this->model_student->query("SELECT * FROM students WHERE student_id='$id'")->result() as $key => $value) {
			$data = [
				"student_id" 	=> $value->student_id,
				"firstname"		=> $value->firstname,
				"middlename"	=> $value->middlename,
				"lastname"		=> $value->lastname,
				"name_ext"		=> $value->name_ext,
				"gender"		=> $value->gender,
				"address"		=> $value->address,
				"birthdate"		=> $value->birthdate,
				"mobile_no"		=> $value->mobile_no,
				"email_address"	=> $value->email_address,
				"school_id"		=> $value->school_id,
				"status"		=> $value->status
			];
		}
		echo json_encode($data);
	}

	function change_status()
	{
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$student_id = $this->input->post("student_id");
		$status = $this->input->post("status");
		$status_no = $this->input->post("status_no");

		$data = [
			"modified_by" 	=> $this->session->login_id,
			"date_modified" => $this->now()
		];

		if ($status_no == 1) {
			if ($status != 1) {
				$data += [
					"is_graduate" => 1
				];
			} else {
				$data += [
					"is_graduate" => 0
				];
			}
		} else if ($status_no == 2) {
			if ($status != 1) {
				$data += [
					"is_assessed" => 1
				];
			} else {
				$data += [
					"is_assessed" => 0
				];
			}
		}

		if ($this->model_student->update($data, ["student_id" => $student_id])) {
			if ($status_no == 1) {
				$ret = [
					"success" 	=> true,
					"msg"		=> "Change Graduate Status"
				];
			} else if ($status_no == 2) {
				$ret = [
					"success" 	=> true,
					"msg"		=> "Change Assessed Status"
				];
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

	function delete_student() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$this->user_log("<strong>Deleted Student</strong> \"".$this->get_student_del($this->input->post("value"))."\"");
		if ($this->model_student->update(["soft_deleted" => 1, "modified_by" => $this->session->login_id, "date_modified" => $this->now()], ["student_id" => $this->input->post("value")])) {
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

	function get_student_del($student_id){
		$data = "";
		foreach ($this->model_student->query("SELECT 
											 firstname,
											 middlename,
											 lastname,
											 name_ext
											FROM
												students
											WHERE
												student_id = '$student_id'")->result() as $key => $value) {
			$data = $value->firstname.$value->middlename.$value->lastname.$value->name_ext;
			break;
		}
		return $data;
	}

	function insert_student() {
		$this->db->trans_begin();
		$ret = [
			"success" 	=> false,
			"msg"		=> "Something went wrong"
		];

		$student_id = $this->input->post("student_id");
		$firstname 	= $this->input->post("firstname");
		$middlename = $this->input->post("middlename");
		$lastname 	= $this->input->post("lastname");
		$name_ext 	= $this->input->post("name_ext");
		$school_id 	= "";

		if ($this->session->login_school_id == 1) {
			$school_id 	= $this->input->post("school_id");
		} else {
			$school_id 	= $this->session->login_school_id;
		}

		$data = [
			"firstname" 		=> $firstname,
			"middlename" 		=> $middlename,
			"lastname" 			=> $lastname,
			"name_ext" 			=> $name_ext,
			"gender" 			=> $this->input->post("gender"),
			"address" 			=> $this->input->post("address"),
			"birthdate" 		=> $this->input->post("birthdate"),
			"mobile_no" 		=> $this->input->post("mobile_no"),
			"email_address" 	=> $this->input->post("email_address"),
			"school_id" 		=> $school_id,
			"status" 			=> $this->input->post("status")
		];

		if($student_id == null) {
			if ($this->check_student($firstname, $middlename, $lastname, $name_ext, $school_id) == 0) {
				$data += [
					"created_by" 	=> $this->session->login_id,
					"date_created" 	=> $this->now()
				];
				$this->model_student->insert($data);
				$student_id = $this->db->insert_id();

				$this->user_log("<strong>Inserted Student</strong> '".$this->student_full_name($student_id)."'");

				$ret = [
					"success" 	=> true,
					"msg"		=> "Success"
				];
			} else {
				$ret = [
					"success" 	=> false,
					"msg"		=> "Student ".$this->student_full_name($student_id)." already exist"
				];
			}
		} else {
			if ($this->get_student($student_id) == $firstname.$middlename.$lastname.$name_ext.$school_id) {
				$data += [
					"modified_by" 	=> $this->session->login_id,
					"date_modified" => $this->now()
				];
				$this->model_student->update($data, ["student_id" => $student_id]);

				$this->user_log("<strong>Updated Student</strong> '".$this->student_full_name($student_id)."'");	
				$ret = [
					"success" 	=> true,
					"msg"		=> "Updated"
				];			
			} else {
				if ($this->check_student($firstname, $middlename, $lastname, $name_ext, $school_id) == 0) {
					$data += [
						"modified_by" 	=> $this->session->login_id,
						"date_modified" => $this->now()
					];
					$this->model_student->update($data, ["student_id" => $student_id]);	

					$this->user_log("<strong>Updated Student</strong> '".$this->student_full_name($student_id)."'");	
					$ret = [
						"success" 	=> true,
						"msg"		=> "Updated"
					];
				} else {
					 $ret = [
						"success" 	=> false,
						"msg"		=> "Student ".$this->student_full_name($student_id)." already exist"
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

	function check_student($firstname, $middlename, $lastname, $name_ext, $school_id){
		$count = 0;
		foreach ($this->model_student->query("SELECT
												COUNT(*) AS count
											FROM
												students
											WHERE
												firstname = '$firstname'
											AND middlename = '$middlename'
											AND lastname = '$lastname'
											AND name_ext = '$name_ext'
											AND school_id = $school_id")->result() as $key => $value) {
			$count = $value->count;
		}
		return $count;
	}
	function get_student($student_id){
		$data = "";
		foreach ($this->model_student->query("SELECT 
											 firstname,
											 middlename,
											 lastname,
											 name_ext,
											 school_id
											FROM
												students
											WHERE
												student_id = '$student_id'")->result() as $key => $value) {
			$data = $value->firstname.$value->middlename.$value->lastname.$value->name_ext.$value->school_id;
			break;
		}
		return $data;
	}


	function upload_student_multiple()
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
	                        $i = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(8,1)->getValue()));
	                        $j = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(9,1)->getValue()));
	                        $k = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(10,1)->getValue()));
	                        $l = strtoupper(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(11,1)->getValue()));

	                        $highestRow = $worksheet->getHighestRow();
	                        $highestColumn = $worksheet->getHighestColumn();

	                        if (
	                            $a == "FIRSTNAME"
	                            && $b == "MIDDLENAME"
	                            && $c == "LASTNAME"
	                            && $d == "NAME_EXT"
	                            && $e == "GENDER"
	                            && $f == "ADDRESS"
	                            && $g == "BIRTHDATE"
	                            && $h == "MOBILE_NO"
	                            && $i == "EMAIL_ADDRESS"
	                            && $j == "STATUS"
	                            && $k == "GRADUATE"
	                            && $l == "ASSESSED"
	                        ) {
	                            $data_excel = [];
	                            for($row=2; $row<=$highestRow; $row++)
	                            {
	                                $firstname   		= $worksheet->getCellByColumnAndRow(0,$row)->getValue();       
	                                $middlename         = $worksheet->getCellByColumnAndRow(1,$row)->getValue(); 
	                                $lastname           = $worksheet->getCellByColumnAndRow(2,$row)->getValue(); 
	                                $name_ext           = $worksheet->getCellByColumnAndRow(3,$row)->getValue(); 
	                                $gender             = $worksheet->getCellByColumnAndRow(4,$row)->getValue(); 
	                                $address            = $worksheet->getCellByColumnAndRow(5,$row)->getValue(); 
	                                $birthdate          = $worksheet->getCellByColumnAndRow(6,$row)->getValue(); 
	                                $mobile_no         = $worksheet->getCellByColumnAndRow(7,$row)->getValue(); 
	                                $email_address      = $worksheet->getCellByColumnAndRow(8,$row)->getValue(); 
	                                $status             = strtolower(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(9,$row)->getValue())); 
	                                $graduate_status    = strtolower(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(10,$row)->getValue()));
	                                $assessed_status    = strtolower(preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(11,$row)->getValue()));

	                                if (preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(0,$row)->getValue()) != "" && preg_replace('/\s+/', '', $worksheet->getCellByColumnAndRow(2,$row)->getValue()) != "") {
	                                    $data_excel[] = [
	                                        "firstname"  		=> $firstname,
	                                        "middlename"        => $middlename,
	                                        "lastname"          => $lastname,
	                                        "name_ext"          => $name_ext,
	                                        "gender"            => $gender,
	                                        "address"           => $address,
	                                        "birthdate"         => $birthdate,
	                                        "mobile_no"        	=> $mobile_no,
	                                        "email_address"     => $email_address,
	                                        "status"            => $status == "enrolled" ? 1 : $status == "dropped" ? 2 : 0,
	                                        "graduate_status"   => $graduate_status == "passed" ? 1 : 0,
	                                        "assessed_status"   => $assessed_status == "yes" ? 1 : 0,
	                                        "checked"       	=> $this->check_student_multiple(strtoupper(preg_replace('/\s+/', '', $firstname)), strtoupper(preg_replace('/\s+/', '', $middlename)), strtoupper(preg_replace('/\s+/', '', $lastname)), strtoupper(preg_replace('/\s+/', '', $name_ext)), $school_id)
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

	function check_student_multiple($firstname, $middlename, $lastname, $name_ext, $school_id)
	{
		$count = 0;
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
									`students`
								WHERE
									UPPER(REPLACE(firstname, ' ', '')) = '$firstname'
								AND UPPER(REPLACE(middlename, ' ', '')) = '$middlename'
								AND UPPER(REPLACE(lastname, ' ', '')) = '$lastname'
								AND UPPER(REPLACE(name_ext, ' ', '')) = '$name_ext'
								AND school_id=".$school_id)->result() as $key => $value) {

			$count = $value->count;

		}
		return $count;
	}

	function insert_student_multiple()
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

        $count_insert = 0;
        $count_update = 0;
        if ($this->input->post("firstname") != null && $this->input->post("lastname") != null) {
            foreach ($this->input->post("lastname") as $key => $value) {
                $data = [
                    "firstname" => $this->input->post("firstname")[$key],
                    "middlename" => $this->input->post("middlename")[$key],
                    "lastname" => $value,
                    "name_ext" => $this->input->post("name_ext")[$key],
                    "gender" => $this->input->post("gender")[$key],
                    "address" => $this->input->post("address")[$key],
                    "birthdate" => $this->input->post("birthdate")[$key],
                    "mobile_no" => $this->input->post("mobile_no")[$key],
                    "email_address" => $this->input->post("email_address")[$key],
                    "status" => $this->input->post("status")[$key],
                    "is_graduate" => $this->input->post("graduate_status")[$key],
                    "is_assessed" => $this->input->post("assessed_status")[$key],
                    "school_id" => $login_school_id
                ];
                if ($value != "") {

                    if ($this->get_student_multiple(strtoupper(preg_replace('/\s+/', '', $this->input->post("firstname")[$key])), strtoupper(preg_replace('/\s+/', '', $this->input->post("middlename")[$key])), strtoupper(preg_replace('/\s+/', '', $value)), strtoupper(preg_replace('/\s+/', '', $this->input->post("name_ext")[$key])), $login_school_id) != "") {

                    	$student_id = $this->get_student_multiple(strtoupper(preg_replace('/\s+/', '', $this->input->post("firstname")[$key])), strtoupper(preg_replace('/\s+/', '', $this->input->post("middlename")[$key])), strtoupper(preg_replace('/\s+/', '', $value)), strtoupper(preg_replace('/\s+/', '', $this->input->post("name_ext")[$key])), $login_school_id);

                        $count_update += 1;
                        $data += [
                            "modified_by"   => $this->session->login_id,
                            "date_modified" => $this->now()
                        ];
                        $this->model_student->update($data, ["student_id" => $student_id]);

                        $this->user_log("<strong>Inserted Student</strong> '".$this->student_full_name($student_id)."'");

                    } else {
                        $count_insert += 1;
                        $data += [
                            "created_by"    => $this->session->login_id,
                            "date_created"  => $this->now()
                        ];
                        $this->model_student->insert($data);
                        $student_id = $this->db->insert_id();

                        $this->user_log("<strong>Inserted Student</strong> '".$this->student_full_name($student_id)."'");

                    }
                }
            }
            if ($count_insert != 0 || $count_update != 0) {
                $ret = [
                    "success"   => true,
                    "msg"       => "Success"
                ];
            } else {
                $ret = [
                    "success"   => false,
                    "msg"       => "No data inserted or updated"
                ];
            }            
        } else {
            $ret = [
                "success"   => false,
                "msg"       => "Learne's names in your data is not enrolled"
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
	function get_student_multiple($firstname, $middlename, $lastname, $name_ext, $school_id){
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

	// others
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


    function viewAllStudent(){
        $query = $this->model_school->query("SELECT * FROM viewallstudents");
        $data = array();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        print $data = json_encode($data);
    }

}

/* End of file Student.php */
/* Location: ./application/controllers/Student.php */