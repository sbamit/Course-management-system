<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href='<?=base_url()?>css/style.css' type="text/css" media="screen, projection" />  
    </head>
    
    <body>
        <div id="all_content">
            <div id="header">
                <h1>COURSE MANAGEMENT SYSTEM</h1>
            </div>
            
            <div id="sidebar"></div>
            
            <div id="main_content">
                
                <div id="label">
                    <h3>Log in, please</h3>
                </div>
                
                <div id='login_form'>
               
              <fieldset> 
                <?php echo form_open('welcome/validate_authenticity'); ?>
                <table>
                    <tr>
                        <td> <label>User name:</label> </td>
                        <td> <?php echo form_input('username',''); echo "<br/>"; ?> </td>
                    </tr>
                    <tr>
                        <td> <label>Password:</label> </td>
                        <td> <?php echo form_password('password',''); echo "<br/>"; ?> </td>
                    </tr>
                </table>
                 
                
                <?php echo form_submit('submit','Login'); ?>
              </fieldset>
                
            </div>
                
            </div>
            
            <div id="footer"></div>
        </div>
    </body>
</html>