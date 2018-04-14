<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
    $user = $ff->sess('user');
    $query = $odb->select("tb_pelanggan where user='$user'");
    $data = $query->fetch();

?>
<div class="content-wrapper">
    <div class="batas">
        <form action="?hal=proses" method="post">
            <div id="box">
                <div class="box-top"> Biodata </div>
                <div class="box-panel">

                    <table>
                            <tr>
                                <td> Nama </td>
                                <td> : </td>
                                <td> <?=$data['user']?> </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?=$data['alamat']?></td>
                            </tr>
                            <tr>
                                <td>No.Telp</td>
                                <td>:</td>
                                <td><?=$data['telp']?></td>
                            </tr>
                            <tr>
                                <td>Alamat Kirim</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="alamat_kirim" value="<?=$data['alamat']?>">
                                    <input type="hidden" name="id_cust" value="<?=$data['id_cust']?>">
                                </td>
                            </tr>
                        </table>
                </div>
            </div>


        <br><br>
        <div id="box">
            <div class="box-top">Detail Belanja</div>
            <div class="box-panel">
                <table>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>

                    </tr>
                    <?php
                        $totalHarga = 0;
                        if (! empty($_SESSION['basket'])) {
                            foreach ($_SESSION['basket'] as $key => $value) {
                                $q1 = $odb->select("tb_barang where id_barang='$key'");
                                $dt1 =  $q1->fetch();
                                $totalHarga = $totalHarga+($dt1['harga']*$value);
                            ?>
                            <tr>
                                <td><?=$dt1["id_barang"]?></td>
                                <td><?=$dt1["nama"]?></td>
                                <td><?=$ff->rp($dt1["harga"])?></td>
                                <td><?=$value?></td>
                                <td><?=$ff->rp($totalHarga)?></td>
                            </tr>
                    <?php
                            }
                        }
                    ?>

                    <tr>
                        <td colspan="5">
                            <input type="submit" name="submit" class="tombol" value="Pesan Sekarang">
                            <a href="?hal=keranjang">
                                <input type="button" name="back" class="tombol" value="Back">
                            </a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        </form>
    </div>
</div>