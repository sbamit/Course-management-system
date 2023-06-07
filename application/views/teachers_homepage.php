<html>
    <head>
        <title>Teacher : Home</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
      <div id="all_content">
        
        <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
        </div>
        
        <div id="side_bar">
            <?php echo anchor('welcome/see_courses_of_teacher', 'See Courses', array('title' => 'Teacher\'s courses')); ?>
            <?php echo "<br/>"; ?>
            <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
        </div>           
        
            <div id="label">
                <h3>Home :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>


        
        <div id="main_content">
        


           
        <?php           
        /*<div id="profile_picture">
          <img src='<?=base_url()?>profile_pictures/Photo.jpg' title="photo.jpg" />
        </div>*/
           ?>
         <div id="tab">   
            <table>
                <tr class="one">
                    <td> <label>Teacher ID:</label> </td>
                    <td> <?php echo " ".$this->session->userdata('teacher_ID'); ?> </td>
                </tr>
                
                <tr class="another">
                    <td> <label>Name: </label></td>
                    <td> <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </td>
                </tr>
                
                <tr class="one">
                    <td> <label> Department: </label> </td>
                    <td> <?php echo " ".$this->session->userdata('dept'); ?> </td>    
                </tr>
                
                <tr class="another">
                    <td> <label>Faculty: </label></td>
                    <td> <?php echo " ".$this->session->userdata('faculty'); ?> </td>
                </tr>
                
                <tr class="one">
                    <td> <label> Designation: </label> </td>
                    <td> <?php echo " ".$this->session->userdata('designation'); ?> </td>
                </tr>
            </table>
        
         </div>
        </div>
        
        

        

      </div>
    </body>
</html>