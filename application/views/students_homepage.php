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
                
                <?php echo anchor("welcome/course_registration/$student_id", 'Course Reg', array('title' => 'Student\'s course reg')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
        
        </div>
        
        <div id="main_content">
            <div id="label">
                <h3>Home :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
            
            <?php
            /*<div id="profile_picture">
            <img src='<?=base_url()?>profile_pictures/Photo.jpg' title="photo.jpg" />
            </div>
             */
            ?>
            
            <table>
                <tr class="one">
                    <td> <label>Student ID:</label> </td>
                    <td> <?php echo " ".$this->session->userdata('std_ID'); ?> <br/> </td>
                </tr>
                
                <tr class="another">
                    <td> <label>Name: </label></td>
                    <td> <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname');?> </td>
                </tr>
                
                <tr class="one">
                    <td> <label> Department: </label> </td>
                    <td> <?php echo " ".$this->session->userdata('dept'); ?> </td>    
                </tr>
                
                <tr class="another">
                    <td> <label>Level: </label></td>
                    <td> <?php echo " ".$this->session->userdata('level'); ?> </td>
                </tr>
                
                <tr class="one">
                    <td> <label> Term: </label> </td>
                    <td> <?php echo " ".$this->session->userdata('term'); ?> </td>
                </tr>
            </table>
            
        </div>
        
        
          <br/>
          <br/>
        
        
        
        
    </body>
</html>