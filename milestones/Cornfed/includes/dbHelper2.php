<?php
    define('DB_CONN', 'mysql:host=localhost;dbname=cornfed');
    define('DB_USER', 'katbreitin');
    define('DB_PASS', '');
?>
<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "cornfed";
    $dbport = 3306;
                    
    // Create database connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
                    
    // Check if database connection was created
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    //echo "Database connection created successfully";
?>

<?php
            $sql = "INSERT into SignUp (fname, lname, email, password, phone, dateofbirth, workstatus, company) values 
            (\"$fname\", \"$lname\",\"$email\",\"$password\", \"$phone\", \"$dateofbirth\",\"$workstatus\",\"$company\")";
            $db->query($sql) === TRUE;
?>
<?php

    if ($db->query($sql) === TRUE)
        {
            echo "<div class= \"centered\">Congrats on your new membership!</div>";
        } 
    else 
        {
            echo "<div class=\"centered\">Error: " . $sql . "<br /></div>" . $conn->error;
        }
    
    $db->close();
?>