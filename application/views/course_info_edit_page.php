<html>
    <head>
    
    </head>
    
    <body>
        <?php
        if ($query->num_rows() ==1) {
            //echo "teacher found";
            $row = $query->row(); 
            
           $course_ID =  $row->course_ID;
           $course_name = $row->course_name;
           $course_credit = $row->course_credit;
           $course_type = $row->course_type;
           $course_no = $row->course_no;
           $dept = $row->dept;
           $for_std_of_dept = $row->for_std_of_dept;
           $level = $row->level;
           $term = $row->term;
            ?>
            <?php echo form_open("admin_control/update_courses_info/$course_ID"); ?>
            <fieldset style="">
                <legend style="width: 100%; text-align: center; background: blue; color: white; ;border-radius: 15px"> Course Information </legend>
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

                ?>
              <table id ="tab">
                <tr>
                    <td> <label for="course_id">Course ID:</label> </td>
                    <td> <?php echo $course_ID; ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="course_no">Course No:</label> </td>
                    <td> <?php echo $course_no; ?> </td>
                </tr>
            
                <tr>
                    <td> <label for="course_name">Course Name:</label> </td>
                    <td> <?php echo form_input("course_name", $course_name) ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="dept">Department:</label> </td>
                    <td> <?php echo form_dropdown('dept', $dept_options , set_value('dept',$dept) ); ?> </td>
                </tr>
                
                <tr>
                    <td> <label for="for_std_of_dept">For Student Of Department:</label> </td>
                    <td> <?php echo form_dropdown('for_std_of_dept', $dept_options , set_value('for_std_of_dept',$for_std_of_dept) ); ?> </td>
                </tr>
                
                
              <tr>
                    <td> <label for="level">Level:</label> </td>
                    <td> <?php echo form_dropdown('level',$level_options ,  set_value('level', $level)); ?> </td>
                </tr>
                
                
                  <tr>
                    <td> <label for="term">Term:</label> </td>
                    <td> <?php echo form_dropdown('term',$term_options ,  set_value('term', $term)); ?> </td>
                </tr>
                
                 <tr>
                    <td> <label for="course_type">Course's Type:</label> </td>
                    <td> <?php echo form_dropdown('course_type',$type_options,  set_value('course_type',$course_type)); ?> </td>
                </tr>  
                
                 <tr>
                    <td> <label for="course_credit">Course's Credits:</label> </td>
                    <td> <?php echo form_dropdown('course_credit',$credit_options,  set_value('course_credit', $course_credit)); ?> </td>
                </tr>
               
                
               
                <tr>
                    <td colspan="2"> <?php echo form_submit('confirm','Update'); ?> </td>              
                </tr>

                 <tr>
                    <td colspan="2"> <?php echo anchor("admin_control/delete_courses_info/$course_ID", 'Delete', array('title' => 'Student\'s profile')); ?> </td>              
                </tr>
                
            </table>
            </fieldset>
            
            
        <?}
        else {
            echo "No match with course id can be found";
        }
        ?>
    </body>
</html>


