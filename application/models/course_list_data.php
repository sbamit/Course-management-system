<?php

class Course_list_data extends CI_Model {
    
    
    function get_course_list_for_teacher() {
        $this->db->where('teacher_ID',$this->session->userdata('teacher_ID'));
        $this->db->select('course_ID');
        $query = $this->db->get('teacher_course');
        
        return $query;
    }
    
    function get_course_list_for_student() {
        $this->db->where('student_ID',$this->session->userdata('std_ID'));
        $this->db->select('course_ID');
        $query = $this->db->get('student_course');
        
        return $query;
    }
}


?>