<?php
require("../../include/dbconnect.php");
if(isset($_POST["action"])){
	$ad_id = $_POST["ad_id"];
	$ad_pass =$_POST["ad_pass"];
	$sql = "SELECT * FROM employee where username = '$ad_id' AND password = '$ad_pass'";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		echo "yes";
	}
	else{
	echo "no";
	}
}
mysqli_close($con);
?>