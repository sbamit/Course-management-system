<?php

class Marks_sheet_control extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        //parent::Controller();
        $this->is_logged_in();
    }
    
    
    function is_logged_in() {
        $is_logged_in  = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo "you don't have permission";
            redirect('welcome');
        }
    }
    
    public function show_marks_list($course_ID) {
        
        //echo "this is markssheet for course no ".$course_ID;
        
        //first check if marks_sheet needs to be created//
        $this->load->model('marks_sheet_data');
        $this->marks_sheet_data->create_marks_Sheet_if_necessary($course_ID);
    }
}

?>