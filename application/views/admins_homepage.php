<html>
    <head>
        <title> Admin : Home </title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    
    <body>
        
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="side_bar">
                <?php echo anchor('admin_control/create_students_profile', 'Add Student', array('title' => 'Student\'s profile')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('admin_control/search_students_profile', 'Search Student', array('title' => 'Student\'s profile')); ?>
                <?php echo "<br/>"; ?>
                           
                <?php echo anchor('admin_control/create_teachers_profile', 'Add Teacher', array('title' => 'Teachers\'s profile')); ?>
                <?php echo "<br/>"; ?>
               
                <?php echo anchor('admin_control/search_teachers_profile', 'Search Teacher', array('title' => 'Teachers\'s profile')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('admin_control/create_new_course', 'Add Course ', array('title' => 'Course\'s info')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('admin_control/search_course', 'Search Course ', array('title' => 'Course\'s info')); ?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('admin_control/start_new_semester','New Semester',array('title' => 'New Semister') );?>
                <?php echo "<br/>"; ?>
                
                <?php echo anchor('admin_control/reassign_courses_to_teachers','Assign course',array('title'=>'Reassign course'));?>
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
            
            
            
        </div>
        
        
          <br/>
          <br/>
        
        
        
        
    </body>
</html>
