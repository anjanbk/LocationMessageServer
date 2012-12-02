<?php
 
echo "Hello!";
// response json
$json = array();
 
/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_POST["uname"]) && isset($_POST["regId"])) {
	$uname = $_POST["uname"];
	$registrationId = $_POST["regId"];

	// Store user details in db
	include_once './db_functions.php';
	include_once './GCM.php';

	$db = new DB_Functions();
	$gcm = new GCM();

	$res = $db->storeUser($uname,$registrationId);

	$registration_ids = array($registrationId);
	$message = array("product" => "shirt");

	$result = $gcm->send_notification($registration_ids, $message);
	

	echo $result;
}
else {
    // user details missing
	echo "FOOBAR";
}
?>
