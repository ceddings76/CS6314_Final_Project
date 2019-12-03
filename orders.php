<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Cart</title>

  <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Styles -->
  <link href="css/grayscale.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container" >
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Hotel Booking</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <p class="nav-link">Welcome,</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php"> My Orders</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="dropdown about-section mx-auto text-center">
  </div>

  <section class="details">
  <?php
  $con = mysqli_connect("localhost", "root", "root", "myHotel");
  if ($con) {
    $sql = "select HOTEL.city, HOTEL.address,room.room_number, ROOM_TYPE.type_name, BOOKING.start_date, BOOKING.end_date, BOOKING.order_date, BOOKING.total_price from booking join room on room.room_id = booking.room_id join hotel on room.hotel_id = hotel.hotel_id join ROOM_TYPE on room.type_id = ROOM_TYPE.type_id where booking.user_id = 1";
    $result = mysqli_query($con, $sql);

    echo "<table border='1'><tr><th>City</th><th>Address</th><th>Room#</th><th>Room Type</th><th>CheckIn Date</th><th>CheckOut Date</th><th>Order Date</th><th>Total Price</th></tr>";
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['city']."</td>";
      echo "<td>".$row['address']."</td>";
      echo "<td>".$row['room_number']."</td>";
      echo "<td>".$row['type_name']."</td>";
      echo "<td>".$row['start_date']."</td>";
      echo "<td>".$row['end_date']."</td>";
      echo "<td>".$row['order_date']."</td>";
      echo "<td>".$row['total_price']."</td></tr>";
    }

      echo "</table>";
    }
  ?>
    </section>

  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Your Website 2019
    </div>
  </footer>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Plugin JavaScript -->
   
  <script src="vendor/jquery-easing/jquery.easing.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/grayscale.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>