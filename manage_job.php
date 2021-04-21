<?php
//session_start();
//this page to manage the jobs
$pageTitle = "Manage";
include('include/connect.php');
include('include/header.php');
include('include/navbar.php');


$do = isset($_GET['do']) ? $_GET['do']:'manage';
if($do =="manage"){
	//manage page?>
	<div class="container text-center">
		<h2 class="head-border-center">Manage Your Jobs</h2>
		<div class="table-responsive">
			<table class="table table-bordered ">
		<tr>
			<th class="text-center">Job Name</th>
			<th class="text-center">Created On</th>
			<th class="text-center">End at</th>
			<th class="text-center">DELETE</th>
			<th class="text-center">EDIT</th>
		</tr>	
<?php		
	$stmt = $con->prepare('SELECT * FROM JOB');
		$stmt->execute(array());
		$rows = $stmt->fetchAll();
	foreach ($rows as $row) {
			$job_name =$row['job_name'];
			$job_id =$row['job_id'];
			$job_company =$row['job_company'];
			$job_country =$row['job_country'];
			$email =$row['job_email'];
			$desc =$row['job_description'];
			$date =$row['created_at'];
			$end =$row['end_at'];
			$img =$row['job_image'];
		?>
 
		<tr>
			<td><?php echo $job_name;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $end;?></td>
			<td>
				<a href="manage_job.php?do=delete&job_id=<?php echo $job_id;?>"><span class="btn btn-danger text-center" ><i class="fa fa-close" style="color: #FFF"> DELETE </i></span></a></td>
			<td>
				<a href="manage_job.php?do=edit&job_id=<?php echo $job_id;?>"><span 	class="btn btn-info text-center" ><i class="fa fa-edit" style="color: #FFF"> EDIT </i></span></a>
			</td>

		</tr>
	<?php }?>
	</table>
		</div>
 
	
	</div>

<?php }
elseif($do =="edit"){ //edit pag 
$job_id = isset ($_GET['job_id'])&& is_numeric($_GET['job_id'])? intval($_GET['job_id']):0;
$stmt = $con->prepare('SELECT * FROM job WHERE JOB_ID = ?');
		$stmt->execute(array($job_id));
		$rows = $stmt->fetch();
	
	?>
	
	<div class="col-md-4">
		<a href=""><i class="fa fa-user fa-5x"><h1>Update  Job</h1></i></a>
		<form class="add-job" method="POST" action="manage_job.php?do=update"enctype="multipart/form-data">
			<input type="text" name="job_name1" placeholder="job name" value="<?php echo $rows['job_name']; ?>">
			<input type="text" name="job_description1" placeholder="description" value="<?php echo $rows['job_description']?>">
			<input type="email" name="job_email1" placeholder="email" value="<?php echo $rows['job_email']?>">
			<input type="text" name="job_company1" placeholder="company" value="<?php echo $rows['job_company']?>">
			<input type="text" name="job_country1" placeholder="country" value="<?php echo $rows['job_company']?>">
			<input type="text" name="job_end1" placeholder="end at" value="<?php echo $rows['end_at']?>">
			<input type="file" name="image1" src="<?php echo $rows['JOB_IMAGE']?>">
			<input type="hidden" name="date1" value="<?php echo $rows['CREATED_AT']?>">
			<input type="hidden" name="job_id1" value="<?php echo $rows['JOB_ID']?>">
			<input type="submit" name="submit" value="Submit">
		</form>
	</div>
 

<?php
}elseif($do=="update"){

if(isset($_POST['submit']))
	{
		#`JOB_ID`, `JOB_NAME`, `JOB_DESCRIPTION`, `JOB_EMAIL`, `JOB_COMPANY
		$job_name = $_POST['job_name1'];
		@$job_description =$_POST['job_description1'];
		$job_email = $_POST['job_email1'];
		@$job_company =$_POST['job_company1'];
		@$job_country =$_POST['job_country1'];
		@$date =$_POST['date1'];
		@$job_end =$_POST['job_end1'];

		//upload image
		@$target = 'img/'.basename($_FILES['image1']['name']);
		@$tmp_name = $_FILES['image1']['tmp_name'];
		@$image_name = $_FILES['image1']['name'];//image name

		$formErrors = array();

         // if(strlen($user) < 3)
         // {

         //     $formErrors[] = '<div class="alert alert-danger"> username can\'t less than 3<strong> character</strong> </div>';
        
         // }
         if(empty($job_name))
         {

             $formErrors[] = '<div class="container alert alert-danger">job name can\'t be <strong> empty</strong></div>';
         
        }
         if(empty($job_description))
         {
             $formErrors[] = '<div class="container alert alert-danger">job description can\'t be <strong> empty</strong></div>';
         }
         if(empty($job_company))
         {
             $formErrors[] = "<div class='container alert alert-danger'>job company can\'t be<strong> empty</strong></div>";
         }
         if(empty($job_end))
         {
             $formErrors[] = "<div class='container alert alert-danger'>job end date can\'t be<strong> empty</strong></div>";
         }

         foreach($formErrors as $error){

            echo $error;

         }

         //if is no error
         if(empty($formErrors)){

		$job_id = isset ($_GET['job_id1'])&& is_numeric($_GET['job_id1'])? intval($_GET['job_id1']):0;

$stmt = $con->prepare("UPDATE job SET JOB_NAME =?,JOB_DESCRIPTION=?
	,JOB_EMAIL =?,JOB_COMPANY=?,JOB_COUNTRY=?,
	JOB_IMAGE=?,CREATED_AT=?,END_AT=? 	WHERE JOB_ID=?" );
        $stmt->execute(array(	$job_name,
       	$job_description,
       	$job_email,
       	$job_company,
       	$job_country,
       	$image_name,
       	$date,
       	$job_end,
       	$job_id));
        $rowUpdated = $stmt->rowCount();
        //echo '<div class="alert alert-success">The Record Updated successfully</div>';

        header("refresh:3;url = manage_job.php");
       move_uploaded_file($tmp_name, $target);

	//echo $stmt;
       echo "<p class= 'container alert alert-success'>Job Updated Successfully</p>";
   }

	}
}
elseif($do =="delete"){//delete subscriber
 
$job_id = isset ($_GET['job_id'])&& is_numeric($_GET['job_id'])? intval($_GET['job_id']):0;

		$stmt = $con->prepare("DELETE FROM job WHERE JOB_ID  = ?");
		$stmt->execute(array($job_id));

echo "<div class='container alert alert-success'>Job Deleted Successfully'</div>";

}

	include("include/footer.php");

///dbname
	// id12014750_hisham
	////dbuser
	// id12014750_hisham

	//websitename
	// wazifney