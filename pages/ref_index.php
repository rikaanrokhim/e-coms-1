<?php
			$jumlah = 0;
			if (! empty($_SESSION["basket"])) {
				foreach ($_SESSION["basket"] as $key => $value) {
					$jumlah = $jumlah+$value;
				}
			}
		?>
	<h2> Barang Yang Dibeli <a href="keranjang.php"> <?=$jumlah?></a></h2>
		<table>
			<thead>
				<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Beli</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$q = $odb->select("tb_barang");
					while ($dt=$q->fetch()) {
				?>

				<tr>
					<td><?=$dt['id_barang']?></td>
					<td><?=$dt['nama']?></td>
					<td><?=$ff->rp($dt['harga'])?></td>
					<td><?=$dt['stok']?></td>
					<td>
						<a href="?aksi=add&id_barang=<?=$dt['id_barang']?>&jml=1">Beli</a>
					</td>
				</tr>

				<?php
					}
				?>
			</tbody>
		</table>