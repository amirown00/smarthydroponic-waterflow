<?php 

	// connect to the database
	$conn = mysqli_connect('127.0.0.1', 'root', '', 'signup');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>