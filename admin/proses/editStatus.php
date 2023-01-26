<?php
require('../config/db.php');
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header('location: index.php');
}
$idTransaksi = $_GET['idTransaksi'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Admin</title>
    <link rel="stylesheet" type="text/css" href="../../plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../asset/css/admin.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2" id="sideLeft">
                <h4><strong>Administrator</strong></h4>
                <ul class="nav nav-pills nav-stacked" id="data">
                    <li><a href="proses/logout.php">
                            <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"></span>Logout</button></a>
                    </li>
                </ul>
            </div>

            <div class="col-xs-10">
                <br>
                <br>
                <table>
                    <?php
                    $data = mysqli_query($conn, "select * from bukti_pembayaran");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td>
                                <h4>FOTO BUKTI PEMBAYARAN</h4>
                                <img src="../../proses/buktiPembayaran/<?= $d['path']; ?>" width="500" height="500">
                                <form action="updateStatus.php" method="post">
                                    <label for="edit">Status Pembayaran:</label>
                                    <select id="edit" name="editlist">
                                        <option value="Sudah">Sudah</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Tolak">Tolak</option>
                                    </select>
                                    <input type="hidden" name="idTransaksi" value="<?= $idTransaksi; ?>">
                                    <button type="submit" class="btn btn-edit" name="submit"><i class="glyphicon glyphicon-edit"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </div>

</body>

</html>