<h2>Uploaded Notes</h2>
<div class="panel panel-red" style="width:95%">
	<div class="panel-heading"><b>Notes Details</b><br /></div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered" id="fee_table">
				<thead>
					<tr>
						<th>Uploaded By</th>
                        <th>Filename</th>
                        <th>File Details</th>
                        <th>File_link</th>
					</tr>
				</thead>

				<tbody>
					<?php
						//select branch of respective student
						$select_branch = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
						$row_user=mysqli_fetch_array($select_branch, MYSQLI_BOTH);
						$branch = $row_user['branch'];
						$year = $row_user['year'];
						$type_of_file = 'notes';

						$query = mysqli_query($conn, "SELECT * FROM uploads WHERE branch='$branch' AND type='$type_of_file' AND grad_year = '$year' ");
						$count = 1;

						while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
						{
							$userid=$row['userid'];
                            $filename=$row['filename'];
                            // $y=$row['grad_year'];
                            $file_details=$row['file_details'];
                            $extension=$row['extension'];
							// $class = 'odd';
							// if($count%2==0) $class = 'even';
							$class = ($count%2)?'odd':'even';
							echo "<tr class='$class'>
				            <td>$userid</td>
                            <td>$filename / $year / $branch</td>
                            <td>$file_details</td>
                          
                            <td class='center'><a href='upload/".$filename.".".$extension."'>".$filename."</a></td>
                                    </tr>
							";
                            $count++;
						}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
