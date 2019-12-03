<?php

	$localtion = $_GET['localtion'];
	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$type_id = $_GET['type_id'];
	$quantity = $_GET['quantity'];

	$cookie_name = $type_id."||".$startDate."||".$endDate;
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	$sql = "";

	if ($con) {
		$sql = "select count(*) as availableRooms from room join ROOM_TYPE on room.type_id = ROOM_TYPE.type_id where room.room_id not in (select room_id from BOOKING where BOOKING.start_date BETWEEN '$startDate' and '$endDate' or BOOKING.end_date BETWEEN '$startDate' and '$endDate') and room.active = 1 and room.hotel_id = '$localtion' and room.type_id = '$type_id'";
		$result = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($result)) {
			if (intval($row['availableRooms']) < intval($quantity)) {
				echo "<span style='color: red;'>Not enough available rooms.</span>";
				return;
			}
			else{
				$sql1 = "select room.room_id as room_id, ROOM_TYPE.price as price from room join ROOM_TYPE on room.type_id = ROOM_TYPE.type_id where room.room_id not in (select room_id from BOOKING where BOOKING.start_date BETWEEN '$startDate' and '$endDate' or BOOKING.end_date BETWEEN '$startDate' and '$endDate') and room.active = 1 and room.hotel_id = '$localtion' and room.type_id = '$type_id' limit $quantity";
				$result1 = mysqli_query($con, $sql1);
				$d1 = strtotime($startDate);
				$d2 = strtotime($endDate);
				$diff = abs($d1-$d2);
				$days = floor($diff/(60*60*24));
				while ($row1 = mysqli_fetch_array($result1)) {
					$room_id = intval($row1['room_id']);
					$total_price = doubleval($row1['price']) * $days;
				 $insertSql = "INSERT INTO BOOKING (booking_id,user_id,room_id,start_date,end_date,order_date,total_price) VALUES  (NULL, '1', '$room_id', '$startDate', '$endDate', CURRENT_DATE(), $total_price)";
				 	echo $insertSql;
				 	$result2 = mysqli_query($con, $insertSql);
				 }
				 unset($_COOKIE[$cookie_name]);
				 setcookie($cookie_name, '');

				 header("Location: http://localhost:8888/CS6314_Final_Project/cart.php");
			}
		}
	}


?>