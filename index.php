<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
	<title>Index</title>
</head>

<body>
	<div class="topnav">
		<a class="logout" href="logout.php">Logout</a>
	</div>
	<div class="sidenav">
		<a class="logo" href="">BAMRI</a>
		<a class="active" href="index.php">Home</a>
		<a href="bus/bus.php">Bus</a>
		<a href="driver/driver.php">Driver</a>
		<a href="order/order.php">Order</a>

	</div>
	<div class="content">	
		<div class="footer">&copy; Copyright 2020 Bamri</div>
	</div>
</body>

</html>