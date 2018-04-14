<?php
	// session_start();
	// include_once "../lib/cart.php";
	// include_once "../lib/class-Ff.php";
	// include_once "../lib/class-Db.php";
?>
<div class="content-wrapper">
	<div class="batas">

<form action="?aksi=up" method="post">
	<link rel="stylesheet" href="../style/admin.css">
	<br><h2>Keranjang Belanja</h2><br>
	<table>

		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
				<th>Hapus</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$totalHarga=0;
				if (! empty($_SESSION["basket"])) {
					foreach ($_SESSION["basket"] as $key => $value) {
						$q1 = $odb->select("tb_barang where id_barang = '$key'");
						$dt1 = $q1->fetch();
						$totalHarga = $totalHarga+($dt1["harga"]*$value);
			?>
			<tr>
				<td><?=$dt1["id_barang"]?></td>
				<td><?=$dt1["nama"]?></td>
				<td><?=$ff->rp($dt1["harga"])?></td>
				<td>
					<input type="number" name="jum[<?=$dt1['id_barang']?>]" value="<?=$value?>">
				</td>
				<td><?=$ff->rp($dt1["harga"]*$value)?></td>
				<td>
					<a href="?aksi=dl&id_barang=<?=$dt1['id_barang']?>" class="submit-button">Batalkan</a>
				</td>
			</tr>
			<?php
					}
			?>

				<tr>
					<td colspan="4">Jumlah</td>
					<td><?=$ff->rp($totalHarga)?></td>
				</tr>
				<tr>
					<td colspan="5">
						<input type="submit" name="btn" value="Ubah" class="tombol" >
					</td>
				</tr>
			<?php
			if (! empty($_SESSION['user'])) {
			?>
				<tr>
					<td colspan="5">
						<a href="?hal=cekout" class="tombol">Cekout</a>
					</td>
				</tr>
			<?php
			} else {
			?>
				<tr>
					<td colspan="5">
						<a href="?hal=buat" class="tombol">Login</a>
					</td>
				</tr>
			<?php
			}
				} else {

				echo "kosong";
				}
			?>

		</tbody>
	</table>
	</div>
</div>
</form>
