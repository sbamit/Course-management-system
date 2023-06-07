<html>
    <head>
        <title>Search Teachers Profile</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
         <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
        
         <div id="side_bar">
                
                <?php echo anchor('admin_control/search_teachers_profile', 'Reset Data', array('title' => 'Student\'s profile')); ?>
                <?php echo "<br/>"; ?>
             
                <?php echo anchor('homepages/super_admins_homepage', 'Back', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Home', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
          </div>
     
        
        <div id="label">
                <h3>Edit Student's Profile :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
        
        <div id="main_content">
            <p>Search for Teacher:</p>
            
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
            
            
                <?php echo form_open('admin_control/search_for_teacher_in_db'); ?>
                
            <table id ="tab">
                <tr>
                    <td><label for="teacher_id">Teacher ID:</label></td>
                    <td><?php echo form_input("teacher_id", set_value('teacher_id')) ?></td>
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

