<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->redirect();	
		$this->load->model("model_qualification_program_title");
		$this->load->model("model_school");
	}

	public function index()
	{
		$page_data = $this->system();
		$page_data += [
			"page_title" 	=> "Dashboard",
			"content"		=> 	[$this->load->view('interface/dashboard/Dashboard', [
									"schools"	=> $this->get_school_select()
								], TRUE)]
		];
		$this->create_page($page_data);			
	}

	function get_school_count()
	{
		$count = 0;
		foreach ($this->db->query("SELECT COUNT(*) AS count FROM schools")->result() as $key => $value) {
			$count = $value->count;
		}
		echo json_encode( $count );
	}

	function get_school_enrolled_student_data()
	{
		$data = [];
		$year = $this->input->post("year");
		$offset = $this->input->post("paginate_number");
		foreach ($this->db->query("SELECT
									school,
									(
										SELECT
											COUNT(*) AS count
										FROM
											students
										WHERE
											students.school_id = schools.school_id
										AND YEAR(students.date_created) = '$year'
									) AS count
								FROM
									`schools`
								ORDER BY
									count DESC 
								LIMIT 10 OFFSET $offset")->result() as $key => $value) {
			

			$data[] = [
				"school"	=> $value->school,
				"count"		=> $value->count,
			];
		}
		echo json_encode( $data );
	}

	function get_predicted_scholar_student_data(){
		$data = 0;

		$date = $this->input->post("date");
		$school_id = $this->input->post("f_school_id_scholar_student_number");	
		
		$where = " YEAR(date_created) = $date ";
		if ($school_id != "") {
			$where .= " AND school_id=$school_id ";
		}
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
								students
								WHERE $where")->result() as $key => $value) {
			
			$data = $value->count;
		}
		echo json_encode($data);
	}

	function get_predicted_student_failed_data(){
		$data = 0;

		$date = $this->input->post("date");
		$school_id = $this->input->post("f_school_id_student_failed");	
		
		$where = "YEAR(date_created) = $date AND is_graduate=0";
		if ($school_id != "") {
			$where .= " AND school_id=$school_id ";
		}
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
									students
								WHERE
									$where")->result() as $key => $value) {
			
			$data = $value->count;
		}
		echo json_encode($data);
	}

	function get_predicted_student_passed_data()
	{
		$data = 0;

		$date = $this->input->post("date");
		$school_id = $this->input->post("f_school_id_student_passed");	
		
		$where = "YEAR(date_created) = $date AND is_graduate = 1";
		if ($school_id != "") {
			$where .= " AND school_id=$school_id ";
		}
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
								students
								WHERE $where")->result() as $key => $value) {
			
			$data = $value->count;
		}
		echo json_encode($data);
	}

	function get_predicted_school_performance_data()
	{
		$data = 0;

		$date = $this->input->post("date");
		$school_id = $this->input->post("f_school_id_school_performance");	
		
		$where = " YEAR(date_from) = $date ";
		if ($school_id != "") {
			$where .= " AND school_id=$school_id ";
		}
		foreach ($this->db->query("SELECT
									COUNT(*) AS count
								FROM
								certificates
								LEFT JOIN students ON certificates.student_id=students.student_id
								WHERE $where")->result() as $key => $value) {
			
			$data = $value->count;
		}
		echo json_encode($data);
	}

	
	// others
	function get_school_select(){
		$data = [];
		foreach ($this->model_school->query("SELECT * FROM schools")->result() as $key => $value) {
			$data[] = [
				"id"	=> $value->school_id,
				"text"	=> $value->school
			];
		}
		return json_encode($data);
	}




    function viewNCperShooltop5(){
        $fLoop="";
        $sLoop="";
        $i = 0;

        $from = $_GET['from'];
        $to = $_GET['to'];
        $query = $this->db->query("SELECT school,COUNT(school) cc FROM viewNCperShool WHERE yearD BETWEEN '$from' AND '$to' GROUP BY school ORDER BY COUNT(school) DESC LIMIT 5");
        

        $data = array();
        $total = 0;
        foreach ($query->result() as $row) {
            $total = $total + intval($row->cc);
        }
        $len = count($query->result());
        foreach ($query->result() as $row) {
            $name = $row->school;
            $y = intval($row->cc);
            $data["column"][] = array(
                'name'=>$name,
                'y'=>($y/$total)*100,
                'drilldown'=>$name,
                'b'=>($y/$total)*100,
                'g'=>$y,
            );

            if ($i == 0) {
                $data["line"][] = array(
                    'name'=>$name,
                    'y'=>($y/$total)*100 + 5,
                'b'=>($y/$total)*100,
                    'g'=>$y,
                );
            } else if ($i == $len - 1) {
                $data["line"][] = array(
                    'name'=>$name,
                    'y'=>($y/$total)*100 + 5,
                'b'=>($y/$total)*100,
                    'g'=>$y,
                );
            }
            // …
            $i++;
        }
        // $data["line"][] = array(
        //     'name'=>'',
        //     'y'=>[$fLoop,$sLoop],
        //     'g'=>$y,
        // );
        echo $fLoop;
        if($query->num_rows()==0){
            print 0;
        }else{
            print $data = json_encode($data);
        }
    }

    function viewNCperShooltop5DD(){
        $from = $_GET['from'];
        $to = $_GET['to'];
        $query2 = $this->db->query("SELECT school,COUNT(school) cc,yearD FROM viewNCperShool WHERE yearD BETWEEN '$from' AND '$to' GROUP BY school ORDER BY COUNT(school) DESC LIMIT 5");
        $data2 = array();

        foreach ($query2->result() as $row) {
            $query1 = $this->db->query("SELECT yearD,COUNT(yearD) cc,school FROM viewNCperShool WHERE school='$row->school' AND yearD BETWEEN '$from' AND '$to' GROUP BY yearD");
            $data1 = array();
            $total = 0;
            foreach ($query1->result() as $row) {
                $total = $total + intval($row->cc);
            }
            foreach ($query1->result() as $row1) {
                $y = intval($row1->cc);
                $data1[] = array(
                    'name'=>$row1->yearD,
                    'y'=>$y,
                    'b'=>($y/$total)*100,
                    'g'=>$y,
                );
            }

            $data2[] = array(
                'name'=>$row->school,
                'id'=>$row->school,
                'type'=>'column',
                'data'=>$data1
            );
            $data1 = '';
        }

        print $data = json_encode($data2);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */