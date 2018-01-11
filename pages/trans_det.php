<?php
  include "../lib/cart.php";
 // include "../lib/class-Db.php";
?>
<div id="box">
    <div class="box-top">Transaksi Barang</div>
    <div class="box-panel">
	<table width="100%" border="0">
      <tr class="but" align="center">
        <td width="5%" height="36">No</td>
        <td width="33%">Nama Barang</td>
        <td width="29%">Jumlah</td>
        <td>Harga</td>
      </tr>
    </table>
    </div>
</div>
    <?php
		
		$sel = select("tb_trans_det * where id_trans='$_GET[id]'");
		while($data=far($sel)) {
			$n++;
			$bk = select("tb_barang","*","where id_barang='$data[id_barang]'");
			$db = far($bk);
      $n-0;
	?>
    <table width="100%" border="0" class="pesan">
      <tr align="center">
        <td width="5%"><?=$n?></td>
        <td width="33%"><?=$db[1]?></td>
        <td width="29%"><?=$data['jumlah']?></td>
        <td><?=u($db['harga'])?></td>
      </tr>
    </table>  
    <?php
     } 
     ?>  
    <br>
    <br>
    <table width="100%" border="0">
      <tr>
        <td align="right"><a href="?hal=trans" class="but">Kembali</a></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
      </tr>
    </table>
