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

    <div id="wrapper">

        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
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
                    <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
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
                            <a href="#attendance">Attendance</a>
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
                <li>
                    <a href="#settings"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>

            </ul>
            </div>
            </nav>  
            <br><br>
        <!-- Page Content -->
        <div id="wrapper">
            <div class="container-fluid bg-inverse">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-inverse">Dashboard For Admin</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

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
                        <a href="messages">
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
            <?php
                        include 'php/connect.inc.php';
                        $userid="admin";

            ?>
            <div id="row">
                <!-- students section -->
                <section id="students">
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
                                        </tr>
                                    </thead>
                                    <?php
                                    //receiver id from connect.inc.php
                                    $yes='1';
                                    $query_retrieve=mysqli_query($conn,"SELECT * FROM users WHERE branch = '$admin_branch'");
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
                
                    <div class="panel panel-yellow">
                        <div class="panel panel-heading" style="text-align:center">
                            Upload a new File
                        </div>
                        <div class="panel panel-body">
                                    <form role="form" action="admin3.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group col-lg-10">
                                            <label>Details for file</label>
                                            <input class="form-control" name="file_details">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label>File Type</label>
                                            <select class="form-control" name="type">
                                                <option value="results">Results</option>
                                                <option value="notes">Notes</option>
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
                                            <th>File Details</th>
                                            <th>File Type</th>
                                            <th>File_link</th>
                                            
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
                                        $file_details=$row['file_details'];
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
                                            <td>'.$file_details.'</td>
                                            <td>'.$type.'</td>
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                          
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

                <!-- attendance -->
                <section id="attendance">
                    <div class="panel panel-red">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Attendance
                        </div>
                                    
                        <div class="panel panel-body">
                            <form role="form" action="admin3.php" method="POST">
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
                <section id="view_uploads">
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
                                            <th>File Details</th>
                                            
                                            <th>File_link</th>
                                            
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
                                        $extension=$row['extension'];

                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$userid.'</td>
                                            <td>'.$filename.'</td>
                                            <td>'.$file_details.'</td>
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                          
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
                <section id="view_uploads">
                    <div class="panel panel-pink">
                        <div class="panel panel-heading" style="text-align:center;">
                            View Notes
                        </div>
                                    
                        <div class="panel panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dT5">
                                    <thead>
                        
                                        <tr>
                                            <th>Userid</th>
                                            <th>Filename</th>
                                            <th>File Details</th>
                                            <th>File_link</th>
                                            
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
                                        $extension=$row['extension'];

                                        if($count%2==0) $class='even';
                                        else $class='odd';
                                        $count++;         
                                        // $time=str_replace($receiver_id,'',$messageid);

                                        // echo $original_time=date('M d,Y',strtotime('+ '.$time));
                                        echo '<tr class="'.$class.'">
                                            <td>'.$userid.'</td>
                                            <td>'.$filename.'</td>
                                            <td>'.$file_details.'</td>
                                          
                                            <td class="center"><a href="upload/'.$filename.'.'.$extension.'">'.$filename.'</a></td>
                                          
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
                                            <th>Important</th>
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
                                            <td class="center">'.$imp.'</td>
                                        </tr>';                     
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
                        if(isset($_POST['upload_request']))
                        {
                            $file_details=htmlentities($_POST['file_details']);
                            $tmp_name=htmlentities($_FILES['file']['tmp_name']);
                            $target='upload/';
                            $time=time();
                            $filename = $username."_".$time;
                            $type=htmlentities($_POST['type']);
                            $extension=htmlentities($_POST['extension']);
                            if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$filename.".".$extension))
                            {
                                echo "<script type='text/javascript'>alert('&#x2713;File successfully uploaded');</script>";
                                //query to insert filename in database
                                $query_file=mysqli_query($conn,"INSERT INTO uploads ( filename , userid , file_details , branch , type , extension ) VALUES ( '$filename' , '$username' , '$file_details' , '$admin_branch' , '$type' , '$extension' )");
                            }
                              else
                              echo "<script type='text/javascript'>alert('&#x2717;There was a problem uploading the file ".$_FILES['file']['error']."');</script>";
                        }
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
</body>

</html>
