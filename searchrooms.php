<?php

	$localtion = $_GET['localtion'];
	$startDate = $_GET['startDate'];
	$endDate = $_GET['endDate'];
	$roomType = $_GET['roomType'];
	$fromRecord = strval($_GET['fromRecord']);
	$endRecord = strval($_GET['endRecord']);
	$con = mysqli_connect("localhost", "root", "root", "myHotel");

	$sql = '';
	if ($con) {
		$sql = "select A.type_name, A.type_id, COUNT(A.room_id) as quantity, A.img_src, A.price, A.capacity, A.smoking, A.pets from (select room.room_id as room_id,room.type_id as type_id, ROOM_TYPE.type_name as type_name, ROOM_TYPE.img_src as img_src, ROOM_TYPE.price as price, ROOM_TYPE.capacity as capacity, ROOM_TYPE.smoking as smoking, ROOM_TYPE.pets as pets from room join ROOM_TYPE on room.type_id = ROOM_TYPE.type_id  where room.room_id not in (select room_id from BOOKING where BOOKING.start_date BETWEEN '$startDate' and '$endDate' or BOOKING.end_date BETWEEN '$startDate' and '$endDate') and room.active = 1 and room.hotel_id = '$localtion') as A GROUP by A.type_id ";


		if ($roomType != '') {
			$sql = $sql." having A.type_name like '%".$roomType."%'";
		}
		$sql = $sql." order by A.type_id ASC limit ".$fromRecord.",".$endRecord;

		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_array($result))
		{
		// echo "<div class='single_entity'>";
  //     	echo "<img src='img/".$row['img_src']."' class='rounded float-left img-thumbnail' alt='".$row['type_name']."' width='500' height='600'>";
  //     	echo "<dl class='row ml-auto' id='".$row['type_id']."'>";
  //     	echo "<dd class='col-sm-4 mt-3'>Room Type: ".$row['type_name']."</dd>";
  //       echo "<dd class='col-sm-4 mt-3'>Price: ".$row['price']."</dd>";
  //       echo "<dd class='col-sm-4 mt-3'>Avaiable Quantity: ".$row['quantity']."</dd>";
  //       echo "<dd class='col-sm-4 mt-3'> Quantity: <input type='text' id='selectedQuantity'></dd>";
  //       echo "<dd class='col-sm-4 mt-3'><button class='btn btn-primary my-1 mx-auto' onclick='addToCart(".$row['type_id'].")'>Add to cart</button></dd></dl></div>";
			echo "<div class='single_entity'>";
      	echo "<img src='img/".$row['img_src']."' class='rounded float-left img-thumbnail' alt='".$row['type_name']."' width='500' height='600'>";
      	echo "<ul class='list-group' id='".$row['type_id']."'>";
      	echo "<li class='list-group-item'>Room Type: <span id='roomType'>".$row['type_name']."</span></li>";
        echo "<li class='list-group-item'>Price: <span id='price'>".$row['price']."</span></li>";
        echo "<li class='list-group-item'>Avaiable Quantity: <span id='total'>".$row['quantity']."</span></li>";
        echo "<li class='list-group-item'> Quantity: <input type='text' id='selectedQuantity'></li>";
      	echo "<input type='hidden' id='img_src' value='".$row['img_src']."'>";
      	echo "<input type='hidden' id='localtion' value='".$localtion."'>";
        echo "<span id='errMsg1' style='display:none; color: red'>Please input the correct quantity.</span>";
        echo "<span id='errMsg2' style='display:none; color: red'>Booking quantity should be less than or equal to available quantity.</span>";
        echo "<dd class='col-sm-4 mt-3'><button class='btn btn-primary my-1 mx-auto' onclick='addToCart(".$row['type_id'].")'>Add to cart</button></dd></div>";
		}

		mysqli_close($con);
	}
	else {
		echo "Unable to connect database.".mysqli_connect_errno();
	}
?>