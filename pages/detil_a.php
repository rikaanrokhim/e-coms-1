<?php
    $id = $ff->get("id_berita");
    $q = $odb->select("tb_berita where id_berita='$id'");
    $row = $q->fetch();
?>

<div class="batas">
    <div class="content-wrapper">
        <center>
            <tr>
                <td rowspan="2"><img src="../images/<?=$row['foto'];?>" ></td>
                <td>
                    <h1>Judul : <?=$row['judul'];?></h1>
                    <th>Isi Berita : <?$row['isi_ber'];?></th> <br>
                    <th>Tempat : <?=$row['at'];?></th>
                </td>
            </tr>
        </center>
    </div>
</div>