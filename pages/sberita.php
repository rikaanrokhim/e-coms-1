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
		$tanggal = date("Y-m-d");
		$head = substr($isi_ber,0,50);
		if ($sukses!="") {
			$odb->insert("tb_berita", "null, '$judul', '$head', '$isi_ber' , '$tanggal', '$at' ,'$sukses' ");
			$ff->alert("Data Berhasil Disimpan");
			$ff->redirect(
				"admin.php?hal=dberita");
		} else {
			$odb->insert("tb_berita", "'', '$judul', '$head', '$isi_ber' , '$tanggal', '$at' ,'' ");
			$ff->alert("Data Berhasil diubah tanpa gambar");
			$ff->redirect("admin.php?hal=dberita");
		}
	}

	if ($aksi == "edit") {
		$id = $ff->get("id_berita");
		$tanggal = date("Y-m-d");
		$status = "1";
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$head = substr($isi_ber, 0, 50);
		$odb->update("tb_berita", "judul='$judul', head='$head', isi_ber='$isi_ber', tanggal='$tanggal', at='$at' where id_berita='$id' ");
		$ff->alert("Data Berhasil Diubah tanpa gambar");
		$ff->redirect("admin.php?hal=dberita");
	}

	if ($aksi=="ganti") {
		$id = $ff->get("id_berita");
		$post = $odb->sant(INPUT_POST);
		extract($post);
		$sukses = $ff->upload("foto");
		$status = "1";
		$tanggal = date("Y-m-d");
		if ($sukses!="") {
			$odb->update("tb_berita", "foto='$sukses' where id_berita='$id' ");
			$ff->alert("Data berhasil diubah gambar");
			$ff->redirect("admin.php?hal=dberita");
		} else {
			$ff->alert("Gagal ubah gambar");
			$ff->back();
		}
	}
	if ($aksi=="hapus") {
		$id = $ff->get("id_berita");
		$odb->delete("tb_berita where id_berita='$id'");
		$ff->alert("Data berhasil dihapus");
		$ff->redirect("admin.php?hal=dberita");
	}