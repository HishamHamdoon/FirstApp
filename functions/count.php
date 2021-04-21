<?php 
include("include/connect.php");
function countSubscribers()
{
	global $con;

	$stmt = $con->prepare("SELECT * FROM subscribers");

	$stmt->execute();
   
  	 return $stmt->rowCount();

}
 
function countJobOfCountry($country)
{

	global $con;

	$stmt = $con->prepare("SELECT *  FROM JOB WHERE JOB_COUNTRY = ?");

	$stmt->execute(array($country));
   
   return  $stmt->rowCount();
   
}
function countUsers()
{

	global $con;

	$stmt = $con->prepare("SELECT *  FROM  USERS");

	$stmt->execute();
   
   return  $stmt->rowCount();
   
}
function countComments()
{

	global $con;

	$stmt = $con->prepare("SELECT *  FROM COMMENTS");

	$stmt->execute();
   
   return  $stmt->rowCount();
   
}
function countJobs()
{

	global $con;

	$stmt = $con->prepare("SELECT *  FROM JOB");

	$stmt->execute();
   
   return  $stmt->rowCount();
   
}
//count the number of comments

 
// function calculateItem($item, $table){

//     global $con;

//     $stmt = $con->prepare("SELECT COUNT($item) FROM $table");

//    $stmt->execute();
   
//    return $stmt->fetchColumn();
// }

?>
