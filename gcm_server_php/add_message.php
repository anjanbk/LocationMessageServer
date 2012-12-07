<?php

	//if (isset($_POST["sender_id"]) && isset($_POST["receiver_id"]) && isset($_POST["time"]) && isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["loclat"]) && isset($_POST["loclong"])) {
		$sid = $_POST["sender_id"];
		$rid = $_POST["receiver_id"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];
		$loclat = $_POST["loclat"];
		$loclong = $_POST["loclong"];
		
		// Store user details in db
		include_once './db_functions.php';
		include_once './GCM.php';

		$db = new DB_Functions();
		$res = $db->addMessage($sid,$rid,date("Y-m-d H:i:s"),$loclat, $loclong, $subject,$message,1);

		// Send message to receiver
		$gcm = new GCM();

		$registration_ids = array($rid);
		$message = array("message" => $message);

		$result = $gcm->send_notification($registration_ids, $message);
		echo "SUCCESS";
	/*
	} else
		echo "FAIL\n";
	*/
?>
