<html>
    <head>
        <title>New Teacher's Profile</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>

    <body>
        
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="side_bar">
                <?php echo anchor('admin_control/create_teachers_profile', 'Reset Data', array('title' => 'Teacher\'s profile')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Back', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Home', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
        
        </div>
         
            <div id="label">
                <h3>Create Teacher's Profile :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
        
        <div id="main_content">

            
            <?php echo form_open('admin_control/insert_teacher_into_db'); ?>
            <fieldset style="">
                <legend style="width: 100%; text-align: center; background: blue; color: white ;border-radius: 15px"> Teacher's Form </legend>
                
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
                           
                           $sex_options = array(
                               'F'=>'Female',
                               'M'=>'Male'
                           );
                           
                           $design_options = array(
                               'Lecturer'=>'Lecturer',
                               'Assistant professor'=>'Assistant Professor',
                               'Associate professor'=>'Associate Professor',
                               'Professor'=>'Professor'
                           );
                           
                           
                           $faculty_options = array(
                               'Arch'=> 'Faculty of Architecture and Planning',
                               'CE'=>'Faculty of Civil Engineering',
                               'EEE'=>'Faculty of Electrical and Electronic Engineering',
                               'Engr'=>'Faculty of Engineering',
                               'ME'=>'Faculty of Mechanical Engineering'
                           );
            
            ?>
                         
            
            <table id ="tab">
                <tr>
                    <td> <label for="teacher_id">Teacher's ID:</label> </td>
                    <td> <?php echo form_input("teacher_id", set_value('teacher_id')) ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="password">Password:</label> </td>
                    <td> <?php echo form_password("password", '') ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="password">Confirm Password:</label> </td>
                    <td> <?php echo form_password("confirm_password", "") ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="first_name">First Name:</label> </td>
                    <td> <?php echo form_input("first_name", set_value('first_name')) ?> </td>
                </tr>

                <tr>
                    <td> <label for="last_name">Last Name:</label> </td>
                    <td> <?php echo form_input("last_name", set_value('last_name')) ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="sex">Sex:</label> </td>
                    <td> <?php echo form_dropdown('sex',$sex_options,' '); ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="dept">Department:</label> </td>
                    <td> <?php echo form_dropdown('dept', $dept_options ,' '); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="designation">Designation:</label> </td>
                    <td> <?php echo form_dropdown('designation', $design_options ,' '); ?> </td>
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
