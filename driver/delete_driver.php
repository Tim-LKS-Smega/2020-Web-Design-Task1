<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM drivers WHERE id='$id'");
header("location:driver.php");
