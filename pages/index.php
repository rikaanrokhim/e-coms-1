<?php
    session_start();
    include_once "../lib/cart.php";
    include_once "../lib/class-Ff.php";
    include_once "../lib/class-Db.php";
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>penjualan</title>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content="IE=edge">
        <meta content = "width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type=" text/css" href="../style/format.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../style/admin.css">
    </head>
    <body>
        <div class="wrapper">
            <header class="main-header">
                <div class="header2">
                    <div class="batas">
                        <a href="." class="menu_link"> Home </a>
                        <a href="#" class="menu_link" id="bb"> Barang <img src="images/panah.jpg" width="10"> </a>
                        <a href="?hal=dberita" class="menu_link"> Berita</a>
                        <a href="?hal=panduan" class="menu_link"> Panduan</a>
                        <form id="form1" name="form1" method="post" class="cari" action="cari_s.php">
                            <label>
                                <input type="text" name="c" placeholder="Pencarian Barang" class="textcari" id="c">
                            </label>
                            <label>
                                <input type="button" name="button" class="tombol_car" id="tombol" value="">
                            </label>
                        </form>
                        <?php
                            $jumlah=0;
                            if (!empty($_SESSION['basket'])) {
                                foreach ($_SESSION['basket'] as $key => $value) {
                                    $jumlah = $jumlah+$value;
                                }
                            }
                        ?>
                        <a href="?hal=keranjang" class="menu_link"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Keranjang <?=$jumlah?></a>
                    </div>
                </div>
                <div class="header1">
                    <div class="batas">
                        <span style="float: left; font-size:18px; margin-top: 10px;">
                            <?php
                                echo date("d-F-Y");
                            ?>
                        </span>
                        <?php
                            if (! isset($_SESSION['user'])) {

                        ?>
                        <a href="?hal=buat" class="masuk">MASUK</a>
                        <a href="?hal=buat" class="masuk"> Buat Akun</a>
                        <?php
                            } else {
                        ?>
                        <a href="?hal=akun" id="aa" class="masuk">Menu Akun</a>
                        <a href="logout.php" class="masuk">Logout</a>
                        <?php } ?>
                        <div class="kanan">
                            <div id="akun" style="position: fixed; padding: 5px; width: 260px; z-index: 5, float:right; background: #FFF;">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="men"></div>
            </header>
            <?php
                $hal= $ff->get("hal");
                if ($hal=="") {
                    include_once "home.php";
                } else {
                    include_once "$hal.php";
                }
            ?>
            <aside class="main-sidebar">
                <div class="batas">
                    <div class="kat">

                        <?php
                            if ($hal == "akun") {
                        ?>
                            <h3>Menu Akun</h3>
                            <a href="?hal=profile"><h4>Profile</h4></a>
                            <a href="?hal=pesanan"><h4>Pesanan</h4></a>
                            <a href="?hal=ulasan"><h4>Ulasan</h4></a>
                            <a href="?hal=logout"><h4>Log Out</h4></a>
                        <?php
                            } else {
                        ?>
                            <h3>Kategori</h3>
                            <a href="?hal=kat&t=kategori"><h4>Semua</h4></a>
                            <?php
                                $r = $odb->select("tb_kategori order by id_kat limit 4");
                                while ($a = $r->fetch()) {

                            ?>
                            <a href=".?hal=kat&t=kategori&id_kat=<?php echo $a['id_kat'];?>"><h4><?php echo $a['kategori']; ?></h4></a>
                            <?php } ?>
                            <h3>Penjual</h3>
                            <?php
                                $r = $odb->select("tb_penjual order by id_pen limit 4");
                                while ($a = $r->fetch()) {
                            ?>
                            <a href="?hal=kat&t=suplier&id_pen=<?php echo $a['id_pen'];?>"><h4><?php echo $a['penjual'] ?></h4></a>
                            <?php } ?>

                            <h3>Pengunjung</h3>
                            <h4>Pengunjung Umum : <?php  ?></h4>
                            <h4>Pengunjung Member : <?php  ?></h4>
                        <?php

                            }
                        ?>


                    </div>
                </div>
            </aside>
            <footer id="footer">
                <center>
                    Copyright &copy; OnlineShop.net 2018
                </center>
            </footer>
        </div>
    </body>
    </html>
