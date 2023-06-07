<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Class Course_table extends CI_Model {
    public function insert_course_into_db() {
        //echo "get all data by post method";
        //insert all data into the database through POST method
        
        $data = array(
            'course_id' => $this->input->post('course_id'),
            'course_name' => $this->input->post('course_name'),
            'course_credit' => $this->input->post('course_credit'),
            'course_type' => $this->input->post('course_type'),
            'course_no' => $this->input->post('course_no'),
            'dept' => $this->input->post('dept'),
            'for_std_of_dept' => $this->input->post('for_std_of_dept'),
            'level' => $this->input->post('level'),
            "term" => $this->input->post('term')
        );
        
        $this->db->insert('course', $data);
    }
    
    public function check_unique_course_id() {
          $this->db->where('course_id', $this->input->post('course_id') ) ;
             $query = $this->db->get('course');
              if($query->num_rows() == 1) //this means the student ID already exists inside the database
                  return FALSE;
              else // student id is new, so go ahead 
                  return TRUE;
    }
    
        public function testing_check_unique_course_id($course_id) {
          $this->db->where('course_id', $course_id ) ;
             $query = $this->db->get('course');
              if($query->num_rows() == 1) //this means the student ID already exists inside the database
                  return FALSE;
              else // student id is new, so go ahead 
                  return TRUE;
    }
    
    
    
    public function  check_unique_course_no() {
          $this->db->where('course_no', $this->input->post('course_no') ) ;
             $query = $this->db->get('course');
              if($query->num_rows() == 1) //this means the student ID already exists inside the database
                  return FALSE;
              else // student id is new, so go ahead 
                  return TRUE;
    }
    
    
    public function search_for_course_by_id($course_id) {
        //echo $course_id;
        $this->db->where('course_id',$course_id);
            $query = $this->db->get('course');
             return $query;
    }
    
    public function search_for_course_by_dept($dept) {
        //echo $dept;
        $this->db->where('dept',$dept);
        $query = $this->db->get('course');
        return $query;
    }
    
    public function update_courses_info($course_id) {
        //echo "course info for ".$course_id. " is updated"; 
         $data = array(
             'course_name' => $this->input->post('course_name'),
             'course_credit' => $this->input->post('course_credit'),
             'course_type' => $this->input->post('course_type'),
             'dept' => $this->input->post('dept'),
             'for_std_of_dept' => $this->input->post('for_std_of_dept'),
             'level' => $this->input->post('level'),
             'term' => $this->input->post('term')
             );
         
            $this->db->where('course_id', $course_id);
            $this->db->update('course', $data); 
    }
    
    public function delete_course_info($course_id) {
          $this->db->where('course_id',$course_id);
          $query = $this->db->get('course');
            
            if($query->num_rows() ==1 ){
                //student found in the database, now delete
             $this->db->where('course_id', $course_id);
             $this->db->delete('course'); 
             return true;
            } 
            //delete operation failed for some reason, return false
            return false;
    }
    
    
    public function get_all_courses_for_this_new_level_term($student_id) {
        //sends all courses for this students level term
        //first get the students level term
        $this->db->where('std_ID',$student_id);
        $this->db->select('level,term');
        $query1 = $this->db->get('student');
        
        if($query1->num_rows() ==1) {
             $row = $query1->row();
            
             $level = $row->level;
             $term = $row->term;
        }
        
        //now get the courses created for this level-term
        $this->db->where('level',$level);
        $this->db->where('term',$term);
        $query2 = $this->db->get('course');
        return $query2;
    }
    
    public function get_all_courses_for_this_department($dept) {
        //echo "this function will return all course for this dept ".$dept;
        $this->db->where('dept',$dept);
        $query = $this->db->get('course');
        return $query;
    }
    
    public function get_dept_of_this_course($course_ID) {
        $this->db->where('course_ID',$course_ID);
        $this->db->select('dept');
        $query = $this->db->get('course');
        return $query;
    }
    
}
?>
