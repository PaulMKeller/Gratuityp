<!DOCTYPE html>
<html>
    <head>
        <title>www.gratuityp.com</title>
    </head>
    <body>
        <?php

        /*
        if (PHP_SAPI === 'cli') {
            $email = $argv[1];
            $firstname = $argv[2];
            $lastname = $argv[3];
            $country = $argv[4];
        }
        else {
            $email = $_GET['email'];
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            $country = $_GET['country'];
        }
        */
        
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $country = $_POST['country'];

        $serverName = "db638520808.db.1and1.com"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"db638520808", "UID"=>"dbo638520808", "PWD"=>"Register2016!");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

        if( $conn ) {
            //echo "Connection established.<br />";
        }else{
             echo "Connection could not be established.<br />";
             die( print_r( sqlsrv_errors(), true));
        }
        
        $sql = "EXEC sp_gratuityp_registration_Insert @EmailAddress=?, @FName=?, @LName=?, @Country=?";
        $params = array($email, $firstname, $lastname, $country);
        $stmt = sqlsrv_query( $conn, $sql, $params);

        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
        echo "<br />";
        echo "Thanks for registering your interest, we will contact you soon.<br />";
        echo "<br />";
        echo "<br />";
        echo "<a href='http://www.gratuityp.com'>Back to Gratuityp.com</a>";  
            
        ?>
    </body>
</html>