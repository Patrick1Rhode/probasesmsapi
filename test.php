<?php
require 'class-probase.php';
function sendsms($phone,$m){
	

try
{
		$API_KEY = "password";
    // Create a probase object
    $probase = new Probase( $API_KEY );

    // Setup and send a message
    $message = array( 'to' => "$phone", 'message' => "$m" , 'from' => "NAPSA");
    $result = $probase->send( $message );

    // Check if the send was successful
   
}
catch (ProbaseException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}
}

sendsms("260972148199","hey Patrick");
?>
