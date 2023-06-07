<html>
    <head>
        <title> Course : Search Result </title>
        <link rel="stylesheet" href='<?=base_url()?>css/homepage_style.css' type="text/css" media="screen, projection" />
    </head>
    <body>
    
<?php
//echo "students list will be shown here";
if($query->num_rows()>0) {
    //foreach ($query->result() as $row)
    //{
       //echo $row->std_ID." ".$row->firstname." ".$row->lastname."<br/>";
    //}?>
    <table id ="tab">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Course Type</th>
        </tr>
        <?php foreach($query->result() as $row) {
            ?>
            <tr>
            <td><?php echo $row->course_ID; ?></td>
            <td><?php echo $row->course_name; ?></td>
            <td><?php if($row->course_type == 'S') echo "Sessional"; else echo "Theory";  ?></td>
            <td><?php echo anchor("admin_control/update_courses_info/$row->course_ID", 'Edit')?></td>
            <td><?php echo anchor("admin_control/delete_courses_info/$row->course_ID", 'Delete') ?></td>
        </tr>
        <?php
        }
         ?>
        
    </table>
    <?php
}
else{//no student found in this dept-level-term
    echo "no Course found according to your query";
}

?>
    </body>
</html>

