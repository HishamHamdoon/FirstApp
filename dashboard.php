<?php 
$pageName ="Sudan";
$pageTitle ="dashboard";

include('include/header.php');
include('include/navbar.php');
include('include/connect.php');
include('functions/count.php');

if (isset($_POST['submit'])) {
//subscribers form data
$sub_email = $_POST['sub_email'];
$sub_name = explode('@', $sub_email);
$sub_name_ex = $sub_name[0];
//validation 

$stmt = $con->prepare("INSERT INTO subscribers (SUBSCRIBER_EMAIL,SUBSCRIBER_NAME,SUBSCRIBERS_DATE)
			VALUES(:asubemail,:asubname,now())");
       $stmt->execute(array(

        ':asubemail'=>$sub_email,
        ':asubname'=>$sub_name_ex
      ));
 
 header("location:index1.php");

echo "<p class='container alert alert-success'>Success</p>";
 	  include('include/footer.php');

}?>	
</div>
<div class="row">
	<div class="col-md-4" >
		 	<?php  include('include/side_area.php');?>
	</div>
	
	<section class="form-section">
		<div class="col-md-4">
		<a href=""><i class="fa fa-user fa-5x"><h1>Add User</h1></i></a>
			<!--ADD USER FORM-->
			<form class="add-user" method="POST" action="insert_user.php">
				<input type="text" name="username" placeholder="username" class="form-control">
				<input type="password" name="password" placeholder="password" class="form-control">
				<input type="submit" name="submit" value="Submit" class="form-control">
			</form>
	</div>
	</section>
	<div class="col-md-4">
		<a href=""><i class="fa fa-user fa-5x"><h1>Add  Job</h1></i></a>
		<form class="add-job" method="POST" action="add_job.php"enctype="multipart/form-data">
			<input type="text" name="job_name" placeholder="job name" class="form-control">
			<input type="text" name="job_description" placeholder="description" class="form-control">
			<input type="email" name="job_email" placeholder="email" class="form-control">
			<input type="text" name="job_company" placeholder="company" class="form-control">
			<input type="text" name="job_country" placeholder="country" class="form-control">
			<input type="text" name="job_end" placeholder="end at" class="form-control">
			<input type="file" name="image">
			<input type="submit" name="submit" value="Submit" class="form-control">
		</form>
	</div>
</div>

<?php include("include/footer.php");


	