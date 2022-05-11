   <div class="row m-0 vh-100" data-aos="fade-down">
      <div class="align-self-center col-md-8" style="background-color: #FFE8BA; border-radius: 20px;">
         <img src="<?= site_url('assets/img/lupa_password.png') ?>" alt="" class="mx-auto d-block" style="max-width: 90%;">
      </div>
      <div class="col-md-4 align-self-center">
         <div class="card shadow my-3">
            <div class="card-body">
               <h2 class="text-center mt-4">Lupa Password</h2>
               <p class="text-center">Masukan data diri anda untuk mengganti password lama.

               <?= form_open('lupa_password') ?>
               <div class="form-group mb-3">
                  <label for="username">Username</label>
                  <input type="text" id="password" name="username" placeholder="Masukan username anda" class="form-control mt-2" required>
               </div>

               <div class="form-group mb-3">
                  <label for="fullName">Nama lengkap</label>
                  <input type="text" class="form-control mt-2" name="full_name" placeholder="Masukan nama lengkap anda" required>
               </div>

               <div class="form-group mb-3">
                  <label for="password">Password baru</label>
                  <input type="password" id="password" name="password" placeholder="Masukan password baru" class="form-control mt-2" required>
                  <p class="text-muted small">Password minimal 4 karakter</p>
               </div>

               <div class="form-group mb-3">
                  <label for="repassword">Re-Password</label>
                  <input type="password" id="repassword" name="repassword" placeholder="Masukan RePassword" class="form-control mt-2" required>
                  <p class="text-muted small">RePassword harus sama dengan password baru</p>
               </div>

               <p>Sudah ingat? <a href="<?= base_url('login') ?>" class="link-primary" style="text-decoration: none;">Login</a></p>

               <div class="d-grid gap-2 my-2">
                  <button type="submit" class="btn btn-secondary">Ubah password</button>
               </div>
               <?= form_close() ?>
            </div>
         </div>
      </div>
   </div>