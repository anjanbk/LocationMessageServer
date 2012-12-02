<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if (isset($_GET["regId"]) && isset($_GET["message"])) {
	$regId = $_GET["regId"];
	$message = $_GET["message"];
	error_log("Message:" . $message, 0);

	include_once './GCM.php';

	$gcm = new GCM();

	$registration_ids = array($regId);
	$message = array("price" => $message);

	$result = $gcm->send_notification($registration_ids, $message);

	echo $result;
}
?>
