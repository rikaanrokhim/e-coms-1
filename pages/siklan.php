<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

	include_once "../lib/class-Db.php";
	include_once "../lib/class-Ff.php";
	$aksi = $ff->get("aksi");
	if ($aksi=="add") {
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$sukses = $ff->upload("foto");
		$status="1";
		if ($sukses!="") {
			$odb->insert("tb_iklan", "'', '$nama', '$url', '$sukses' ");
			$ff->alert("Data Berhasil Disimpan");
			$ff->redirect(
				"admin.php?hal=diklan");
		} else {
			$odb->insert("tb_iklan", "'', '$nama', '$url', '' ");
			$ff->alert("Data Berhasil diubah tanpa gambar");
			$ff->redirect("admin.php?hal=diklan");
		}
	}
	if ($aksi=="edit") {
		$id = $ff->get("id_iklan");
		$status ="1";
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->update("tb_iklan", "nama='$nama', url='$url' where id_iklan='$id'  ");
		$ff->alert("Data Berhasil Diubah tanpa gambar");
		$ff->redirect("admin.php?hal=diklan");
	}
	if ($aksi=="ganti") {
		$id = $ff->get("id_iklan");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$sukses = $ff->upload("foto");
		$status = "1";
		if ($sukses!=="") {
			$odb->update("tb_iklan", "foto='$sukses' where id_iklan='$id'");
			$ff->alert("Data berhasil diubah gambar");
			$ff->redirect("admin.php?hal=diklan");

		} else {
			$ff->alert("Gagal ubah gambar");
			$ff->back();
		}
	}
	if ($aksi=="hapus") {
		$id=$ff->get("id_iklan");
		$odb->delete("tb_iklan where id_iklan='$id'");
		$ff->alert("Data berhasil dihapus");
		$ff->redirect("admin.php?hal=diklan");
	}