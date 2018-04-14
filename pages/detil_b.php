<?php
	$id = $ff->get("id_barang");
	$q = $odb->select("tb_barang where id_barang='$id'");
	$row = $q->fetch();
?>

<style>
	.gambar {
		 margin-right: 100px;
	}
	.title {
		overflow: hidden;
		font-size: 50px;
	}
	.price {
		font-size: 30px;
		padding-bottom: 5px;
		margin-top: 0px;
	}
	.h {
		font-size: 25px;
	}
</style>

<div class="batas">
	<div class="content-wrapper">

		<center>
		<table>


			<tr>
				<td>
					<div class="gambar"><img src="../images/<?=$row['foto']?>" width="240" height="240"></div>
				</td>


					<td>
						<h1 class="title"><?=$row['nama']?> </h1>
						<div class="price"><?=$ff->rp($row['harga'])?></div><hr>
						<div class="h">Stok :<?=$row['stok']?></div>
						<div class="h">Deskripsi : <?=$row['deskripsi']?></div>
						<div class="h">Ukuran :<?=$row['ukuran1']?>, <?=$row['ukuran2']?>, <?=$row['ukuran3']?>, <?=$row['ukuran4']?></div>
						<br><br>
					<p>
					<a href="?hal=detil_b&aksi=add&id_barang=<?=$row['id_barang']?>&jml=1" class="tombol">Beli Sekarang</a>
					<a href="index.php" class="tombol">Back</a>
					</p>
				</td>
				</tr>
				<td>
				<p>
					<h3>Komentar :</h3> <br> <textarea name="isi_pesan" class="textarea"></textarea>
					<br><br><a href="#" class="tombol">Komentar</a>
					<br>
					<?php
						$q = $odb->select("tb_barang_c");
						$row = $q->fetch();
					?>
					<tr>
						<td>
							<?=$row['id_cust']?>
							<?=$row['isi_pesan']?>
						</td>
					</tr>
				</p>
				</td>

		</table>
		</center>
	</div>
</div>