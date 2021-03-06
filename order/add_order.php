<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
if (isset($_POST['submit'])) {
    include "../config.php";
    $bus_id = $_POST['bus_id'];
    $driver_id = $_POST['driver_id'];
    $contact_name = $_POST['contact_name'];
    $contact_phone = $_POST['contact_phone'];
    $start_rent_date = $_POST['start_rent_date'];
    $total_rent_days = $_POST['total_rent_days'];

    mysqli_query($conn, "INSERT INTO orders(bus_id,driver_id,contact_name,contact_phone,start_rent_date,total_rent_days) VALUES('$bus_id','$driver_id','$contact_name','$contact_phone','$start_rent_date','$total_rent_days')");

    header("location:order.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>

<body>
    <div class="topnav">
        <a class="logout" href="../logout.php">Logout</a>
    </div>
    <div class="sidenav">
        <a class="logo" href="">BAMRI</a>
        <a href="../index.php">Home</a>
        <a href="../bus/bus.php">Bus</a>
        <a href="../driver/driver.php">Driver</a>
        <a class="active" href="order.php">Order</a>
    </div>
    <div class="content">
        <div class="card">
            <div class="form">
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2>Tambah Order</h2>
                    <select name="bus_id" id="">
                        <option disabled selected>pilih bus</option>
                        <?php
                        include "../config.php";
                        $result = mysqli_query($conn, "SELECT id FROM bus WHERE id NOT IN (SELECT bus_id from orders)");
                        while ($d = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $d['id']; ?>"><?= $d['id']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select name="driver_id" id="">
                        <option disabled selected>pilih driver</option>
                        <?php
                        include "../config.php";
                        $result = mysqli_query($conn, "SELECT id FROM drivers WHERE id NOT IN (SELECT driver_id from orders)");
                        while ($d = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?= $d['id']; ?>"><?= $d['id']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="text" name="contact_name">
                    <input type="number" name="contact_phone">
                    <input type="date" name="start_rent_date">
                    <input type="number" name="total_rent_days">
                    <input type="submit" name="submit" value="Save">
                </form>
            </div>
        </div>
        <div class="footer">&copy; Copyright 2020 Bamri</div>
    </div>
</body>

</html>