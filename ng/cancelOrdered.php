<?php
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$id = $_GET['id'];
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=restaurant_management_system", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	$sql = "UPDATE tbl_order_det set status='2' where ord_det_id=$id";# sta=0 -> unpaid,1 -> paid, 2 -> unpaid 
	    	$conn->exec($sql);
	    	echo "Record updated successfully!";
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	$conn = null;
?>