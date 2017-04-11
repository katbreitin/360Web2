insert into trucker (trucker_name) values ("Ann"), ("Bob"), ("Tom");

create table trucker(
id int unsigned not null auto_increment primary key,
trucker_name varchar(10) not null
);


create table trip(
id int unsigned not null auto_increment primary key,
trip_name varchar(10) not null,
trucker_id int unsigned not null
);

insert into trip
(trip_name, trucker_id) 
values 
("A", 1),
("B", 2),
("CD", 2),
("T", 3),
("UV", 3),
("WYX", 3);

select tru.trucker_name,
       tri.trip_name
from trucker tru
inner join trip tri
on tru.id = tri.trucker_id;


create table leg(
id int unsigned not null auto_increment primary key,
miles float(5,2) not null,
hours float(5,2) not null,
trip_id int
);

insert into leg
(miles, hours, trip_id)
values
(55,1.1,1),
(55,0.9,1),
(47,1.2,2),
(47,0.9,2),
(20,0.5,3),
(40,0.95,3),
(25,0.75,3),
(60,1.3,4),
(60,0.9,4),
(45,0.9,5),
(22,0.75,5),
(55,1.5,5),
(45,0.8,6),
(20,0.29,6),
(19,0.30,6),
(22,0.31,6);

select tru.trucker_name,
       tri.trip_name,
       sum(l.miles),
       sum(l.hours)
from trucker tru
inner join trip tri
on tru.id = tri.trucker_id
inner join leg l
on tri.id = l.trip_id
group by tru.trucker_name, tri.trip_name
order by tru.trucker_name;



************************

parameshwari addula [5:24 PM] 
In show_trips_view i have used   $log->logThisMsg($logLevel ,$message);


Below are detailed hints to assist you in completing
the MVC app lab assigned on Tues. 3/14.
After you have created and tested the trucker trip
logging app as described in the Lesson 7 lab from
last quarter then refactor that app per the instructions
from the MVC app lab assigned on 3/14 (Unit 9).
Below are additional details to assist you.
Note:  I posted the completed code for last quarter's
Lesson 7 lab on Slack in the Resources channel.  I also 
created another posted where I attached a file containing
all the SQL for the lab.
Action #1
=========
Create the following files in the mvc_app workspace:
show_trips_controller.php
show_trips_service.php
The code for these files are shown 
in the lab PPT.
Action #2
=========
Create the following file in the mvc_app workspace:
show_trips_view.php
The code for this file is shown just below:
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

Action #3
=========
Create a file named trip_dao.php
The code for this file is shown just below:

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
Action #4
=========
Change the index.php script so the link points to
show_trips_controller.php