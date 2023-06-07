<?php

class Homepages extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        //parent::Controller();
        $this->is_logged_in();
    }
    
    function is_teacher_logged_in() {
        //this function will check whether a teacher is logged in
        $this->is_logged_in();
        if($this->session->userdata('persontype') == 'T')
            return true;// this is a teacher, confirmed
    }
    
    function is_student_logged_in() {
        //this function will check whether a teacher is logged in
        $this->is_logged_in();
        if($this->session->userdata('persontype') == 'S')
            return true;//this is a student, confirmed
    }
    
    function is_admin_logged_in() {
        //this functino will check wheter a admin is logged in
        $this->is_logged_in();
        if($this->session->userdata('persontype')  == 'A')
            return true;//this is the admin, confirmed
    }
    
    
    
    public function students_homepage(){
        $is_student = $this->is_student_logged_in();
        if($is_student == true)
            $this->load->view('students_homepage');
            
    }
    
    public function teachers_homepage() {
        $is_teacher = $this->is_teacher_logged_in();
       if($is_teacher == true)
            $this->load->view('teachers_homepage');
    }
    
    public function super_admins_homepage() {
        //load the view for super admin
        $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('admins_homepage');
    }
    
    function is_logged_in() {
        $is_logged_in  = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo "you don't have permission";
            redirect('welcome');
        }
    }
}

?>