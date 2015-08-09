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

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

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

            if(loggedin() && $_SESSION['usertype'] == 2)
            {
                $id=$_SESSION['id'];
                $query_select=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");

                $row=mysqli_fetch_array($query_select,MYSQLI_BOTH);
                $username=$row['username'];
                $name=$row['name'];
                $email=$row['email'];
                
                //Add name to edu_med_info and pers_info if not exists
                $query1 = mysqli_query($conn, "SELECT sid FROM edu_med_info WHERE sid = '$username'");
                if(mysqli_num_rows($query1) == 0)
                {
                    $query2 = mysqli_query($conn, "INSERT INTO edu_med_info ( sid ) VALUES ( '$username' )");
                }
                $query3 = mysqli_query($conn, "SELECT sid FROM pers_info WHERE sid = '$username'");
                if(mysqli_num_rows($query1) == 0)
                {
                    $query4 = mysqli_query($conn, "INSERT INTO pers_info ( sid ) VALUES ( '$username' )");
                }

                //achievements add

                if(isset($_POST['ach_submit']))
                {
                    $aid = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM achievements WHERE sid = '$username' "));
                    $subject = htmlentities($_POST['subject']);
                    $details = htmlentities($_POST['details']);
                    $time = time();
                    $aid +=1;

                    $query_achievement = mysqli_query($conn, "INSERT INTO achievements ( sid , aid , time , subject , details ) VALUES ( '$username' , '$aid' , '$time' , '$subject' , '$details' ) ");
                    if($query_achievement)
                        echo "<script type='text/javascript'>alert('Achievement added');</script>";

                    // header('Location:dashboard.php');
                }

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
                <a class="navbar-brand" href="dashboard.php">Student ERP Portal</a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-collapse">
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="dashboard.php?type=att">
                        Attendance  
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
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div align="center">
                                <?php
                                    $query_profile_pic = mysqli_query($conn, "SELECT profile FROM pers_info WHERE sid = '$username'");
                                    if(mysqli_num_rows($query_profile_pic) > 0)
                                    {
                                        $profile = mysqli_fetch_array($query_profile_pic, MYSQLI_BOTH)['profile'];
                                        if(strlen($profile) > 0)
                                            echo '<img src="upload/profile/'.$profile.'" height="150px" width="200px" style="margin:-30px 20px 25px 20px; ">';
                                        else
                                            echo '<img src="images/attendance.png" height="150px" width="150px" style="margin:-30px 20px 25px 20px; ">';
                                    }
                                    else
                                        echo '<img src="images/attendance.png" height="150px" width="150px" style="margin:-30px 20px 25px 20px; ">';
                                ?>
                                
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li style="text-align:center">
                            <a href="dashboard.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li style="text-align:center">
                            <a href="#"><i class="fa fa-user fa-fw"></i><?php echo $name;?>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i>View Profile</a>
                                </li>
                                <li>
                                    <a href="dashboard.php?type=edit_info"><i class="fa fa-edit fa-fw"></i>Edit Profile</a>
                                </li>
                            </ul>
                        </li>
                       <!--  <li style="text-align:center">
                            <a href="dashboard.php"><i class="fa fa-edit fa-fw"></i> Edit Profile</a>
                        </li> -->
                        <li style="text-align:center">
                            <a href="dashboard.php?type=achieve"><i class="fa fa-sitemap fa-fw"></i> Past Achievements</a>
                        </li>
                        <li style="text-align:center">
                            <a href="dashboard.php"><i class="fa fa-sitemap fa-fw"></i> Menu 2</a>
                        </li>
                        <li style="text-align:center">
                            <a href="dashboard.php"><i class="fa fa-graduation-cap fa-fw"></i> About</a>
                        </li>
                        <li style="text-align:center">
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
        <!-- the php part -->
                <br>
                <?php

                // Check which page to include
                if(isset($_GET['type']))
                {
                    $type = htmlentities($_GET['type']);
                    switch($type)
                    {
                        case 'att':include 'attendance.php';break;
                        case 'edit_info':include 'edit_info.php';break;
                        case 'reg_events':include 'register_events.php';break;
                        case 'fee':include 'fee.php';break;
                        case 'notes':include 'notes.php';break;
                        case 'achieve':include 'achievements.php';break;
                        case 'syllabus':include 'syllabus.php';break;
                        case 'manuals':include 'lab_manuals.php';break;
                        case 'lectures':include 'video_lectures.php';break;
                        case 'time_table':include 'time_table.php';break;
                    }
                }

                else
                    echo '<div class="col-lg-6" style="text-align:center;">
            <div class="alert alert-danger" style="border-color:#0099FF; font-size:18px;background-color:#0099FF; color:#FFFFFF">
                Dashboard
            </div>
    </div>
    <a href="#achievements" data-toggle="modal">
    <div class="col-lg-6" style="text-align:center;">
            <div class="alert alert-danger" style="border-color:#009933; font-size:18px;background-color:#009933; color:#FFFFFF">
                Achievements
            </div>
    </div></a>

<div class="col-lg-12">
<div class="panel panel-info" align="center" >
    <div class="panel-heading" style="height:45px; font-size:16px">Quick Access</div>
        <div class="panel-body" >
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:red;">
                <div class="panel-heading" style="background-color:#FF0033">MailBox</div>
                <div class="panel-body">
                    <a href="inbox.php">
                    <img src="images/mail.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:green;">
                <div class="panel-heading" style="background-color:#339900">Edit Profile</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=edit_info">
                    <img src="images/profile.png" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#330099">
                <div class="panel-heading" style="background-color:#6633CC">Time Table</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=time_table">
                    <img src="images/download.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#FF9900">
                <div class="panel-heading" style="background-color:#FFCC33">Attendance</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=att">
                    <img src="images/attendance.png" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:red;">
                <div class="panel-heading" style="background-color:#FF3333">Grades</div>
                <div class="panel-body">
                    <a href="#">
                    <img src="images/grades.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#000066">
                <div class="panel-heading" style="background-color:#0066FF">Fee Report</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=fee">
                    <img src="images/fees.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-info" align="center">
        <div class="panel-heading" style="height:45px;"></div>
        <div class="panel-body">
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:red;">
                <div class="panel-heading" style="background-color:#FF0033">Notes</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=notes">
                    <img src="images/notes1.png" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:green;">
                <div class="panel-heading" style="background-color:#339900">Event Register</div>
                <div class="panel-body">
                    <a href="dashboard.php?type=reg_events">
                    <img src="images/events.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#330099;">
                <div class="panel-heading" style="background-color:#6633CC">Hostel</div>
                <div class="panel-body">
                    <a href="#">
                    <img src="images/hostel-management.jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#FF9900;">
                <div class="panel-heading" style="background-color:#FFCC33">Library</div>
                <div class="panel-body">
                    <a href="#">
                    <img src="images/library-management-software.png" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:red;">
                <div class="panel-heading" style="background-color:#FF3333">Holidays</div>
                <div class="panel-body">
                    <a href="#">
                    <img src="images/holidays.png" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-primary" style="border-color:#000066;">
                <div class="panel-heading" style="background-color:#0066FF">FAQ</div>
                <div class="panel-body">
                    <a href="#">
                    <img src="images/download (2).jpg" height="100px" width="100px">
                    </a>
                </div>
            </div>
        </div>
        </div>
   </div>
</div>
</div>
  <div class="modal fade" id="achievements" role="dialog">
  <div class="modal-dialog" style="margin-top:80px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Achievements</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="dashboard.php" method="POST">
            <div class="form-group">
              <label for="subject" >New Achievements</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Achievement Name">
            </div>
            <div class="form-group">
              <label for="msg">Details </label>
                <textarea class="form-control" id="msg" rows="5" name="details"></textarea> 
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="ach_submit">Submit</button>
            </div>
            </form>
        </div>
      </div>
      
  </div>
  </div>';

                ?>
    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php
        }//if ends
        else
            header('Location:login.php');

    ?>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#attendancetable').dataTable();
        $('#fee_table').dataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
        });
        $('#ach_table').dataTable();
        });
    </script>
</body>

</html>