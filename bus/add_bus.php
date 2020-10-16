<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
if (isset($_POST['cancel'])) {
    header("location:bus.php");
}
$pn_err = '';
$b_err = '';
$jk_err = '';
$hph_err = '';
$pn = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['plate_number'])) {
        $pn_err = "plat nomor harus diisi!";
    } else {
        $pn = $_POST['plate_number'];
    }
    if (empty($_POST['brand'])) {
        $b_err = "brand harus dipilih!";
    }
    if (empty($_POST['seat'])) {
        $jk_err = "jumlah kursi harus diisi!";
    } else if (!is_numeric($_POST['seat'])) {
        $jk_err = "jumlah kursi harus angka!";
    }
    if (empty($_POST['price_per_day'])) {
        $hph_err = "harga per hari harus diisi!";
    } else if (!is_numeric($_POST['price_per_day'])) {
        $hph_err = "harga per hari harus angka!";
    }
    // include '../config.php';
    // $id = $_POST['id'];
    // $plate_number = $_POST['plate_number'];
    // $brand = $_POST['brand'];
    // $seat = $_POST['seat'];
    // $price_per_day = $_POST['price_per_day'];

    // mysqli_query($conn, "INSERT INTO bus (plate_number,brand,seat,price_per_day) VALUES($plate_number','$brand','$seat','$price_per_day')");
    // header("location:bus.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bus</title>
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
                    <h2>Tambah Bus</h2>
                    <label>Plat Nomor</label>
                    <input type="text" name="plate_number" placeholder="Plat nomor" value="<?= $pn ?>">
                    <span class="error"><?= $pn_err; ?></span><br><br>
                    <label>Merek</label>
                    <select name="brand">
                        <option disabled selected>Pilih merek</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="fuso">Fuso</option>
                        <option value="scania">Scania</option>
                    </select>
                    <span class="error"><?= $b_err; ?></span><br><br>
                    <label>Jumlah Kursi</label>
                    <input type="text" name="seat" placeholder="Jumlah kursi">
                    <span class="error"><?= $jk_err; ?></span><br><br>
                    <label>Harga per Hari</label>
                    <input type="text" name="price_per_day" placeholder="Harga per hari">
                    <span class="error"><?= $hph_err; ?></span><br><br>
                    <input type="submit" name="cancel" value="Batal">
                    <input type="submit" name="submit" value="Simpan">
                </form>
            </div>
        </div>
        <div class="footer">&copy; Copyright 2020 Bamri</div>
    </div>
</body>

</html>