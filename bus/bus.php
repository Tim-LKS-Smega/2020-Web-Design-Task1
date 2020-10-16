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
    <title>Bus</title>
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
            <h2>Daftar Bus</h2>
            <a class="btn-add" href="add_bus.php">Tambah bus</a>
            <div style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Plate number</th>
                            <th>Brand</th>
                            <th>Seat</th>
                            <th>Price per day</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $data = mysqli_query($conn, "SELECT * FROM bus");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>

                            <tr>
                                <td><?= $d['id'] ?></td>
                                <td><?= $d['plate_number'] ?></td>
                                <td><?= $d['brand'] ?></td>
                                <td><?= $d['seat'] ?></td>
                                <td><?= $d['price_per_day'] ?></td>
                                <td><?= $d['created_at'] ?></td>
                                <td><?= $d['updated_at'] ?></td>
                                <td>
                                    <a class="btn-edit" href="update_bus.php?id=<?= $d['id']; ?>">Edit</a>
                                    <a class="btn-delete" href="delete_bus.php?id=<?= $d['id']; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus item ini?')">Hapus</a>
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