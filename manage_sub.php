<?php
session_start();
include('include/connect.php');
include('include/header.php');

$do = isset($_GET['do']) ? $_GET['do']:'Manage';

if($do =="manage"){
	//manage page
	echo "welcome in mange";

}elseif($do =="edit"){
	//edit pag
	echo "welcome in edit";

}elseif($do =="delete"){//delete subscriber
 

	 
$sub_id = isset ($_GET['sub_id'])&& is_numeric($_GET['sub_id'])? intval($_GET['sub_id']):0;

		$stmt = $con->prepare("DELETE FROM SUBSCRIBERS WHERE SUBSCRIBERS_ID = ?");
		$stmt->execute(array($sub_id));

echo "<div class='container alert alert-success'>Subscriber Deleted Successfully'</div>";

}elseif($do =="edit"){

	echo "welcome in edit";

}
