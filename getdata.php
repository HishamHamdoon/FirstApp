<?php 
include_once('include/connect.php');
$arr[] = file_get_contents('http://localhost:8080/EmployMeSite/json_format.php');
echo $arr['info']['JOB'];
?>