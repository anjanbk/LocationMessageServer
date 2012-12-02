<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
 
class DB_Functions {
 
    private $db;
 
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
 
    }
 
	/**
	* Storing new user
	* returns user details
	*/
	public function storeUser($facebook_username, $regId) {
		// insert user into database
		$result = mysql_query("INSERT INTO User VALUES('$facebook_username', '$regId')");
		// check for successful store
		if ($result) {
		    // get user details
		    $id = mysql_insert_id(); // last inserted id
		    $result = mysql_query("SELECT * FROM User WHERE id = $id") or die(mysql_error());
		    // return user details
		    if (mysql_num_rows($result) > 0) {
			return mysql_fetch_array($result);
		    } else {
			return false;
		    }
		} else {
		    return false;
		}
	}
 
	/**
	* Getting all Messages
	*/
	public function getAllMessages() {
		$result = mysql_query("select * FROM Message;");
		return $result;
	}
 
	public function getAllUsers() {
		$result = mysql_query("select * FROM User;");
		return $result;
	}
}
 
?>
