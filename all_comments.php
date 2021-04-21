<?php
$pageName = "Sudan";
$pageTitle ="inbox";
include("include/header.php");
include("include/navbar.php");
include("include/connect.php");
//get all comments
echo "	 	<h1 class='head-border-center text-center' style='padding-top:30px;padding-bottom:30px;'>Visitors Comments</h1>
"; 
$stmt = $con->prepare("SELECT * FROM COMMENTS");
$stmt->execute();
$rows = $stmt->fetchAll();
foreach ($rows as  $row) {
	// echo $row['COMMENT_ID'];
	// echo $row['COMMENTER_NAME'];
	
	// echo $row['COMMENT_EMAIL'];
	// 
	?>
	 <div class="container">
	 	<div class="jumbotron col-md-12" >
	 		<b>
	 			<span style="color: #000">Message from :</span><span style="color: #F00"><?php echo $row['COMMENTER_NAME'];?></span>
	 		</b>
	 		<p class="lead" style="max-width: 450px"><?php echo $row['COMMENT'];?></p>
	 		<span>commented at :<span><?php echo $row['COMMENTED_AT'];?></span></span>
	 	</div>

	 </div>
<?php }
include("include/footer.php");?>