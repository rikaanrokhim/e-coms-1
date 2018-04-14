<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);

    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $aksi=$ff->get("aksi");
    if ($aksi=="add") {
    	$post=$odb->sant(INPUT_POST);
    	extract($post);
    	$odb->insert("tb_kategori","null,'$kategori','$isparent'");
    	$ff->alert("Data Berhasil Disimpan");
    	$ff->redirect("admin.php?hal=dkategori");
    }
    if ($aksi=="edit") {
    	$id=$ff->get("id_kat");
    	$post=$odb->sant(INPUT_POST);
    	extract($post);
    	$odb->update("tb_kategori","kategori='$kategori',isparent='$isparent' where id_kat='$id'");
    	$ff->alert("Data Berhasil Diubah");
    	$ff->redirect("admin.php?hal=dkategori");
    }
    if ($aksi=="hapus") {
    	$id=$ff->get("id_kat");
    	$odb->delete("tb_kategori where id_kat='$id'");
    	$ff->alert("Data Terhapus");
    	$ff->redirect("admin.php?hal=dkategori");
    }