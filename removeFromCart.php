<?php

$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$type_id = $_GET['type_id'];
	$cookie_name = $type_id."||".$startDate."||".$endDate;
	unset($_COOKIE[$cookie_name]);
	setcookie($cookie_name, '');
?>