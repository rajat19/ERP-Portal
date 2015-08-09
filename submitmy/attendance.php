	<h2>My Attendance</h2><br>
	<div class="panel panel-success" style="width:100%">
    	<div class="panel-heading"><b>Attendance</b></div>
		<?php
    // include 'php/core.inc.php';
			$sql=mysqli_fetch_array(mysqli_query($conn,"select * from users where id='$id'"),MYSQLI_BOTH);
			$name=$sql['name']; 
      $username = $sql['username'];
      $branch = $sql['branch'];
      $year = $sql['year'];
		?>
    <div class="panel panel-body">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="attendancetable">
              <thead>
  
                  <tr>
                      <th>Month Id</th>
                      <th>Month Name</th>
                      <th>Subject Id</th>
                      <th>Subject Name</th>
                      <th>Faculty Name</th>
                      <th>Total Attendance</th>
                      <th>Attendance %</th>
                  </tr>
              </thead>
              <?php
              //receiver id from connect.inc.php
              $yes='1';
              $query_retrieve=mysqli_query($conn,"SELECT * FROM attendance WHERE studentid = '$username' AND branch = '$branch'");
              $count=1;

              echo "<tbody>";
              while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
              {
                  $monthid = $row['monthid'];
                  $subjectid = $row['subjectid'];
                  $section = $row['section'];
                  $total = $row['total'];
                  $outof = $row['outof'];
                  if($count%2==0) $class='even';
                  else $class='odd';
                  $count++;         
                  $percent = $total/$outof * 100;
                  $percent= round($percent);
                  
                  //get month name
                  $monthname = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM month WHERE id='$monthid'"),MYSQLI_BOTH)['month'];

                  //getsubjectname and facultyname
                  $query_subject = mysqli_query($conn,"SELECT * FROM subjects WHERE subjectid='$subjectid' AND year='$year' AND branch='$branch' AND section='$section'");
                  $row_sub = mysqli_fetch_array($query_subject,MYSQLI_BOTH);
                  $subjectname = $row_sub['subject'];
                  $facultyname = $row_sub['teacher'];
                  echo '<tr class="'.$class.'">
                      <td>'.$monthid.'</td>
                      <td>'.$monthname.'</td>
                      <td>'.$subjectid.'</td>
                      <td>'.$subjectname.'</td>
                      <td>'.$facultyname.'</td>
                      <td>'.$total.'</td>
                      <td>'.$percent.'</td>
                  </tr>';                     
              }


              ?>



              </tbody>
          </table>
      </div>
  </div>
<div>
