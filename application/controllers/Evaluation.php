<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

class Evaluation extends MY_Controller {

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
            "page_title"    => "Evaluation",
            "content"       =>  [$this->load->view('interface/evaluation/Evaluation', [
                                    "schools"   => $this->get_school_select()
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
                "school"    => $value->school,
                "count"     => $value->count,
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
                "id"    => $value->school_id,
                "text"  => $value->school
            ];
        }
        return json_encode($data);
    }

    function evaluationReport(){

        $nc = $_GET['nc'];
        $query = $this->db->query("SELECT T1.*,COALESCE(T2.school,T3.school)school,COALESCE(T2.yearD,'NO DATA') yearD,COALESCE(T2.cc,0)cc FROM qualification_program_titles T1
                                    LEFT JOIN(
                                    SELECT T3.school, GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD, T3.school_id,COUNT(T1.student_id)cc,t1.qualification_program_title_id FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE t2.`status`=1 AND T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id
                                    ORDER BY T3.school_id,DATE_FORMAT(T1.date_from,'%Y')) T2
                                    ON T1.qualification_program_title_id=T2.qualification_program_title_id
                                    AND T1.school_id=T2.school_id
                                    LEFT JOIN schools T3 ON T1.school_id=T3.school_id
                                    WHERE T1.qualification_program_title='$nc'
                                    ORDER BY T1.qualification_program_title");
        

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
                'yd'=>$row->yearD,
            );
        }
        if($query->num_rows()==0){
            print 0;
        }else{
            print $data = json_encode($data);
        }
    }

    function evaluationReportDD(){
        $nc = $_GET['nc'];
        $query2 = $this->db->query("SELECT T1.*,COALESCE(T2.school,T3.school)school,COALESCE(T2.yearD,'NO DATA') yearD,COALESCE(T2.cc,0)cc FROM qualification_program_titles T1
                                    LEFT JOIN(
                                    SELECT T3.school, GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD, T3.school_id,COUNT(T1.student_id)cc,t1.qualification_program_title_id FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE t2.`status`=1 AND T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id) T2
                                    ON T1.qualification_program_title_id=T2.qualification_program_title_id
                                    AND T1.school_id=T2.school_id
                                    LEFT JOIN schools T3 ON T1.school_id=T3.school_id
                                    WHERE T1.qualification_program_title='$nc'
                                    ORDER BY T1.qualification_program_title");
        $data2 = array();

        foreach ($query2->result() as $row) {
            $query1 = $this->db->query("SELECT T1.*,COALESCE(T2.school,T3.school)school,COALESCE(T2.yearD,'NO DATA') yearD,COALESCE(T2.cc,0)cc FROM qualification_program_titles T1
                                    LEFT JOIN(
                                    SELECT T3.school, GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD, T3.school_id,COUNT(T1.student_id)cc,t1.qualification_program_title_id FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE t2.`status`=1 AND T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id,DATE_FORMAT(T1.date_from,'%Y')) T2
                                    ON T1.qualification_program_title_id=T2.qualification_program_title_id
                                    AND T1.school_id=T2.school_id
                                    LEFT JOIN schools T3 ON T1.school_id=T3.school_id
                                    WHERE T1.qualification_program_title='$nc'
                                    AND T1.school_id='$row->school_id'
                                    ORDER BY T1.qualification_program_title");
            $data1 = array();
            $total = 0;
            foreach ($query1->result() as $row) {
                $total = $total + intval($row->cc);
            }
            foreach ($query1->result() as $row1) {
                if(intval($row1->cc)>0){
                    $x = ($row1->cc/$total)*100;
                }else{
                    $x = 0;
                }
                $y = intval($row1->cc);
                $data1[] = array(
                    'name'=>$row1->yearD,
                    'y'=>$x,
                    'b'=>$x,
                    'g'=>$y,
                    'yd'=>$row1->yearD,
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

    function recommendReport(){

        $schl = $_GET['schl'];
        $query = $this->db->query("SELECT T2.E2/T2.tcc2*100 tcavg2, T1.qualification_program_title,T2.statef,
                                    CASE WHEN T2.statef LIKE '%RED%' THEN '#ff70a6' ELSE '#55de96' END ccavg,
                                    COALESCE(T2.school,T3.school) school,
                                    COALESCE(T2.yearDa,'NO DATA') yRA,
                                    COALESCE(T2.E,0) E,
                                    COALESCE(T2.DRP,0) DRP,
                                    COALESCE(T2.NE,0) NE,
                                    COALESCE(T2.tcc,0) tcc,
                                    COALESCE(T2.avgg,0) tcavg,
                                    T2.yearD,
                                    T2.qualification_program_title_id,T2.*
                                    FROM qualification_program_titles T1
                                    LEFT JOIN(

                                    SELECT GROUP_CONCAT(DISTINCT T1.state ORDER BY T1.state)statef,GROUP_CONCAT(DISTINCT T1.yearD ORDER BY T1.yearD)yearDa
                                    ,SUM(T1.E) E2,SUM(T1.DRP) DRP2
                                    ,SUM(T1.NE) NE2,SUM(T1.tcc) tcc2, T1.* FROM(


                                    SELECT CONCAT(T1.yearD, CASE WHEN T1.avgg<50 AND T1.avgg>0 THEN ' RED' ELSE '' END) state, T1.* from(

                                    SELECT T3.school,
                                    GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD,
                                                                        T3.school_id,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END) `E`,
                                    COUNT(CASE WHEN T2.status=0 THEN 1 END) `DRP`,
                                    COUNT(CASE WHEN T2.status>1 THEN 1 END) `NE`,
                                    COUNT(T2.student_Id) `tcc`,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END)/COUNT(T2.student_Id)*100 avgg,
                                    t1.qualification_program_title_id,T4.qualification_program_title nc FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id,DATE_FORMAT(T1.date_from,'%Y')
                                    ORDER BY T3.school_id,DATE_FORMAT(T1.date_from,'%Y')) T1




)T1

GROUP BY T1.school_id,T1.qualification_program_title_id


)T2
                                    ON T1.school_id=T2.school_id
                                    AND T1.qualification_program_title_id=T2.qualification_program_title_id
                                    LEFT JOIN schools T3 ON T3.school_id=T1.school_id
                                    WHERE T1.school_id=$schl
                                    ORDER BY T1.qualification_program_title

");
        

        $data = array();
        $total = 0;
        foreach ($query->result() as $row) {
            $total = $total + intval($row->E2);
        }
        $len = count($query->result());
        foreach ($query->result() as $row) {
            $name = $row->qualification_program_title;
            $y = intval($row->E2);
            $data["column"][] = array(
                'name'=>$name,
                'y'=>($y/$total)*100,
                'color'=>$row->ccavg,
                'drilldown'=>$name,
                'b'=>($y/$total)*100,
                'g'=>$y,
                'E'=>$row->E2,
                'TE'=>$row->tcc2,
                'PE'=>$row->tcavg2,
                'yRA'=>$row->yRA,
            );
        }
        if($query->num_rows()==0){
            print 0;
        }else{
            print $data = json_encode($data);
        }
    }

    function recommendReportDD(){
        $schl = $_GET['schl'];
        $query2 = $this->db->query("SELECT T2.E2/T2.tcc2*100 tcavg2, T1.qualification_program_title,T2.statef,
                                    CASE WHEN T2.statef LIKE '%RED%' THEN '#ff70a6' ELSE '#55de96' END ccavg,
                                    COALESCE(T2.school,T3.school) school,
                                    COALESCE(T2.yearDa,'NO DATA') yRA,
                                    COALESCE(T2.E,0) E,
                                    COALESCE(T2.DRP,0) DRP,
                                    COALESCE(T2.NE,0) NE,
                                    COALESCE(T2.tcc,0) tcc,
                                    COALESCE(T2.avgg,0) tcavg,
                                    T2.yearD,
                                    T2.qualification_program_title_id,T2.*
                                    FROM qualification_program_titles T1
                                    LEFT JOIN(

SELECT GROUP_CONCAT(DISTINCT T1.state ORDER BY T1.state)statef,GROUP_CONCAT(DISTINCT T1.yearD ORDER BY T1.yearD)yearDa
,SUM(T1.E) E2,SUM(T1.DRP) DRP2
,SUM(T1.NE) NE2,SUM(T1.tcc) tcc2, T1.* FROM(


SELECT CONCAT(T1.yearD, CASE WHEN T1.avgg<50 AND T1.avgg>0 THEN ' RED' ELSE '' END) state, T1.* from(

SELECT T3.school,
                                    GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD,
                                                                        T3.school_id,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END) `E`,
                                    COUNT(CASE WHEN T2.status=0 THEN 1 END) `DRP`,
                                    COUNT(CASE WHEN T2.status>1 THEN 1 END) `NE`,
                                    COUNT(T2.student_Id) `tcc`,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END)/COUNT(T2.student_Id)*100 avgg,
                                    t1.qualification_program_title_id,T4.qualification_program_title nc FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id,DATE_FORMAT(T1.date_from,'%Y')
                                    ORDER BY T3.school_id,DATE_FORMAT(T1.date_from,'%Y')) T1




)T1

GROUP BY T1.school_id,T1.qualification_program_title_id


)T2
                                    ON T1.school_id=T2.school_id
                                    AND T1.qualification_program_title_id=T2.qualification_program_title_id
                                    LEFT JOIN schools T3 ON T3.school_id=T1.school_id
                                    WHERE T1.school_id=$schl
                                    ORDER BY T1.qualification_program_title");
        $data2 = array();

        foreach ($query2->result() as $row) {
            $query1 = $this->db->query("

SELECT T2.E2/T2.tcc2*100 tcavg2, T1.qualification_program_title,T2.statef,
                                    CASE WHEN T2.statef LIKE '%RED%' THEN '#ff70a6' ELSE '#55de96' END ccavg,
                                    COALESCE(T2.school,T3.school) school,
                                    COALESCE(T2.yearDa,'NO DATA') yRA,
                                    COALESCE(T2.E,0) E,
                                    COALESCE(T2.DRP,0) DRP,
                                    COALESCE(T2.NE,0) NE,
                                    COALESCE(T2.tcc,0) tcc,
                                    COALESCE(T2.avgg,0) tcavg,
                                    T2.yearD,T2.yearDD,
                                    T2.qualification_program_title_id,T2.*
                                    FROM qualification_program_titles T1
                                    LEFT JOIN(

SELECT GROUP_CONCAT(DISTINCT T1.state ORDER BY T1.state)statef,GROUP_CONCAT(DISTINCT T1.yearD ORDER BY T1.yearD)yearDa
,SUM(T1.E) E2,SUM(T1.DRP) DRP2
,SUM(T1.NE) NE2,SUM(T1.tcc) tcc2, T1.* FROM(


SELECT CONCAT(T1.yearD, CASE WHEN T1.avgg<50 AND T1.avgg>0 THEN ' RED' ELSE '' END) state, T1.* from(

SELECT T3.school,
                                    GROUP_CONCAT(DISTINCT DATE_FORMAT(T1.date_from,'%Y') ORDER BY T1.date_from)yearD,
                                                                        T3.school_id,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END) `E`,
                                    COUNT(CASE WHEN T2.status=0 THEN 1 END) `DRP`,
                                    COUNT(CASE WHEN T2.status>1 THEN 1 END) `NE`,
                                    COUNT(T2.student_Id) `tcc`,
                                    DATE_FORMAT(T1.date_from,'%Y') yearDD,
                                    COUNT(CASE WHEN T2.status=1 THEN 1 END)/COUNT(T2.student_Id)*100 avgg,
                                    t1.qualification_program_title_id,T4.qualification_program_title nc FROM certificates T1
                                    LEFT JOIN students T2 ON T1.student_id=T2.student_id
                                    LEFT JOIN schools T3 ON T3.school_id=T2.school_id
                                    LEFT JOIN qualification_program_titles T4 ON T1.qualification_program_title_id=T4.qualification_program_title_id
                                    WHERE T2.soft_deleted=0 and T1.date_from is not null
                                    GROUP BY T3.school_id,T1.qualification_program_title_id,DATE_FORMAT(T1.date_from,'%Y')
                                    ORDER BY T3.school_id,DATE_FORMAT(T1.date_from,'%Y')) T1




)T1

GROUP BY T1.school_id,T1.qualification_program_title_id,T1.yearDD


)T2
                                    ON T1.school_id=T2.school_id
                                    AND T1.qualification_program_title_id=T2.qualification_program_title_id
                                    LEFT JOIN schools T3 ON T3.school_id=T1.school_id
                                    WHERE T1.school_id=$schl AND T1.qualification_program_title_id='$row->qualification_program_title_id'
                                    ORDER BY T1.qualification_program_title








");
            $data1 = array();
            $total = 0;
            foreach ($query1->result() as $row) {
                $total = $total + intval($row->E);
            }
            foreach ($query1->result() as $row1) {
                if(intval($row1->E)>0){
                    $x = ($row1->E/$total)*100;
                }else{
                    $x = 0;
                }
                $y = intval($row1->E);
                $data1[] = array(
                    'name'=>$row1->yearDD,
                    'y'=>($y/$total)*100,
                    'color'=>$row1->ccavg,
                    'b'=>($y/$total)*100,
                    'g'=>$y,
                    'E'=>$row1->E,
                    'TE'=>$row1->tcc,
                    'PE'=>$row1->tcavg,
                    'yRA'=>$row1->yRA,
                );
            }

            $data2[] = array(
                'name'=>$row->qualification_program_title,
                'id'=>$row->qualification_program_title,
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