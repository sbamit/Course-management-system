<?php

class Marks_sheet_data extends CI_Model {
    
    public function create_marks_Sheet_if_necessary($course_ID) {
        $this->db->where('course_ID',$course_ID);
        $this->db->select('course_type');
        $query = $this->db->get('course');
        
        
         if($query->num_rows() == 1) {
          //pass all infos about this student
            $row = $query->row();
            if($row->course_type == 'T') {
                echo $course_ID . " is a theory course";
            }
            else if($row->course_type == 'S') {
                echo $course_ID ." is a sessional course";
            }
            else {
                echo 'invalid course!!!';
            }
         }
         else {
            echo "Database failure !!!";
         }
    }
    
    
    function create_marks_sheet_or_return_to_control($course_ID) {
        
    }
}

?>