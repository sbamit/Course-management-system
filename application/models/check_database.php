<?php

class Check_database extends CI_Model {
    
    function getThemAll() {
        //already connected to the database
        
        $this->db->select('teacher_ID, firstname, lastname');
        $query = $this->db->get('teacher');
        return $query->result();
    }
}

?>