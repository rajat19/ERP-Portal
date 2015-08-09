<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Messages Sent</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel panel-heading">
                    Message Details
                </div>

                <div class="panel panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Receiver</th>
                                    <th>Message Subject</th>
                                    <th>Send at</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $senderid = $receiver_id;
                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM sendmail WHERE senderid = '$senderid' ");
                                    $count=1;
                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $class = ($count%2)?'odd':'even';
                                        $count++;
                                        $receiverid = $row['receiverid']; 
                                        $time  = $row['time'];
                                        $subject = $row['subject'];
                                        $messagesentid = $receiverid.$time;

                                        //selecting receiver
                                        $query_find_sender=mysqli_query($conn,"SELECT name FROM users WHERE username = '$receiverid' ");
                                        $row2=mysqli_fetch_array($query_find_sender,MYSQLI_BOTH);
                                        $receiver=$row2['name'];
                                        $date=date_create();
                                        date_timestamp_set($date, $time);
                                        $original_time=date_format($date, 'M d,Y');

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$receiver.' ('.$receiverid.')</td>
                                            <td>'.$subject.'</td>
                                            <td>'.$original_time.'</td>
                                            <td class="center">
                                            <form action="inbox.php?type=view" method="POST">
                                            <input type="hidden" name="messagesentid" value="'.$messagesentid.'">
                                            <button class="btn btn-primary" type="submit" name="view_mes">
                                             View
                                            </button>
                                            </form>
                                            </td>';
                                             
                                        //     echo '
                                        //     <td style="max-width:40px">
                                        //     <form action="inbox.php?type=imp" method="POST">
                                        //     <input type="hidden" name="messageid" value="'.$messageid.'">
                                        //     <input type="submit" value="Remove" name="remove" class="btn btn-danger">
                                        //     </form>
                                        //     </td>
                                        // </tr>';

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