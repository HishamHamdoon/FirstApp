<?php 
include("include/header.php");
include("include/navbar.php");
include('include/connect.php');
?>
<h1 class="text-center head-border-center"><br><?php echo $country;?> Jobs</h1>
<?php
include('functions/count.php');

  if(countJobOfCountry($country) == 0){?>
  	
  	<div class="container alert alert-danger text-center">
  		<b>Sorry there are no job today ):</b>
  	</div>
  		
  <?php }else{
  
// if($sub_num >0){echo "hhhhh have more users";}
$stmt = $con->prepare('SELECT * FROM JOB WHERE job_country = ?');
		$stmt->execute(array($country));
		$rows = $stmt->fetchAll();
	foreach ($rows as $row) {
			$job_name =$row['job_name'];
			$job =$row['job_description'];
			$email =$row['job_email'];
			$desc =$row['job_description'];
			$date =$row['created_at'];
			$end =$row['end_at'];
			$img =$row['job_image'];
		?>
 
	<div class="container">
		<br><br><br>
		<div class="row">
		<div class="col-md-6 job">
			
			<h4 style="color: #F00">
				<P class="lead"><?php echo $job_name;?>
			</h4><span style="color: #00F"><?php echo $date;?></span>
			
				<?php echo $job;?><br>
				<a href=""><span><?php echo $email?>
					<br>
				</span></a>
				<span style="color: #00F">Didline at : <?php echo $end;?></span><br>
				<span ><i class="fa fa-facebook text-center"></i>
					<i class="fa fa-youtube"></i>
					<i class="fa fa-twitter"></i>
					<i class="fa fa-linkedin"></i>
				</span>
			</p>
		</div>
		<div class="col-md-6">
			<p class="job_img"><?php
				 echo "<img src='img/".$row['job_image']."' >";?>
			</p>
		</div>
	</div>
	</div>

<?php 
}
}
include("include/footer.php");