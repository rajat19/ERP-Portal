<h2>Achievements</h2>
<div class="panel panel-success" style="width:95%">
	<div class="panel-heading"><b>Past Achievements</b><br /></div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered" id="ach_table">
				<thead>
					<tr>
						<th>Achievement No.</th>
						
                        <th>Subject</th>
                        <th>Achievement Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
					</tr>
				</thead>

				<tbody>
					<?php

						$query = mysqli_query($conn, "SELECT * FROM achievements WHERE sid = '$username' ");
						$count = 1;

						while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
						{
							$ach_id = $row['aid'];

							$subject = $row['subject'];
							$details = $row['details'];
							$class = ($count%2)?'odd':'even';

							if(isset($_POST['edit']) && $ach_id==$_POST['ach_edit'])
							{
							echo "<tr class='$class'>
				            <td>$count</td>
                            <td><form action='dashboard.php?type=achieve' method='POST'>
                            <input type='text' name='updsubject' value='$subject'></td>
                            <td><input type='text' name='upddetails' value='$details'></td>
                          	<td>
                          	<input type='hidden' name='ach_upd' value='$ach_id'>
                            <input type='hidden' name='update' value='yes'>
                            <input type='submit' value='Update' class='btn btn-success'>
                            </form></td>
                            <td></td>
                            ";
							}
							else
							echo "<tr class='$class'>
				            <td>$count</td>
                            <td>$subject</td>
                            <td>$details</td>
                          	<td><form action='dashboard.php?type=achieve' method='POST'>
                          	<input type='hidden' name='ach_edit' value='$ach_id'>
                            <input type='hidden' name='edit' value='yes'>
                            <input type='submit' value='Edit' class='btn btn-success'>
                            </form></td>
                            <td><form action='dashboard.php?type=achieve' method='POST'>
                            <input type='hidden' name='ach_id' value='$ach_id'>
                            <input type='hidden' name='delete' value='yes'>
                            <input type='submit' value='Delete' class='btn btn-danger'>
                            </form></td>

                            ";
                            $count++;
						}
					?>
					<?php
						//update details
						if(isset($_POST['update']))
						{
							$upddetails = $_POST['upddetails'];
							$updsubject = $_POST['updsubject'];
							$ach_upd = $_POST['ach_upd'];

							$query_upd = mysqli_query($conn, "UPDATE achievements SET details = '$upddetails' , subject = '$updsubject' WHERE sid = '$username' AND id = '$ach_upd' ");
							header('Location:dashboard.php?type=achieve');
						}

						if(isset($_POST['delete']))
						{
							$ach_id = $_POST['ach_id'];

							$query_del = mysqli_query($conn, "DELETE FROM achievements WHERE id = '$ach_id' ");
							header('Location:dashboard.php?type=achieve');
						}
					?>

				</tbody>
			</table>
		</div>
	</div>
</div>
