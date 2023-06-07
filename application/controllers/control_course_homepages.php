<?php

class Control_course_homepages extends CI_Controller {
    //in this class, first check wheter the user is logged in, then redirect him to course homepage
        function __construct() {
        parent::__construct();
        //parent::Controller();
        $this->is_logged_in();
    }
    
    function is_teacher_logged_in() {
        //this function will check whether a teacher is logged in
    }
    
    function is_student_logged_in() {
        //this function will check whether a teacher is logged in
    }
    
    function is_logged_in() {
        $is_logged_in  = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo "you don't have permission";
            redirect('welcome');
        }
    }
    
    public function see_course_home_page($course_identity) {
            //it works//echo "This is the home for course no: $course_identity"."<br/>";
            $this->load->model('course_homepage_data');
            $query = $this->course_homepage_data->get_all_info_of_this_course($course_identity);
            
            $this->show_course_homepage($query);
    }
    
    
    
    public function show_course_homepage($query) {
        if($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
		$data = array('course_ID' => $row->course_ID,
                                                             'course_name' => $row->course_name,
			'course_credit' => $row->course_credit, //user type is set to student
                                                            'course_type' => $row->course_type,
                                                            'course_no'   => $row->course_no,
                                                            'level' => $row->level,
                                                            'term' => $row->term,
                                                            'dept' => $row->dept
                                                            );
                
                
                if($this->session->userdata('persontype')  == 'T') {
                   //if the user is teacher
                   $this->load->view('teachers_course_homepage',$data);
                }
                else if($this->session->userdata('persontype')  == 'S') {
                    //if the user is student
                    $this->load->view('students_course_homepage',$data);
                }
                else //neither teacher nor student//double security
                    echo"Log in first!";
                
                //$this->load->view('teachers_course_homepage',$data);
                //print_r($data);
                //return $data;
            }
        }
    }
}

?>