<?php include "header.php"; ?>


<div class="container margin-bottom-20 margin-top-20 background-content" style="background-color:aliceblue;border-radius:10px;font-family:calibri;padding-top:2%;">

        <h3 style="font-size:20px;"><left><bold></bold></left></h3>

             <?php echo $this->session->flashdata('item'); ?>

             <form action="<?php echo base_url('member/seller_registration_action') ?>" method="post">

                <div class="well">
                      <h4 style="font-weight:600;">Informasi Data Diri</h4>
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                      <div class="form-group">
                        <label for="exampleInputnama" style="font-weight:normal;">Name</label>
                        <input type="text" name="cp" id="cp" autocomplete='off' class="form-control" placeholder="Name" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp" style="font-weight:normal;">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete='off' class="form-control" placeholder="E-mail" required>
                      </div>

                      <div class="form-group form-group-lg has-feedback">
                       <label for="password">Password</label>
                       <input type="password" name="password" id="password" class="form-control textbox" placeholder="Password" required style="height:35px;font-size:14px;">
                       <i class="form-control-feedback"></i>
                       <span class="text-warning" ></span>
                       </div>

                      <div class="form-group form-group-lg has-feedback">
                       <label for="password">Konfirmasi Password</label>
                       <input type="password" name="conf_password" id="conf_password" class="form-control textbox" placeholder="Confirmation Password" required style="height:35px;font-size:14px;">
                       <i class="form-control-feedback"></i>
                       <span class="text-warning" ></span>
                       </div>

                       <div class="form-group">
                         <label for="gender">Gender</label><br>
                         <input type="radio" name="gender" value="male"> Male
                         <input type="radio" name="gender" value="female"> Female
                       </div>

                      <div class="form-group">
                        <label for="date">Birthday</label><br>
                      <input type="date" name="bday">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp">Referral Code (Optional)</label>
                        <input type="text" name="ref_code" id="ref_code" autocomplete='off' class="form-control" placeholder="Referral Code" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputtlp" >Phone</label>
                        <input type="text" name="phone" id="phone" autocomplete='off' class="form-control" placeholder="Phone" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Security Question</label>
                        <input type="text" name="quetion" id="quetion" autocomplete='off' class="form-control" placeholder="Quetions" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Answer</label>
                        <input type="text" name="answer" id="answer" autocomplete='off' class="form-control" placeholder="Answer" >
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Owner Name</label>
                        <input type="text" name="owner" id="owner" autocomplete='off' class="form-control" placeholder="Owner Name" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Account Number</label>
                        <input type="text" name="account_num" id="account_num" autocomplete='off' class="form-control" placeholder="Account Number" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Bank ID</label>
                        <input type="text" name="bank_id" id="bank_id" autocomplete='off' class="form-control" placeholder="Bank ID" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputnama">Branch</label>
                        <input type="text" name="branch" id="branch" autocomplete='off' class="form-control" placeholder="Branch" required>
                      </div>

                </div>


            <div class="well">
                  <h4 style="font-weight:600;">Foto</h4>
                  <div class="form-group">
                    <label for="exampleInputnama">Image</label>
                    <input type="file" id="mypic" accept="image/*" capture="camera">
                    <canvas style="width:16%;height: 180px;background-image: url('http://placehold.it/180')"></canvas>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtlp" >ID Card</label>
                    <input type='file' onchange="readURL(this);" />
                    <img id="ktp" src="http://placehold.it/180" alt="your image" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtlp">Selfie with ID Card</label>
                    <input type="file" id="selfie" accept="image/*" capture="camera">
                  </div>
            </div>
            Dengan mendaftar, Saya menyetujui <br><a href="https://ladaraindonesia.com/p/syarat-dan-ketentuan" target="_blank">syarat dan ketentuan</a> serta <a href="https://ladaraindonesia.com/p/kebijakan-privasi" target="_blank">kebijakan privasi</a>.<br>
            <br>

            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Daftar</button>
            <br>
          </form>

   </div>


<?php include "footer.php"; ?>
