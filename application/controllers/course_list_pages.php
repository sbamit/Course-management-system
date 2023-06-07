<?php

class Course_list_pages extends CI_Controller {
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
    
    
    
    public function students_course_list_page() {
        $this->load->model('course_list_data');
        $data['query'] = $this->course_list_data->get_course_list_for_student();
        $this->load->view('students_course_list_page',$data);
    }
    
    public function teachers_course_list_page() {
        $this->load->model('course_list_data');
        $data['query'] = $this->course_list_data->get_course_list_for_teacher();
        $this->load->view('teachers_course_list_page',$data);
    }
}

?>