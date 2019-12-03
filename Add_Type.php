<?		   
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");
	
	$room_type = $_POST["rtype"];
	$imagesrc = $_POST["imagename"];
	$capacity = $_POST["capacity"];
	$smoking = $_POST["smoking"];
	$pets = $_POST["Pets"];
	$cost1 = $_POST["roomcost"];

	$target_dir = "CS6314_Final_Project/img/";
	$target_file = $target_dir . basename($_FILES["imagefile"]["name"]);
	if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].'/'.$target_file))
		$test = 1;
	else
		$test = 0;

	$sql = "INSERT INTO room_type (type_name, img_src, capacity, smoking, pets, price) VALUES ('$room_type', '$imagesrc', '$capacity', '$smoking', '$pets', '$cost1');";

	if($con)
	{
		mysqli_query($con, $sql);

		header("Location: http://localhost/CS6314_Final_Project/admin.html");			
		
		
	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>