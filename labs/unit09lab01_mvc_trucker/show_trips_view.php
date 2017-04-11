<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Age Message</title>
   <link rel="stylesheet" href="reset.css" />
   <link rel="stylesheet" href="trucker.css" />
   
</head>
<body>
    
<header>
  <hgroup>
     <h1>Trucker trips</h1>
  </hgroup>
</header>
<article>
<?php
    include('trip.php');     
    session_start();
 
    $tripArray = $_SESSION["trips"];
    $arrlength = count($tripArray);
    for($x = 0; $x < $arrlength; $x++) {
        echo $tripArray[$x]->getTripMessage()."<br>";
    }
  
?>
</article>
<?php require 'trucker-footer.php';?> 
</body>
</html>