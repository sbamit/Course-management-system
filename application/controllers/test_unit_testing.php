
<?php

class Test_unit_testing extends CI_Controller {

    
    public function index() {
        
        $this->load->library('unit_test');
        
       
        $this->test_login_validation_function();
        $this->test_unique_course_id_check_function();
        $this->test_download_a_file_from_server();
        
        
       
    $str = '
<table border="2px solid" cellpadding="4" cellspacing="1" border-collapse="collapse">
    {rows}
        <tr>
        <td></td>
        <td font = "italic"></td>
        </tr>
    
    <br/>
</table>';

        $this->unit->set_template($str); 
        
         $this->unit->set_test_items(array('test_name','test_datatype', 'res_datatype','result','notes')); 
        echo $this->unit->report();
    }
    
    
    function test_unique_course_id_check_function() {
        //
        $this->load->model('course_table');
        
        //case 1:When the course id is not unique
        $test_name = 'Checking the uniquness of this course_id in database, when it alread exists';
        $notes = 'Passed if the course already exists, Failed otherwise';
        $COURSE_ID = 'cse_300';
        $data = $this->course_table->testing_check_unique_course_id($COURSE_ID);
        $test = $data;
        $expected_result = false;
        $this->unit->run($test,$expected_result,$test_name,$notes);
        
        
        //case 2:When the course id is  unique
        $test_name = 'Checking the uniquness of this course_id in database, when it doesn\'t exist';
        $notes = 'Passed if the course already exists, Failed otherwise';
        $COURSE_ID = 'cse_200';
        $data = $this->course_table->testing_check_unique_course_id($COURSE_ID);
        $test = $data;
        $expected_result = false;
        $this->unit->run($test,$expected_result,$test_name,$notes);
        
        
        //case3: when there's not input or null input
        $test_name = 'Checking the uniquness of this course_id in database, when input is null';
        $notes = 'Passed if the course already exists, Failed otherwise';
        $COURSE_ID = '';
        $data = $this->course_table->testing_check_unique_course_id($COURSE_ID);
        $test = $data;
        $expected_result = false;
        $this->unit->run($test,$expected_result,$test_name,$notes);
        
        
        //case4: garbage and very long inptu
        $test_name = 'Checking the uniquness of this course_id in database, when input is garbage';
        $notes = 'Passed if the course already exists, Failed otherwise';
        $COURSE_ID = '2m3c99riiiiiiimoorckk309uvwer9uuuuuuuuuuuuuewiiiiiiiiiiiiiiiiiiiiiiiiii09erimbvpsk;lbkx;lfksd;lfkmcs;fkspo;ldfkkkkkkkc';
        $data = $this->course_table->testing_check_unique_course_id($COURSE_ID);
        $test = $data;
        $expected_result = false;
        $this->unit->run($test,$expected_result,$test_name,$notes);
        
        
        
    }
    
    function test_login_validation_function() {
        
        $this->load->model('login_data');
        
 
        //case 1: username password does not match
       $test_name = 'Checking the username-password combination of a student for a mis-match';
        $notes = 'Passed if the username-password matches, Failed for any other case';
        $USER_NAME = '0805005';
        $PASS_WORD = '0805005';
        $data = $this->login_data->testing_validate_login_of_student($USER_NAME, $PASS_WORD);
        $test = $data['is_logged_in'];
        $expected_result =true;
       $this->unit->run($test, $expected_result, $test_name,$notes);
       
       //case 2: username password matches
       $test_name = 'Checking the username-password combination of a student for a matched input pair';
        $notes = 'Passed if the username-password matches, Failed for any other case';
       $USER_NAME = '0805001';
        $PASS_WORD = '0805001';
        $data = $this->login_data->testing_validate_login_of_student($USER_NAME, $PASS_WORD);
        $test = $data['is_logged_in'];
        $expected_result =true;
       $this->unit->run($test, $expected_result, $test_name,$notes);
       
        //case 3: invalid input, null input
        $test_name = 'Checking the username-password combination of a student for null inputs';
        $notes = 'Passed if the username-password matches, Failed for any other case';
       $USER_NAME = '';
        $PASS_WORD = '';
        $data = $this->login_data->testing_validate_login_of_student($USER_NAME, $PASS_WORD);
        $test = $data['is_logged_in'];
        $expected_result =true;
       $this->unit->run($test, $expected_result, $test_name,$notes);
       
       //case 4: very long input, let's see what happens
        $test_name = 'Checking the username-password combination of a student for very long inputs ';
        $notes = 'Passed if the username-password matches, Failed for any other case';
       $USER_NAME = '08050013840912830csuiofcusdfi9u3irpocwirpoiqeoivmpowieroi209weri09cimewirc0923icm9er08050013840912830csuiofcusdfi9u3irpocwirpoiqeoivmpowieroi209weri09cimewirc0923icm9er';
        $PASS_WORD = '13840912830csuiofcusdfi9u3ir0805001cwirpoiqeoivmpowieroi209weri09cimewirc0923icm9eer08050013840912830csuiofcusdfi9u3irpocwirpoiqeoivmpowieroi209weri09cimewirc0923icm9er';
        $data = $this->login_data->testing_validate_login_of_student($USER_NAME, $PASS_WORD);
        $test = $data['is_logged_in'];
        $expected_result =true;
       $this->unit->run($test, $expected_result, $test_name,$notes);
    }
    
    function test_download_a_file_from_server() {
        $this->load->model('files_data');
        
        
         //case 1: When the file is found on the server
       $test_name = 'Checking the file download function for a valid file';
        $notes = 'Passed if the file is found on the server, failed otherwise';
        $FILE_ID = '7';
        $result = $this->files_data->test_download_a_file_in_this_course($FILE_ID);
        $expected_result =true;
       $this->unit->run($result, $expected_result, $test_name,$notes);
       
       
       //case 2: When the file cannot found on the server
       $test_name = 'Checking the file download function for a non-existent file';
        $notes = 'Passed if the file is found on the server, failed otherwise';
        $FILE_ID = '117';
        $result = $this->files_data->test_download_a_file_in_this_course($FILE_ID);
        $expected_result =true;
       $this->unit->run($result, $expected_result, $test_name,$notes);
       
       
        //case 3: When the file id is null
       $test_name = 'Checking the file download function for a null file ID';
        $notes = 'Passed if the file is found on the server, failed otherwise';
        $FILE_ID = '';
        $result = $this->files_data->test_download_a_file_in_this_course($FILE_ID);
        $expected_result =true;
       $this->unit->run($result, $expected_result, $test_name,$notes);
       
       
       //case 4: When the file id is not integer
       $test_name = 'Checking the file download function for a non-integer file ID';
        $notes = 'Passed if the file is found on the server, failed otherwise';
        $FILE_ID = 'bsaddbsaddbsaddbsaddbsaddbsaddbsaddbsaddbsaddbsaddbsaddbsaddbsadd';
        $result = $this->files_data->test_download_a_file_in_this_course($FILE_ID);
        $expected_result =true;
       $this->unit->run($result, $expected_result, $test_name,$notes);
        
    }
    
    
}

?>