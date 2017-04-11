<?php  

include('trip.php');
include('trip_dao.php');

class ShowTripsService {
    
    public function getTripArray() {
        $tripDao = new TripDao();
        $db = $tripDao->getDbHandle();
        $tripArray = $tripDao->getTripData($db);
        $db->close();
        
        return $tripArray;
        
    }
 
}


?>