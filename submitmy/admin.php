<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panelo Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
    <?php
            require 'php/connect.inc.php';
            require 'php/core.inc.php';

        if(loggedin())
        {
            $id = $_SESSION['id'];
            $admin_branch = $_SESSION['branch'];
            if($_SESSION['usertype'] < 2)
            {
                $usertype = $_SESSION['usertype'];
    ?>
    <br><br>
    <div id="wrapper">

        <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Panelo Admin</a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" >
                <li>
                    <a href="#head_dash"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="#students"><i class="fa fa-user fa-fw"></i> Students</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file fa-fw"></i> Uploads<span class="fa fa-caret-down"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#upload">Upload a File</a>
                        </li>
                        <li>
                            <a href="#view_uploads">View Uploads</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-graduation-cap fa-fw"></i> Academic<span class="fa fa-caret-down"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#attendance">View Attendance</a>
                        </li>
                        <li>
                            <a href="#uploadatt">Upload .csv Sheet</a>
                        </li>
                        <li>
                            <a href="#results">Results</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#messages"><i class="fa fa-envelope fa-fw"></i> Messages</a>
                </li>
                <li>
                    <a href="#notes"><i class="fa fa-edit fa-fw"></i> Notes</a>
                </li>            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-gear fa-fw"></i>
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
                <li>
                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>

            </ul>
            </div>
            </nav>  
        <!-- Page Content -->
        <div id="wrapper">
            <div class="container-fluid">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" id="head_dash">Dashboard For Admin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- row to display message -->
                <?php  
                        // $userid="admin";
                if(isset($_POST['upload_request'])||isset($_POST['delete_file'])||isset($_POST['delete_message']))
                {
                ?>
                <div class="row">
                    <div class="panel panel-success" style="text-align:center">
                        <div class="panel-heading">
                            Alert Message
                        </div>
                        <div class="panel panel-body">
                            <?php
                            //file upload
                            if(isset($_POST['upload_request']))
                            {
                                $file_details=htmlentities($_POST['file_details']);
                                $tmp_name=htmlentities($_FILES['file']['tmp_name']);
                                $grad_year=htmlentities($_POST['grad_year']);
                                $target='upload/';
                                $time=time();
                                $filename = $username."_".$time;
                                $type=htmlentities($_POST['type']);
                                $extension=htmlentities($_POST['extension']);
                                if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$filename.".".$extension))
                                {
                                    echo "&#2713 File successfully uploaded";
                                    //query to insert filename in database
                                    $query_file=mysqli_query($conn,"INSERT INTO uploads ( filename , userid , file_details , branch , type , grad_year , extension ) VALUES ( '$filename' , '$username' , '$file_details' , '$admin_branch' , '$type' , '$grad_year' , '$extension' )");
                                }
                                  else
                                  echo "There was a problem uploading the file ".$_FILES['file']['error'];
                            }

                            //upload attendance
                            if(isset($_POST['upload_att']))
                            {
                                $location = "upload/attendance";
                                $filename = $location.$_FILES['file']['name'];
                                $monthid = $_POST['monthid'];
                                if($_FILES["file"]["type"] != "application/vnd.ms-excel")
                                die("This is not a CSV file.");

                                else if(move_uploaded_file($_FILES['file']['tmp_name'],$filename))
                                {
                                    $handle = fopen($filename, "r");
                                    $count = 0;
                                    while(($data = fgetcsv($handle, 1000, ",")) != FALSE)
                                    {
                                        $studentid = mysqli_real_escape_string($conn, $data[0]);
                                        $branch = mysqli_real_escape_string($conn, $data[1]);
                                        $year = mysqli_real_escape_string($conn, $data[2]);
                                        $section = mysqli_real_escape_string($conn, $data[3]);
                                        $subjectid = mysqli_real_escape_string($conn, $data[4]);
                                        $total = mysqli_real_escape_string($conn, $data[5]);
                                        $outof = mysqli_real_escape_string($conn, $data[6]);
                                        if($count!=0)
                                        $query_att = mysqli_query($conn, "INSERT INTO attendance ( monthid , studentid , branch , year , section , subjectid , total , outof ) VALUES ( '$monthid' , '$studentid' , '$branch' , '$year' , '$section' , '$subjectid' , '$total' , '$outof' ) ");
                                    $count++;
                                    }
                                    echo "Success";
                                }
                            }

                            //file delete
                            if(isset($_POST['delete_file']))
                            {
                                $delete_file = htmlentities($_POST['delete_file']);
                                $filename = htmlentities($_POST['filename']);
                                $location = 'upload/';  
                                $extension = htmlentities($_POST['extension']);
                                if($delete_file=='yes')
                                {
                                    if(chmod($location.$filename.'.'.$extension, 0755))
                                    {
                                        unlink($location.$filename.'.'.$extension);
                                        echo "&#2713 file successfully deleted";
                                    }
                                    else echo "<script type='text/javascript' >alert('Could not delete file');</script>";

                                    $query_Delete=mysqli_query($conn,"DELETE FROM uploads WHERE filename='$filename' AND extension = '$extension'");
                                }
                            }

                            //view profile

                            ?>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                <?php }?>

                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="#students">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Notifications</div>
                                </div>
                            </div>
                        </div>
                        <a href="#notifications">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Files Uploaded</div>
                                </div>
                            </div>
                        </div>
                        <a href="#upload">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>New Messages !</div>
                                </div>
                            </div>
                        </div>
                        <a href="#messages">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /#row -->
            <!-- #row -->
            <div id="row">
                <!-- students section -->
                <section id="students">
                <br><br><br>
                    <div class="panel panel-primary">
                        <div class="panel panel-heading" style="text-align:center;">
                            Students details
                        </div>
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT1">
                                    <thead>
                        
                                        <tr>
                                            <th>User</th>
                                            <th>Full Name</th>
                                            <th>Email Id</th>
                                            <th>Branch</th>
                                            <th>Year</th>
                                            <th>View Profile</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    //receiver id from connect.inc.php
                                    $yes='1';
                                    $stutype = 2;
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM users WHERE branch = '$admin_branch' AND usertype = '$stutype' ");
                                    $count=1;

                                     echo "<tbody>";
                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $username=$row['username'];
                                        $fullname=$row['name'];
                                        $email=$row['email'];
                                        $branch=$row['branch'];
                                        $year=$row['year'];
                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$username.'</td>
                                            <td>'.$fullname.'</td>
                                            <td>'.$email.'</td>
                                            <td class="center">'.$branch.'</td>
                                            <td class="center">'.$year.'</td>
                                            <td><form action="viewprofile.php" method="POST">
                                            <input type="hidden" name="studentid" value="'.$username.'">
                                            <input type="submit" name="profile" value="View" class="btn btn-primary">
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
                </section>
                <!-- /students section -->

                <!-- upload section -->
                <section id="upload">
                <br><br><br>
                    <div class="panel panel-yellow">
                        <div class="panel panel-heading" style="text-align:center">
                            Upload a new File
                        </div>
                        <div class="panel panel-body">
                                    <form role="form" action="admin.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-lg-6">
                                            <label>Details for file</label>
                                            <input class="form-control" name="file_details">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>For the Batch Year</label>
                                            <select class="form-control" name="grad_year">
                                                <option value="1">1st year</option>
                                                <option value="2">2nd year</option>
                                                <option value="3">3rd year</option>
                                                <option value="4">4th year</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>File Type</label>
                                            <select class="form-control" name="type">
                                                <option value="lab_manuals">Lab Manuals</option>
                                                <option value="notes">Notes</option>
                                                <option value="results">Results</option>
                                                <option value="syllabus">Syllabus</option>
                                                <option value="time_table">Time Table</option>
                                                <option value="video_lectures">Video Lectures</option>
                                                <option value="others">Other Files</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>File Extension</label>
                                            <select class="form-control" name="extension">
                                                <option value="xls">Excel Spreadsheet (.xls)</option>
                                                <option value="csv">CSV Spreadsheet (.csv)</option>
                                                <option value="pdf">Document (.pdf)</option>
                                                <option value="jpg">Image (.jpg)</option>
                                                <option value="png">Image (.png)</option>
                                                <option value="txt">Text File (.txt)</option>
                                             </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>File input</label>
                                            <input type="file" name="file">
                                        </div>
                                        <input type="hidden" name="upload_request" value="1">
                                        <div class="form-group col-lg-6">
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                

                        </div>
                        
                    </div>
                </section>
                <!-- /upload section -->

                <!-- view uploads -->
                <section id="view_uploads">
                <br><br><br>
                    <div class="panel panel-green">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Uploads
                        </div>
                                    
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT2">
                                    <thead>
                                        <tr>
                                            <th>Userid</th>
                                            <th>Filename</th>
                                            <th>Batch Year</th>
                                            <th>File Details</th>
                                            <th>File Type</th>
                                            <th>File_link</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //receiver id from connect.inc.php
                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM uploads WHERE branch = '$admin_branch'");
                                    $count=1;

                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $userid=$row['userid'];
                                        $filename=$row['filename'];
                                        $grad_year=$row['grad_year'];
                                        $file_details=$row['file_details'];
                                        $grad_year=$row['grad_year'];
                                        $extension=$row['extension'];
                                        $type=$row['type'];
                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$userid.'</td>
                                            <td>'.$filename.'</td>
                                            <td>'.$grad_year.'</td>
                                            <td>'.$file_details.'</td>
                                            <td>'.$type.'</td>
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                            <td><form action="admin.php" method="POST">
                                            <input type="hidden" name="filename" value="'.$filename.'">
                                            <input type="hidden" name="extension" value="'.$extension.'">
                                            <input type="hidden" name="delete_file" value="yes">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            </td>
                                        </tr>';                     
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /view uploads -->

                <!-- upload attendance section -->
                <section id="uploadatt">
                <br><br><br>
                    <div class="panel panel-red">
                        <div class="panel panel-heading" style="text-align:center">
                            Upload Attendance Sheet
                        </div>
                        <div class="panel panel-body">
                                    <form role="form" action="admin.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-lg-10">
                                            <label>The file must strictly be in .csv format,
                                            <a href="upload/attendance/att.csv">See a sample here. </a>
                                            Do not refresh page if upload started, it would take time.
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>File Input</label>
                                            <input type="file" name="file">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>For the month</label>
                                            <?php
                                                $qmonth = mysqli_query($conn, "SELECT * FROM month");
                                                echo "<select class='form-control' name='monthid'>";
                                                while($row = mysqli_fetch_array($qmonth, MYSQLI_BOTH))
                                                {
                                                    $monthid = $row['id'];
                                                    $monthname = $row['month'];
                                                    echo "<option value='$monthid'>$monthname</option>";
                                                }
                                                echo "</select>";
                                            ?>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <!-- <label>File input</label> -->
                                            <label>Load file into database</label>
                                            <input type="hidden" name="upload_att" value="1"><br>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        </div>                                        
                                    </form>
                                

                        </div>
                        
                    </div>
                </section>
                <!-- /upload section -->
                <!-- attendance -->
                <section id="attendance">
                <br><br><br>
                    <div class="panel panel-red">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Attendance
                        </div>
                                    
                        <div class="panel panel-body">
                            <form role="form" action="admin.php" method="POST">
                                <div class="form-group col-lg-4">
                                    <label for="branch">Branch</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $admin_branch;?>" disabled="">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label>Year</label>
                                    <select class="form-control" name="year">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <?php
                                    //select section from respective branch

                                ?>
                                <div class="form-group col-lg-4">
                                    <label>Section</label>
                                    <select class="form-control" name="section">
                                        <option value="a">a</option>
                                        <option value="b">b</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label>From</label>
                                    <select class="form-control" name="monthfrom">
                                        <option value="1">July</option>
                                        <option value="2">August</option>
                                        <option value="3">September</option>
                                        <option value="4">October</option>
                                        <option value="5">November</option>
                                        <option value="6">December</option>
                                        <option value="7">January</option>
                                        <option value="8">February</option>
                                        <option value="9">March</option>
                                        <option value="10">April</option>
                                        <option value="11">May</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label>To</label>
                                    <select class="form-control" name="monthto">
                                        <option value="1">July</option>
                                        <option value="2">August</option>
                                        <option value="3">September</option>
                                        <option value="4">October</option>
                                        <option value="5">November</option>
                                        <option value="6">December</option>
                                        <option value="7">January</option>
                                        <option value="8">February</option>
                                        <option value="9">March</option>
                                        <option value="10">April</option>
                                        <option value="11">May</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4">
                                <label>Subject</label>
                                <select class="form-control" name="subjectid">
                                <?php
                                    // get list of subjects
                                $query_subjects=mysqli_query($conn,"SELECT * FROM subjects WHERE branch= '$admin_branch' ");
                                while($row=mysqli_fetch_array($query_subjects,MYSQLI_BOTH))
                                {
                                    $subjectid   = $row['subjectid'];
                                    $subjectname = $row['subject'];
                                    $subjectyear = $row['year'];
                                    echo "<option value='$subjectid'>$subjectname( $subjectyear year    )</option>";
                                }

                                ?>
                                </select>
                                </div>
                                <input type="hidden" value="yes" name="view_att">
                                <div class="form-group col-lg-6">
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <?php
                        if(isset($_POST['view_att']) &&isset($_POST['year'])&&isset($_POST['section'])&&isset($_POST['monthto'])&&isset($_POST['monthfrom']))
                        {
                            $year=htmlentities($_POST['year']);
                            $section=htmlentities($_POST['section']);
                            $monthfrom=htmlentities($_POST['monthfrom']);
                            $monthto=htmlentities($_POST['monthto']);
                            $subjectid=htmlentities($_POST['subjectid']);
                            if(!empty($monthto)&&!empty($monthfrom)&&!empty($section))
                            {


                    ?>
                    <div class="panel panel-red">
                        <div class="panel panel-heading" style="text-align:center;">
                            Attendance
                        </div>
                                    
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT3">
                                    <thead>
                        
                                        <tr>
                                            <th>Userid</th>
                                            <th>Month</th>
                                            <th>Total Attendance</th>
                                            <th>Section</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //receiver id from connect.inc.php
                            
                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM attendance WHERE branch = '$admin_branch' AND year = '$year' AND section = '$section' AND subjectid='$subjectid' ");
                                    $count=1;

                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $studentid=$row['studentid'];
                                       $monthid=$row['monthid'];
                                       $total=$row['total'];

                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         

                                        if($monthid>=$monthfrom && $monthid<=$monthto)
                                        {
                                            $query_month=mysqli_query($conn,"SELECT * FROM month WHERE id = '$monthid' ");
                                            $monthname=mysqli_fetch_array($query_month,MYSQLI_BOTH)['month'];
                                        echo '<tr class="'.$class.'">
                                            <td>'.$studentid.'</td>
                                            <td>'.$monthname.'</td>
                                            <td>'.$total.'</td>
                                            <td class="center">'.$section.'</td>
                                            <td class="center">'.$year.'</td>
                                        </tr>';
                                        }                     
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }

                    ?>
                </section>
                <!-- /attendance -->

                <!-- results -->
                <section id="results">
                <br><br><br>
                    <div class="panel panel-lightblue">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Results
                        </div>
                                    
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT4">
                                    <thead>
                        
                                        <tr>
                                            <th>Userid</th>
                                            <th>Filename</th>
                                            <th>Batch Year</th>
                                            <th>File Details</th>     
                                            <th>File_link</th>
                                            <th>Delete File</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //receiver id from connect.inc.php
                                    $type='results';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM uploads WHERE branch = '$admin_branch' AND type='$type' ");
                                    $count=1;

                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $userid=$row['userid'];
                                        $filename=$row['filename'];
                                        $file_details=$row['file_details'];
                                        $grad_year=$row['grad_year'];
                                        $extension=$row['extension'];

                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$userid.'</td>
                                            <td>'.$filename.'</td>
                                            <td>'.$grad_year.'</td>
                                            <td>'.$file_details.'</td>
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                            <td><form action="admin.php" method="POST">
                                            <input type="hidden" name="filename" value="'.$filename.'">
                                            <input type="hidden" name="extension" value="'.$extension.'">
                                            <input type="hidden" name="delete_file" value="yes">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            </td>
                                        </tr>';                     
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /results -->
                
                <!-- notes -->
                <section id="notes">
                <br><br><br>
                    <div class="panel panel-pink">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Notes
                        </div>
                                    
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT5">
                                    <thead>
                        
                                        <tr>
                                            <th>Uploaded By</th>
                                            <th>Filename</th>
                                            <th>Batch Year</th>
                                            <th>File Details</th>
                                            <th>File_link</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    //receiver id from connect.inc.php
                                    $type='notes';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM uploads WHERE branch = '$admin_branch' AND type='$type' ");
                                    $count=1;

                                    while($row=mysqli_fetch_array($query_retrieve,MYSQLI_BOTH))
                                    {
                                        $userid=$row['userid'];
                                        $filename=$row['filename'];
                                        $file_details=$row['file_details'];
                                        $grad_year=$row['grad_year'];
                                        $extension=$row['extension'];

                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$userid.'</td>
                                            <td>'.$filename.'</td>
                                            <td>'.$grad_year.'</td>
                                            <td>'.$file_details.'</td>
                                          
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                            <td><form action="admin.php" method="POST">
                                            <input type="hidden" name="filename" value="'.$filename.'">
                                            <input type="hidden" name="extension" value="'.$extension.'">
                                            <input type="hidden" name="delete_file" value="yes">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            </td>
                                        </tr>';                     
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /notes -->
                <!-- messages -->
                <section id="messages">
                <br><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="text-align:center">
                            Messages
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT6">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Message Subject</th>
                                            <th>Received at</th>
                                            <th>Read</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $receiver_id='admin';

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
                                        if($important=='1') $imp='YES';
                                        else $imp='NO'; 
                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        $time=str_replace($receiver_id,'',$messageid);

                                        //selecting sender
                                        $query_find_sender=mysqli_query($conn,"SELECT sender , senderid FROM sendmail WHERE receiverid='$receiver_id' AND time='$time' AND subject='$subject' ");
                                        $row=mysqli_fetch_array($query_find_sender,MYSQLI_BOTH);
                                        $sender=$row['sender'];
                                        $senderid=$row['senderid'];
                                        $date=date_create();
                                        date_timestamp_set($date, $time);
                                        $original_time=date_format($date, 'M d,Y');

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$sender.' ('.$senderid.')</td>
                                            <td>'.$subject.'</td>
                                            <td>'.$original_time.'</td>
                                            <td class="center">YES</td>
                                            <td class="center"><button class="btn btn-primary" data-toggle="modal" data-target="#view">
                                             View
                                            </button></td>
                                            <td><form action="admin.php" method="POST">
                                            <input type="hidden" name="delete_message" value="yes">
                                            <input type="hidden" name="messageid" value="'.$messageid.'">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                            </td>
                                        </tr>';       

                                        echo '<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Message</h4>
                                        </div>
                                        <div class="modal-body">
                                        '.$message.'
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                    </div>
                               </div>';              
                                    }


                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /messages -->

            </div>
            <!-- /#row -->
            </div>
            <!-- /col-lg-10 -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div id="file_upload_display">
                                    <?php
                        //uploading the file
                        
                        ?>

                </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dT1').dataTable();
        $('#dT2').dataTable();
        $('#dT3').dataTable();
        $('#dT4').dataTable();
        $('#dT5').dataTable();
        $('#dT6').dataTable();
        // $('#students').dataTable();
    });
    </script>

<?php
    }
    else header('Location:error.php');
}
else
    header('Location:login.php');
?>


</body>

</html>
