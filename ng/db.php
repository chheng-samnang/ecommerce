<?php

	$conn = new mysqli('localhost','root','123456','ecommerce_db');
	$conn->set_charset('utf8');
	$conn->query("SET collation_connection = utf8_general_ci");
	if (mysqli_connect_errno()) 
	{
		die("failed to connect, the error message is:".mysqli_connect_error());
	}
?>