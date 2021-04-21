<?php 
// session_start();
// $pageName = "Sudan";
$pagTitle ="statistics";

include('include/header.php')?>
<?php include('include/connect.php');
include("functions/count.php");
include("include/navbar.php");
?>

 <div class="container text-center">
 	<h1>Site Statistics</h1>
 	<br>
 	<div class="row">
 		<div class="col-md-3 sub">
 			<span><?php echo countSubscribers();?></span><br>
 		<i class="fa fa-subscribe"></i> Subscribers
 	</div>
 	<div class="col-md-3 user">
 		<span><?php echo countUsers()?></span> <br>
		<i class="fa fa-user"></i>User 
		
 	</div>
 	<div class="col-md-3 jobs">
 		<span><?php echo countJobs();?></span><br>
 		 Jobs
 	</div>
 	<div class="col-md-3 comments">
 		<?php echo countComments();?> <br>
 		<i class="fa fa-comment"></i><span>Comments</span> 
 		
 		
 	</div>
 	
 	</div>
 </div>
	  

	 
<?php include("include/footer.php")?>