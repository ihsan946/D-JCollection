<?php
require('../config/db.php');
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header('location: index.php');
}
$status = $_POST['editlist'];
$idTransaksi = $_POST['idTransaksi'];

$query_update = "UPDATE `tabel_transaksi` SET `status` = '$status' WHERE `tabel_transaksi`.`idTransaksi` = $idTransaksi";
$eksekusi_update = mysqli_query($conn, $query_update);
if ($eksekusi_update) {
    echo '
            <script>
            alert("STATUS BERHASIL DIRUBAH");
            window.location = "../admin.php";
            </script>
            ';
} else {
    echo '
            <script>
            alert("STATUS GAGAL DIRUBAH");
            window.location = "../admin.php";
            </script>
        ';
}
