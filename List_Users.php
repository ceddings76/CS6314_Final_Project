<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- PW#5 Cliff Eddings cse170000-->
	<head>
		<!--Required Meta tags -->
		 <meta http-equiv="Content-Type" content="text/html;charset=utf-8" name="referer"/>
		 <meta content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		 <!-- CSS stylesheets-->
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
		
		 <!-- Title of the page, "Cliff Eddings"-->
		 <title>list_users</title>

	</head>

	<body>
	    <table class ="table table-striped table-bordered">
		    <?		    
				session_start();
				$con = mysqli_connect("localhost", "root", "root", "myHotel");

				if($con)
				{					

				
					$sql = "SELECT * FROM user";

					echo '<thead class="thead-dark"><tr><th> USER ID </th><th> First Name </th><th> Last Name </th><th> EMAIL </th><th>PASSWORD</th><th>IS_ADMIN</th></tr></thead>';

					$result = mysqli_query($con, $sql);
					
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>" . $row['user_id'] . "</td>";
						echo "<td>" . $row['fname'] . "</td>";
						echo "<td>" . $row['lname'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['password'] . "</td>";
						echo "<td>" . $row['is_admin'] . "</td>";
						echo "</tr>";
					}

				}
				else
				{
					echo"Unable to complete the request.";
					echo"Debbugging error: " + mysqli_connect_errno();
				}
				
			?>
		</table>


	</body>
</html