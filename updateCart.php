<?php

	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$type_id = $_GET['type_id'];
	$quantity = $_GET['quantity'];
	$cookie_name = $type_id."||".$startDate."||".$endDate;
	foreach ($_COOKIE as $key=>$val)
	{
		if ($key == $cookie_name) {
			$item = explode('||', $val);
			setcookie($cookie_name, $item[0]."||".$item[1]."||".$item[2]."||".$quantity."||".$item[4]."||".$item[5]."||".$item[6]."||".$item[7]);
			break;
		}
	}


?>