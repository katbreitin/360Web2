<?php 

include('show_trips_service.php');

/* The first job of the controller is to receive the request. 
In this case there are not any query or post parameters on the request object */ 

/* The 2nd job of the controller is to orchestrate other server side componets for the ultimate purpose of creating the model */


$showTripsService = new ShowTripsService();
$tripArrayModel = $showTripsService->getTripArray();

/*The model will be stored in the session object as a key value pair */


session_start();
$_SESSION["trips"] = $tripArrayModel;

/*The final job of the controller is to redirect processing to the view.  The view php module will use the dynamic dates in the model to render the dynamic output that will 
delivered in there respons to the clinet (browser). */

// Redirt to the view 

header("location: show_trips_view.php");

?>