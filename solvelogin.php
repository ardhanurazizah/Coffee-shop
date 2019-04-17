<?php


session_start();

require("include/dbconnect.php");	
if(isset($_POST['login']))
{	
	
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$status = "success";
	$sql = "SELECT * FROM customer WHERE username='$user' AND password = '$pass'";
	$result = mysqli_query($con,$sql);
	$sql2 = "SELECT * FROM employee WHERE username ='$user' AND password = '$pass'";
	$result2= mysqli_query($con,$sql2);
	if(mysqli_num_rows($result)>0)
	{
		$_SESSION["myname"] = $user;
		echo "yes";
	}
	else{
		if(mysqli_num_rows($result2)>0)
		{
			$_SESSION["myname"] = $user;
			echo "yes";
		}
		else
		{
			echo "no";
		}
	}
}
if(isset($_POST['action']))
{
	unset($_SESSION["myname"]);
}

?>