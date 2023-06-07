<html>
    <head>
        <title>Student : Home</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
        
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="side_bar">
                <?php echo anchor('welcome/see_courses_of_student', 'See Courses', array('title' => 'Student\'s courses')); ?>
                <?php echo "<br/>"; ?>
                
                <?php  $student_id= $this->session->userdata('std_ID'); ?>
                
                <?php echo anchor("homepages/students_homepage", 'Back', array('title' => 'Student\'s course reg')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
        
        </div>
        
        <div id="main_content">
            <div id="label">
                <h3>Course Registration :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
            
             <?php
             if($query->num_rows() >0) {
                 echo 'courses are';
                 ?>
            <?php echo form_open("welcome/regsiter_courses_for_this_student/$student_id"); ?>
            <fieldset style="">
                <legend style="width: 100%; text-align: center; background: blue; color: white; ;border-radius: 15px"> Offered Courses </legend>
                <table id ="tab">
                    <tr>
                        <th>Course No</th>
                        <th>Course Name</th>
                        <th>Course Credits</th>
                        <th>Course Type</th>
                        <th>Department</th>
                        <th>Select</th>
                    </tr>
<?php   foreach ($query->result() as $row): ?>
                    <tr>
                        <td> <?php echo $row->course_no;?> </td>
                        <td> <?php echo $row->course_name ?> </td>
                        <td> <?php echo $row->course_credit ?> </td>
                        <td> <?php  if($row->course_type == 'T') echo "Theory"; else echo "Sessional"; ?> </td>
                        <td> <?php echo $row->dept ?> </td>
                        <td> <input type="checkbox"name="check_courses[]" value=<?php echo $row->course_ID?> />

 <?php //echo form_checkbox($checked_courses[], $row->course_ID, TRUE); ?> </td>
                    </tr>
                     
<?php                 endforeach;                       ?>
                 
                    
                <tr>
                    <td colspan="6"> <?php echo form_submit('confirm','Submit'); ?> </td>                      
                </tr>
                
            </table>
            </fieldset>     
            
            
            <?php
             }
             else
                 echo "No course to register for this level-term";
             ?>
         
            
        </div>
        
        
          <br/>
          <br/>
        
        
        
        
    </body>
</html>
