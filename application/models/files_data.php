<?php

class Files_data extends CI_Model{
    
    var $file_path;
    var $file_data;
    var $file_name;
    
    public function get_all_files_in_this_course($course_ID) {
        $this->db->where('course_ID',$course_ID);
        $this->db->order_by("upload_date", "desc");
        $query = $this->db->get('file');
        return $query;
    }
    
    public function add_new_file_to_this_course($course_ID) {
        
        
        //echo "file uploaded !" ;
        //file has been actually uploaded
        $author_name = $this->session->userdata('firstname')." ".$this->session->userdata('lastname');
        
        //file has been already physically uploaded
        //now insert this file's description into database //
        $this->file_path = realpath(APPPATH .'../uploaded_files');
        $data = array(
           'file_name' => $_FILES["file"]["name"],
            'file_link'=>$this->file_path."\\".$course_ID."\\".$_FILES["file"]["name"],
           'file_extension' => $_FILES["file"]["type"], 
           'file_info' =>$this->input->post('file_info') ,//$this->input->post('file_info'),
            //upload date will be set by databse automatically
           'file_size_in_bytes'=> $_FILES["file"]["size"],
           'author' => $author_name,
           'teacher_ID' =>$this->session->userdata('teacher_ID'),
           'course_ID' =>$course_ID
           );

        $this->db->insert('file', $data);
        //file's desc has been inserted successfully
        //now, return
        return;
    }
    
    
    public function check_if_file_is_unique($file_name) {
        //just check whether a file with same name exists in server or not
        //if yes, don't let it be uploaded :-
        $this->db->where('file_name', $file_name ) ;
        //$this->db->where('course_id',);
        $query = $this->db->get('file');
              if($query->num_rows() == 1) //this means the file already exists inside the database and the server
                  return FALSE;
              else // new file , so go upload
                  return TRUE;
    }




    public function download_a_file_in_this_course($file_ID) {
        //increase the number of hits
        $this->db->where('file_ID',$file_ID);
        $query = $this->db->get('file');
        
        if($query->num_rows() ==1 )
        {
            $row = $query->row();
           
            $this->file_data = file_get_contents($row->file_link); // Read the file's contents
            $this->file_name = $row->file_name;
               
             
        }
        
        force_download($this->file_name, $this->file_data);//actual download        
      
        
    }
    
    
       public function test_download_a_file_in_this_course($file_ID) {
        //increase the number of hits
        $this->db->where('file_ID',$file_ID);
        $query = $this->db->get('file');
        
        if($query->num_rows() ==1 )
        {
            $row = $query->row();
            $num_of_hits= $row->hits;
             $num_of_hits++;
            //actual download datas
            $this->file_data = file_get_contents($row->file_link); // Read the file's contents
            $this->file_name = $row->file_name;
            
            
           
            $data = array(
               'hits' => $num_of_hits
            );
        
            $this->db->where('file_ID', $file_ID);
            $this->db->update('file', $data);     
             //force_download($this->file_name, $this->file_data);//actual download        
             return true;
        }
        //file id does not match any item, failed to download
        return false;
      
        
    }
    
    
    public function delete_all_files_from_this_course($course_ID) {
        //first delete all files physically
        $this->db->where('course_ID',$course_ID);
        $this->db->select('file_ID');
        $query = $this->db->get('file');
        if($query->num_rows() > 0) {
             foreach($query->result() as $row) {
                $this->delete_a_flie_from_this_course($row->file_ID);
             }
        }
        
        //now, delete those files from the database
        
    }






    public function delete_a_flie_from_this_course($file_ID) {
        //first delete the file physically
        $this->db->where('file_ID',$file_ID);
        $this->db->select('file_link');
        $query = $this->db->get('file');
        
        if($query->num_rows() == 1) {
            foreach($query->result() as $row) {
                //echo $row->file_link."<br/>";
                unlink($row->file_link);
            }
        }
        
        
        //echo "File deleted!";
        
        //this will delete file's description from the database
        $this->db->where('file_ID',$file_ID);
        $this->db->delete('file');
        
        

    }
}

?>