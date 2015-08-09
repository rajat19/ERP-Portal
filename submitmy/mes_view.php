<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">View Messages</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					Message Detail
				</div>

				<div class="panel panel-body">
					<?php
						if(isset($_POST['messageid']))
						{
							$messageid = htmlentities($_POST['messageid']);
							$query_message = mysqli_query($conn, "SELECT * FROM message_info WHERE messageid = '$messageid' ");

							$row = mysqli_fetch_array($query_message, MYSQLI_BOTH);
							$message = $row['message'];
							$subject = $row['subject'];
							$time=str_replace($receiver_id,'',$messageid);

							//selecting sender
                            $query_find_sender=mysqli_query($conn,"SELECT sender , senderid FROM sendmail WHERE receiverid='$receiver_id' AND time='$time' AND subject='$subject' ");
                            $row2=mysqli_fetch_array($query_find_sender,MYSQLI_BOTH);
                            $sender=$row2['sender'];
                            $senderid=$row2['senderid'];
                            $date=date_create();
                            date_timestamp_set($date, $time);
                            $original_time=date_format($date, 'M d,Y h:i:s');
                    ?>
                    <h3>Name of Sender : <?php echo $sender ."( ".$senderid." )";?></h3>
                    <h3>Received At : <?php echo $original_time;?></h3><br>
                    <h3>Subject : </h3>
                    <h4><?php echo $subject;?></h4><br>
                    <h3>Message : </h3>
                    <h4><?php echo $message;?></h4>
                    <?php
						}
					?>

					<?php
						if(isset($_POST['messagesentid']))
						{
							$messageid = htmlentities($_POST['messagesentid']);
							$query_message = mysqli_query($conn, "SELECT * FROM message_info WHERE messageid = '$messageid' ");

							$row = mysqli_fetch_array($query_message, MYSQLI_BOTH);
							$message = $row['message'];
							$subject = $row['subject'];
							$receiverid = $row['userid'];
							$time=str_replace($receiverid,'',$messageid);

							//selecting receiver
                            $query_find_sender=mysqli_query($conn,"SELECT name FROM users WHERE username='$receiverid' ");
                            $row2=mysqli_fetch_array($query_find_sender,MYSQLI_BOTH);
                            $receiver = $row2['name'];
                            $date=date_create();
                            date_timestamp_set($date, $time);
                            $original_time=date_format($date, 'M d,Y h:i:s');
                    ?>
                    <h3>Name of Receiver : <?php echo $receiver ."( ".$receiverid." )";?></h3>
                    <h3>Send At : <?php echo $original_time;?></h3><br>
                    <h3>Subject : </h3>
                    <h4><?php echo $subject;?></h4><br>
                    <h3>Message : </h3>
                    <h4><?php echo $message;?></h4>
                    <?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>