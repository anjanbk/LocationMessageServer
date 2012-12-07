<?php

include_once './db_connect.php';
// connecting to database
$db = new DB_Connect();
$db->connect();

$result = mysql_query("select * from User;");

$rows = array();
while ($r = mysql_fetch_assoc($result))
	$rows[] = $r;

echo json_encode($rows);

?>
