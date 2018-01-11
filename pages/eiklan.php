<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
	$id = $ff->get("id_iklan");
	$res = $odb->select("tb_iklan where id_iklan='$id'");
	$dt1 = $res->fetch();
?>

<div id="box">
	<div class="box-top"> Form Tambah Iklan</div>
	<div class="box-panel">
		<form method="post" action="siklan.php?aksi=edit&id_iklan=<?=$id?>" class="form-container" enctype="multipart/form-data" >
			<div class="form-title"> Nama</div>
			<input type="text" name="nama" class="form-field" value="<?=$dt1['nama']?>">
			<div class="form-title"> Url</div>
			<input type="text" name="url" class="form-field" value="<?=$dt1['url']?>">
			<div class="submit-container">
				<input type="submit" name="btnsimpan" value="Simpan" class="submit-button">
			</div>
		</form>
		<form method="post" action="siklan.php?aksi=ganti&id_iklan=<?=$id?>" class="form-container" enctype="multipart/form-data">
			<div class="form-title"> Foto
			<img src="../images/<?=$dt1['foto']?> " height="50" width="50">
			</div>
			<input type="file" name="foto" class="form-field" value="">

			<div class="submit-container">
				<input type="submit" name="btnugambar" value="Ubah Gambar" class="submit-button">
			</div>
		</form>
	</div>
</div>