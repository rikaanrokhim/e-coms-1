<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

	$q = "select * from tb_pelanggan";
	$page = isset($_GET['page']) ?$_GET['page']:1;
	$pag = $odb->paging($q,2,$page);
?>

<div id="box">
	<div class="box-top"> Data Pembeli</div>
	<div class="box-panel">
		<table>
			<tr>
				<th>No.</th>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Kode Pos</th>
				<th>Telpon</th>
				<th>Status</th>
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
				<td><?=$dt['user']?> </td>
				<td><?=$dt['pass']?> </td>
				<td><?=$dt['email']?></td>
				<td><?=$dt['alamat']?> </td>
				<td><?=$dt['k_pos']?> </td>
				<td><?=$dt['telp']?> </td>
				<td><?=$dt['status']?> </td>
				<td><a href="?hal=spembeli&aksi=hapus&id_cust=<?=$dt['id_cust']?> "> Hapus</a></td>
				<td><a href="?hal=epembeli&id_cust=<?=$dt['id_cust']?> "> Ubah</a></td>
			</tr>
			<?php
				$n++;
				}
			?>
			<tr>
				<td colspan="10"></td>
			</tr>
		</table>
		<?php
			$odb->nav("?hal=dpembeli",$pag["jumlah"],$page)
		?>
		<br> <br>
		<a href="?hal=fpembeli" class="submit-button"> Tambah</a>
	</div>
</div>