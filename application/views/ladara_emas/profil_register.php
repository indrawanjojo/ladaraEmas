<?php include "header.php"; ?>

<?php include "menu.php"; ?>

<div class="container margin-bottom-20 margin-top-20 background-content" style="width:25%;background-color:aliceblue;border-radius:10px;font-family:calibri;">
        <!-- <div class="row cart-head"> -->
            <!-- <div class="container"> -->
                <!-- <div class="row"> -->
                <?php
                  $start = 0;
                  foreach ($setting as $setting)
                    {
                ?>
                    <h1 class="logo">
                        <a href="<?php echo base_url() ?>">
                            <div align="center"><img class="ione-logo" src="<?php echo $path.'setting_img/'.$setting->logo  ?>" alt="<?php echo $setting->nama_web; ?>"/></div>
                        </a>
                    </h1>
               <?php } ?>
              <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <h3 style="font-size:20px;"><left><bold>Data Diri</bold></left></h3>

             <?php echo $this->session->flashdata('item'); ?>

             <form action="<?php echo base_url('member/seller_registration_action') ?>" method="post">

                <div class="well">
                      <h4 style="font-weight:600;">Informasi Data Diri</h4>
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                      <div class="form-group">
                        <label for="exampleInputnama" style="font-weight:normal;">Nama Lengkap</label>
                        <input type="text" name="cp" id="cp" autocomplete='off' class="form-control" placeholder="Nama Lengkap" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp" style="font-weight:normal;">No Telepon</label>
                        <input type="text" name="cp_phone" id="cp_phone" autocomplete='off' class="form-control" placeholder="No Telepon" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp" style="font-weight:normal;">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete='off' class="form-control" placeholder="E-mail" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp" style="font-weight:normal;">Password</label>
                        <input type="password" name="password" id="password" autocomplete='off' class="form-control" placeholder="Password" required>
                      </div>
                </div>


            <div class="well">
                  <h4 style="font-weight:600;">Informasi Toko</h4>
                  <div class="form-group">
                    <label for="exampleInputnama" style="font-weight:normal;">Nama Toko</label>
                    <input type="text" name="name" id="name" autocomplete='off' class="form-control" placeholder="Nama Toko" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtlp" style="font-weight:normal;">No Telepon</label>
                    <input type="text" name="phone" id="phone" autocomplete='off' class="form-control" placeholder="No Telepon" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtlp" style="font-weight:normal;">Alamat Toko</label>
                    <textarea name="address" id="address" autocomplete='off' class="form-control" required placeholder="Alamat Toko"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtlp" style="font-weight:normal;">Kategori Toko</label>
                    <input type="text" name="kategori" id="kategori" autocomplete='off' class="form-control" placeholder="Kategpri Toko" required>
                  </div>
            </div>
            Dengan mendaftar, Saya menyetujui <br><a href="https://ladaraindonesia.com/p/syarat-dan-ketentuan" target="_blank">syarat dan ketentuan</a> serta <a href="https://ladaraindonesia.com/p/kebijakan-privasi" target="_blank">kebijakan privasi</a>.<br>
            <br>

            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Daftar</button>
            <br>
            Sudah punya akun? <a href="https://officer.ladaraindonesia.com/seller_zone/login" target="_blank">Masuk</a>
          </form>

   </div>


<?php include "footer.php"; ?>
