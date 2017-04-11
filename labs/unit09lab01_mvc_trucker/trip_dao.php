<?php
include('constants.php');
class TripDao {
    public function getDbHandle(){
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "c9";
        $dbport = 3306;
        $db = new mysqli($servername, $username, $password, $database, $dbport);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    
        return $db;
    }
    
    public function getTripData($db){
                
        $truckerName = '';
        $tripName = '';    
        $miles = '';  
        $hours = '';
    
        $tripData = array();
        $logger;
        $this->logger = new LogUtil();      
    
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
    
        $resultSet = $db->query($sql);
    
        if ($resultSet->num_rows > 0) {
            while($row = $resultSet->fetch_assoc()) {
                $truckerName = $row["trucker_name"];
                $tripName = $row["trip_name"];
                $miles = $row["miles"];
                $hours = $row["hours"];           
                $trip = new Trip($truckerName,$tripName,$miles,$hours);
            
                //$this->logger->logThisMsg(INFO,"truckerName = ".$trip->truckerName);            
            
                array_push($tripData, $trip);            
            }   
        } else {
            echo "0 rows returned from query";
        }     
        // This code needed to write trip msg to log file
        for($x = 0; $x < count($tripData); $x++) {
            $tripData[$x]->getTripMessage();
        }
        return $tripData;
        
    }   
}
?>       