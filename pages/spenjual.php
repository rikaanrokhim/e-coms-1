<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

	include_once "../lib/class-Db.php";
	include_once "../lib/class-Ff.php";
	$aksi=$ff->get("aksi");
	if ($aksi=="add") {
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->insert("tb_penjual", "null, '$penjual', '$telp', '$ket', '$alamat' ");
		$ff->alert("Data berhasil disimpan");
		$ff->redirect("admin.php?hal=dpenjual");
	}
	if ($aksi == "edit") {
		$id = $ff->get("id_pen");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$odb->update("tb_penjual", "penjual='$penjual', telp='$telp', ket='$ket', alamat='$alamat' where id_pen='$id' ");
		$ff->alert("Data Berhasil Diubah");
		$ff->redirect("admin.php?hal=dpenjual");
	}
	if ($aksi == "hapus") {
		$id = $ff->get("id_pen");
		$odb->delete("tb_penjual where id_pen='$id'");
		$ff->alert("Data Berhasil Dihapus");
		$ff->redirect("admin.php?hal=dpenjual");
	}