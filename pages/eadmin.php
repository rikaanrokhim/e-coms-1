<?php 
ini_set("display_errors", "1");
error_reporting(E_ALL);

	$id = $ff->get("id_admin");
	$res = $odb->select("tb_admin where id_admin='$id'");
	$dt1 = $res->fetch();
?>

<div id="box">
	<div class="box-top">Form Admin</div>
		<div class="box-panel">
			<form method="post" action="sadmin.php?aksi=edit&id_admin=<?=$id?>" class="form-container">
				<div class="form-title">Username</div>
					<input type="text" name="user" class="form-field" value="<?=$dt1['user']?>">
				<div class="form-title">Password</div>
					<input type="password" name="pass" class="form-field" value="<?=$dt1['pass']?>">
				<div class="form-title">Email</div>
					<input type="email" name="email" class="form-field" value="<?=$dt1['email']?>">

					<div class="submit-container">
						<input type="submit" name="btnsimpan" class="submit-button"></input>
					</div>
			</form>
		</div>
</div>