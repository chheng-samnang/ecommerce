<?php
 	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

		include("db.php");
	$id = $_GET['id'];

	//=============Note $id -> 0 = Book but not Active, 1 = Book and Active, 2 = Customer arrive

	$result = $conn->query("SELECT customer_name FROM tbl_book where tab_id=$id and status='1'");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["customer_name"] . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>