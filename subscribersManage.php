<?php

session_start();

 

if(isset($_SESSION['Username'])){

 

$do = isset($_GET['do']) ? $_GET['do']:'Manage';

//start manage page

if($do == 'Manage'){//start manage page
?>
<div class="container">
<?php 
//fetch the data from the users tabe to show it here
 

$stmt = $con->prepare("SELECT * FROM SUBSCRIBERS WHERE");

$stmt->execute();

$rows = $stmt->fetchAll();


?>
<h1 class='text-center' style='margin:30px;font-weight:bold'>Manage The Member</h1>
<div class='table-responsive'>
  <table class='table table-bordered'>
   <tr class='text-center' style='background-color:#999'>
   <td>#ID</td>
   <td>Sbscriber Name</td>
   <td>Email</td>
   <td>Register Date</td>
   <td>Control</td>
   </tr>
   <?php 

   foreach($rows as $row){
       
?>
   <tr class='text-center'>
   <td><?php echo $row['SUBSCRIBER_ID']?></td>
   <td><?php echo $row['SUBSCRIBER_NAME']?></td>
   <td><?php echo $row['SUBSCRIBER_EMAIL']?></td>
   <td><?php echo $row['CREATED_AT']?></td>
   
   <td>
   <a href='members.php?do=Edit&userid=<?php echo $row["UserId"]?>' class='btn btn-success'><i class='fa fa-edit'></i>Edit</a>
   <a href='members.php?do=Delete&userid=<?php echo $row["UserId"]?>' class='btn btn-danger'><i class='fa fa-close'></i>Delete</a>
  
   <?php 
   if ($row['RegStatus'] == 0){?>

       <a href='members.php?do=Activate&userid= <?php echo $row["UserId"]?>' class='btn btn-info'><i class='fa fa-close'></i>Activate</a>
       
   <?php }
   ?>
   </td>
   </tr>
    <?php } ?>
  </table>
</div>
<a href='members.php?do=Add' class='btn btn-primary'>
<i class='fa fa-plus'></i> Add New Member</a>
</div>

<?php }elseif($do =='Add'){
        //start add page?>
            <div class="container">
            <h1 class="text-center"  style='margin:30px;font-weight:bold'>Add Member</h1>
        <div class="container">
        <form class="form-horizontal" action="?do=Insert" method="POST"autocomplete="off">

        <input type="hidden" name ="userid">
            <!--start username-->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10 col-md-4">
                    <input type="text" name ="username" class="form-control">
                </div>
                </div>
        <!--end username-->
        <!--start password -->
        <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10 col-md-4">
                <input type="password" name ="password" class="form-control">
            </div>
        </div>
        <!--end password-->
        <!--start fullname-->
        <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Fullname</label>
                <div class="col-sm-10 col-md-4">
                <input type="text" name ="fullname" class="form-control">
            </div>
        </div>
        <!--end fullname-->
        <!--start email-->
        <div class="form-group form-group-lg" autocomplete="off">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10 col-md-4">
                <input type="email" name ="email" class="form-control" autocomplete="off">
            </div>
        </div>
        <!--end email-->
        <!--start submit button-->
        <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value ="Save" class="btn btn-primary btn-lg" >
            </div>
        </div>
        <!--end submit button-->
            </form>
            </div>
        <?php 
    }

elseif($do =='Edit'){

                //start edit page

                //check if the Getrequest is numeric and get the intval of it
            $userid = isset ($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']):0;
            //select all data depend on this id
            $stmt = $con->prepare('SELECT * FROM users WHERE UserID =?');

            //execute the query
            $stmt->execute(array($userid));
            //the number of rows that match the id 
            $row = $stmt->rowCount();

            //fetch all of the data related to this id 
            $res = $stmt->fetch();

            //check if data has found
                if($stmt->rowCount() > 0){?>

                <h1 class="text-center"  style='margin:30px;font-weight:bold'>Edit Member</h1>
                <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST"autocomplete="off">
                
                <input type="hidden" name ="userid" value="<?php echo $userid ?>">
                    <!--start username-->
                        <div class="form-group form-group-lg">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10 col-md-4">
                            <input type="text" name ="username" value="<?php echo $res['Username']?>" class="form-control">
                        </div>
                        </div>
                <!--end username-->
                <!--start password -->
                <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10 col-md-4">
                        <input type="hidden" name ="oldpassword" value="<?php echo $res['Password']?>">
                        <input type="password" name ="newpassword" class="form-control">
                    </div>
                </div>
                <!--end password-->
                <!--start fullname-->
                <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Fullname</label>
                        <div class="col-sm-10 col-md-4">
                        <input type="text" name ="fullname" value="<?php echo $res['FullName']?>" class="form-control">
                    </div>
                </div>
                <!--end fullname-->
                <!--start email-->
                <div class="form-group form-group-lg" autocomplete="off">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10 col-md-4">
                        <input type="email" name ="email" value="<?php echo $res['Email']?>" class="form-control" autocomplete="off">
                    </div>
                </div>
                <!--end email-->
                <!--start submit button-->
                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value ="Save" class="btn btn-primary btn-lg" >
                    </div>
                </div>
                <!--end submit button-->
                    </form>
                <div>
            <?php
                    //something went wromg while I am updating the password it must related with the encrypt function
            } else { 

                echo "no id like that";

     }

} elseif ($do == 'Update'){//start update page

        //check the http request
        if ($_SERVER['REQUEST_METHOD']=='POST') {?>
        <div class="container">
        <?php
             
            echo "<h1 class='text-center'>Update page</h1>";

          
                   $id = $_POST['userid'];

                    $user = $_POST['username'];
            
                    $fullname = $_POST['fullname'];
            
                    $email = $_POST['email'];
            
                    $pass = "";
            
                    $oldpassword = $_POST['oldpassword'];
            
                    $newpassword = $_POST['newpassword'];
                            
                    //check if password is empty or is changed
            
                    if(empty($newpassword))
                    {
            
                         $pass = $oldpassword;
            
                     }else{
            
                         $pass = sha1($newpassword);
            
                     }

                      //validate the from

         $formErrors = array();

         if(strlen($user) < 3)
         {

             $formErrors[] = '<div class="alert alert-danger"> username can\'t less than 3<strong> character</strong> </div>';
        
         }
         if(empty($user))
         {

             $formErrors[] = '<div class="alert alert-danger">username can\'t be <strong> empty</strong></div>';
         
        }
         if(empty($fullname))
         {
             $formErrors[] = '<div class="alert alert-danger">fullname can\'t be <strong> empty</strong></div>';
         }
         if(empty($email))
         {
             $formErrors[] = "<div class='alert alert-danger'>email can\'t be<strong> empty</strong></div>";
         }

         foreach($formErrors as $error){

            echo $error;

         }

         //if is no error
         if(empty($formErrors)){

        //update the database content

        $stmt = $con->prepare("UPDATE users SET UserName =?,FullName=?,Email =? WHERE UserId=?");
        $stmt->execute(array($user, $fullname, $email, $id));
        $rowUpdated = $stmt->rowCount();
        echo '<div class="alert alert-success">The Record Updated successfully</div>';

        header("refresh:3;url = members.php");
        ?>
        </div>

<?php

         }

                    

        } else { 

            $theMsg = '<div class="alert alert-danger container">sorry you cant browse this page direct..!!</div>';

            redirectHome($theMsg,5);

        }


    }//end update page

elseif($do == 'Insert'){

        //insert page
    if($_SERVER['REQUEST_METHOD'] == 'POST'){  

        echo "<h1 class='text-center'  style='margin:30px;font-weight:bold'>Insert page</h1>";
        //insert the data here
        $user = $_POST['username'];

        $fullname = $_POST['fullname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $hashedPass= sha1($password);

     //validate form 
       $formErrors = array();

            if(strlen($user) < 3)
       {

         $formErrors[] = ' username can\'t less than 3<strong> character</strong>';
    
        }
         if(empty($user))
         {

         $formErrors[] = 'username can\'t be <strong> empty</strong>';
     
        }
         if(empty($fullname))
         {
             $formErrors[] = 'fullname can\'t be <strong> empty</strong>';
         }
         if(empty($email))
         {
             $formErrors[] = 'email can\'t be<strong> empty</strong>';
         }

        foreach($formErrors as $error){

        echo "<div class='alert alert-danger container'>".$error."</div>";

        }

     //if is no error
     if(empty($formErrors)){

        $check = checkItem("Username","users",$user);

        if($check > 1){

            $theMsg = "<div class='alert alert-danger container'>User is exist</div>";
            
            redirectHome($theMsg,'back',5);
            
        }else{
            
       $stmt =$con->prepare("INSERT INTO users (Username,Password,Fullname,email,RegStatus,Date)
                                       VALUES(:auser,:apassword,:afullname,:aemail, 1, now())");
       $stmt->execute(array(

        ':auser'=>$user,
        ':apassword'=>$hashedPass,
        ':afullname'=>$fullname,
        ':aemail'=>$email

      ));
    
      $theMsg = '<div class="alert alert-success container">The Record Added Successfully</div>';
    
      redirectHome($theMsg,'back',5);
    
}
     }

          header("refresh:3;url = members.php");

    }else{

        $msg = "You cant browse this page direct"; 
        redirectHome($msg);
        
    }
}//end of the insert page

    elseif ($do == "Delete"){
        //start the delete page
        echo"<h1 class='text-center'  style='margin:30px;font-weight:bold'>Remove A Member</h1>";

         //start delete page

    //check if the Getrequest is numeric and get the intval of it
$userid = isset ($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']):0;
//select all data depend on this id
//$stmt = $con->prepare('SELECT * FROM users WHERE UserID =?');


$checked = checkItem('userid', 'users', $userid);
//execute the query

// $stmt->execute(array($userid));
// //the number of rows that match the id 
// $row = $stmt->rowCount();

if ($checked > 0 ) {

    $stmt = $con->prepare('DELETE FROM users WHERE UserId =:auser');

    $stmt->bindParam(":auser",$userid);

    $stmt->execute();

    echo"<div class='alert alert-success container'>The Record Deleted successfully</div>";

            header("refresh:3;url = members.php");



    }else{
        
        $theMsg = "<div class='alert alert-danger container'>There are no data to delete it</div>";

        redirectHome($theMsg,'back',5);

    }

 }//end the delete page 




 elseif ($do == "Activate"){
    //start the delete page
    echo"<h1 class='text-center'  style='margin:30px;font-weight:bold'>Activate A Member</h1>";

     //start edit page

//check if the Getrequest is numeric and get the intval of it
$userid = isset ($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']):0;
//select all data depend on this id
//$stmt = $con->prepare('SELECT * FROM users WHERE UserID =?');


$checked = checkItem('userid', 'users', $userid);
//execute the query

if ($checked > 0 ) {

$stmt = $con->prepare('UPDATE users SET RegStatus = 1 WHERE UserId =?');

$stmt->execute(array($userid));

echo"<div class='alert alert-success container'>Activated successfully</div>";

        header("refresh:3;url = members.php");
}
}//end the activate page 
include $tpl."footer.php";

}else{

    header("location:index.php");
    exit();

}