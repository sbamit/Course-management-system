<?php

class Students_course_table extends CI_Model{
    public function delete_all_entries() {
     //echo "checking students_course_table->delete_all_entries() function";
     $this->db->empty_table('student_course'); 
    }
    
    
    public function add_an_entry($student_ID,$course_ID) {
                $data = array(
                   'student_ID' => $student_ID ,
                   'course_ID' => $course_ID,
         );

            $this->db->insert('student_course', $data); 
    }


    public function see_if_this_student_is_yet_to_register_courses($student_ID) {
        //this function will return true if the student hasn't register 
        //and will return false if he/she has registerd courses already
        $this->db->where('student_ID',$student_ID);
        $query = $this->db->get('student_course');
        
        if($query->num_rows() > 0) {
            
            return false;
        } else {
            //you need to register
            return true;
        }
    }
}

?>
