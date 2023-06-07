<html>
    <head>
        <title>New Course's Information</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>

        <body>
        
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="side_bar">
                <?php echo anchor('admin_control/create_new_course', 'Reset Data', array('title' => 'Course\'s Information')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Back', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Home', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
        
        </div>
         
            <div id="label">
                <h3>Create New Course :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
        
        <div id="main_content">

            
            <?php echo form_open('admin_control/insert_course_into_db'); ?>
            <fieldset style="">
                <legend style="width: 100%; text-align: center; background: blue; color: white ;border-radius: 15px"> Course Information </legend>
            
                <?php echo validation_errors(); ?>
            
            <?php
            //this segment is written to produce the options in certain fields
            
                           $dept_options = array(
                               'Arch'=>'Dept. of Architecture',
                               'URP'=>'Dept. of Urban & Regional Planning',
                               'Hum'=>'Dept. of Humanities',
                               'CE'=>'Dept. of Civil Engineering',
                               'WRE'=>'Dept. of Water Resources Engineering',
                               'EEE'=>'Dept. of Electrical & Electronic Engineering',
                               'CSE'=>'Dept. of Computer Science & Engineering',
                               'Ch.E'=>'Dept. of Chemical Engineering',
                               'MME'=>'Dept. of Materials & Metallurgical Engineering',
                               'Chem'=>'Dept. of Chemistry',
                               'Math'=>'Dept. of Mathematics',
                               'Phys'=>'Dept. of Physics',
                               'ME'=>'Dept. of Mechanical Engineering',
                               'NAME'=>'Dept. of Naval Architecture & Marine Engineering',
                               'IPE'=>'Dept. of Industrial & Production Engineering '
                           );
                          
                           
                           $level_options = array(
                               '1'=>'1',
                               '2'=>'2',
                               '3'=>'3',
                               '4'=>'4'
                           );
                           
                           $term_options  = array(
                               '1'=>'1',
                               '2'=>'2'
                           );
                           
                           $type_options = array(
                               'T'=>'Theory',
                               'S'=>'Sessional'
                           );
                           
                           $credit_options = array(
                               '0.75'=>'0.75',
                               '1.0'=>'1.0',
                               '1.5'=>'1.5',
                               '2.0'=>'2.0',
                               '3.0'=>'3.0',
                               '4.0'=>'4.0',
                               '5.0'=>'5.0',
                               '6.0'=>'6.0'
                           );
            
            ?>
                         
            
            <table id ="tab">
                <tr>
                    <td> <label for="course_id">Course's ID:</label> </td>
                    <td> <?php echo form_input("course_id", set_value('course_id') ); ?> </td>
                </tr>
               
                <tr>
                    <td> <label for="course_no">Course's Number:</label> </td>
                    <td> <?php echo form_input("course_no", set_value('course_no') ); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="course_name">Course's Name:</label> </td>
                    <td> <?php echo form_input("course_name", set_value('course_name') ); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="course_credit">Course's Credits:</label> </td>
                    <td> <?php echo form_dropdown('course_credit',$credit_options,' '); ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="course_type">Course's Type:</label> </td>
                    <td> <?php echo form_dropdown('course_type',$type_options,' '); ?> </td>
                </tr>                
                

                
                <tr>
                    <td> <label for="dept">Department:</label> </td>
                    <td> <?php echo form_dropdown('dept', $dept_options ,' '); ?> </td>
                </tr>
                
                 <tr>
                    <td> <label for="for_std_of_dept">For Student Of Department:</label> </td>
                    <td> <?php echo form_dropdown('for_std_of_dept', $dept_options ,' '); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="level">Level:</label> </td>
                    <td> <?php echo form_dropdown('level',$level_options ,' '); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="term">Term:</label> </td>
                    <td> <?php echo form_dropdown('term',$term_options ,' '); ?> </td>
                </tr>
                              
               
                <tr>
                    <td colspan="2"> <?php echo form_submit('confirm','Confirm'); ?> </td>                      
                </tr>
                
            </table>
            </fieldset>
        </div>
        
        
          <br/>
          <br/>
        
        
        
        
    </body>
    
    
</html>
