<?php
session_start();
include('include/connect.php');
include('include/header.php');


if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['submit']))
	{
		#`JOB_ID`, `JOB_NAME`, `JOB_DESCRIPTION`, `JOB_EMAIL`, `JOB_COMPANY
		$job_name = $_POST['job_name'];
		@$job_description =$_POST['job_description'];
		$job_email = $_POST['job_email'];
		@$job_company =$_POST['job_company'];
		@$job_country =$_POST['job_country'];
		@$job_end =$_POST['job_end'];

		//upload image
		@$target = 'img/'.basename($_FILES['image']['name']);
		@$tmp_name = $_FILES['image']['tmp_name'];
		@$image_name = $_FILES['image']['name'];//image name

		$formErrors = array();

         if(strlen($user) < 3)
         {

             $formErrors[] = '<div class="alert alert-danger"> username can\'t less than 3<strong> character</strong> </div>';
        
         }
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


		$stmt =$con->prepare("INSERT INTO JOB
		 (job_name,
		 job_description,
		job_email,
		 job_company,
		 job_country,
		 job_image,
		 created_at,
		 end_at)
			VALUES
			(:ajob_name,
			:ajob_description,
			:ajob_email,
			:ajob_company,
			:ajob_country,
			:aimage,
			now(),
			:aend)"
		);
       $stmt->execute(array(

        ':ajob_name'=>$job_name,
        ':ajob_description'=>$job_description,
        ':ajob_email'=>$job_email,
        ':ajob_company'=>$job_company,
        ':ajob_country'=>$job_country,
        ':aimage'=>$image_name,
        ':aend'=>$job_end
      ));
       move_uploaded_file($tmp_name, $target);

	//echo $stmt;
       echo "<p class= 'container alert alert-success'>Job Added Successfully</p>";
       // header("location:add_job.php");
   }

	}
}
include("include/footer.php");

























 