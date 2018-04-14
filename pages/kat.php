<?php
    $t = $ff->get("t");
?>
    <div class="batas">
        <div class="content-wrapper">

<?php
    if ($t == "kategori") {
        $id_kat = $ff->get("id_kat");
            if ($id_kat=="") {
                $query = $odb->select("tb_barang");
                $ket = "semua";
            } else {
                $query = $odb->select("tb_barang where id_kat = '$id_kat' ");
                $q = $odb->select("tb_kategori where id_kat='$id_kat'");
                $d = $q->fetch();
                $ket = $d['kategori'];
            }
?>
<h2>Kategori : <?=$ket?></h2>
<table border="0" width="100%">
    <?php
        while ($data = $query->fetch()) {
    ?>
    <tr>
        <td width="25%" rowspan="2" valign="top"> <img src="../images/<?= $data['foto']?>" width="100%" /> </td>
        <td width="78%" height="20">
            <h3><?=$data['nama'];?></h3>
            <i><?=$ff->rp($data['harga']);?></i> <br />
            <?=$data['stok'];?> <br />
        </td>
    </tr>
    <tr>
        <td>
            <p> <a href="?hal=detil_b&id_barang=<?= $data['id_barang'];?>" class="tombol">Selengkapnya</a> </p>
        </td>
    </tr>
    <?php
        }
    ?>


</table>
    <?php
    } else {
            $id_pen = $ff->get("id_pen");
            $query = $odb->select("tb_barang where id_pen = '$id_pen'");
            $q = $odb->select("tb_penjual where id_pen = '$id_pen'");
            $d = $q->fetch();
            $pen = $d['penjual'];

    ?>


    <h2> Penjual : <?=$pen?></h2>

    <table border="0" width="100%">

        <?php
            while ($data = $query->fetch()) {
        ?>
        <tr>
            <td width="25%" rowspan="2" valign="top"> <img src="../images/<?=$data['foto']?>" width="100%" /> </td>
            <td width="78%" height="20">
                <h3><?=$data['nama'];?></h3>
                <p><?=$ff->rp($data['harga']);?> <br>
                    <?=$data['stok'];?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p> <a href="?hal=detil_b&id_barang=<?=$data['id_barang'];?>" class="tombol">Selengkapnya</a> </p>
            </td>
        </tr>
        <?php

            }
        }
    j    ?>

    </table>

        </div>
    </div>
<?php
?>