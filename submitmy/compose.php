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
    <div id="wrapper">
<?php
            require 'php/connect.inc.php';
            require 'php/core.inc.php';

            if(loggedin())
            {
?>
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
                <li >
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
                            <a class="active" href="compose.php"><button>
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Message</h1>
                </div>
                    <?php 
        ini_set('short_open_tag',1);
        include 'php/connect.inc.php';

        //selecting sender name and id
        $id=$_SESSION['id'];
        $query_select_sender=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
        $row=mysqli_fetch_array($query_select_sender,MYSQLI_BOTH);
        $sender_name=$row['name'];
        $username=$row['username'];
        if(isset($_POST['receiverid'])&&isset($_POST['message']))
        {
            $sender=$sender_name;
            $receiverid=htmlentities($_POST['receiverid']);
            $senderid=$username;
            $subject=htmlentities($_POST['subject']);
            $message=htmlentities($_POST['message']);
            $current_time=time();
            if(!empty($receiverid)&&!empty($senderid)&&!empty($message))
            {
                $query_insert_message=mysqli_query($conn,"INSERT INTO sendmail ( senderid , subject , time , sender , receiverid , message ) VALUES ( '$username' , '$subject' , '$current_time' , '$sender' , '$receiverid' , '$message' ) ");
                if($query_insert_message)
                {
                    echo "Message was successfully send";
                    $no="0";
                    $yes="1";
                    $messageid_sender=$username.$current_time;
                    $messageid_receiver=$receiverid.$current_time;
                    //store in senders message info
                    $query_message_sender=mysqli_query($conn,"INSERT INTO message_info ( userid , messageid , message , inbox , important , sentmail , junk , subject ) VALUES ( '$username' , '$messageid_sender' , '$message' , '$no' , '$no' , '$yes' , '$no' , '$subject' ) ");

                    //store in receivers message info
                    $query_message_receiver=mysqli_query($conn,"INSERT INTO message_info ( userid , messageid , message , inbox , important , sentmail , junk , subject ) VALUES ( '$receiverid' , '$messageid_receiver' , '$message' , '$yes' , '$no' , '$no' , '$no' , '$subject' ) ");
                    if(!$query_message_sender || !$query_message_receiver)
                        echo mysqli_error($conn);

                }
                else echo mysqli_error($conn);
            }
            else
                echo "Wrong credentials";
        }
    ?>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-8 -->
                <div class="col-lg-8" id="send-pills">
                                    <h4>Send a Mail</h4>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                    <form role="form" method="POST" action="compose.php">
                                        <fieldset disabled>
                                        <div class="form-group">
                                            <label>Name of Sender</label>
                                            <input class="form-control" id="disabledInput" type="text"  name="sender" value="<?= $sender_name?>" 
                                            placeholder="<?= $sender_name?>">
                                        </div>
                                        <div class="form-group">
                                            <label>From</label>
                                            <input class="form-control" id="disabledInput" type="text" 
                                            name="senderid" placeholder="<?= $username?>"
                                            value="<?= $username?>" >
                                        </div>
                                        </fieldset>
                                        <div class="form-group">
                                            <label>Send To</label>
                                            <input class="form-control" placeholder="username of receiver" name="receiverid">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Subject Matter</label>
                                            <input class="form-control" placeholder="subject" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label>Message Content</label>
                                            <textarea class="form-control" rows="5" placeholder='Start typing' name="message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">Send Mail</button>
                                        <!-- <button type="reset" class="btn btn-default">Save as draft</button> -->

                                    </form>
                                </div>
                                <br><br>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
