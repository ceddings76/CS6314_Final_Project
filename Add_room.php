<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	$room_type = $_POST["room_type"];
	$city = $_POST["city"];
	$number = $_POST["room_number"];

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

	$sql = "INSERT INTO room (room_number, hotel_id, type_id, active) VALUES ($number, $loc, $type, 1);";



	if($con)
	{
		mysqli_query($con, $sql);			
		
		echo '<script type="text/javascript">';
		echo 'alert("Success! Room id '. $number .' added.");</script>';

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>