<?php
    session_start();
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    if (isset($_SESION['user'])) {
        $ff->redirect('admin.php');
    }

    $err = "Silahkan klik tombol login untuk melanjutkan!";

    if (isset($_GET['err'])) {
        switch ($_GET['err']) {
            case 1:
                $err = "Silahkan Lengkapi form untuk melanjutkan";
                break;
            case 2:
                $err = "Kombinasi username dan password salah!";
                break;

            default:
                $err = "Silahkan klik tombol login untuk melanjutkan";
                break;
        }
    }
?>

<head>
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css" type="text/css">
    <script src="../js/jquery-2.1.1.js"></script>
</head>

<body style="font-family: sans-serif">
    <div id="container">
        <center>
            <div id="box" style="width: 60%">
                <div class="box-top">
                    <h3>LOGIN FORM</h3>
                </div>
                <div class="box-panel">
                    <p>Masukkan username dan password anda..</p>
                    <br>
                    <form action="login-proses.php" method="post" class="form-container" enctype="multipart/form-data">
                        Username:
                        <input type="text" name="user" class="form-field" required="" value="">
                        <br>
                        Password :
                        <input type="password" name="pass" required="" class="form-field" value="">
                        <br>
                        <div id="msg-container">
                            <p><i><?=$err?></i></p>
                        </div>
                        <br>
                        <input type="submit" name="submit" class="submit-button" value="login">
                    </form>
                </div>
            </div>
        </center>
    </div><!--container-->
    <script type="text/javascript" src="../js/admin.js"></script>
</body>
