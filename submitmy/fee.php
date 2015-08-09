<h2>FEE DETAILS</h2>
<div class="panel panel-success" style="width:95%">
	<div class="panel-heading"><b>FEE DETAILS</b><br /></div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered" id="fee_table">
				<thead>
					<tr>
						<th>Semester</th>
						<th>Total Amount</th>
						<th>Discount</th>
						<th>Net Amount</th>
						<th>Net Paid</th>
						<th>Dues(if any)</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query = mysqli_query($conn, "SELECT * FROM fees WHERE sid= '$username'");
						$count = 1;

						while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
						{
							$semester = $row['semester'];
							$total = $row['total'];
							$discount = $row['discount'];
							$net = $row['net'];
							$paid = $row['paid'];
							$dues = $row['dues'];
							// $class = 'odd';
							// if($count%2==0) $class = 'even';
							$class = ($count%2)?'odd':'even';
							echo "<tr class='$class'>
								  <td>$semester</td>
								  <td><sup>&#8377</sup> $total</td>
								  <td><sup>&#8377</sup> $discount</td>
								  <td><sup>&#8377</sup> $net</td>
								  <td><sup>&#8377</sup> $paid</td>
								  <td><sup>&#8377</sup> $dues</td>
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
