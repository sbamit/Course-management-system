<html>
    <head>
        <title>Students Course List Page</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    
    <body>
        <div id="all_content">
             <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
             <div id="side_bar">
                <?php echo anchor('homepages/students_homepage', 'Home', array('title' => 'Go Home')); ?>
                 <?php echo "<br/>" ;?>
                 <?php echo anchor('homepages/students_homepage', 'Back', array('title' => 'Go Back')); ?>
                <?php echo "<br/>"; ?>
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
              </div>    
                
            
            <div id="label">
                <h3>Registered Courses :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
            
            
            
            <div id="main_content">
                
                <ul>
                  <?php
                        if($query->num_rows()>0) {
                            foreach ($query->result() as $row) { ?>
                            <li>
                    <?php
                       
                    //echo $row->course_ID."  ";

                            $string = "$row->course_ID";
                            $tok = strtok($string, "\_");

                            $i=0;
                            while ($tok !== false) {
                            $str[$i] = $tok;
                            $tok = strtok("\_");
                            $i++;
                            }


                           echo anchor("control_course_homepages/see_course_home_page/$row->course_ID", $str[0]." ".$str[1], array('class' => 'course_no'));
                            echo "<br/>";
                            } ?>
                                </li>
                           <?php
                        }
            
                ?>
                </ul>
            </div>
            
        </div>
        

        
        
    </body>
</html>