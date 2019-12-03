<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");


	if($con)
	{
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
		$email = $_POST["email_from_signup"];
		$password = $_POST["password_from_signup"];

		$pass_hash = password_hash($password, PASSWORD_BCRYPT);

		$sql = "INSERT INTO user (fname, lname, email, password, is_admin) VAlUES ('$fname', '$lname', '$email', '$pass_hash', 0)";

		mysqli_query($con, $sql);

		$sql = "SELECT * FROM user WHERE email = '$email';";

		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_array($result))
		{
			echo "User has signed in\n";
			$_SESSION["firstname"] = $row['fname'];
			$_SESSION["id"] = $row['user_id'];
			$_SESSION["admin"] = $row['is_admin'];

			header("Location: http://localhost/CS6314_Final_Project/booking_page.php");
		}

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>