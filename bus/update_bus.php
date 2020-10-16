<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
if (isset($_POST['cancel'])) {
    header("location:bus.php");
}
include '../config.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM bus WHERE id='$id'");
while ($d = mysqli_fetch_array($result)) {
    $plate_number = $d['plate_number'];
    $brand = $d['brand'];
    $seat = $d['seat'];
    $price_per_day = $d['price_per_day'];
}
if (isset($_POST['submit'])) {
    include '../config.php';
    $id = $_POST['id'];
    $plate_number = $_POST['plate_number'];
    $brand = $_POST['brand'];
    $seat = $_POST['seat'];
    $price_per_day = $_POST['price_per_day'];

    mysqli_query($conn, "UPDATE bus SET plate_number='$plate_number',brand='$brand',seat='$seat',price_per_day='$price_per_day' WHERE id='$id'");
    header("location:bus.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus</title>
</head>

<body>
    <div class="topnav">
        <a class="logout" href="../logout.php">Logout</a>
    </div>
    <div class="sidenav">
        <a class="logo" href="">BAMRI</a>
        <a href="../index.php">Home</a>
        <a class="active" href="bus.php">Bus</a>
        <a href="../driver/driver.php">Driver</a>
        <a href="../order/order.php">Order</a>

    </div>
    <div class="content">
        <div class="card">
            <div class="form">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Edit Bus</h2>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="text" name="plate_number" value="<?= $plate_number; ?>">
                    <select name="brand">
                        <option <?php if ($brand == "mercedes") {
                                    echo ("selected");
                                } ?> value="mercedes">Mercedes</option>
                        <option <?php if ($brand == "fuso") {
                                    echo ("selected");
                                } ?> value="fuso">Fuso</option>
                        <option <?php if ($brand == "scania") {
                                    echo ("selected");
                                } ?> value="scania">Scania</option>
                    </select>
                    <input type="number" name="seat" value="<?= $seat; ?>">
                    <input type="number" name="price_per_day" value="<?= $price_per_day; ?>">
                    <input type="submit" name="cancel" value="Batal">
                    <input type="submit" name="submit" value="Simpan">
                </form>
            </div>
        </div>
        <div class="footer">&copy; Copyright 2020 Bamri</div>
    </div>
</body>

</html>