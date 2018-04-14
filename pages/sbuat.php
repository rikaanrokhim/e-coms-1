<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    include_once "../lib/class-Ff.php";
    include_once "../lib/class-Db.php";

    $aksi = $ff->get("aksi");
    session_start();
    if ($aksi=="add") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $pass = md5($pass);
        $status = 'pembeli';
        $odb->insert("tb_pelanggan", "null,'$user','$pass','$email','$alamat','$k_pos','$telp','$status','$alamat_kirim'");
        $_SESSION['user'] = $user;
        $_SESSION['status'] = $status;
        $ff->alert("Pendaftaran Berhasil");
        $ff->redirect("index.php");
    }
    if ($aksi=="login") {
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $pass = md5($pass);
        $q = $odb->select("tb_pelanggan where user='$user' and pass='$pass'");
        $n = $odb->nur($q);
        $d = $q->fetch();
        if ($n>0) {
            $_SESSION['user'] =  $d['user'];
            $_SESSION['status'] = $d['status'];
            $ff->alert("Berhasil");
            $ff->redirect("index.php");
        } else {
            $ff->alert("username atau password salah!");
            $ff->back();
        }

    }
?>