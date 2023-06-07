<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Teachers_course_table extends CI_Model {
    
    public function get_course_teachers_for_this_course($course_ID) {
        $this->db->where('course_ID',$course_ID);
        $this->db->select('teacher_ID');
       $query =  $this->db->get('teacher_course');
        
        return $query;
    }
    
    public function delete_this_entry($teacher_ID,$course_ID) {
        $this->db->where('teacher_ID',$teacher_ID);
        $this->db->where('course_ID',$course_ID);
        $this->db->delete('teacher_course');
    }
    
    public function check_if_this_teacher_course_entry_already_exists($course_ID,$teacher_ID) {
        //return true if entry existed
       $this->db->where('teacher_ID',$teacher_ID);
        $this->db->where('course_ID',$course_ID);
        $query = $this->db->get('teacher_course');
        
        if($query->num_rows() >0) {
            //entry exists return true
            return true;
        } else//entry doesn't exist
            return false;
//return false if no entry existed
    }
    
    public function add_this_entry($course_ID,$teacher_ID) {
        $data = array(
            'course_ID' => $course_ID,
            'teacher_ID' => $teacher_ID
        );
        $this->db->insert('teacher_course', $data); 
    }
}


?>
