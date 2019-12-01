<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	$room_id = $_POST["delete"];

	echo '<script type="text/javascript">';
	echo 'alert("Success! Room id '. $room_id .' deleted.");</script>';

	if($con)
	{				
		$sql = "UPDATE room SET active = 0 WHERE room_id = '$room_id';";

		mysqli_query($con, $sql);

		

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>