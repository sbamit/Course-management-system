<?php

class Testing_ci extends CI_Controller {
    
    public function index() {
       $this->load->library('table');

      $query = $this->db->query("SELECT * FROM student_course");
    
      echo $this->table->generate($query); 
    }   
}


?>