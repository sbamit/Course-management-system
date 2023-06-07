<html>
    <head>
    
    </head>
    
    <body>
        <?php
        if ($query->num_rows() ==1) {
            //echo "teacher found";
            $row = $query->row(); 
            $teacher_ID =  $row->teacher_ID;
            $password= $row->password;
            $firstname= $row->firstname;
            $lastname= $row->lastname;
            $sex= $row->sex;
            $dept= $row->dept;
            $faculty= $row->faculty;
            $designation= $row->designation;
            
            ?>
            <?php echo form_open("admin_control/update_teachers_info/$teacher_ID"); ?>
            <fieldset style="">
                <legend style="width: 100%; text-align: center; background: blue; color: white; ;border-radius: 15px"> Student's Form </legend>
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
                    <td> <label for="teacher_id">Student ID:</label> </td>
                    <td> <?php echo $teacher_ID; ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="password">Password:</label> </td>
                    <td> <?php echo form_password("password", $password) ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="confirm_password">Confirm Password:</label> </td>
                    <td> <?php echo form_password("confirm_password", $password) ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="first_name">First Name:</label> </td>
                    <td> <?php echo form_input("first_name", $firstname) ?> </td>
                </tr>

                <tr>
                    <td> <label for="last_name">Last Name:</label> </td>
                    <td> <?php echo form_input("last_name", $lastname) ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="sex">Sex:</label> </td>
                    <td> <?php echo $sex ; //form_dropdown('sex',$sex_options, set_value('sex', $sex )); ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="dept">Department:</label> </td>
                    <td> <?php echo form_dropdown('dept', $dept_options , set_value('dept',$dept) ); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="faculty">Faculty:</label> </td>
                    <td> <?php echo form_dropdown('faculty',$faculty_options ,  set_value('faculty', $faculty)); ?> </td>
                </tr>
                
                
                <tr>
                    <td> <label for="designation">Designation:</label> </td>
                    <td> <?php echo form_dropdown('designation',$design_options ,  set_value('designation', $designation)); ?> </td>
                </tr>
                
               
                <tr>
                    <td colspan="2"> <?php echo form_submit('confirm','Update'); ?> </td>              
                </tr>

                 <tr>
                    <td colspan="2"> <?php echo anchor("admin_control/delete_teachers_profile/$teacher_ID", 'Delete', array('title' => 'Student\'s profile')); ?> </td>              
                </tr>
                
            </table>
            </fieldset>
            
            
        <?}
        else {
            echo "No match with teacher id can be found";
        }
        ?>
    </body>
</html>

