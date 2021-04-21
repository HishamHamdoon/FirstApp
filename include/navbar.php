 <?php
 session_start();
  include("include/connect.php");

 ?>
 
 <nav class="navbar navbar-default navbar-fixed-top" style="background:linear-gradient(90deg, #f0027f, #75489f);color: #FFF">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span style="color: yellow;font-weight: 900;font-size: 30px">Wazifney</span><span style="color: #FFF">&reg;</span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">HOME <span class="sr-only">(current)</span></a></li>
        <li><a href="#">ABOUT</a></li>
         <li><a href="#contact">CONTACT</a></li>
        <li>
            <?php 
              if(isset($_SESSION['Username'])){
                ?><a href="dashboard.php">DASHBOARD</a>
              <?php }
            ?>
          
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php if(!empty($pageName)){
              echo $pageName;
            }else{echo "Sudan";}
            ?>


           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sudan.php">Sudan</a></li>
            <li><a href="qatar.php">Qatar</a></li>
            <li><a href="egypt.php">Egypt</a></li>
            <li><a href="ksa.php">KSA</a></li>
            <li><a href="emarates.php">UAE</a></li>
            <li><a href="kuwait.php">Kuwait</a></li>
            <li><a href="oman.php">Oman</a></li>
          </ul>
        </li>
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<?php 
          	if(isset($_SESSION['Username'])){ 
          	echo @$_SESSION['Username'];
          	echo '<span class="caret"></span></a>
       		   <ul class="dropdown-menu">
       		   <li><a href="logout.php"><li>LOGOUT</li></a></li>';
          }else{
          	echo'

          	<a href="logins.php"><li>LOGIN</li></a>';
          }
          ?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <br><br><br><br>
 