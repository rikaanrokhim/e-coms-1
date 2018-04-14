<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

	$id = $ff->get("id_berita");
	$res = $odb->select("tb_berita where id_berita='$id' ");
	$dt1 = $res->fetch();
?>

<div id="box">
	<div class="box-top"> Form Tambah Berita</div>
	<div class="box-panel">
		<form method="post" action="sberita.php?aksi=edit&id_berita=<?=$id?>" class="form-container" enctype="multipart/form-data">
			<div class="form-title"> Judul</div>
			<input type="text" name="judul" class="form-field" value="<?=$dt1['judul']?>">
		<!-- 	<div class="form-title"> Head</div>
			<input type="text" name="head" class="form-field" value="<?=$dt1['head'] ?>"> -->
			<div class="form-title"> Isi berita </div>
			<textarea name="isi_ber" class="form-field" value="<?=$dt1['isi_ber']?>" >
				<?=$dt1['isi_ber'] ?>
			</textarea>
			<div class="form-title"> Tempat</div>
			<textarea name="at" class="form-field" value="<?=$dt1['at']?>">
				<?=$dt1['at'] ?>
			</textarea>
			<!-- <div class="form-title"> Tanggal</div>
			<input name="tanggal" class="form-field" type="date" value="<?=$dt1['tanggal']?>"> -->
			<div class="submit-container">
				<input type="submit" name="btnsimpan" class="submit-button" value="Simpan">
			</div>

		</form>
		<form method="post" action="sberita.php?aksi=ganti&id_berita=<?=$id?>" class="form-container" enctype="multipart/form-data">
			<div class="form-title"> Foto
				<img src="../images/<?=$dt1['foto']?>" height="50" width="50" >
			</div>
			<input type="file" name="foto" class="form-field" value="<?=$dt1['foto']?> ">
			<div class="submit-container">
				<input type="submit" name="btnugambar" value="ubah gambar" class="submit-button">
			</div>
		</form>
	</div>
</div>