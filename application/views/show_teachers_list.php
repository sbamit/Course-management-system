<html>
    <head>
        <title> Teacher : Search Result </title>
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
            <th>Teacher ID</th>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php foreach($query->result() as $row) {
            ?>
            <tr>
            <td><?php echo $row->teacher_ID; ?></td>
            <td><?php echo $row->firstname; ?></td>
            <td><?php echo $row->lastname ?></td>
            <td><?php echo anchor("admin_control/update_teachers_info/$row->teacher_ID", 'Edit')?></td>
            <td><?php echo anchor("admin_control/delete_teachers_profile/$row->teacher_ID", 'Delete') ?></td>
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
    </body>
</html>
