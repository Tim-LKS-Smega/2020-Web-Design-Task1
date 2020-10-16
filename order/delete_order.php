<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
include "../config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM orders WHERE id='$id'");
header("location:order.php");
?>