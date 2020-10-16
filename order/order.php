<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
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
            <h2>Daftar Order</h2>
            <a class="btn-add" href="add_order.php">Tambah Order</a>
            <div style="overflow-x:auto;">
                <table style="width: 1200px;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Id Bus</th>
                            <th>Id Driver</th>
                            <th>Contact Name</th>
                            <th>Contact Phone</th>
                            <th>Start Rent Date</th>
                            <th>Total Rent Days</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../config.php";
                        $data = mysqli_query($conn, "SELECT * FROM orders");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?= $d['id'] ?></td>
                                <td><?= $d['bus_id'] ?></td>
                                <td><?= $d['driver_id'] ?></td>
                                <td><?= $d['contact_name'] ?></td>
                                <td><?= $d['contact_phone'] ?></td>
                                <td><?= $d['start_rent_date'] ?></td>
                                <td><?= $d['total_rent_days'] ?></td>
                                <td><?= $d['created_at'] ?></td>
                                <td><?= $d['updated_at'] ?></td>
                                <td>
                                    <a class="btn-edit" href="update_order.php?id=<?= $d['id'] ?>">edit</a>
                                    <a class="btn-delete" href="delete_order.php?id=<?= $d['id'] ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus item ini?')">hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">&copy; Copyright 2020 Bamri</div>
    </div>
</body>

</html>