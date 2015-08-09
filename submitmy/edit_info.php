<head>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script> 
  <!--<script type="text/javascript" src="validation.js"></script>-->
  
<script type="text/javascript">
( function($) {
  $(document).ready(function(){
    $("#myform").validate({
      debug: false,
      rules: {
        email: {
          required: true,
          email: true
        },
        dob: {
          required: true,
          date: true
        },
        mob: {
          required: true,
          maxlength: 10,
          minlength: 10
        },
        tadd1: {
          required: true
        },
        tadd2: {
          required: true
        },
        tcity: {
          required: true
        },
        tdistrict: {
          required: true
        },
        tstate: {
          required: true
        },
        tpin: {
          required: true,
          maxlength: 6,
          minlength: 6
        },
        pemail: {
          required: true,
          email: true
        },
        pmob: {
          required: true,
          maxlength: 10,
          minlength: 10
        },
        agree: "required"
        
      },
      messages: {
        email: "Not a valid email.",
        dob: "Invalid date format.",
        mob: "Not a valid number(length 10).",
        tadd1: "Field is required.",
        tadd2: "Field is required.",
        tcity: "Field is required.",
        tdistrict: "Field is required.",
        tstate: "Field is required.",
        tpin: "Not a valid pin(length 6).",
        pemail: "Not a valid email.",
        pmob: "Not a valid number(length 10).",
      },
      submitHandler: function(form) {
        // do other stuff for a valid form
        $.post('process.php', $("#myform").serialize(), function(data) {
          $('#results').html(data);
        });
      }
    });
  });} ) ( jQuery );
  </script>

</head>
<h2>Edit Profile</h2>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#home">Personal Information</a></li>
	<li><a data-toggle="tab" href="#menu1">Upload picture</a></li>
	<li><a data-toggle="tab" href="#menu2">Educational Details</a></li>
	<li><a data-toggle="tab" href="#menu3">Medical Details</a></li>
</ul>

<div class="tab-content">
	<!-- Personal Details-->
	<div id="home" class="tab-pane fade in active">
      	<h3>Personal Details</h3>
      	<?php
        $current_file = 'dashboard.php?type=edit_info';

			$query_retrieve = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
			$result = mysqli_fetch_array($query_retrieve,MYSQLI_BOTH);
			$name = $result['name'];	
			$email = $result['email'];
			$username = $result['username'];
			$branch = $result['branch'];
			$year = $result['year'];
		?>
	  	<div class="panel panel-success" align="center">
      	<div class="panel-heading"><br></div>
      	<div class="panel-body" >
			<form class="form-horizontal" method="POST" action="<?php echo $current_file;?>" enctype="multipart/form-data" name="myform" id="myform" >
  			<div class="form-group">
  				<div class="col-lg-2">
    			<label class="col-sm-2 col-lg-12 control-label"  style="text-align:center">User Id</label></div>
    			<div class="col-sm-3 col-lg-5">
      				<p class="form-control-static"  style="text-align:center"><?php echo $username;?></p>
    			</div>
  			</div>
  			<div class="form-group">
          <div class="col-lg-2">
    			<label class="col-lg-12 control-label" style="text-align:center">Name</label></div>
    			<div class="col-sm-5" >
      				<p class="form-control-static" style="text-align:center">
      				<?php echo $name;?>
					</p>
    			</div> 
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="email" class="col-sm-12 control-label" style="text-align:center">Email</label></div>
    			<div class="col-sm-5">
      				<input type="text" id="email" class="form-control" name="email" placeholder="Email" style="text-align:center;width:50%" required>
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="dob" class="col-sm-12 control-label" style="text-align:center">D.O.B.</label></div>
    			<div class="col-sm-5">
      				<input type="date" id="dob" class="form-control" name="dob" style="text-align:center;width:50%" required>
    			</div>
  			</div>
  			<div class="form-group">
          <div class="col-lg-2">
    			<label for="mob" class="col-sm-12 control-label" style="text-align:center">Mobile No.</label></div>
    			<div class="col-sm-5">
      				<input type="number" id="mob" class="form-control" name="mob" placeholder="Contact" style="text-align:center;width:50%" required>
    			</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
  				<label class="col-sm-12 control-label" style="text-align:center">Gender</label></div>
  				<div class="col-sm-5">
  	  				<input type="radio" name="gender" value="Male" required> Male
      				<input type="radio" name="gender" value="Female" required> Female
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="tadd1" class="col-sm-12 control-label" style="text-align:center">Temporary Address</label></div>
    			<div class="col-sm-5">
      				<input type="text" class="form-control" id="tadd1" name="tadd1" placeholder="Address1" style="text-align:center;width:70%" required>
    			</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
  				<label for="tadd2" class="col-sm-12 control-label"></label></div>
    			<div class="col-sm-5">
      				<input type="text" class="form-control" name="tadd2" id="tadd2" placeholder="Address2" style="text-align:center;width:70%"  required>
    			</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="tcity" class="col-sm-12 control-label" style="text-align:center">City</label></div>  
				<div class="col-sm-5">
      				<input type="text" id="tcity" class="form-control" name="tcity" placeholder="City" style="text-align:center;width:40%" required>
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
				<label for="tdistrict" class="col-sm-12 control-label" style="text-align:center"  >District</label></div>
				<div class="col-sm-5">
      				<input type="text" id="tdistrict" class="form-control" name="tdistrict" placeholder="District" style="text-align:center;width:40%" required>
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="tstate" class="col-sm-12 control-label" style="text-align:center">State</label></div>
				<div class="col-sm-5">
      				<input type="text" id="tstate" class="form-control" name="tstate" placeholder="State" style="width:40%;text-align:center;" required>
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="tpin" class="col-sm-12 control-label" style="text-align:center">Pincode</label></div>
				<div class="col-sm-5">
       				<input type="number" id="tpin" class="form-control" name="tpin" placeholder="Pincode" style="width:40%;text-align:center;" required>
				</div>
  			</div>
  			
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="pemail" class="col-sm-12 control-label" style="text-align:center">Parent's Email</label></div>
    			<div class="col-sm-5">
      				<input type="text" id="pemail" class="form-control" name="pemail" style="width:70%;text-align:center;" placeholder="Email" required>
				</div>
  			</div>
  			<div class="form-group">
        <div class="col-lg-2">
    			<label for="pmob" class="col-sm-12 control-label">Parent's Mobile</label></div>
    			<div class="col-sm-5">
      				<input type="number" id="pmob" class="form-control" name="pmob" placeholder="Mobile" style="width:70%;text-align:center;" required>
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
  <!-- /Personal details -->

  <!-- Upload Picture -->
  <div id="menu1" class="tab-pane fade">
      <h3>Upload Picture</h3>
    <div class="panel panel-success">
        <div class="panel-heading" align="center"><br></div>
        <div class="panel-body" align="center"><br>
      <form class="form-horizontal"  method="POST" action="<?php echo $current_file;?>" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="browse" class="col-sm-4 control-label">Browse photo</label>
          <input type="file" name="file" value="browse" id="browse" class="col-sm-5" style="text-align:center">
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <input type="submit" name="sub2" class="btn btn-default" value="Upload">
            </div>
          </div>
      </form>
    </div>
    </div>
    </div>
  <!-- /Upload Picture -->

  <!-- Education Details -->
  <!-- Educational details-->
  
    <div id="menu2" class="tab-pane fade">
      <h3>Educational Details</h3>
    <form class="form-horizontal"  method="POST" action="<?php echo $current_file;?>" enctype="multipart/form-data">
      <div class="panel panel-success" align="center">
        <div class="panel-heading" align="center"><b>Higher secondary(12th)</b></div>
        <div class="panel-body">
        <div class="form-group">
        <div class="col-lg-2">
          <label for="board2" class="col-sm-12 control-label" style="text-align:center">Board name</label></div>
          <div class="col-lg-7">
        <select class="form-control" id="board2" name="board12" style="width:70%;" required>
          <?php
            $query_board = mysqli_query($conn, "SELECT * FROM boards");
            while($row = mysqli_fetch_array($query_board, MYSQLI_BOTH))
            {
                $id = $row['id'];
                $boardname = $row['boardname'];
                echo "<option value='$id'>$boardname</option>";
            }

          ?>
        </select>
        </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="year12" class="col-sm-12 control-label" style="text-align:center">Passing Year</label></div>
          <div class="col-lg-4">
        <select class="form-control" id="year12" name="year2" style="width:45%;" required>
        <?php
        for($i=1980;$i<=2030;$i++)
          echo '<option>'.$i.'</option>';
        ?>
        </select></div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="marks12" class="col-sm-12 control-label" style="text-align:center">Marks</label></div>
          <div class="col-lg-4">
          <select class="form-control" id="marks12" name="marks2" style="width:45%;" required>
        <?php
        for($i=0;$i<=100;$i++)
          echo '<option>'.$i.'</option>';
        ?>
        </select></div>
        </div>
    </div>
    </div>
    
    <div class="panel panel-success" align="center">
        <div class="panel-heading" align="center"><b>Secondary(10th)</b></div>
        <div class="panel-body">
        <div class="form-group">
        <div class="col-lg-2">
          <label for="board1" class="col-sm-12 control-label" style="text-align:center">Board name</label></div>
          <div class="col-lg-7">
        <select class="form-control" id="board1" name="board10" style="width:70%;" required>
          <?php
            $query_board = mysqli_query($conn, "SELECT * FROM boards");
            while($row = mysqli_fetch_array($query_board, MYSQLI_BOTH))
            {
                $id = $row['id'];
                $boardname = $row['boardname'];
                echo "<option value='$id'>$boardname</option>";
            }

          ?>
        </select>
        </div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="year10" class="col-sm-12 control-label" style="text-align:center">Passing Year</label></div>
          <div class="col-lg-4">
        <select class="form-control" id="year10" name="year1" style="width:45%;" required>
        <?php
        for($i=1980;$i<=2030;$i++)
          echo '<option>'.$i.'</option>';
        ?>
        </select></div>
        </div>
        <div class="form-group">
        <div class="col-lg-2">
          <label for="marks10" class="col-sm-12 control-label" style="text-align:center">Marks</label></div>
          <div class="col-lg-4">
          <select class="form-control" id="marks10" name="marks1" style="width:45%;" required>
        <?php
        for($i=0;$i<=100;$i++)
          echo '<option>'.$i.'</option>';
        ?>
        </select></div>
        </div>
    </div>
    </div>
    <div class="form-group"  align="center">
        <div class="col-sm-offset-2 col-sm-7">
            <input type="submit" name="sub3" class="btn btn-default" value="Save">
      </div>
      </div>
    </form>
  </div>
  <!-- /Education Details -->

  <!-- Medical Details -->
  <div id="menu3" class="tab-pane fade">
    <h3>Medical Details</h3>
    <div class="panel panel-success" align="center">
        <div class="panel-heading" align="center"><br></div>
        <div class="panel-body">
      <form class="form-horizontal" method="POST" action="<?php echo $current_file;?>" enctype="multipart/form-data">
        <div class="form-group">
          <label class="col-sm-2 control-label">Hypertension</label>
          <div class="col-sm-3" style="margin-top:8px;">
              <input type="radio" name="radio1" value="yes"  required> Yes
              <input type="radio" name="radio1" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Diabetes Mellitus</label>
          <div class="col-sm-3" style="margin-top:8px;">
              <input type="radio" name="radio2" value="yes"  required> Yes
            <input type="radio" name="radio2" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Bronchial Asthma</label>
          <div class="col-sm-3" style="margin-top:8px;">
          <input type="radio" name="radio3" value="yes"  required> Yes
              <input type="radio" name="radio3" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Allergic Bronchites</label>
          <div class="col-sm-3" style="margin-top:8px;">
              <input type="radio" name="radio4" value="yes"  required> Yes
              <input type="radio" name="radio4" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Convulsioris or Fits</label>
          <div class="col-sm-3" style="margin-top:8px;">
              <input type="radio" name="radio5" value="yes"  required> Yes
              <input type="radio" name="radio5" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Any Congential Dieases</label>
          <div class="col-sm-3" style="margin-top:8px;">
              <input type="radio" name="radio6" value="yes" required > Yes
              <input type="radio" name="radio6" value="no" style="margin-left:130px;" required> No
        </div>
        </div>
        <div class="form-group">
          <label for="other1" class="col-sm-2 control-label">Other History </label>
          <div class="col-sm-4">
              <textarea type="text" class="form-control" id="other1" name="other" rows="4"  required></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-7">
              <input type="submit" name="sub4" class="btn btn-default" value="Save">
          </div>
        </div>
      </form> 
    </div>
    </div>
  </div>
  <!-- /Medical Details -->
</div>

<!-- Update Values -->
<?php
// email dob mob gender tadd1 tadd2 tcity tdistrict tstate tpin pemail pmob sub1
if(isset($_POST['sub1'])) 
{
  $email = htmlentities($_POST['email']);
  $dob = htmlentities($_POST['dob']);
  $mob = htmlentities($_POST['mob']);
  $gender = htmlentities($_POST['gender']);
  $tadd1 = htmlentities($_POST['tadd1']);
  $tadd2 = htmlentities($_POST['tadd2']);
  $tcity = htmlentities($_POST['tcity']);
  $tdistrict = htmlentities($_POST['tdistrict']);
  $tstate = htmlentities($_POST['tstate']);
  $tpin = htmlentities($_POST['tpin']);
  $pemail = htmlentities($_POST['pemail']);
  $pmob = htmlentities($_POST['pmob']);

  $query_UPDATE = mysqli_query($conn, "UPDATE pers_info SET email = '$email' , dob = '$dob' , mob = '$mob' , gender = '$gender' , tadd1 = '$tadd1' , tadd2 = '$tadd2' , tcity = '$tcity' , tdistrict = '$tdistrict' , tstate = '$tstate' , tpin = '$tpin' , pemail = '$pemail' , pmob = '$pmob' WHERE sid = '$username' ");
}
//file
if(isset($_POST['sub2']))
{
  $tmp_name = $_FILES['file']['tmp_name'];
  $target = 'upload/profile/';
  $time = time();
  $filename = $username.'_'.$time.'.jpg';
  if(move_uploaded_file($tmp_name, $target.$filename))
  {
    // echo $filename;
    $query_pic = mysqli_query($conn, "UPDATE pers_info SET profile = '$filename' WHERE sid = '$username' ");
  }
}

//board
if(isset($_POST['sub3']))
{
  $Board12=$_POST['board12'];
  $Year2=$_POST['year2'];
  $Marks2=$_POST['marks2'];
  $Board10=$_POST['board10'];
  $Year1=$_POST['year1'];
  $Marks1=$_POST['marks1'];

  mysqli_query($conn, "UPDATE edu_med_info SET board12='$Board12',year12='$Year2',marks12='$Marks2' WHERE sid='$username'");
    mysqli_query($conn, "UPDATE edu_med_info SET board10='$Board10',year10='$Year1',marks10='$Marks1' WHERE sid='$username'");
}

//medical info
if(isset($_POST['sub4']))
{
  $Radio1=$_POST['radio1'];
  $Radio2=$_POST['radio2'];
  $Radio3=$_POST['radio3'];
  $Radio4=$_POST['radio4'];
  $Radio5=$_POST['radio5'];
  $Radio6=$_POST['radio6'];
  $Other=$_POST['other'];
  mysqli_query($conn, "UPDATE edu_med_info SET m1='$Radio1',m2='$Radio2',m3='$Radio3',m4='$Radio4',m5='$Radio5',m6='$Radio6',m7='$Other' WHERE sid='$username'");
}
?>