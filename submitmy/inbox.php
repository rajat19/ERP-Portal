<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nisani</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
            require 'php/connect.inc.php';
            require 'php/core.inc.php';

            if(loggedin())
            {
                $id=$_SESSION['id'];
                $receiver_id=mysqli_fetch_array(mysqli_query($conn,"SELECT username FROM users WHERE id='$id'"),MYSQLI_BOTH)['username'];
?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Student ERP Portal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links">
                <li>
                    <a href="dashboard.php">
                        Dashboard
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Message  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="inbox.php">
                                <i class="fa fa-envelope fa-fw"></i>Inbox               
                            </a>
                        </li>
                        <li>
                            <a href="compose.php">
                                <i class="fa fa-edit fa-fw"></i>Compose               
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Attendance  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Assignments  
                    </a>
                </li>
                <li>
                    <a href="study_material.php">
                        Study Material  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Examination  <i class="fa fa-caret-down"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Notifications  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                    <?php
                        $view_achieve = mysqli_query($conn, "SELECT * FROM achievements ORDER BY time DESC ");
                        $count = 0;
                        while($row = mysqli_fetch_array($view_achieve, MYSQLI_BOTH))
                        {
                            $count++;
                            if($count == 50) break;
                            $sid = $row['sid'];
                            $time = $row['time'];
                            $subject = $row['subject'];
                            $aid = $row['aid'];
                            $details = $row['details'];

                            $aname = mysqli_fetch_array(mysqli_query($conn,"SELECT name FROM users WHERE username = '$sid' " ), MYSQLI_BOTH)['name'];
                            $date=date_create();
                            date_timestamp_set($date, $time);
                            $original_time=date_format($date, 'M d,Y');
                            echo '<li>
                            <a href="#">
                                <div>
                                    <strong>'.$aname.'</strong>
                                    <span class="pull-right text-muted">
                                        <em>'.$original_time.'</em>
                                    </span>
                                </div>
                                <div>'.$subject.'</div>
                                <div>'.$details.'</div>
                            </a>
                        </li>
                        <li class="divider"></li>';
                        }
                    ?>
                    </ul>
                </li>    
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li style="text-align:center">
                            <a href="compose.php"><button>
                                Compose
                            </button></a>
                        </li>
                        <li style="text-align:center">
                            <a href="inbox.php" class="active"><i class="fa fa-envelope fa-fw"></i>Inbox</a>
                        </li>
                        <li style="text-align:center">
                            <a href="inbox.php?type=imp"><i class="fa fa-check fa-fw"></i>Important</a>
                        </li>
                        <li style="text-align:center">
                            <a href="inbox.php?type=sent"><i class="fa fa-twitter fa-fw"></i>Sent Mail</a>
                        </li>
                        <li style="text-align:center">
                            <a href="inbox.php?type=junk"><i class="fa fa-recycle fa-fw"></i>Junk</a>
                        </li>
                        <li style="text-align:center">
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php
        //mark message as important
        if(isset($_POST['mark_imp']))
        {
            $messageid = htmlentities($_POST['messageid']);
            $imp = '1';
            $query_upd = mysqli_query($conn, "UPDATE message_info SET important = '$imp' WHERE messageid = '$messageid' ");
            header('Location:inbox.php');
        }

        //move message to junk
        if(isset($_POST['delete_message']))
        {
            $messageid = htmlentities($_POST['messageid']);
            $yes = '1';$no = '0';
            $query_junk = mysqli_query($conn, "UPDATE message_info SET inbox = '$no' , important = '$no' , junk = '$yes' WHERE messageid = '$messageid' ");
            header('Location:inbox.php');
        }

        if(isset($_GET['type']))
        {
            $type = htmlentities($_GET['type']);
            switch($type)
            {
                case 'view':include 'mes_view.php';break;
                case 'imp':include 'mes_imp.php';break;
                case 'sent':include 'mes_sent.php';break;
                case 'junk':include 'mes_junk.php';break;

            }
        }
        else{
    

    echo  '<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Inbox</h1>
                    </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            One Place for all your mails
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Message Subject</th>
                                            <th>Received at</th>
                                            <th>View</th>
                                            <th>Important</th>
                                            <th style="max-width:100px">Move to Junk</th>
                                        </tr>
                                    </thead>';

                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM message_info WHERE userid = '$receiver_id' AND inbox='$yes' ");
                                    $count=1;

                                    echo "<tbody>";
                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $messageid=$row['messageid'];
                                        $message=$row['message'];
                                        $subject=$row['subject'];
                                        $important=$row['important'];
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
                                             
                                            if($important==0)
                                            echo '
                                            <td style="max-width:100px">
                                            <form action="inbox.php" method="POST">
                                            <input type="hidden" name="messageid" value="'.$messageid.'">
                                            <input type="submit" value="Mark Important" name="mark_imp" class="btn btn-warning">
                                            </form>
                                            </td>';
                                            else
                                            echo '<td>Yes</td>';

                                            echo '
                                            <td style="max-width:40px">
                                            <form action="inbox.php" method="POST">
                                            <input type="hidden" name="messageid" value="'.$messageid.'">
                                            <input type="submit" value="Junk" name="delete_message" class="btn btn-danger">
                                            </form>
                                            </td>
                                        </tr>';

                                    }


                                echo '</tbody>
                                </table>
                            </div>
                </div>

            </div>
            
        </div>';?>
        <!-- /#page-wrapper -->
        <?php }?>
    </div>
    <!-- /#wrapper -->
    <?php
        }//if ends
        else
            header('Location:login.php');

    ?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>