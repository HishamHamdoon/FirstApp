<?php
$pageName = "Sudan";
$pageTitle ="home"; 
include("include/header.php"); 
include("include/navbar.php");	

?>

<div class="container-fluid header-div">
 		<h1><i class="fa fa-search fa-1x" style="color: #f0027f;"><span>&nbsp;&nbsp;</span>
 		 </i>Get Your Future Job</h1><br>
 		<p class="textd-center lead" style="text-indent: 80px;">We are working hard to bring you your future job</p>
 	</div>
 </div>
<section class="subscribe text-center">
	<div style="height: 100%">
		<h2 class="head-border-center">Keep In Touch</h2>
		 <div class="container">
	<div class="text-center col-md-12">
		<form method="post" action="subscribers.php">
		<input type="hidden" name="sub_name">
		<input type="email" name="sub_email" placeholder="enter your to subscribe">
		<input type="submit" name="submit" value="Submit" style="">
	</form>
	</div>
	</div>
	</div>
</section>

<!-- start the jobs -->

		<?php
		include('include/connect.php');
		$stmt = $con->prepare('SELECT * FROM JOB');
		$stmt->execute(array());
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
 
	<section class="">
		<div class="container">
		<div class="row">
		<div class="col-md-6">
		<div>
			 <h4 style="color: #F00"><?php echo $job_name;?></h4>
			 
			 <span><?php echo $date;?> </span>
			
				<p><?php echo $job;?> </p>
				<a href="#"> <p><?php echo $email?></p></a>
				 
				 <span>Didline at :<?php echo $end;?></span>  
		</div>
				<span ><i class="fa fa-facebook text-center"></i>
					<i class="fa fa-youtube"></i>
					<i class="fa fa-twitter"></i>
					<i class="fa fa-linkedin"></i>
				</span>
		</div>
		<div class="col-md-6">
			<p class="job_img"><?php
				 echo "<img src='img/".$row['job_image']."' >";?>
			</p>
		</div>
	</div>
	</div>
	</section>
<?php }?>	

</section>

<!-- end the jobs -->

<!-- start our clients -->
<section class="our-clients text-center">
	<div class="container">
		
	<h3 class="head-border-center">Our Clients</h3>

	<div class="row">
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img" width="70" height="70">
		</div>
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img"width="70" height="70">
		</div>
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img"width="70" height="70">
		</div>
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img"width="70" height="70">
		</div>
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img"width="70" height="70">
		</div>
		<div class="col-md-2">
			<img src="img/sudan_logo.jpg" class="img"width="70" height="70">
		</div>
	</div>
	</div>
</section>

<!-- end our clients -->


<!-- start social media --> 
<section class="social text-center">
	<div class="container">
		<h2 class="head-border-center">Follw Us on Social Media</h2>
	<div class="row">
			<div class="col-md-2">
				<a href="https://facebook.com">
					<i class="fa fa-facebook fa-4x"></i>
		</a>
		</div>
		<div class="col-md-2">
			<a href="https://youtube.com">
				<i class="fa fa-youtube fa-4x" style="color: #F00"></i>
			</a>
			
	
		</div>
		<div class="col-md-2">
		<a href="https://twitter.com">
		<i class="fa fa-twitter fa-4x" style="color: rgba(29,161,242,1.00);"></i>
		</a>
		</div>
		<div class="col-md-2"><i class="fa fa-whatsapp fa-4x" style="color:  #0073b1"></i></div>
		<div class="col-md-2"><i class="fa fa-linkedin fa-4x" style="color: #0073b1;"></i></div>
		<div class="col-md-2"><i class="fa fa-instagram fa-4x"style="color: yellow"></i></div>
</div>
	</div>
</section>

<!-- end social media --> 

<!-- start footer -->







 

	<script src="js/main.js"></script>
<?php 
// on 000webhost
// https://wazifney.000webhostapp.com/


include("include/footer.php")?>