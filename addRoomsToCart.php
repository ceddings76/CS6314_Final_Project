<?php

	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$type_id = $_GET['type_id'];
	$quantity = $_GET['quantity'];
	$price = $_GET['price'];
	$img_src = $_GET['img_src'];
	$type_name = $_GET['type_name'];
	$localtion = $_GET['localtion'];

	$newKey = $type_id."||".$startDate."||".$endDate;
	$flag = false;
	foreach ($_COOKIE as $key=>$val)
	{
		if ($key == $newKey) {
			$item = explode('||', $val);
			$newQuantity = intval($item[3]) + intval($quantity);
			setcookie($newKey, $type_id."||".$startDate."||".$endDate."||".$newQuantity."||".$price."||".$img_src."||".$type_name."||".$localtion);
			$flag = true;
			break;
		}
	}
	if ($flag == false) {
		setcookie($newKey, $type_id."||".$startDate."||".$endDate."||".$quantity."||".$price."||".$img_src."||".$type_name."||".$localtion);
	}
?>