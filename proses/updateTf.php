<?php
require('../config/db.php');
session_start();


$idTransaksi = $_POST['idTransaksi'];
$query_update = "UPDATE `tabel_transaksi` SET `status` = 'Proses' WHERE `tabel_transaksi`.`idTransaksi` = $idTransaksi";


if ($_POST['upload']) {
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $query_insert = "INSERT INTO `bukti_pembayaran` (`id`, `id_user`, `idTransaksi`, `path`) VALUES (NULL, '$_SESSION[idUser]', '$idTransaksi', '$nama')";

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 5044070) {
            move_uploaded_file($file_tmp, 'buktiPembayaran/' . $nama);
            $query = mysqli_query($conn, $query_insert);
            $eksekusi_update = mysqli_query($conn, $query_update);
            if ($query) {
                echo '
                    <script>
                    alert("FILE BERHASIL DI UPLOAD");
                    window.location = "../proses/upload_Tf.php";
                    </script>
                    ';
            } else {
                echo '
                    <script>
                    alert("GAGAL MENGUPLOAD GAMBAR");
                    window.location = "../proses/upload_Tf.php";
                    </script>
                    ';
            }
        } else {
            echo '
                    <script>
                    alert("UKURAN FILE MAKSIMAL 5 MB");
                    window.location = "../proses/upload_Tf.php";
                    </script>
                    ';
        }
    } else {
        echo '
                    <script>
                    alert("EKSTENSI FILE YANG DIPERBOLEHKAN HANYA FORMAT PNG DAN JPG");
                    window.location = "../proses/upload_Tf.php";
                    </script>
                    ';
    }
}
