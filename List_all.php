<?		    
	session_start();
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	if($con)
	{					

	
		$sql = "SELECT room_id, room_number, type_name, city, capacity, smoking, pets, price, active FROM room, room_type, hotel WHERE room.type_id = room_type.type_id AND hotel.hotel_id = room.hotel_id";

		$sql2 = "SELECT type_name FROM room_type;";

		$sql3 = "SELECT city FROM hotel";

		echo '<table class ="table table-striped table-bordered">';

		echo '<thead class="thead-dark"><tr><th> ROOM_ID </th><th> ROOM# </th><th> ROOM TYPE </th><th> LOCATION </th><th>CAPACITY</th><th>Smoking</th><th>Pets</th><th>Price</th><th>Active</th><th>Update</th><th>Delete</th></tr></thead>';

		$result = mysqli_query($con, $sql);
		$type = mysqli_query($con, $sql2);
		//$city = mysqli_query($con, $sql3)
		
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['room_id'] . "</td>";
			echo "<td>" . $row['room_number'] . "</td>";
			echo "<td>" . $row['type_name'] . "</td>";
			echo "<td>" . $row['city'] . "</td>";
			echo "<td>" . $row['capacity'] . "</td>";
			echo "<td>" . $row['smoking'] . "</td>";
			echo "<td>" . $row['pets'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			echo "<td>" . $row['active'] . "</td>";
			echo '<td><form method="post"><input type="hidden" id = "update" value="' . $row['room_id'] . '"/> <input type ="submit" value="Update"/></form></td>';
			echo '<td><form method="post"><input type="hidden" name ="delete" value="' . $row['room_id'] . '"/> <input type ="submit" id = "delete_btn" value="Delete"/></form></td>';
			echo "</tr>";
		}

		echo "<tr>";
			echo "<td></td>";
			echo "<td></td>";
			echo '<td><select name="room_type">';
			echo'<option value="All" selected>Select Room Type</option>';
			
			while($row1 = mysqli_fetch_array($type))
			{
				echo '<option value="'. $row1['type_name'].'">'. $row1['type_name'].'</option>';
			}
			
			echo '</select></td>';						
			echo '<td><select name = "city">';
			echo '<option value ="city">Select City</option>';
			echo '<option value="Dallas">Dallas</option>';
			echo '<option value="Houston">Houston</option>';
			echo '</select></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo "<td></td>";
			echo '<td><form method="post"><input type="hidden" name ="delete" value="Create"/> <input type ="submit" id = "New_btn" value="New Room"/></form></td>';
		echo "</tr>";

		echo '</table>';

	}
	else
	{
		echo"Unable to complete the request.";
		echo"Debbugging error: " + mysqli_connect_errno();
	}
	
?>