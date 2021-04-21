
<?php include("include/header.php");
$pageName = "sudan";
$pageTitle="subscribers";
include("include/navbar.php");
include("include/connect.php");
if (isset($_POST['submit'])) {

//subscribers form data

//if ($_SERVER('REQUSET_METHOD')=='POST') {
$sub_email = $_POST['sub_email'];
$sub_name = explode('@', $sub_email);
$sub_name_ex = $sub_name[0];
//$sub_name =$_POST['sub_name']; 

//INSERT THE SUBSCRIBERS DATA
// $stmt = $con->prepare("INSERT INTO subscribers
//  (SUBSCRIBER_EMAIL,
//  SUBSCRIBER_NAME,
//  SUBSCRIBERS_DATE,
//  now() VALUSE
// 	(:asubemail,:asubname)");
// $stmt->execute(array(
// ':asubemail'=>$sub_email,
// ':asubname'=>$sub_name
// ));
$stmt = $con->prepare("INSERT INTO subscribers (SUBSCRIBER_EMAIL,SUBSCRIBER_NAME,SUBSCRIBERS_DATE)
			VALUES(:asubemail,:asubname,now())");
       $stmt->execute(array(

        ':asubemail'=>$sub_email,
        ':asubname'=>$sub_name_ex
      ));

 header("refresh:3;url = index1.php");


echo "<p class='container alert alert-success'>Success</p>";

}
?>
 
	


	
	<div class="container text-center">
		<h2 class="head-border-center">Manage Your Subscribers</h2>
		<div class="table-responsive">
			<table class="table table-bordered ">
		<tr>
			<th class="text-center">#ID</th>
			<th class="text-center">NAME</th>
			<th class="text-center">EMAIL</th>
			<th class="text-center">DELETE</th>
		</tr>	
	<?php
	$stmt = $con->prepare("SELECT * FROM subscribers");
	$stmt->execute();
	$rows=$stmt->fetchAll();
	
	foreach ($rows as $row) {
		$sub_id = $row['SUBSCRIBERS_ID'];
	?>
	
		<tr>
			<td><?php echo $row['SUBSCRIBERS_ID'];?></td>
			<td><?php echo $row['SUBSCRIBER_NAME'];?></td>
			<td><?php echo $row['SUBSCRIBER_EMAIL'];?></td>
			<td><a href="manage_sub.php?do=delete&sub_id=<?php echo $sub_id;?>"><span class="btn btn-danger text-center" ><i class="fa fa-close" style="color: #FFF"> DELETE </i></span></a></td>
		<?php }?>
		</tr>
	</table>
		</div>
 
	
	</div>

<?php
//$userid = isset ($_GET['userid']) && is_numeric($_GET['userid'])? intval($_GET['userid']):0;
 include("include/footer.php")?>
 