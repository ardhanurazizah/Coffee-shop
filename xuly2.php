<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'plus')
	{
		foreach($_SESSION["gio_hang"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
				{
					$_SESSION["gio_hang"][$keys]["so_luong"]+=1;
				}
		}
	}
	if($_POST["action"] == 'min')
	{
		foreach($_SESSION["gio_hang"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"] && $values["so_luong"] > 1)
				{
					$_SESSION["gio_hang"][$keys]["so_luong"]--;
				}
		}
	}
	if($_POST["action"] == 'order')
	{
		$check_cart = "true";
		$check_name = "true";
		$check_address = "true";
		$check_phone = "true";
		if(empty($_SESSION['gio_hang']))
		{
			$check_cart = "false";
		}
		if(!preg_match("/^([A-Z][a-z]*\s*)+$/",$_POST['order_name']))
		{
			$check_name = "false";
		}
		if(!preg_match("/^0\d{9,10}$/",$_POST['order_phone']))
		{
			$check_phone = "false";
		}
		$data = array(
			'check_cart'	=> $check_cart,
			'check_name'	=> $check_name,
			'check_address'	=> $check_address,
			'check_phone'	=> $check_phone
		);
		if($check_cart == "true" && $check_name = "true" && $check_address = "true" && $check_phone = "true")
		{
			$total_price = $_POST['total_price'];
			$method = $_POST['method'];
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$date = date('Y-m-d H:i:s',time());
			$note = $_POST['order_note'];
			$order_name = $_POST['order_name'];
			$order_address = $_POST['order_address'];
			$order_phone = $_POST['order_phone'];
			$cus_id = $_POST['id_cus'];
			require("include/dbconnect.php");
			
			$sql="INSERT INTO order_bill(cus_id,now,total_price,payment,note,user_name,user_phone,user_address)
				  VALUES('$cus_id','$date','$total_price','$method','$note','$order_name','$order_phone','$order_address');";
			mysqli_query($con,$sql);
			$sql1="SELECT MAX(id_bill) AS new_id FROM order_bill";
			$result=mysqli_query($con,$sql1);
			$row = mysqli_fetch_array($result);
			$id_bill = $row['new_id'];
			foreach($_SESSION["gio_hang"] as $keys => $values)
			{
				
				$pro_id = $values['product_id'];
				$qty = $values['so_luong'];
				$price = $values['product_price'];
				$sql2="INSERT INTO detail_order(id_bill,pro_id,qty,price)
				VALUES('$id_bill','$pro_id','$qty','$price');";
				mysqli_query($con,$sql2);
				unset($_SESSION["gio_hang"]);
			}
			mysqli_close($con);
		}
		echo json_encode($data);
	}
}

?>