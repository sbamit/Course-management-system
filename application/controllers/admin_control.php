<?php

class Admin_control extends CI_Controller{
    
        function __construct() {
        parent::__construct();
        //parent::Controller();
        $this->is_logged_in();
    }
    
    
    public function reassign_courses_to_teachers() {
        //echo "write script to re-assign courses to teachers";
        $this->load->view('show_departments_to_assign_course_teachers');
    }
    
    public function assign_teacher_to_this_course($course_ID) {
        $selected_teacher = $this->input->post('available_teachers');
        //echo "here teacher with id".$selected_teacher." will be assigned to course with id ".$course_ID;
        //first check whether the teacher is already assigned to this course
        $this->load->model('teachers_course_table');
        $is_there_a_entry = $this->teachers_course_table->check_if_this_teacher_course_entry_already_exists($course_ID,$selected_teacher);
        if($is_there_a_entry == TRUE) {
            ?>
<script type="text/javascript">
    alert("This Teacher is already assigned to the course")
</script>
<?php
    $this->see_course_teachers_for_this_course($course_ID);
        }else {
            $this->teachers_course_table->add_this_entry($course_ID,$selected_teacher);
 ?>
<script type="text/javascript">
    alert("Teacher  assignment to the course has been done successfully")
</script>
<?php
        $this->see_course_teachers_for_this_course($course_ID);
        }
        //if the teacher is not assigned, then assign him/her
    }




    public function show_course_list() {
        $data['selected_dept'] = $this->input->post('dept');
        //get all courses data for this selected department
        $this->load->model('course_table');
        $data['course_list']= $this->course_table->get_all_courses_for_this_department($this->input->post('dept'));
        $this->load->view('show_course_list_of_this_dept',$data);
    }
    
    public function see_course_teachers_for_this_course($course_ID) {
        //echo "All teachers assigned to this course ".$course_ID." will be shown here";
        //get all course teachers for this course and then show them
        $this->load->model('teachers_course_table');
        $query = $this->teachers_course_table->get_course_teachers_for_this_course($course_ID);
        //we need to pass an array containg all teachers of this department
        $this->load->model('teachers_table');
        $this->load->model('course_table');
        $dept_of_this_course = $this->course_table->get_dept_of_this_course($course_ID);
        if($dept_of_this_course->num_rows() == 1) {
            $row = $dept_of_this_course->row();
            $all_teachers_of_this_dept = $this->teachers_table->search_for_teacher_by_dept($row->dept);
            if($all_teachers_of_this_dept->num_rows() > 0) {
                foreach ($all_teachers_of_this_dept->result() as $teacher) {
                    $teacher_id =  $teacher->teacher_ID;
                   $teacher_name =  $teacher->firstname." ".$teacher->lastname;
                   $array_of_teachers["$teacher_id"] = $teacher_name;
                }
            }
        }
        
        
        //now we have the course teachers id, but we need other datas
        if($query->num_rows >0) {
                    foreach ($query->result() as $row) {
            $data[] = $row->teacher_ID;
        }
        
        //$this->load->model('teachers_table');
        //we are sending an array of teacher's ID
        $list['list_of_course_teachers'] = $this->teachers_table->get_teachers_info_from_this_array_of_IDs($data);
        $list['course_ID'] = $course_ID;
        $list['list_of_dept_teachers'] = $array_of_teachers;
        $this->load->view('show_teachers_list_for_course_assignment',$list);
        //now load the view to show teachers name, designation assigned to this course

        } else {//no course teacher found
            //echo "no course teacher";
            //$this->load->model('teachers_table');
            $list['list_of_course_teachers'] =$this->teachers_table->get_a_blank_query();
            $list['course_ID'] = $course_ID;
            $list['list_of_dept_teachers'] = $array_of_teachers;
            $this->load->view('show_teachers_list_for_course_assignment',$list);
        }

    }
    
    public function remove_teacher_from_this_course($teacher_ID,$course_ID) {
        //echo "in this script teacher with ID ".$teacher_ID." will be removed from course with id ".$course_ID."<br/>";
        $this->load->model('teachers_course_table');
        $this->teachers_course_table->delete_this_entry($teacher_ID,$course_ID);
        //after deleteing data show notification and re-load the course teachers list page :)
        ?>
<script type="text/javascript">
    alert("Teacher has been removed from the corresponding course successfully");
</script>
<?php
        $this->see_course_teachers_for_this_course($course_ID);
    }




    public function start_new_semester() {
        //echo "everything regarding initiating a new course will be handled here.";
        //confirm box is difficult to use in this case
        $this->update_all_students_level_term();
        //after level-term updates, now delete all entries from student_course table so that you can populate it again
        $this->delete_all_entries_from_student_course_table();
    }
    
    function update_all_students_level_term() {
        //echo "update all students level-term";
        $this->load->model('students_table');
        $this->students_table->update_all_students_level_term();
    }
    
    
    function delete_all_entries_from_student_course_table() {
        $this->load->model('students_course_table');
        $this->students_course_table->delete_all_entries();
    }
    
    function send_course_reg_to_all_student() {
        
    }


    
    public function create_students_profile() {
        //echo "Create a new student's profile";
        $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('students_profile_create_form');
    }
    
    public function  insert_student_into_db() {
        
        $this->form_validation->set_rules('student_id','Student ID','trim|required|callback_check_unique_student_id');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[7]');
        $this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        
        
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('students_profile_create_form');
            }
            else
            {
                //validation runs successfully
                   $this->load->model('students_table');
                   $this->students_table->insert_student_into_db();
                   
                 //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("New Student's Profile has been created successfully");
                        </script>
                   <?php
                   $this->load->view('admins_homepage');
            }
    }
    
    
    function check_unique_student_id($student_id) {
        //write code to ensure this student id does not exist in the database already
        $this->load->model('students_table');
        if ($this->students_table->check_unique_student_id() == FALSE)
        {
                $this->form_validation->set_message('check_unique_student_id', "The {$student_id} %s already exists");
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }
    
    
    public function search_students_profile() {
        $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('students_profile_search_page');
    }
    
    public function update_student_info($std_ID) {
        //student's id cannot be updated or changed//
        $this->form_validation->set_rules('password','Password','trim|required|min_length[7]');
        $this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        
        $this->load->model('students_table');
        if ($this->form_validation->run() == FALSE)
            {               
                
                  $search_result['query']= $this->students_table->search_for_student_by_id($std_ID);
                  $this->load->view('students_profile_edit_page',$search_result);
            }else {
                //validation runs successfully, now update the students information in database
                    $this->students_table->update_student_info($std_ID);
                    
                 //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("Student's Profile has been updated successfully");
                        </script>
                   <?php
                   $this->load->view('students_profile_search_page');
            }
        
    }
    
    
    public function delete_students_profile($student_ID) {
        
        if(!empty ($student_ID)) {
            $this->load->model('students_table');
            $is_deleted = $this->students_table->delete_students_profile($student_ID);
            //true means successful deletion, false mean unsuccessful
            if($is_deleted == TRUE) {
                 ?>
                        <script>
                            alert("Student's Profile has been deleted successfully");
                        </script>
                   <?php
            }
            else {//deletion falied
                 ?>
                        <script>
                            alert("Student's Profile could not be delete properly");
                        </script>
                   <?php
            }
            
        }
            $this->load->view('students_profile_search_page');
            
    }


    public function search_for_student_in_db() {
        $this->load->model('students_table');
        $data = array(
            'student_id'=> $this->input->post('student_id'),
            'dept' =>$this->input->post('dept'),
             'level' => $this->input->post('level'),
            'term' => $this->input->post('term')
        );
        //if the student is has been given, search by student id
        if(!empty($data['student_id'])){
           $search_result['query']= $this->students_table->search_for_student_by_id($data['student_id']);
           $this->load->view('students_profile_edit_page',$search_result);
        }
        //but, if the student id has not been given, search by dept-level-term
        else {
            //echo "will be handeld later";
            $search_result['query'] = $this->students_table->search_for_student_by_dept($data);
            $this->load->view('show_students_list',$search_result);
        }
        
  }
    

    public function  create_teachers_profile() {
        //echo "Create a new teachers' profile";
       $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('teachers_profile_create_form');
    }
    
    
    public function search_teachers_profile() {
        $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('teachers_profile_search_page');
    }

    public function search_for_teacher_in_db() {
        $this->load->model('teachers_table');
        $data = array(
            'teacher_id'=> $this->input->post('teacher_id'),
            'dept' =>$this->input->post('dept'),
        );
        //if the student is has been given, search by student id
        if(!empty($data['teacher_id'])){
           $search_result['query']= $this->teachers_table->search_for_teacher_by_id($data['teacher_id']);
           $this->load->view('teachers_profile_edit_page',$search_result);
        }
        //but, if the student id has not been given, search by dept-level-term
        else {
            //echo "will be handeld later";
            $search_result['query'] = $this->teachers_table->search_for_teacher_by_dept($data['dept']);
            $this->load->view('show_teachers_list',$search_result);
        }
    }


    public function insert_teacher_into_db() {
        //echo "write script to insert this teacher into db";
         $this->form_validation->set_rules('teacher_id','Teacher ID','trim|required|callback_check_unique_teacher_id');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('teachers_profile_create_form');
            }
            else
            {
                //validation runs successfully
                   $this->load->model('teachers_table');
                   $this->teachers_table->insert_teacher_into_db();
                   
                    //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("New Teacher's Profile has been created successfully");
                        </script>
                   <?php
                   $this->load->view('admins_homepage');
                   
            }
        
    }
    
    public function update_teachers_info($teacher_id) {
        //teacher's id cannot be updated or changed//
        $this->form_validation->set_rules('password','Password','trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        
        $this->load->model('teachers_table');
        if ($this->form_validation->run() == FALSE)
            {               
                
                  $search_result['query']= $this->teachers_table->search_for_teacher_by_id($teacher_id);
                  $this->load->view('teachers_profile_edit_page',$search_result);
            }else {
                //validation runs successfully, now update the students information in database
                    $this->teachers_table->update_teachers_info($teacher_id);
                    
                 //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("Teacher's Profile has been updated successfully");
                        </script>
                   <?php
                   $this->load->view('teachers_profile_search_page');
            }
    }
    
    
        function check_unique_teacher_id($teacher_id) {
        //write code to ensure this student id does not exist in the database already
        $this->load->model('teachers_table');
        if ($this->teachers_table->check_unique_teacher_id() == FALSE)
        {
                $this->form_validation->set_message('check_unique_teacher_id', "The {$teacher_id} %s already exists");
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }
    
    public function delete_teachers_profile($teacher_ID) {
         if(!empty ($teacher_ID)) {
            $this->load->model('teachers_table');
            $is_deleted = $this->teachers_table->delete_teachers_profile($teacher_ID);
            //true means successful deletion, false mean unsuccessful
            if($is_deleted == TRUE) {
                 ?>
                        <script>
                            alert("Teacher's Profile has been deleted successfully");
                        </script>
                   <?php
            }
            else {//deletion falied
                 ?>
                        <script>
                            alert("Teacher's Profile could not be delete properly");
                        </script>
                   <?php
            }
            
        }
            $this->load->view('teachers_profile_search_page');
    }








    public function  create_new_course() {
        //echo "chreate a new course infromation";
        $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('course_information_create_form');
    }
    
    
    public function insert_course_into_db() {
        //echo "write script to insert this course into db";
        $course_id = $this->input->post('course_id');
        
        $this->form_validation->set_rules('course_id','Course\'s ID','trim|required|callback_check_unique_course_id');
        $this->form_validation->set_rules('course_no','Course\'s Number','trim|required|callback_check_unique_course_no');
        $this->form_validation->set_rules('course_name','Course\'s Name','trim|required');
        
         if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('course_information_create_form');
            }
            else
            {
                // validation runs successfully
                   $this->load->model('course_table');
                   $this->course_table->insert_course_into_db();
                  //after the course being inserted successfully, now create a course directory inside the server 
                   //where the files will be uploaded later on :)
                   $this->create_course_directory($course_id);
                   
                    //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("New Course Information has been added successfully");
                        </script>
                   <?php
                   $this->load->view('admins_homepage');    

            }
    }
    
    public function check_unique_course_id($course_id) {
        //the $course_info can be the course id or course no
        $this->load->model('course_table');
        if ($this->course_table->check_unique_course_id() == FALSE)
        {
                $this->form_validation->set_message('check_unique_course_id', "The {$course_id} %s already exists");
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }
    
   public function check_unique_course_no($course_no) {
                //the $course_info can be the course id or course no
        $this->load->model('course_table');
        if ($this->course_table->check_unique_course_no() == FALSE)
        {
                $this->form_validation->set_message('check_unique_course_no', "The {$course_no} %s already exists");
                return FALSE;
        }
        else
        {
                return TRUE;
        }
    }
    public function search_course() {
        //echo "sear for course here";
         $is_admin = $this->is_admin_logged_in();
        if($is_admin == true)
            $this->load->view('course_info_search_page');
    }
    
    public function search_for_course_in_db() {
        $this->load->model('course_table');
        $data = array(
            'course_id'=> $this->input->post('course_id'),
            'dept' =>$this->input->post('dept'),
        );
        //if the student is has been given, search by student id
        if(!empty($data['course_id'])){
           $search_result['query']= $this->course_table->search_for_course_by_id($data['course_id']);
           $this->load->view('course_info_edit_page',$search_result);
        }
        //but, if the student id has not been given, search by dept-level-term
        else {
            //echo "will be handeld later";
            $search_result['query'] = $this->course_table->search_for_course_by_dept($data['dept']);
            $this->load->view('show_courses_list',$search_result);
        }
    }
    
    
    public function update_courses_info($course_id) {
        //echo "update course ".$course_id;
        //$this->form_validation->set_rules('course_id','Course\'s ID','trim|required|callback_check_unique_course_id');
        //$this->form_validation->set_rules('course_no','Course\'s Number','trim|required|callback_check_unique_course_no');
        $this->form_validation->set_rules('course_name','Course\'s Name','trim|required');
        
        $this->load->model('course_table');
        if ($this->form_validation->run() == FALSE)
            {               
                
                  $search_result['query']= $this->course_table->search_for_course_by_id($course_id);
                  $this->load->view('course_info_edit_page',$search_result);
            }else {
                //validation runs successfully, now update the course information in database
                    $this->course_table->update_courses_info($course_id);
                    
                 //After successful database operation show some confirmation
                   ?>
                        <script>
                            alert("Course Information has been updated successfully");
                        </script>
                   <?php
                   $this->load->view('course_info_search_page');
            }
    }
    
    public function delete_courses_info($course_id) {
       // echo "delete course ".$course_id;
          if(!empty ($course_id)) {
            $this->load->model('course_table');
            $is_deleted = $this->course_table->delete_course_info($course_id);
            //true means successful deletion, false mean unsuccessful
            if($is_deleted == TRUE) {
                //when delete is successful, two different process must be done in back-ground
                //1.The folder and files associated with the course must be deleted
                //2.The course's files information must also be deleted from database
                $this->delete_course_files_from_database($course_id);
                $this->delete_course_folder_from_server($course_id)
                 ?>
                        <script>
                            alert("Course's information has been deleted successfully");
                        </script>
                   <?php
            }
            else {//deletion falied
                 ?>
                        <script>
                            alert("Course's information could not be delete properly");
                        </script>
                   <?php
            }
            
        }
            $this->load->view('course_info_search_page');
    }

    function create_course_directory($course_id) {
        $path_of_the_directory = realpath(APPPATH .'../uploaded_files');
        //mkdir($path_of_the_directory.'/'.$course_id);
        $path=$path_of_the_directory.'/'.$course_id;
        mkdir($path, 0777);
    }
    
    function delete_course_folder_from_server($course_ID) {
        $path_of_the_directory = realpath(APPPATH .'../uploaded_files');
        $path_of_the_directory = $path_of_the_directory.'/'.$course_ID;
       
            rmdir($path_of_the_directory);
        
    }
    
    function delete_course_files_from_database($course_ID) {
        $this->load->model('files_data');
        $this->files_data->delete_all_files_from_this_course($course_ID);
    }

    //for extra security, :)
    function is_admin_logged_in() {
        //this functino will check wheter a admin is logged in
        $this->is_logged_in();
        if($this->session->userdata('persontype')  == 'A')
            return true;//this is the admin, confirmed
    }
    
    
    function is_logged_in() {
        $is_logged_in  = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo "you don't have permission";
            redirect('welcome');
        }
    }
}
?>
