<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myhotel");

	
	if($con)
	{
		
		$room_id = $_POST["room"];
		$room_type = $_POST["room_type"];
		$city = $_POST["city"];
		$number = $_POST["num"];

		//echo '<script type="text/javascript">';
		//echo 'alert("Success! Variables '. $room_id.', '. $number.','.$room_type.', '.$city.' ");</script>';


		if($room_type == "1 King")
			$type = 1;
		else if ($room_type == "2 Queen")
			$type = 3;
		else if ($room_type == "1 King Smoking")
			$type = 4;
		else if ($room_type == "2 Queen Smoking")
			$type = 5;
		else if ($room_type == "1 King Pets")
			$type = 6;
		else if ($room_type == "King Suite")
			$type = 7;
		else if ($room_type == "King suite Smoking Pets")
			$type = 8;
		else if ($room_type == "2 Queen Pets")
			$type = 9;

		if($city == "Dallas")
			$loc = 1;
		else
			$loc = 3;

		$sql = "UPDATE room SET type_id = $type, hotel_id = $loc, room_number = $number WHERE room_id = $room_id;";

		mysqli_query($con, $sql);
		
		echo '<script type="text/javascript">';
		echo 'alert("Success! Room id '. $room_id .' updated.");</script>';
		

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>