<?php 

$conn = mysqli_connect("localhost","root","","bamri");

// Check connection
if (mysqli_connect_errno()){
	echo "Connection failed : " . mysqli_connect_error();
}

?>