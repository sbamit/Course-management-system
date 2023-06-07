<html>
    <head>
        <title> File upload form </title>
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
                <?php echo anchor("files_control/show_files_list/$course_identity","Back"); ?>
                <?php  echo "<br/>";?>
                <?php echo anchor('welcome/logout', 'Log out', array('title' => 'Logout')); ?>
            </div>
            
            <div id="label">
                <h3> Upload a File :: <?php echo " ".$this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?> </h3>
            </div>
           
            
            <div id="main_content">
                    <?php echo form_open_multipart("files_control/add_new_file_to_this_course/$course_identity"); ?>
                        
                 
                    <?php
                        $options = array(
                              'e-book'  => 'E-Book',
                              'lecture'    => 'Class Lecture',
                              'external'   => 'External Resource',
                              'assignment' => 'Assignment',
                            );
                    ?>
                
                
            <fieldset>
                 <legend style="width: 100%; text-align: center; background: blue; color: white ;border-radius: 15px"> Upload Your File </legend>
                    <?php echo validation_errors(); ?>
                     <p>Maximum allowable size is 50 Mega Bytes</p>
                 
                <table id="tab">
                    <tr>
                        <td> <label for="file">Upload File:</label> </td>
                        <td> <input type="file" name="file" id="file" /> </td>
                    </tr>
                    <tr>
                        <td> <label for="file_info">File Type: </label> </td>
                        <td>   <?php echo form_dropdown('file_info',$options,'book');?> </td>                        
                    </tr>
                    <tr>
                        <td colspan="2"> <?php echo form_submit('upload','Upload'); ?> </td>                      
                    </tr>
                </table>
             </fieldset>   
                        
                         
                        
                      
                      
                    
            </div>
            
        </div>
        
       
    
    </body>
</html> 