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
}

?>