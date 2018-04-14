<?php

    session_start();
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $post=$odb->sant(INPUT_POST);
    if (isset($_POST['submit'])) {
    extract($post);

        $q = $odb->select("tb_admin where binary user = '$user' and binary pass = '$pass'", "user");
        $hsl = $odb->nur($q);

        if ($hsl < 1) {

        // $ff->alert("Welcome $user");
        $ff->redirect("login.php?err=2");
        } else {
            $_SESSION['user'] = $user;
            $ff->alert("Selemat Datang");
            $ff->redirect("admin.php");
        }
    }

?>

