<?php

include('constants.php');
include('log_util.php');

class Trip {
    
    protected $logger;   
       
    public $truckerName;
    public $tripName;    
    public $miles;
    public $hours;
    
    const TOOSLOW = 'Speed it up!';   
    const TOOFAST = 'Slow it down!'; 
    const GOODJOB = 'Good Job!'; 

      
    public function __construct($truckerName,$tripName,$miles,$hours){  
        $this->truckerName = $truckerName;
        $this->tripName = $tripName; 
        $this->miles = $miles;    
        $this->hours = $hours;  
        $this->logger = new LogUtil();         

    }

	public function getTripMessage(){
        $mph = (int)($this->miles/$this->hours);
        $msg = "On trip ".$this->tripName.", ".$this->truckerName." drove ".$mph." mph. ".$this->speedComment($mph); 
        $logLevel = $this->getLogLevel($mph);      
	    $this->logger->logThisMsg($logLevel,$msg);          
        return $msg;  
    } 

	function speedComment($mph){
	    
        if ($mph < 40) {
            return self::TOOSLOW;
            
        } elseif ($mph > 60) {
            return self::TOOFAST;
        } else {
            return self::GOODJOB;
        }
	} 

	function getLogLevel($mph){
	    
        if (($mph < 40) || ($mph > 60)){
            return WARN;
        } else {
            return INFO;
        }
	} 	

}
?>