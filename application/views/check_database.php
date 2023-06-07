<html>
    <head>
        <title>Checking database</title>
    </head>
    <body>
        <h1>Checking database connection here...</h1>
         <h2> Teachers... </h2>
        <?php if (isset($records)) : foreach($records as $row) :?>
       
        <h3> <?php echo $row->teacher_ID ?> 
             <?php echo $row->firstname ?> 
             <?php echo $row->lastname ?> </h3>
        <?php endforeach;?>
        <?php else : echo "nothing"?>
        
        <?php endif;?>
    </body>
    
   <?php //So, Now I'm sure that the database is working  ?> 
</html>