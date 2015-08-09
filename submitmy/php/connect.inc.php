<?php
//Setting random name , change it afterwards using session

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="nisani";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass);

$select_db=mysqli_select_db($conn,$dbname);
if(!$conn || !$select_db)
{
	die();
}
//default details
//change as soon as login credentials used

// $admin_branch="cse";


?>