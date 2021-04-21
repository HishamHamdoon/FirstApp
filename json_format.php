<?php
include_once('include/connect.php');
$stmt = $con->prepare("SELECT * FROM job");
$stmt->execute();

if($stmt->rowCount() > 0){
	while ($rows = $stmt->fetch()) {
	$job_id = $rows['JOB_ID'];
	$job_name = $rows['JOB_NAME'];
	$job_desc = $rows['JOB_DESCRIPTION'];
	$job_email = $rows['JOB_EMAIL'];
	$job_company = $rows['JOB_COMPANY'];
	$job_country = $rows['JOB_COUNTRY'];
	$job_image = $rows['JOB_IMAGE'];
	$job_created_at = $rows['CREATED_AT'];
	$job_end_at = $rows['END_AT'];
	$result[] = array
	('job_id'=>$job_id,'job_name'=>$job_name,'job_desc'=>$job_desc,'job_email'=>$job_email,'job_company'=>$job_company,'job_country'=>$job_country,'job_image'=>$job_image,'job_created_at'=>$job_created_at,'job_end_at'=>$job_end_at
	);
	}
	$json = array('status' => 1, 'info' => $result);
}
else{
	$json = array('status' => 0, 'msg' => 'no record found!');
}
header('Content-type: application/json');
echo json_encode($json);
?>