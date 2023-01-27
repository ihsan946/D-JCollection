<?php
require('../config/db.php');
session_start();
$_SESSION['page'] = "UploadTF";
?>



<!DOCTYPE html>
<html>

<head>
    <title>Toko Online DJ_Collection</title>
    <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/css/main.css">
    <link rel="stylesheet" type="text/css" href="../asset/css/keranjang.css">
    <link rel="icon" type="image/gif/png" href="../asset/img/Title.png">
</head>

<body>

    <?php include('../component/nav.php'); ?>

    <div class="container-fluid" id="total-keranjang">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <h3 style="font-family: Forte; color:"><strong>Upload Bukti Pembayaran</strong></h3>
                                <br>
                                <h4 style="font-family: Forte; color:"><strong>Silahkan pilih Produk yang sudah dibayar</strong></h4>

                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryKeranjang = mysqli_query($conn, "SELECT * FROM tabel_transaksi WHERE idUser='$_SESSION[idUser]' ");
                            $jumlah = mysqli_num_rows($queryKeranjang);

                            if ($jumlah > 0) {
                                $queryTf = "SELECT * FROM tabel_transaksi WHERE idUser='$_SESSION[idUser]' AND status = 'Belum' OR status = 'Proses' OR status = 'Sudah' OR status = 'Tolak'";
                                $query_tf = mysqli_query($conn, $queryTf);
                                while ($arraytf = mysqli_fetch_array($query_tf)) {
                                    echo '
                                            <tr
                                            <td>
                                                <h4><strong>' . $arraytf['daftarBarang'] . '</strong></h4>
                                                <h4><strong>Tanggal Pembelian</strong><span class="titik-harga">:</span>' . ' ' . $arraytf['tanggal'] . '</h4>
                                                <h4><strong>Harga</strong><span class="titik-harga">:</span> Rp.' . ' ' . $arraytf['total'] . '</h4>
                                                <h4><strong>Status Pembayaran</strong><span class="titik-harga">:</span> ' . ' ' . $arraytf['status'] . '</h4>
                                                ';
                            ?>
                                    <form action="updateTf.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="idTransaksi" value="<?= $arraytf['idTransaksi']; ?>">
                                        <input type="file" name="file">
                                        <input type="submit" name="upload" value="Upload">
                                    </form>
                            <?php

                                    echo '            
                                            </td>
                                            </tr>
                                        ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php include('../component/footer.php'); ?>

    <script type="text/javascript" src="../plugin/Javascript/jquery.min.js"></script>
    <script type="text/javascript" src="../plugin/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../asset/js/script.js"></script>
</body>

</html>