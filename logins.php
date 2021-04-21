<?php 
session_start();
$pageTitle ="login";
 include('include/connect.php');
 include('include/header.php'); 
 
if(isset($_SESSION['Username'])){
    header('location:dashboard.php');
    exit();
}
else{
//check if the method is htttp post

    @$username = $_POST['username'];
    @$password = $_POST['password'];
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
    }
}

?>


<!-- <!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Merged Forms Page Responsive Widget Template :: W3layouts</title>
     Meta tag Keywords -->
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Merged Forms Page Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->
    <!-- //Meta tag Keywords -->
     <link rel="stylesheet" href="css/login.css" type="text/css" media="all" /><!-- Style-CSS -->
     <style type="text/css">
    

/*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/
/* reset code */
html {
  scroll-behavior: smooth;
}

body,
html {
  margin: 0;
  padding: 0;
  color: #585858;
}

* {
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}

.wrapper-full {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.wrapper {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .wrapper {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .wrapper {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .wrapper {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .wrapper {
    max-width: 1140px;
  }
}

.img-responsive {
  max-width: 100%;
  display: block;
}

.img-fluid {
  width: 100%;
}

.d-grid {
  display: grid;
}

.d-flex {
  display: flex;
  display: -webkit-flex;
  flex-wrap: wrap;
}

.text-center {
  text-align: center;
}

.text-left {
  text-align: left;
}

.text-right {
  text-align: right;
}

button,
input,
select {
  -webkit-appearance: none;
  outline: none;
}

button,
.btn,
select {
  cursor: pointer;
}

a {
  text-decoration: none;
}

iframe {
  border: none;
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
ul,
ol {
  margin: 0;
  padding: 0;
}

.p-relative {
  position: relative;
}

.p-absolute {
  position: absolute;
}

.p-fixed {
  position: fixed;
}

.p-sticky {
  position: -webkit-sticky;
  position: sticky;
}

body a:hover,
body button:hover {
  opacity: .8;
}

h1,
h2,
h3,
h4,
h5,
h6,
a {
  color: #050404;
}

p {
  color: #585858;
}

/* reset code */
/*--/form-26--*/

	.form-26-mian {
			background: url(./img/login2.jpg) no-repeat 0px 0px;
			background-size: cover;
		}
	.layer{
	background: url(./img/layer.png) no-repeat 0px 0px;
    background-size: cover;
	min-height: 100vh;
		}
	.forms-26-info h2{
		font-size: 55px;
		line-height: 60px;
		color: #ffff;
		font-weight: 600;
	}
	.forms-26-info p {
		color: #ffffffd6;
		font-style: normal;
		font-weight: normal;
		font-size: 17px;
		line-height: 25px;
		margin: 40px 0;
	}
	h6.already {
		margin: 10px 0 0;
		font-style: normal;
		font-weight: normal;
		font-size: 15px;
		line-height: 25px;
		color: #ffffff;
	}
	.forms-gds {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-gap: 10px;
	}
	.form-right-inf input[type="text"],.form-right-inf input[type="password"] {
	 
    border: 1px solid #eee;
    border-radius: 3px;
		border: none;
		outline: none;
		width: 100%;
		font-size: 15px;
		padding: 0px 15px;
		color: #304659;
		height: 45px;
		 text-align:left;
		-webkit-appearance: none;
	}
	.btn {
		background:#b70b6f;
		color: #fff;
		text-decoration: none;
		padding:0px 30px;
		text-align: center;
		font-size: 17px;
		display: inline-block;
		width: 100%;
		border: none;
		cursor:pointer;
		height: 45px;
		margin-bottom: 15px;
		 -webkit-appearance: none;
	}
	button.btn:hover {
		opacity:0.8;
		background-color:#b70b6f;
	}
	.form-inner-cont {
		text-align: center;
		margin: 0 auto;
		max-width: 750px;
		padding: 13em 0 0 0;
	}
	p.action-link{
		 text-align:left;
		 padding:0;
	}
	 .form-inner-cont a {
		color: #ffffff;
		font-weight: 700;
		text-decoration: none;
		margin-bottom: 10px;
		display: inline-block;
	}
	.form-inner-cont a:hover {
    text-decoration: underline;
	}
	.copyright p {
    margin-top: 120px;
	color: #ffffffd6;
    font-style: normal;
    font-weight: normal;
    font-size: 17px;
    line-height: 25px;
	}
	/*-- //forms-26 --*/
	/*-- /responsive-start --*/
	@media all and (max-width:992px) {
		 .form-inner-cont {
			padding: 12em 0 0 0;
		}
	}
	@media all and (max-width:736px) {
	.form-inner-cont {
			padding: 12em 0 0 0;
		}
	}
	@media all and (max-width:568px) {
	 .forms-26-info h2 {
			font-size: 45px;
			line-height: 55px;
	}
}
	@media all and (max-width: 600px) {
		.forms-26-info h2 {
			font-size: 50px;
			line-height: 60px;
		}
		 .form-inner-cont {
			padding: 8em 0 0 0;
		}
	}
	@media all and (max-width: 480px) {
	.forms-26-info h2 {
			font-size: 40px;
			line-height: 50px;
		}
		 .forms-gds {
			grid-template-columns: 1fr;
		}
				.copyright p {
    margin-top: 120px;
	
	}
	}

	@media all and (max-width: 414px) { 
	.forms-26-info p {
			font-size: 17px;
			line-height: 25px;
			margin: 30px 0;
		}
	}
	@media all and (max-width:384px) { 
		.forms-26-info p {
			font-size: 15px;
			line-height: 25px;
			margin: 25px 0;
		}
		.form-inner-cont {
			padding: 6em 0 0 0;
		}
		 .forms-26-info h2 {
			font-size: 35px;
			line-height: 45px;
		}
	}
	/*-- //responsive-end --*/
     </style>
</head>
<body>
   <!-- /form-26-section -->
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
                    <p>All rights reserved ©2019<a href="http://w3layouts.com/"
                            target="_blank"> </a></p>
                </div>
                </div>
			
			</div>
		</div>
		    </div>
		</section>
      <!-- //form-26-section -->
</body>
</html>