<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Students_table extends CI_Model {
    
    public function insert_student_into_db() {
        //echo "get all data by post method";
        //insert all data from the form into student's table
        
        $data = array(
            'std_id' => $this->input->post('student_id'),
            'password' => $this->input->post('password'),
            'firstname' =>$this->input->post('first_name'),
            'lastname' => $this->input->post('last_name'),
            'sex' =>$this->input->post('sex'),
            'dept' => $this->input->post('dept'),
            'level' => $this->input->post('level'),
            'term' => $this->input->post('term'),
            'cgpa' => 0.0
        );
        
        //finally insert the data //
        $this->db->insert('student', $data);
    }
    
        function check_unique_student_id() {
            $this->db->where('std_id', $this->input->post('student_id') ) ;
             $query = $this->db->get('student');
              if($query->num_rows() == 1) //this means the student ID already exists inside the database
                  return FALSE;
              else // student id is new, so go ahead 
                  return TRUE;
              
        }
        public function search_for_student_by_dept($data) {
            //handle this now
            $dept = $data['dept'];
            $level = $data['level'];
            $term = $data['term'];
            //echo $dept." ".$level." ".$term;
            
            $array = array(
                'dept' => $dept,
                'level' => $level, 
                'term' => $term
                );

            $this->db->where($array);
            $query = $this->db->get('student');
            return $query;
        }
        
        
        public function delete_students_profile($student_id) {
            //echo 'student '.$student_id.' profile will be delete here';
           $this->db->where('std_id',$student_id);
            $query = $this->db->get('student');
            
            if($query->num_rows() ==1 ){
                //student found in the database, now delete
             $this->db->where('std_id', $student_id);
             $this->db->delete('student'); 
             return true;
            } 
            //delete operation failed for some reason, return false
            return false;
   }
        
        
        
        public function update_student_info($std_ID) {
            $data = array(
                'std_id' => $std_ID,
                'password' => $this->input->post('password'),
                'firstname' =>$this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'dept' => $this->input->post('dept'),
                'level' => $this->input->post('level'),
                'term' => $this->input->post('term'),
                'cgpa' => $this->input->post('cgpa')
            );

            $this->db->where('std_id', $std_ID);
            $this->db->update('student', $data); 
        }


        public function search_for_student_by_id($student_id) {
            $this->db->where('std_id',$student_id);
            $query = $this->db->get('student');
             return $query;
             }
             
             
         public function update_all_students_level_term() {
             $this->db->select('std_ID,level,term');
             $query = $this->db->get('student');
             
             if($query->num_rows() > 0) {
                 foreach ($query->result() as $row) {
                     $this->update_this_students_level_term($row->std_ID, $row->level, $row->term);
                 }
             }
         }
         
         function update_this_students_level_term($student_ID,$std_level,$std_term) {
             //echo $student_ID." ".$std_level." ".$std_term."<br/>";
             //update the students level term :)
             if($std_term ==2) {
                 $std_term = 1;
                 //increase the level
                 if($std_level<4) {
                     $std_level = $std_level+1;
                 } else if($std_level == 4) {
                     //there's a special case for architecture department, I'll handle that later
                     $std_level = 0;
                     $std_term = 0;
                 }
             }else if($std_term == 1) {
                 $std_term = 2;
                 //nothing else, we are done
             }
             
             //now, finally update the database
              $data = array(
                 'std_id' => $student_ID,
                  'level' => $std_level,
                  'term' => $std_term
                  );
            $this->db->where('std_id', $student_ID);
            $this->db->update('student', $data); 
             
         }
    
}

?>
