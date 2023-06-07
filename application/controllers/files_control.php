<?php

class Files_control extends CI_Controller {
    
        //in this class, first check wheter the user is logged in, then redirect him to course homepage
        function __construct() {
        parent::__construct();
        //parent::Controller();
        $this->is_logged_in();
        }
        
    function is_teacher_logged_in() {
        //this function will check whether a teacher is logged in
    }
    
    function is_student_logged_in() {
        //this function will check whether a teacher is logged in
    }        
    
    function is_logged_in() {
        $is_logged_in  = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo "you don't have permission";
            redirect('welcome');
        }
    }
    
    //var $course_ID_global;
    
    public function show_files_list($course_ID) {
        $this->load->model('files_data');
        
        $data['query'] = $this->files_data->get_all_files_in_this_course($course_ID);
        $data['course_identity'] = $course_ID;
        //now check whether the user is a teacher or a student
        $persontype  = $this->session->userdata('persontype');
        if($persontype == 'T') //the user is a teacher
        {
            $this->load->view('files_view_for_teacher',$data); //loading view for teacher's file section    
        }
        else if($persontype == 'S') //the user is a student
        {
            $this->load->view('files_view_for_student',$data); //loading view for student's file section
        }
        else
        {
            $this->load->view('login'); //user not logged in
        }
        
        
    }
    
    public function add_file($course_ID) {
        $data['course_identity'] = $course_ID;
        $this->is_logged_in();
        $this->load->view('file_upload_form',$data);
    }
    
    public function add_new_file_to_this_course($course_identity) {
        //do the actual file upload in here...
        //Some restrictions on flie uploading
        //$allowedExts = array("jpg", "jpeg", "gif", "png","ppt","pptx","doc","docx","pdf","mp3");
        //$extension = end(explode(".", $_FILES["file"]["name"]));
        
         //first of all, add some validation rules...
        $this->form_validation->set_rules('file','File Selection','callback_check_if_file_is_selected_and_unique');
        
        if ( ($this->form_validation->run() == FALSE) )
            {
            $data['course_identity'] =$course_identity;
                    $this->load->view('file_upload_form',$data);
            }
            else if($_FILES["file"]["size"] > 50000000) {
?>
<script type="text/javascript"> alert("FIle size is too big"); </script>
<?php
                $data['course_identity'] =$course_identity;
                    $this->load->view('file_upload_form',$data);
            }
            else { //if the file passes the validation then do these
                //let's print out the file's information first of all
                //let's show a javascript popup box to continue in a fashion 
                
                
                
            $file_name = $_FILES["file"]["name"] ;
            $file_type = $_FILES["file"]["type"] ;
            $file_size =  ($_FILES["file"]["size"] / 1024) . " Kb";      
            
            //now save the file physically, then show the files path
            move_uploaded_file($_FILES["file"]["tmp_name"], "uploaded_files/".$course_identity."/".$_FILES["file"]["name"]);
            $stored_in =  "uploaded_files/" .$course_identity."/". $_FILES["file"]["name"];
            $this->load->model('files_data');
            $this->files_data->add_new_file_to_this_course($course_identity); ?>
            
        <script>
            alert("File has been uploaded successfully");  
        </script>
<?php
            $this->show_files_list($course_identity);
            }
            
            
        
    }
    
    
    function check_if_file_is_selected_and_unique($file) {
         if ( $_FILES["file"]["name"] == NULL )
        {
             //no file is selected
                $this->form_validation->set_message('check_if_file_is_selected_and_unique', "The  %s field must be selected");
                return FALSE;
        }
        else
        {
            //this means, the file has been actually selected
            //now check if the file already exists
            $this->load->model('files_data');
            if ($this->files_data->check_if_file_is_unique($_FILES["file"]["name"]) == FALSE)
            {
                    $this->form_validation->set_message('check_if_file_is_selected_and_unique', "The {$_FILES["file"]["name"]} file already exists, please rename and try again");
                    return FALSE;
            }
            else
                return TRUE;
        }
    }

    

        public function delete_a_flie_from_this_course($file_ID, $course_identity) {
       //A teacher can only delete the file if it was uploaded by him/her nobody can delete other's uploaded files
        
        
        //check authentication 
        //$okay_to_delete_file = $this->files_data->check_authenticity_to_delete_file($file_ID);
        
        //now you can delete
        $this->load->model('files_data');
        $this->files_data->delete_a_flie_from_this_course($file_ID); ?>
                <script>
                    alert("File has been deleted successfully.")
                </script>
        <?php
        //echo "File deleted!";
        $this->show_files_list($course_identity);
    }
    
    
    public function download_a_file_in_this_course($file_ID) {
        
        //increase the number of hits for this file
        $this->load->model('files_data');
        $this->files_data->download_a_file_in_this_course($file_ID);
        

    }
}


?>