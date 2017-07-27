<?php
	include("db.php");

$conn->query("DELETE from tbl_order_det where ord_det_id=$id");
?>