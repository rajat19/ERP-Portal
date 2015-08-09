<h2>Uploaded Time Tables</h2>
<div class="panel panel-pink" style="width:95%">
	<div class="panel-heading"><b>Time Table</b><br /></div>
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
						$select_branch = mysqli_query($conn, "SELECT branch FROM users WHERE username='$username'");
						$branch = mysqli_fetch_array($select_branch, MYSQLI_BOTH)['branch'];
						$type_of_file = 'time_table';

						$query = mysqli_query($conn, "SELECT * FROM uploads WHERE branch='$branch' AND type='$type_of_file' ");
						$count = 1;

						while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
						{
							$userid=$row['userid'];
                            $filename=$row['filename'];
                            $file_details=$row['file_details'];
                            $extension=$row['extension'];
							// $class = 'odd';
							// if($count%2==0) $class = 'even';
							$class = ($count%2)?'odd':'even';
							echo "<tr class='$class'>
				            <td>$userid</td>
                            <td>$filename</td>
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
