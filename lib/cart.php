<?php
	$aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
	
	if($aksi) {
		$id = isset($_GET['id'])?$_GET['id']:0;
		
		switch($aksi) {
			case 'add' : 
				if(! empty($_SESSION['basket'][$id])) {
					$_SESSION['basket'][$id] += 1;
				}
				else {
					$_SESSION['basket'][$id] = 1;
				}
				break;
			case 'up' : 
				if(! empty($_SESSION['basket'])) {
					$jum = isset($_POST['jum'])?$_POST['jum']:"";
					
					
					foreach($jum as $key => $val) {
						
							$_SESSION['basket'][$key] = $val;
						
					}
				}
				else {
					$p = "<fieldset class='alert'>Buku tidak ada di keranjang !</fieldset>";
				}
				break;
			case 'dl' : 
				if(! empty($_SESSION['basket'][$id])) {
					unset($_SESSION['basket'][$id]);
				}
				else { 
					$p = "<fieldset class='alert'>Buku tidak ada di keranjang !</fieldset>";
				}
				break;
		}
		
		if(! empty($_SESSION['basket'])) {
			$basket = $_SESSION['basket'];
		}
	}
?>