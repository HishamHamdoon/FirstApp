<?php
$pageName = "Users";
	include('include/header.php');
	include('include/navbar.php');
	include('include/connect.php');
?>
<div class="container text-center">
		<h2 class="head-border-center">Manage Your Users Mr <?php echo $_SESSION['Username'];?></h2>
		<div class="table-responsive">
			<table class="table table-bordered ">
		<tr>
			<th class="text-center">#ID</th>
			<th class="text-center">NAME</th>
			<th class="text-center">USER  GROUP</th>
			<th class="text-center">Registratin Date</th>
			<th class="text-center">DELETE</th>
		</tr>	
	<?php

	$stmt = $con->prepare("SELECT * FROM users");
	$stmt->execute();
	$rows=$stmt->fetchAll();
	
	foreach ($rows as $row) {
		$user_id = $row['USER_ID'];
	?>
	
		<tr>
			<td><?php echo $row['USER_ID'];?></td>
			<td><?php echo $row['USERNAME'];?></td>
			<td><?php if  ($row['USER_GROUP']==1){echo "Admin";}else{echo "Normal User";};?></td>
			<td><?php echo $row['CREATED_AT'];?></td>
			<td><a href="manage.php?do=delete&user_id=<?php echo $user_id;?>"><span class="btn btn-danger text-center" ><i class="fa fa-close" style="color: #FFF"> DELETE </i></span></a></td>
		<?php }?>
		</tr>
	</table>
		</div>
 
	
	</div>



