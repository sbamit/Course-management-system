<html>
    <head>
        <title>Teacher's course home page</title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    
    <body>
        <div id="all_content">
            
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            
             <div id="side_bar">
                    <?php echo anchor('homepages/teachers_homepage', 'Home', array('title' => 'Teacher\'s courses')); ?>
                    <?php echo "<br/>"; ?>
                    <?php echo anchor("files_control/show_files_list/$course_ID","Files section", array('class' => 'files_section')); ?>
                    <?php echo "<br/>"; ?>
                    <?php echo anchor("marks_sheet_control/show_marks_list/$course_ID","Marks Sheet", array('class' => 'marks_sheet')); ?>
                    <?php echo "<br/>";?>
                    <?php echo anchor("course_list_pages/teachers_course_list_page","Back",array('class'=>'Back')); ?>
                   <?php echo "<br/>"; ?>
                    <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
             </div>
            
               <div id="label">
                    <h3><?php echo "$course_no"; ?> :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
                </div>
            
                 <div id="main_content">
                     
                      <div id="tab"> 
                          <table>
                              <tr class="one">
                                  <td>Course ID:</td>
                                  <td> <?php echo "$course_ID" ?> </td>
                              </tr>
                              <tr class="another">
                                  <td> Course Name: </td>
                                  <td><?php echo "$course_name"; ?></td>                                  
                              </tr>
                              <tr class="one">
                                  <td> course Type:  </td>
                                  <td> <?php
                                                 if ($course_type == 'T')    echo "Theory";
                                                else if($course_type =='S') echo "Sessional";
                                                else echo "Undefined";
                                            ?> 
                                  </td>                                  
                              </tr>
                              <tr class="another">
                                  <td> Level:  </td>
                                  <td> <?php echo "$level"; ?> </td>                                  
                              </tr>
                              <tr class="one">
                                   <td>Term:</td>
                                  <td> <?php echo "$term";?> </td>                                 
                              </tr>
                              <tr class="another">
                                  <td> Department:  </td>
                                  <td> <?php echo "$dept"; ?> </td>                                  
                              </tr>
                              <tr class="one">
                                  <td> Credit Hours: </td>
                                  <td> <?php echo "$course_credit";?> </td>                                  
                              </tr>
                          </table>
                      </div>
                    
                 </div>
            
        </div>
        
        
    </body>
</html>