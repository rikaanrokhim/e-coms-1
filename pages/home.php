<?php
	include "slide.php";
?>
<div class="batas">
	<div class="content-wrapper">
		<h2>Barang Terbaru</h2>
		<center>
			<?php
				$r = $odb->select("tb_barang order by id_barang desc limit 4");
				while ($a = $r->fetch()) {
			?>
			<div class="barang">
				<a href="?hal=detil_b&id_barang=<?php echo $a['id_barang']; ?>"><img src="../images/<?php echo $a['foto']; ?>" width="100%" height="250" /></a>
				<p>
					<center>

					</center>
				</p>
			</div>
			<?php
				}
			?>
		</center>
		<table border="0" width="100%">
		<tr> <td> </td> </tr>
		</table>
		<h2>Barang Yang Sering Dibeli</h2>
		<center>
			<?php
				//$r=;
				//while ($a = $r->fetch()) {
			?>
			<div class="barang">
				<a href="?hal=detil_b&id_barang=<?php echo $a['id']; ?>"> <img src="../images/<?php echo $a['foto']; ?>" width="100%" height="250" /></a>
				<p>
					<center>
					</center>
				</p>
			</div>
		</center>
			<table border="0" width="100%">
				<tr> <td></td> </tr>
			</table>
			<h2>Artikel Terkini</h2>
			<table width="100%" border="0">
				<?php
					$r = $odb->select("tb_berita order by id_berita desc limit 2");
					while ($a = $r->fetch()) {
				?>
				<tr>
					<td width="22%" rowspan="2" valign="top"> <img src="../images/<?php echo $a['foto']; ?>" width="100%" /></td>
					<td width="78%" height="20"> <h3> <?php echo $a['judul']; ?></h3>
					<i><?php echo $a['tanggal']; ?></i> <br />
					<?php echo substr($a['isi_ber'],0,250); ?>
					</td>
				</tr>
				<tr>
					<td>
						<p> <a href="?hal=detil_a&id=<?php echo $a['id_berita']; ?>" class="tombol">Selengkapnya</a> </p>
					</td>
				</tr>
				<?php
					}
				?>
			</table>
	</div>
</div>