<?php

// Connecting to a data base
$db = mysqli_connect('localhost', 'root', '', 'assignmentdb');

// Error message if unable to connect to the server
if ( $db === FALSE ){
	die('ERROR: Unable to connect to the databse.'.mysql_connect_error());
}

?>