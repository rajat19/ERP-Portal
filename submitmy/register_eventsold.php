<?php 
$nameErr=$eErr=$emailErr="";
$name=$eno=$event=$course=$sem=$dept=$em="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
     $nameErr = "Name is required";
	 }
	 if (empty($_POST["enrollno"])) {
     $eErr = "Enrollment is required";}
	 if (empty($_POST["email"])) {
     $emailErr = "Email is required";}
	 else {$em = test_input($_POST["email"]);
	 if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }}
	

$mobno = test_input($_POST["mobno"]);
$name = test_input($_POST["name"]);
echo $name;
$eno = test_input($_POST["enrollno"]);
$event=test_input($_POST["event"]);
$course=test_input($_POST["course"]);
$sem=test_input($_POST["sem"]);
$dept=test_input($_POST["dep"]);
$conn = new mysqli("localhost","root" , "", "nisani");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "sdsad";
}
$sql = "INSERT INTO register (en_no,name,course,event,department,semester,e_mail,mob_no) VALUES ('$eno','$name','$course','$event','$dept','$sem','$email','mobno')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
 ?>
<!-- <div class="col-lg-8 col-lg-offset-2"> -->
<h2 style="text-align:center" >Register for events</h2><br>
<div class="panel panel-success" style="width:95%">
      <div class="panel-heading"><b>Register for events</b><br /><span class="error">* required field.</span></div>
      <div class="panel-body">
	<form class="form-inline" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="enrollno">Enrollment No.</label>
    <input type="text" class="form-control" id="enrollno" name="enrollno"><span class="error">* <?php echo $eErr;?></span>
  </div>
  <br />
  <br />
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" style="margin-left:80px;"><span class="error">* <?php echo $nameErr;?>
  </div>
  <br />
  <br />
  <div class="form-group">
    <label for="email">Email-id</label>
    <input type="text" class="form-control" id="email" name="email" style="margin-left:60px;"><span class="error">* <?php echo $emailErr;?>
  </div>
  <br />
  <br />
  <div class="form-group">
    <label for="name">Mobile Number</label>
    <input type="text" class="form-control" id="mobno" name="mobno" placeholder="0000000000">
  </div>
  <br /><br />
  <div class="form-group">
    <label for="course">Course</label>
    <input type="text" class="form-control" id="course" name="course" placeholder="Btech" style="margin-left:80px;">
  </div>
  <br /><br />
   <div class="form-group">
    <label for="course">Event</label>
    <input type="text" class="form-control" name="event" id="event" placeholder="Event" style="margin-left:80px;">
  </div>
  <br /><br />
 <div class="form-group" align="left">
    <label for="board1" class="col-sm-2 control-label" >Department in event you want to be a part of</label>
 	 <select class="form-control" name="dep" style="margin-left:70px;">
<option>Volunteer</option>
<option>Administration</option>
<option>Creativity</option>
<option>Management</option>
<option>Registration Desk</option>
<option>Hospitality</option>
	 </select>
  </div>
  <br /><br />

   <div class="form-group" align="left">
    <label for="board1" class="col-sm-2 control-label" >Semester</label>
 	 <select class="form-control" name="sem" style="margin-left:70px;">
<option>1st sem</option>
<option>2nd sem</option>
<option>3rd sem</option>
<option>4th sem</option>
<option>5th sem</option>
<option>6th sem</option>
<option>7th sem</option>
<option>8th sem</option>
	 </select>
  </div>
  <br /><br />
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="sub" class="btn btn-default" value="Submit" style="margin-left:80px;">
    </div> 
   </div>
</form></div></div>
<div>
<!-- </div> -->
  