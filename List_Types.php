<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	if($con)
	{					

	
		$sql = "SELECT * FROM room_type ";

		//$sql2 = "SELECT type_id, type_name FROM room_type;";

		//$sql3 = "SELECT hotel_id, city FROM hotel";

		echo '<table id = "all_types" class ="table table-striped table-bordered">';

		echo '<thead class="thead-dark"><tr><th> TYPE_ID </th><th> TYPE_NAME </th><th> IMG_SRC </th><th> CAPACITY </th><th>Smoking</th><th>Pets</th><th>Price</th></tr></thead>';

		$result = mysqli_query($con, $sql);
		$type = mysqli_query($con, $sql2);
		//$city = mysqli_query($con, $sql3)
		
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo '<td>' . $row['type_id'] . '</td>';
			echo '<td>'. $row['type_name'] . '</td>';
			echo '<td>' . $row['img_src'] . '</td>';
			echo '<td>' . $row['capacity'] . '</td>';
			echo '<td>' . $row['smoking'] . '</td>';
			echo '<td>' . $row['pets'] . '</td>';
			echo '<td>' . $row['price'] . '</td>';
			echo "</tr>";
		}

			echo '</table>';

			echo '<form action="Add_Type.php" method="POST" id = "new_type_form" enctype="multipart/form-data">';
			echo '</br>&nbsp&nbsp<label>New Room Type Form.</label></br>';
			echo '&nbsp&nbsp<label>Enter room type name: </label>&nbsp<input type = "text" name = "rtype" />&nbsp&nbsp';
			echo '&nbsp<label>Enter the image name: </label>&nbsp<input type = "text" name = "imagename" />&nbsp';
			echo '&nbsp<label>Enter the room capacity</label>&nbsp<input type = "number" name = "capacity" />&nbsp';
			echo '&nbsp<label>Smoking?</label>&nbsp';					
			echo '<select name = "smoking">';
			echo '<option value="1">Yes</option>';
			echo '<option value="0">No</option>';
			echo '</select>&nbsp';
			echo '</br>&nbsp&nbsp<label>Pet Friendly?</label>&nbsp';
			echo '<select name = "Pets">';
			echo '<option value="1">Yes</option>';
			echo '<option value="0">No</option>';
			echo '</select>&nbsp';
			echo '<label>Enter a price</label>&nbsp<input type = "number" name = "roomcost" />&nbsp&nbsp&nbsp';
			echo '<label>Upload Image file: </label>&nbsp<input type="file" name="imagefile" id="image">&nbsp';
			echo '<input type="submit" value="Submit"></form>';

		

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>