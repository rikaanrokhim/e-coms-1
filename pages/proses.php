<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    $post = $odb->sant(INPUT_POST);
    extract($post);

    $q = $odb->update("tb_pelanggan","alamat_kirim = '$alamat_kirim' where id_cust = '$id_cust'");
    $tanggal = date("Y-m-d");
    $qtrans = $odb->insert("tb_trans", "null, '$id_cust','$tanggal','','belumbayar'");
    $id_trans = $odb->last();

    if (! empty($_SESSION['basket'])) {
        foreach ($_SESSION['basket'] as $key => $value) {
            $qtrans_det = $odb->insert("tb_trans_det","null, '$id_trans','$key','$value'");
        }
    }
    unset($_SESSION['basket']);
    $ff->alert("Proses Berhasil! Segera Lakukan dan Konfirmasi Pembayaran!");
    $ff->redirect("index.php");

?>