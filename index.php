<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <link rel="stylesheet" type="text/css" href="style/font-awesome.css"> //untuk memanggil font
</head>
<center>
<body>
    <div class="container">
    <img src="images/user1.png">
        <h2> Log In Admin</h2> <br>
    <form method="post" action="">
        <div class="form-input">
            <i class="fa fa-user"></i> <input type="text" required name="user" placeholder="Your Username" class="form-control">
        </div>
        <div class="form-input">
            <i class="fa fa-key"></i> <input type="password" required name="pass" placeholder="Your Password" class="form-control">
        </div>
        <p><a href="#">Lupa Password?</a></p>
        <input type="submit" name="btnsimpan" value="Sign In" class="btn">

    </form>
    </div>

</body>
</center>
</html>


<?php

    include "lib/class-Db.php";
    include "lib/class-Ff.php";
    if (isset($_POST['btnsimpan'])) {

        $ff->post($_POST['user']);
        $ff->post($_POST['pass']);
        //$pass = md5($pass);

        //if (isset($_POST['btnsimpan'])) {
        session_start();
        $id=$ff->get("id_admin");
        $post=$odb->sant(INPUT_POST);
        extract($post);
        $q = $odb->select("tb_admin where user = '$user' and pass = '$pass'");
        $hsl = $odb->nur($q);

        if ($hsl == 1) {

        $ff->alert("Welcome $user");
        $ff->redirect("pages/admin.php");
    } else {
        $ff->alert("User Tidak Terdaftar! Silahkan Coba Lagi!");
        //$ff->redirect("index.php");
    }
}

?>

