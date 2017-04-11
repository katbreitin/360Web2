<?php
include('constants.php');
include('log4php/Logger.php');

   class LogUtil {

       private $log;
       
       public function __construct(){
          Logger::configure('config.xml');
          $this->log = Logger::getLogger('myLogger');  
       }       

       public function logThisMsg($logLevel, $message){
          $this->log->$logLevel($message);             
       }
       
} 
?>
