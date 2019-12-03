<?
session_start();

$username = $_POST["username_from_login"];
$password = $_POST["password_from_login"];

//$password = password_hash('$password', PASSWORD_DEFAULT);

if(empty($username)|| empty($password))
{
	//header('Location: page1.html');
	echo '<script type="text/javascript">';
	echo 'alert("Invalid Username or Password");</script>';
}

//echo '<script type="text/javascript">';
//echo 'alert("Username '.$username.'  Password '.$password.'");</script>';

$con = mysqli_connect("localhost", "root", "root", "myhotel");

if($con)
{
	$sql = "SELECT * FROM user WHERE email = '$username';";

	$result = mysqli_query($con, $sql);	

	if(mysqli_num_rows($result) != 0)
	{		
		while($row = mysqli_fetch_array($result))
		{
			if(password_verify($password, $row['password']))
			{
				echo "User has signed in\n";
				$_SESSION["firstname"] = $row['fname'];
				$_SESSION["id"] = $row['user_id'];
				$_SESSION["admin"] = $row['is_admin'];
				header("Location: http://localhost/CS6314_Final_Project/booking_page.php");
			}
			else
			{
				header("Location: index.html");
			}
		}
	}
	else
	{
		header("Location: index.html");
	}

	
}
else
{
	echo"Unable to complete the request.";
	echo"Debbugging error: " + mysqli_connect_errno();
}


?>