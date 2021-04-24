<?php
session_start();
include('include/connect.php');	
$user_id = $_GET['user_id'];
$stmt= $con->prepare("DELETE FROM users WHERE USER_ID = ?");
$stmt->execute(array($user_id));
echo "delete succefully";		
// header("location : dashboard.php");
// echo "hello";
		?>