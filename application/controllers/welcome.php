<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
	 */
	public function index()
	{
		$this->load->view('login');
	}
        
        
                      function is_teacher_logged_in() {
                        //this function will check whether a teacher is logged in
                    }

                    function is_student_logged_in() {
                        //this function will check whether a teacher is logged in
                    }
	
	public function validate_authenticity()
	{
                                        $this->load->model('login_data'); // this model must be used to authenticate any kind of login
                                        //first, check for that mysterious super-admin
                                        if($this->input->post('username') == 'superadmin') {
                                            $data = $this->login_data->validate_login_of_superadmin();
                                            if(isset($data['persontype']) && $data['persontype']=='A') {
                                                //this user is Super admin, send him/her to his/her page
                                                $this->session->set_userdata($data);
                                                redirect('homepages/super_admins_homepage');
                                            }
                                        }
                                        

                                     
                                        //now, go further if it's not the super-admin    
		
		$data = $this->login_data->validate_login_of_student(); 
		
		if(isset($data['persontype']) && $data['persontype'] == 'S') {
			$this->session->set_userdata($data);//the data array has been assisgned to session gloabl variable
			redirect('homepages/students_homepage');	
		}
		else{//the user is not student try teacher
			$data = $this->login_data->validate_login_of_teacher();
	 
			if(isset($data['persontype']) && $data['persontype'] == 'T') {
				$this->session->set_userdata($data); //the data array has been assisgned to session gloabl variable
				redirect('homepages/teachers_homepage');	
			}
			else {//neither student nor teacher, validation fails
				$this->index();	
			}
		}
		

	}
	
	
	public function see_courses_of_teacher() {
		
		redirect('course_list_pages/teachers_course_list_page');
		
	}
	
	public function see_courses_of_student() {
		redirect('course_list_pages/students_course_list_page');
	}
	
	
	public function logout() {
		$this->session->sess_destroy();
		$this->index();
	}
        
        public function course_registration($student_ID) {
            //echo "welcome to course registration ". $student_ID;
            //first query data from student_course table 
            //then load the view for course registration depending on the data found in student_course table
            $this->load->model('students_course_table');
            $is_registration_necessary = $this->students_course_table->see_if_this_student_is_yet_to_register_courses($student_ID);
            if($is_registration_necessary == TRUE) { 
                //echo "registration necessary";
                //get the courses for the level term of this student and send the data to the course registration view
                $this->load->model('course_table');
                $data['query'] = $this->course_table->get_all_courses_for_this_new_level_term($student_ID);
                $data['student_id'] = $student_ID;
                $this->load->view('students_course_registration',$data);
            }
            else {
                //echo "already registered";
                //use a javascrpit alert to send back student to his homepage
?>          
                    <script type="text/javascript">
                        alert("You have already registered for this level term");
                    </script>
<?php
                    $this->load->view('students_homepage');
            }
        }
        
        
        public function regsiter_courses_for_this_student($student_ID) {
            //echo "update student_course table for ".$student_ID." ";
            $checked_courses = $this->input->post('check_courses');
            foreach ($checked_courses as $checked_course) {
                //echo $checked_course."<br/>";
                //populate the student_course table according to the course registration request
                $this->load->model('students_course_table');
                $this->students_course_table->add_an_entry($student_ID,$checked_course);
                
              
            }
            //course registraion is successful, show some confirmatio
   ?>
                   <script type="text/javascript">
                        alert("You have successfully registered for this level term");
                    </script> 
<?php
            $this->load->view('students_homepage');
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */