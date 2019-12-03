<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (is_null($_SESSION["id"]) || $_SESSION['id']=='') {
    header('Location: index.html');
  }
?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Booking Page</title>

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
  <script src="js/booking_page.js"></script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Hotel Booking</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <p class="nav-link">Welcome, <?php echo $_SESSION['firstname']; ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php"> My Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="booking_page.php">Book Room</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- DropDown Section -->
  <div class="dropdown about-section mx-auto text-center">
    <form class="form-inline d-flex">
      <div class="four-layer">
        <h4 class="text-white">Location</h4>
        <select class="custom-select my-1 mr-sm-0" name="localtion" id="localtion">
          <option value = "" selected>Choose...</option>
          <option value="1">Dallas</option>
          <option value="3">Houston</option>
        </select>
        <span id="err1" style="color: red; display: none">Please select location.</span>      
      </div>
      <div class="five-layer">
        <h4 class="text-white">Check-in Date</h4>
        <input type="date" id="startDate" name="checkin">
        <span id="err2" style="color: red; display: none">Please select check-in date.</span> 
      </div>
      <div class="four-layer">
        <h4 class="text-white">Check-out Date</h4>
        <input type="date" id="endDate" name="checkout">
        <span id="err3" style="color: red; display: none">Please select check-out date.</span> 
      </div>    
      <div class="five-layer">
        <h4 class="text-white">Room Type</h4>
        <input type="text" id="roomType" name="roomType">
      </div>   
      <button type="button" class="btn btn-primary my-1 mx-auto" id="button" onclick="searchRooms()">Submit</button>
    </form>
  </div>


  <!-- Show Details -->
  <section class="details"  id='txtHint'>
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