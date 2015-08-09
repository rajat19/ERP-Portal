<?php
include 'php/connect.inc.php';

if(isset($_POST['upload']))
{
	$location = "upload/attendance";
	$filename = $location.$_FILES['file']['name'];
	$monthid = $_POST['monthid'];
	if($_FILES["file"]["type"] != "application/vnd.ms-excel")
	die("This is not a CSV file.");

	else if(move_uploaded_file($_FILES['file']['tmp_name'],$filename))
	{
		$handle = fopen($filename, "r");
		$count = 0;
		while(($data = fgetcsv($handle, 1000, ",")) != FALSE)
		{
			$studentid = mysqli_real_escape_string($conn, $data[0]);
			$branch = mysqli_real_escape_string($conn, $data[1]);
			$year = mysqli_real_escape_string($conn, $data[2]);
			$section = mysqli_real_escape_string($conn, $data[3]);
			$subjectid = mysqli_real_escape_string($conn, $data[4]);
			$total = mysqli_real_escape_string($conn, $data[5]);
			$outof = mysqli_real_escape_string($conn, $data[6]);
			if($count!=0)
			$query_att = mysqli_query($conn, "INSERT INTO attendance ( monthid , studentid , branch , year , section , subjectid , total , outof ) VALUES ( '$monthid' , '$studentid' , '$branch' , '$year' , '$section' , '$subjectid' , '$total' , '$outof' ) ");
		$count++;
		}
		echo "Success";
	}

}
?>

<form action="uploadattendance.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" id="file">
<?php
	$qmonth = mysqli_query($conn, "SELECT * FROM month");
	echo "<select name='monthid'>";
	while($row = mysqli_fetch_array($qmonth, MYSQLI_BOTH))
	{
		$monthid = $row['id'];
		$monthname = $row['month'];
		echo "<option value='$monthid'>$monthname</option>";
	}
	echo "</select>";
?>
<input type="submit" value="Load data file into database" name="upload"/>
</form>