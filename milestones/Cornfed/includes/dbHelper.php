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
            $sql = "insert into commentSystem (name, email, phone, comment) values 
            (\"$name\", \"$email\", \"$phone\", \"$comment\");";
            $db->query($sql) === TRUE;
?>
<?php

    if ($db->query($sql) === TRUE) 
        {
            echo "<div class=\"centered\">Thanks for giving us your feedback!</div>";
        } 
    else 
        {
            echo "<div class=\"centered\">Error: " . $sql . "<br /></div>" . $conn->error;
        }
    
    $db->close();
?>