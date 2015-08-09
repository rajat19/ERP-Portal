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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
            </nav>
                    <div id="wrapper">
                        <div class="row" style="margin:10px">
                            <div class="col-lg-1"> </div>
                            <div class="col-lg-10" style="text-align:center">
                                <div class="alert alert-danger">
                                    Study Material
                                </div>
                                <div class="panel panel-info">
                                    <div class="panel panel-heading" style="font-weight:bold;">
                                        Quick Access
                                    </div>

                                    <div class="panel panel-body" style="align-content:center">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-2">
                                        <div class="panel panel-primary" style="border-color:red;">
                                            <div class="panel-heading" style='background-color:red'>
                                                Notes
                                            </div>
                                            <div class="panel-body">
                                                <a href="dashboard.php?type=notes">
                                                <span><i class="fa fa-copy fa-5x" style='color:red'></i></span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <div class="col-lg-2">
                                        <div class="panel panel-primary" style="border-color:blue;">
                                            <div class="panel-heading" style='background-color:blue'>
                                                Syllabus
                                            </div>
                                            <div class="panel-body">
                                                <a href="dashboard.php?type=syllabus">
                                                <span><i class="fa fa-book fa-5x" style='color:blue'></i></span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <div class="col-lg-2">
                                        <div class="panel panel-primary" style="border-color:green;">
                                            <div class="panel-heading" style='background-color:green'>
                                                Lab Manuals
                                            </div>
                                            <div class="panel-body">
                                                <a href="dashboard.php?type=manuals">
                                                <span><i class="fa fa-file-text fa-5x" style='color:green'></i></span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <div class="col-lg-2">
                                        <div class="panel panel-primary " style="border-color:red";>
                                            <div class="panel-heading" style='background-color:yellow'>
                                                Video Lectures
                                            </div>
                                            <div class="panel-body">
                                                <a href="dashboard.php?type=lectures">
                                                <span><i class="fa fa-video-camera fa-5x" style='color:yellow'></i></span>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        </div>
                                        <div class="col-lg-2"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-1"> </div>
                <!-- /.col-lg-12 -->
                        </div>
                    </div>

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
