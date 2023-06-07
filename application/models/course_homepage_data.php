<?php

class Course_homepage_data extends CI_Model{
    
    public function get_all_info_of_this_course($course_identity) {
        $this->db->where('course_ID',$course_identity);
        $query = $this->db->get('course');
        
        return $query;
    }
}

?>