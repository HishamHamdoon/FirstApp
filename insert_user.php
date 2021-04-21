<?php
include("include/connect.php");
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt =$con->prepare('INSERT INTO users 
		( 
		USERNAME, 
		 PASSWORD,
		  USER_GROUP,
		   CREATED_AT) VALUES(?,?,1,now())');
	if($stmt->execute(array($username,$password))){
	echo "user added succefully";}else{echo "not done";}

 