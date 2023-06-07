<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Teachers_table extends CI_Model {
    public function insert_teacher_into_db() {
        //echo "get all data by post method";
        //insert all post data into teacher's table in the database
        $data = array(
            'teacher_id' => $this->input->post('teacher_id'),
            'password' => $this->input->post('password'),
            'firstname' => $this->input->post('first_name'),
            'lastname' => $this->input->post('last_name'),
            'sex' => $this->input->post('sex'),
            'dept' => $this->input->post('dept'),
            'faculty' => $this->select_faculty_for_this_department($this->input->post('dept')),
            'designation' => $this->input->post('designation')
        );
        
        $this->db->insert('teacher', $data);
    }
    
    public function check_unique_teacher_id() {
         $this->db->where('teacher_id', $this->input->post('teacher_id') ) ;
             $query = $this->db->get('teacher');
              if($query->num_rows() == 1) //this means the teacher's ID already exists inside the database
                  return FALSE;
              else // teacher's id is new, so go ahead 
                  return TRUE;
    }
    
    function select_faculty_for_this_department($dept) {
        if($dept == 'Arch') return 'Arch';
        else if($dept == 'URP') return 'Arch';
        else if($dept == 'Hum') return 'Arch';
        else if($dept == 'CE') return 'CE';
        else if($dept == 'WRE') return 'CE';
        else if($dept == 'EEE') return 'EEE';
        else if($dept == 'CSE') return 'EEE';
        else if($dept =='Ch.E') return 'Engr';
        else if($dept == 'MME') return 'Engr';
        else if($dept == 'Chem') return 'Engr';
        else if($dept == 'Math') return 'Engr';
        else if($dept == 'Phys') return 'Engr';
        else if($dept =='ME') return 'ME';
        else if($dept =='NAME') return 'ME';
        else if($dept =='IPE') return 'ME';
        else return 'no-faculty';
    }
    
    public function search_for_teacher_by_dept($dept) {
            //handle this now

            $this->db->where('dept',$dept);
            $query = $this->db->get('teacher');
            return $query;
        }
    
    
    public function search_for_teacher_by_id($teacher_id) {
        //echo 'search teacher by id is handeld here';
        $this->db->where('teacher_id',$teacher_id);
        $query = $this->db->get('teacher');
         return $query;
    }
    
    
    public function update_teachers_info($teacher_ID) {
                $data = array(
                'teacher_id' => $teacher_ID,
                'password' => $this->input->post('password'),
                'firstname' =>$this->input->post('first_name'),
                'lastname' => $this->input->post('last_name'),
                'dept' => $this->input->post('dept'),
                'faculty' => $this->input->post('faculty'),
                'designation' => $this->input->post('designation')
            );

            $this->db->where('teacher_id', $teacher_ID);
            $this->db->update('teacher', $data); 
    }


    public function delete_teachers_profile($teacher_ID) {
            $this->db->where('teacher_id',$teacher_ID);
            $query = $this->db->get('teacher');
            
            if($query->num_rows() ==1 ){
                //student found in the database, now delete
             $this->db->where('teacher_id', $teacher_ID);
             $this->db->delete('teacher'); 
             return true;
            } 
            //delete operation failed for some reason, return false
            return false;
    }
    
    public function get_teachers_info_from_this_array_of_IDs($array_of_IDs) {
        //echo print_r($array_of_IDs);
       
        $this->db->where_in('teacher_ID', $array_of_IDs);
        $query = $this->db->get('teacher');
        return $query;
    }
    
    public function get_a_blank_query() {
        $this->db->where('teacher_ID','noidcouldbelikethisbecausethefunctioniswrittentoreturnnullquery');
        $query = $this->db->get('teacher');
        return $query;
    }
    
}
?>
