<html>
    <head>
        <title> Teacher : Search Result </title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
    
<?php
//echo "students list will be shown here";
if($list_of_course_teachers->num_rows()>0) {
    //foreach ($query->result() as $row)
    //{
       //echo $row->std_ID." ".$row->firstname." ".$row->lastname."<br/>";
    //}?>
        Teacher's list for <?php echo $course_ID  ?> course:- 
    <table id ="tab">
        <tr>
            <th>Teacher ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Remove</th>
        </tr>
        <?php foreach($list_of_course_teachers->result() as $course_teacher) {
            ?>
            <tr>
            <td><?php echo $course_teacher->teacher_ID; ?></td>
            <td><?php echo $course_teacher->firstname; ?></td>
            <td><?php echo $course_teacher->lastname ?></td>
            <td><?php 
                       
            echo anchor("admin_control/remove_teacher_from_this_course/$course_teacher->teacher_ID/$course_ID", 'Remove')
                    ?>
            </td>
        </tr>
        <?php
        }
         ?>
        
    </table>
        
        
    <?php
    
}
else{//no student found in this dept-level-term
    echo "no teacher found according to your query";
}
?>
        <?php echo form_open("admin_control/assign_teacher_to_this_course/$course_ID"); ?>
        <table id ="tab">
            <tr>
                <td>
                    <?php echo form_dropdown('available_teachers',$list_of_dept_teachers ,' '); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo form_submit('confirm','Add Teacher To This Course'); ?>
                </td>
            </tr>
        </table>
    </body>
</html>
