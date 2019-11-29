		    <?		    
				session_start();
				$con = mysqli_connect("localhost", "root", "root", "myhotel");

				$location = $_POST["local1"];
				$checkin =  $_POST["start"];
				$checkout = $_POST["end"];

				if($con)
				{					

				
					$sql = "SELECT room_id, type_name, img_src, capacity, smoking, pets, price FROM room, room_type WHERE room.type_id = room_type.type_id and room.active = 1 and room.hotel_id = (SELECT hotel_id FROM hotel WHERE city = '$location') and room.room_id not in(select room_id from booking WHERE start_date BETWEEN '$checkin' and '$checkout' and end_date BETWEEN '$checkin' and '$checkout');";

					//AND room_id <> (SELECT room_id FROM booking WHERE start_date >= $checkin AND end_date <= $checkout)
					$result = mysqli_query($con, $sql);


					//echo '<div class="single_entity" ><p>Success!!!</p></div>';

					while($row = mysqli_fetch_array($result))
					{
						echo '<div class="single_entity" >';
						echo '<img src=" img/'. $row['img_src'] .'" class="rounded float-left img-thumbnail" alt="King bed" width="500" height="600">';
						echo '<dl class="row ml-auto">';
						echo '<dt class="col-sm-3 h4 mt-3">Main amenities</dt><dd class="col-sm-5 mt-3">';
						echo '<p>Room number: '. $row['room_id'].'</p><p> Room Type: '. $row['type_name'].'</p>';
						echo '<p>Max capacity: '. $row['capacity'].'<p>Free WiFi</p><p>Free Parking</p>';
						if($row['pets'] == 1)
							echo '<p>Pet Friendly</p>';
						else
							echo '<p>No Pets Allowed</p>';
						if($row['smoking'] == 1)
							echo '<p>Smoking</p>';
						else
							echo '<p>Non Smoking</p>';
						echo '</dd>';
						echo ' <dt class="col-sm-3 h4 mt-3">Price: $'. $row['price'].'</dt>';
						echo '<dd class="col-sm-4 mt-3"><button type="submit" class="btn btn-primary my-1 mx-auto">Add to cart</button></dd></dl>  </div>';
					}

				}
				else
				{
					echo"Unable to complete the request.";
					echo"Debbugging error: " + mysqli_connect_errno();
				}
				
			?>