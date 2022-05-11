   <div class="row m-0 vh-100" data-aos="fade-right">
      <div class="align-self-center col-md-8" data-aos="zoom-in">
         <img src="<?= site_url('assets/img/register.png') ?>" alt="" class="mx-auto d-block" style="max-width: 90%; transform: rotateY(180deg);">
      </div>
      <div class="col-md-4 align-self-center" data-aos="fade-down-right" data-aos-delay="300">
         <div class="card shadow my-3">
            <div class="card-body">
               <h2 class="text-center mt-4">Register</h2>
               <p class="text-center">Masukan data diri anda untuk mendaftar.</p>

               <?= form_open('register') ?>

               <div class="form-group mb-3">
                  <label for="username">Username</label>
                  <input type="text" id="password" placeholder="Masukan username anda" class="form-control mt-2" name="username" required>
                  <p class="text-muted small">Username yang baik itu kecil semua dan tidak pakai space</p>
               </div>

               <div class="form-group mb-3">
                  <label for="fullName">Nama Lengkap</label>
                  <input type="text" id="text" name="full_name" placeholder="Masukan nama lengkap anda" class="form-control mt-2" required>
               </div>

               <div class="form-group mb-3">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" placeholder="Masukan password" class="form-control mt-2" required>
                  <p class="text-muted small">Password minimal 4 karakter</p>
               </div>

               <div class="form-group mb-3">
                  <label for="repassword">Re-Password</label>
                  <input type="password" id="repassword" name="repassword" placeholder="Masukan RePassword" class="form-control mt-2" required>
                  <p class="text-muted small">RePassword harus sama dengan password</p>
               </div>

               <div class="d-grid gap-2 my-2">
                  <button type="submit" class="btn btn-success">Daftar</button>
               </div>

               <p>Sudah punya akun? <a href="<?= base_url('login') ?>" class="link-primary" style="text-decoration: none;">Login</a></p>
              
               <?= form_close() ?>
            </div>
         </div>
      </div>
   </div>