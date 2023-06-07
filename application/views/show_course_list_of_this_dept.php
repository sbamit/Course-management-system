<html>
    <head>
        <title> Admin : See Course Teachers List </title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    
    <body>
        
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="side_bar">
                
             
                <?php echo anchor('admin_control/reassign_courses_to_teachers', 'Back', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('homepages/super_admins_homepage', 'Home', array('title' => '')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
        
        </div>
        
        <div id="main_content">
            <div id="label">
                <h3> <?php echo $selected_dept." " ;?> Department's Course List :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
            
            <p>Here the departments will be shown to choose for course assignment</p>
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
            
            <?php if($course_list->num_rows>0) {
                ?>
                     <table id ="tab">
                        <tr>
                            <th>Course No</th>
                            <th>Course Name</th>
                            <th>Course Type</th>
                            <th>Course Credits</th>
                            <th>Student's Dept</th>
                            <th>Course Teachers</th>
                        </tr>
                        <?php foreach($course_list->result() as $course):?>
                        <tr>
                            <td><?php echo $course->course_no; ?></td>
                            <td> <?php echo $course->course_name; ?> </td>
                            <td> <?php if ($course->course_type == 'T') echo "Theory" ; else echo "Sessional" ?> </td>
                            <td> <?php echo $course->course_credit; ?> </td>
                            <td> <?php echo $course->for_std_of_dept; ?> </td>
                            <td> <?php echo anchor("admin_control/see_course_teachers_for_this_course/$course->course_ID", "Course Teachers", "")?> </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
            
            <?php
            }   else {
                echo "No course is currently available for this Department.";
            }
                ?>
                
            
           
                
            
            
        </div>
        
        
          <br/>
          <br/>
        
        
        
        
    </body>
</html>


