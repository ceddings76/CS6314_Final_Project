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
		 <title>list_all</title>

	</head>

	<body>
	    <table class ="table table-striped table-bordered">
		    <?		    
				session_start();
				$con = mysqli_connect("localhost", "root", "root", "myHotel");

				$room_id = $_POST["room"];

				if($con)
				{				
					$sql = "UPDATE room SET active = 0 WHERE room_id = $room_id;";

					echo "Delete success."


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