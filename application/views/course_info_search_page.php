<html>
    <head>
        <title>Search Course Information</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
         <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
        
         <div id="side_bar">
                
                <?php echo anchor('admin_control/search_course', 'Reset Data', array('title' => 'Student\'s profile')); ?>
                <?php echo "<br/>"; ?>
             
                <?php echo anchor('homepages/super_admins_homepage', 'Back', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Home', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
          </div>
     
        
        <div id="label">
                <h3>Search Course Information :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
        
        <div id="main_content">
            <p>Search for Course:</p>
            
            <?php
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
                   
            ?>
            
            
                <?php echo form_open('admin_control/search_for_course_in_db'); ?>
                
            <table id ="tab">
                <tr>
                    <td><label for="course_id">Course ID:</label></td>
                    <td><?php echo form_input("course_id", set_value('course_id')) ?></td>
                </tr>
                
                <tr>
                    <td><label for="dept">Department:</label></td>
                    <td><?php echo form_dropdown('dept', $dept_options ,' ' ); ?></td>
                </tr>
                
                
                
                <tr>
                    <td colspan="2"><?php echo form_submit('confirm','Search'); ?></td>
                </tr>
            </table>
                
                
            
        </div>
        
        
    </body>
</html>
