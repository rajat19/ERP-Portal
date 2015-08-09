<?php

include 'php/connect.inc.php';
include 'php/core.inc.php';

if(loggedin())
{
	$id = $_SESSION['id'];
	if($id==1)
		header('Location:admin2.php');
	else
		header('Location:dashboard.php');
}
else
	header('Location:login.php');

?>