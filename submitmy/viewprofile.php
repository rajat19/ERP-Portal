<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body> 
 
 <?php
include 'php/connect.inc.php';
include 'php/core.inc.php';
if(loggedin())
{

  if(isset($_POST['profile']))
  {
  $sid = $_POST['studentid'];

 ?>
<div class="col-lg-2"></div>
<div class="col-lg-8">
  <h2>View Profile</h2><br>
  <div class="panel panel-success">
      <div class="panel-heading" align="center"><b>Personal Details</b></div>
      <div class="panel-body" style="margin-left:80px">
	    <?php
    $sql=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE username='$sid' "), MYSQLI_BOTH);
		$sql2=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM edu_med_info WHERE sid='$sid' "), MYSQLI_BOTH);
		$sql1=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pers_info WHERE sid='$sid' "), MYSQLI_BOTH);
		?>
	  	<form class="form-horizontal">
 		<div class="form-group">
    		<label class="col-sm-2 control-label">Username</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql['username'] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Full Name</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql['name'] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql[4] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Contact No.</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[3] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Branch(Year)</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql[5]."(". $sql[6].")"; ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Date Of Birth</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[2] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Gender</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[4] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Address</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[5]."<br>".$sql1[6]; ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">City(District)</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[7]."(".$sql1[8].")"; ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">State</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[9]."-".$sql1[10]; ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Parent's Email</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[11] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Parent's Contact</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql1[12] ?></p>
    		</div>
  		</div>
		</form>
	  </div>
  </div>
  <div class="panel panel-success">
      <div class="panel-heading" align="center"><b>Higher secondary(12th)</b></div>
      <div class="panel-body" style="margin-left:80px">
	  	<?php ?>
	  	<form class="form-horizontal">
 		<div class="form-group">
    		<label class="col-sm-2 control-label">Board Name</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[1] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Passing Year</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[2] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Secured Marks</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[3]."%"; ?></p>
    		</div>
  		</div>
		</form>
	  </div>
  </div>
  <div class="panel panel-success">
      <div class="panel-heading" align="center"><b>Secondary(10th)</b></div>
      <div class="panel-body" style="margin-left:80px">
	  	<form class="form-horizontal">
 		<div class="form-group">
    		<label class="col-sm-2 control-label">Board Name</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[4] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Passing Year</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[5] ?></p>
    		</div>
  		</div>
		<div class="form-group">
    		<label class="col-sm-2 control-label">Secured Marks</label>
    		<div class="col-sm-10">
      			<p class="form-control-static"><?php echo $sql2[6]."%";?></p>
    		</div>
  		</div>
		</form>
	  </div>
  </div>
</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

<?php
  }
}
else header('Location:login.php');
?>
</html>
