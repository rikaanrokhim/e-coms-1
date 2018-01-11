<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

	$q = "select * from tb_penjual";
	$page = isset($_GET['page']) ?$_GET['page']:1;
	$pag = $odb->paging($q,2,$page);
?>

<div id="box">
	<div class="box-top"> Data Penjual</div>
	<div class="box-panel">
		<table>
			<tr>
				<th>NO.</th>
				<th> Nama Penjual</th>
				<th> Telpon</th>
				<th> Keterangan</th>
				<th> Alamat</th>
				<th colspan="2"> Option</th>
			</tr>
			<?php
				$j = $pag["no"];
				$n = $j+1;
				while ($dt = $pag["query"]->fetch()) {
					# code...

			?>
			<tr>
				<td><?=$n?></td>
				<td><?=$dt['penjual']?> </td>
				<td><?=$dt['telp']?> </td>
				<td><?=$dt['ket']?> </td>
				<td><?=$dt['alamat']?> </td>
				<td><a href="?hal=spenjual&aksi=hapus&id_pen=<?=$dt['id_pen']?>"> Hapus</a></td>
				<td><a href="?hal=epenjual&id_pen=<?=$dt['id_pen']?> "> Ubah</a></td>
			</tr>
			<?php
				$n++;
				}
			?>
			<tr>
				<td colspan="7"></td>
			</tr>
		</table>
		<?php
			$odb->nav("?hal=dpenjual",$pag["jumlah"],$page)?>
			<br> <br>
			<a href="?hal=fpenjual" class="submit-button"> Tambah</a>
	</div>
</div>