<?php 
    include('includes/header.inc.php');
?>
            
            <?php
                //collecting form data and storing them into variables
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $comment = trim($_POST['comments']);
                
                 ?>
                 
                 <?php  
                 
                 if(isset($_POST['contact'])) {
                    print_r($_POST);
                    
                    // echo "form was submitted";
                 }
                 
                 ?>
                 
                   <?php
                    echo "<div style=\"width: 50%;margin: auto;\">";
                    echo "<br /><p class=\"centered\"><b>Thank You</b></p>";
                    echo  "<p>Name: <strong>" . $name . "</strong></p>";
                    echo  "<p>Email: <strong>" . $email . "</strong></p>";
                    echo  "<p>Phone: <strong>" . $phone . "</strong></p>";
                    echo  "<p>Comments: <strong>". $comment ."</strong></p>";
                    echo "</div>";
                    ?>
                    </div>
<?php
    //sending data to the database
    include('includes/dbHelper.php');
?>
<?php 
    include('includes/nav.inc.php');
    include('includes/footer.inc.php');
?>