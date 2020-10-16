<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
if (isset($_POST['submit'])) {
    include "../config.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $id_number = $_POST['id_number'];

    mysqli_query($conn, "INSERT INTO drivers (id,name,age,id_number) VALUES ('$id','$name','$age','$id_number')");
    header("location:driver.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver</title>
</head>

<body>
    <div class="topnav">
        <a class="logout" href="../logout.php">Logout</a>
    </div>
    <div class="sidenav">
        <a class="logo" href="">BAMRI</a>
        <a href="../index.php">Home</a>
        <a href="../bus/bus.php">Bus</a>
        <a class="active" href="driver.php">Driver</a>
        <a href="../order/order.php">Order</a>
    </div>
    <div class="content">
        <div class="card">
            <div class="form">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Add Driver</h2>
                    <input type="text" name="name" placeholder="Nama">
                    <input type="number" name="age" placeholder="Umur">
                    <input type="text" name="id_number" placeholder="Id Number">
                    <input type="submit" name="submit" value="Save">
                </form>
            </div>
        </div>
        <div class="footer">&copy; Copyright 2020 Bamri</div>
    </div>
</body>

</html>