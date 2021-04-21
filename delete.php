<?php
session_start();
include('include/connect.php');	
$stmt= $con->prepare("DELETE FROM SUBSCRIBERS WHERE SUBSCRIBER_ID = ?");
$stmt->execute(array($sub_id));
echo "delete succefully";		
echo "hello";
		?>