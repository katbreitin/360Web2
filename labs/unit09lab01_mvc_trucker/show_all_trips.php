<?php
    include('open_db_connection.php');
    include('trip.php');    
    
    $truckerName = '';
    $tripName = '';    
    $miles = '';  
    $hours = '';
    
     $sql = "select tru.trucker_name,
                    tri.trip_name,
                    sum(l.miles) miles,
                    sum(l.hours) hours
            from trucker tru
            inner join trip tri
            on tru.id = tri.trucker_id
            inner join leg l
            on tri.id = l.trip_id
            group by tru.trucker_name, tri.trip_name
            order by tru.trucker_name;";
    
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $truckerName = $row["trucker_name"];
            $tripName = $row["trip_name"];
            $miles = $row["miles"];
            $hours = $row["hours"];           
            
            $trip = new Trip($truckerName,$tripName,$miles,$hours);
            echo $trip->getTripMessage()."<br>";          
        }
    } else {
        echo "0 rows in the member table";
    } 
    
    $db->close();

?>     
    
<p><a href="index.php">Home</a></p>
