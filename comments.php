<?php
include("include/connect.php");
include("include/header.php");
//form variable 
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
if (isset($_POST['submit'])) {
	//insert the comment
$stmt = $con->prepare("INSERT INTO COMMENTS (COMMENTER_NAME,COMMENT_EMAIL,COMMENT,COMMENT_SUBJECT,COMMENTED_AT) VALUES (?,?,?,?,now()) ");

$stmt->execute(array($name,$email,$message,$subject));
echo "<div class='container	 alert alert-success'>Thank you for your comment Mr {$name}</div>";
header("location:index1.php");
	 
} else {

}


?>
