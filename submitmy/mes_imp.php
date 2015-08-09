<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Messages</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-pink">
                <div class="panel panel-heading">
                    Message Detail
                </div>

                <div class="panel panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Message Subject</th>
                                    <th>Received at</th>
                                    <th>View</th>
                                    <th style="max-width:100px">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_POST['remove']))
                                    {
                                        $no = '0';
                                        $messageid = htmlentities($_POST['messageid']);
                                        $query_nimp = mysqli_query($conn, "UPDATE message_info SET important = '$no' WHERE messageid = '$messageid' ");
                                    }

                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM message_info WHERE userid = '$receiver_id' AND important='$yes' ");
                                    $count=1;
                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $messageid=$row['messageid'];
                                        $subject=$row['subject'];
                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        $time=str_replace($receiver_id,'',$messageid);

                                        //selecting sender
                                        $query_find_sender=mysqli_query($conn,"SELECT sender , senderid FROM sendmail WHERE receiverid='$receiver_id' AND time='$time' AND subject='$subject' ");
                                        $row2=mysqli_fetch_array($query_find_sender,MYSQLI_BOTH);
                                        $sender=$row2['sender'];
                                        $senderid=$row2['senderid'];
                                        $date=date_create();
                                        date_timestamp_set($date, $time);
                                        $original_time=date_format($date, 'M d,Y');

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$sender.' ('.$senderid.')</td>
                                            <td>'.$subject.'</td>
                                            <td>'.$original_time.'</td>
                                            <td class="center">
                                            <form action="inbox.php?type=view" method="POST">
                                            <input type="hidden" name="messageid" value="'.$messageid.'">
                                            <button class="btn btn-primary" type="submit" name="view_mes">
                                             View
                                            </button>
                                            </form>
                                            </td>';
                                             
                                            echo '
                                            <td style="max-width:40px">
                                            <form action="inbox.php?type=imp" method="POST">
                                            <input type="hidden" name="messageid" value="'.$messageid.'">
                                            <input type="submit" value="Remove" name="remove" class="btn btn-danger">
                                            </form>
                                            </td>
                                        </tr>';

                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>