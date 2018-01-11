<?php 
	$q = "select * from tb_admin";
	$page = isset($_GET['page'])?$_GET['page']:1;
	$pag = $odb->paging($q,2,$page);
?>

<div id="box">
	<div class="box-top">Data Admin</div>
		<div class="box-panel">
			<table>
				<tr>
					<th>No.</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th colspan="2">Option</th>
				</tr>

				<?php 
					$j = $pag["no"];
					$n = $j+1;
					while ($dt = $pag["query"]->fetch()) {
						# code...

				?>
				<tr>
					<td><?=$n?></td>
					<td><?=$dt["user"]?></td>
					<td><?=$dt["pass"]?></td>
					<td><?=$dt["email"]?></td>
					<td> <a href="?hal=sadmin&aksi=hapus&id_admin=<?=$dt['id_admin']?>"> Hapus </a> </td>
					<td> <a href="?hal=eadmin&id_admin=<?=$dt['id_admin']?>"> Ubah </a> </td>
				</tr>

				<?php 
					$n++;
					}
				?>

			</table>
			<br>
			<?php 
				$odb->nav("?hal=dadmin", $pag["jumlah"], $page)
			?>
			<br> <br>
			<a href="?hal=fadmin" class="submit-button">Tambah</a>
		</div>
</div>