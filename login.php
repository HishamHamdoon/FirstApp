<?php
session_start();
 include('include/connect.php');
 include('include/header.php') 

  ?>


<!-- login form -->
 
<!-- <section class="login text-center" >
 	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2 class="text-center">Login</h2>
		<div class="form-field">
		<input type="text"name="username" placeholder="username"><br>
		<input type="password" name="password" placeholder="password"><br>
		<input type="submit"value="Login">
		</div>
	</form>
</section>  -->

 <section class="form-26">
         <div class="form-26-mian">
				<div class="layer">
			<div class="wrapper">
			<div class="form-inner-cont">
					<div class="forms-26-info">
						 <h2>Login</h2>
                        <p>Etiam sit amet iaculis nunc, et feugiat enim. Aenean lorem dui, mattis et neque ac, viverra dignissim elit. Nunc quis finibus lorem.</p>
                    </div>
					<div class="form-right-inf"> 
							<form id="f1" class="signin-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">	
							 <div class="forms-gds">
								<div  class="form-input">
									<input   type="text" name="username" placeholder="Email">
								</div>
								<div  class="form-input">
									<input  type="password"  ID="t2" name="password" placeholder="Password">
								</div>
								<div  class="form-input">
                                    <input type="submit" class="btn" value="Login"> </div>
							</div>
							 
						</form>
						
                    </div>
				<div class="copyright text-center">
                    <p>© 2019 Merged Forms. All rights reserved | Design by <a href="http://w3layouts.com/"
                            target="_blank">W3Layouts</a></p>
                </div>
                </div>
			
			</div>
		</div>
		    </div>
		</section>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

</body>
</html>

<?php 

if(isset($_SESSION['Username'])){
    header('location:dashboard.php');
    exit();
}

//check if the method is htttp post
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPass = sha1($password);
    //$hashedPass = sha1($password);//encrypt the password using sha1 algorethm
    $stmt = $con->prepare("SELECT USER_Id, USERNAME,PASSWORD FROM USERS WHERE USERNAME=? AND PASSWORD = ? AND  USER_GROUP = 1");
    $stmt->execute(array($username,$hashedPass));
    $row = $stmt->rowCount();//check the number of records in the DB
    $row = $stmt->fetch();
    if($row > 0){
        ?>
        <p style="color:green">Welcome Mr.<?php echo $username;?> </p>
        <?php
        $_SESSION['Username']= $username;
        $_SESSION['ID']= $row['USER_ID'];
        header('location:dashboard.php');
    }else{
        echo "<p style='color:red;'>user does not exist register first please..</p>";
    }
}
?>


 <!-- <form class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
 <h4 class="text-center">Admin Login</h4>
 <input class="form-control" type="text"name="username" placeholder="Username" autocomplete="off">
 <input class="form-control" type="password"name="password" placeholder="Password"autocomplete="off">
 <input class="btn btn-primary btn-block " type="submit" value="Login">
 </form> -->

 