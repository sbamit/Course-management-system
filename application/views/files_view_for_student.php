<html>
    <head>
        <title>Viewing Files</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    
    <body>
        <div id="all_content">
            
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
              <div id="side_bar">
                <?php echo anchor('homepages/students_homepage', 'Home', array('title' => 'Teacher\'s courses')); ?>
                <?php echo "<br/>"; ?>
                <?php echo anchor("control_course_homepages/see_course_home_page/$course_identity","Back"); ?>
                <?php  echo "<br/>";?>
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div> 
            
            
               <div id="label">
                 <?php
                    $course_name = explode("_", $course_identity);

                 ?>
                <h3><?php echo $course_name[0]." ".$course_name[1]; ?> Files :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
            
            <div id="main_content">
                
                  <table>
                    <tr class="one">
                        <th>FileName</th>
                        <th>File Info</th>
                        <th>Author</th>
                         <th>Time of Upload</th>
                        <th>Download File</th>

                    </tr>

                    <?php if($query->num_rows() >0 ): foreach ($query->result() as $row) : ?>
                    <tr class="another">
                        <td> <?php echo $row->file_name ?> </td>
                        <td> <?php echo $row->file_info ?> </td>
                        <td> <?php echo $row->author ?> </td>
                        <td> <?php  echo $row->upload_date; ?> </td>
                        <td> <?php echo anchor("files_control/download_a_file_in_this_course/$row->file_ID","Download", array('class' => 'download')); ?> </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </table>

                
            </div>
            
            
        </div>
        

       
    </body>
</html>