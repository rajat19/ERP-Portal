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
 <div class="panel panel-success" align="center">
        <div class="panel-heading">Register for Events</div>
        <div class="panel-body" >
      <form class="form-horizontal" method="POST" action="<?php echo $current_file;?>" enctype="multipart/form-data" name="myform" id="myform" >
        <div class="form-group">
          <div class="col-lg-2">
          <label class="col-sm-2 col-lg-12 control-label"  style="text-align:center">Enrollment No.*</label></div>
          <div class="col-sm-3 col-lg-5">
              <input type="text" class="form-control" id="enrollno" name="enrollno" style="width:50%;text-align:center"><span class="error"> <?php echo $eErr;?></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-2">
          <label class="col-lg-12 control-label" style="text-align:center">Name*</label></div>
          <div class="col-sm-5" >
             <input type="text" class="form-control" id="name" name="name" style="width:50%;text-align:center"><span class="error"> <?php echo $nameErr;?>
          </div> 
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="email" class="col-sm-12 control-label" style="text-align:center">Email*</label></div>
          <div class="col-sm-5">
              <input type="text" class="form-control" id="email" name="email" style="width:50%;text-align:center"><span class="error"> <?php echo $emailErr;?>
        </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="dob" class="col-sm-12 control-label" style="text-align:center">Mobile No.</label></div>
          <div class="col-sm-5">
              <input type="text" class="form-control" id="mobno" name="mobno" placeholder="Contact" style="width:50%;text-align:center">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-2">
          <label for="mob" class="col-sm-12 control-label" style="text-align:center">Course</label></div>
          <div class="col-sm-5">
              <input type="text" class="form-control" id="course" name="course" placeholder="Btech" style="width:50%;text-align:center">
          </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label class="col-sm-12 control-label" style="text-align:center">Event*</label></div>
          <div class="col-sm-5">
              <input type="text" class="form-control" name="event" id="event" placeholder="Event" style="width:50%;text-align:center;">
        </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="tadd1" class="col-sm-12 control-label" style="text-align:center">Department</label></div>
          <div class="col-sm-5">
              <select class="form-control" name="dep" style="width:50%;text-align:center;">
                <option>Volunteer</option>
                <option>Administration</option>
                <option>Creativity</option>
                <option>Management</option>
                <option>Registration Desk</option>
                <option>Hospitality</option>
              </select>
          </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="tcity" class="col-sm-12 control-label" style="text-align:center">Semester</label></div>  
        <div class="col-sm-5">
              <select class="form-control" name="sem" style="width:50%;text-align:center">
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
        </div>
        <div class="form-group">
          <div class="col-sm-7 col-sm-offset-1">
              <input type="submit" name="sub1" class="btn btn-default" value="Save">
          </div>
        </div>
      </form>
      <p id="results"></p>
    </div>
    </div>
  </div>