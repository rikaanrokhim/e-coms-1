<?php 
	$id = $ff->get("id_barang");
	$q = "select b.ukuran1, b.ukuran2, b.ukuran3, b.ukuran4 from tb_barang b where id_barang = $id";
	$page = isset($_GET['page']) ?$_GET['page']:1;
    $pag = $odb->paging($q,2,$page);
?>