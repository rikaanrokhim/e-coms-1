
<div class="content-wrapper">
    <div class="batas">
        <div id="box">
            <div class="box-top"> Form Pembeli </div>
            <div class="box-panel">
                <form action="sbuat.php?aksi=add" method="post" class="form-container">
                    <div class="form-title"> Username</div>
                    <input type="text" name="user" class="form-field" value="">

                    <div class="form-title"> Password </div>
                    <input type="password" name="pass" class="form-field" value="">

                    <div class="form-title"> Email </div>
                    <input type="email" name="email" class="form-field" value="">

                    <div class="form-title">  Alamat </div>
                    <textarea name="alamat" class="form-field" value=""></textarea>

                    <div class="form-title"> Kode Pos </div>
                    <input type="number" name="k_pos" class="form-field" value="">

                    <div class="form-title"> Telepon </div>
                    <input type="number" name="telp" class="form-field" value="">

                    <div class="submit-container">
                        <input type="submit" name="btnsimpan" class="submit-button">
                    </div>
                </form>
            </div>
        </div>
        <div id="box">
            <div id="box-top"> Form Login</div>
            <div id="box-panel">
                <form action="sbuat.php?aksi=login" method="post" class="form-container">
                    <div class="form-title">Username</div>
                    <input type="text" name="user" class="form-field" value="">

                    <div class="form-title">Password</div>
                    <input type="password" name="pass" class="form-field" value="">

                    <div class="submit-container">
                        <input type="submit" name="btnsimpan" class="submit-button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>