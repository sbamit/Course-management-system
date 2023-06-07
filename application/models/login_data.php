<?php

class Login_data extends CI_Model{

    
    function validate_login_of_superadmin() {
        //echo "you are logged in as super admin";
        //check whether this is the super admin or not
        $this->db->where('teacher_ID', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('teacher');
        
          if($query->num_rows() == 1) {
          //pass all infos about the super admin
            $row = $query->row();
            
            $data = array('teacher_ID' => $row->teacher_ID,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname, //user type is set to student
                        'persontype' =>'A', //A is for admin
                        'is_logged_in' => true
			);
            return $data;
        }
        
        
    }


    function validate_login_of_student() { //testcase
        $this->db->where('std_ID', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('student');
        
        if($query->num_rows() == 1) {
          //pass all infos about this student
            $row = $query->row();
            
            $data = array('std_ID' => $row->std_ID,
                        'firstname' => $row->firstname,
			'lastname' => $row->lastname, //user type is set to student
                        'dept' => $row->dept,
                        'level' => $row->level,
                        'term' => $row->term,
                        'persontype' =>'S',//S for student
                        'is_logged_in' => true
			);
            return $data;
        }
    }
    
    function validate_login_of_teacher() {
        $this->db->where('teacher_ID', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('teacher');
        
        if($query->num_rows() == 1) {
          //pass all infos about this student
            $row = $query->row();
            
            $data = array('teacher_ID' => $row->teacher_ID,
                        'firstname' => $row->firstname,
			'lastname' => $row->lastname, //user type is set to student
                        'dept' => $row->dept,
                        'faculty' => $row->faculty,
                        'designation' => $row->designation,
                        'persontype' =>'T',//T for teacher
                        'is_logged_in' => true
			);
            return $data;
        }
    }
    /**
     *This function will return true, if the use is logged in, false otherwise
     * @param string $USER_NAME
     * @param string $PASS_WORD
     * @return array
     */
    function testing_validate_login_of_student($USER_NAME, $PASS_WORD) { 
        $this->db->where('std_ID', $USER_NAME);
        $this->db->where('password',$PASS_WORD);
        $query = $this->db->get('student');
        
        if($query->num_rows() == 1) {
          //pass all infos about this student
            $row = $query->row();
            
            $data = array('std_ID' => $row->std_ID,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname, //user type is set to student
                        'dept' => $row->dept,
                        'level' => $row->level,
                        'term' => $row->term,
                        'persontype' =>'S',//S for student
                        'is_logged_in' => true
                );
            return $data;
        }
        else {
            $data = array(
                'is_logged_in'=>false
            );
            return $data;
        }
    }
    
    
    
    
}




?>