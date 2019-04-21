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
		$_SESSION['role']='customer';
		echo "yes";
	}
	else{
		if(mysqli_num_rows($result2)>0)
		{
			$_SESSION["myname"] = $user;
			while($row = mysqli_fetch_assoc($result2)){
				if($row['id_role'] == 1) $_SESSION['role']='admin';
				else $_SESSION['role']='manager';
			}
			echo "yes";
		}
		else
		{
			echo "no";
		}
	}
}
if(isset($_POST['action']) == 'logout')
{
	unset($_SESSION["myname"]);
	unset($_SESSION['role']);
}
if(isset($_POST['signup']))
{
	$user = $_POST['username'];
	$pass = $_POST['pass'];
	$lname = $_POST['lastname'];
	$fname = $_POST['firstname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$sql = "SELECT * FROM customer WHERE username='$user' ";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0){
		echo 'no';
	}
	else {
		$sql="INSERT INTO customer(lastname,firstname,username,password,email,phone,address)
		VALUES('$lname','$fname','$user','$pass','$email','$phone','$address');";
		mysqli_query($con, $sql);
		$_SESSION["myname"] = $user;
		$_SESSION['role']='customer';
		echo "yes";
	}
}
?>