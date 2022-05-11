   <div class="row m-0 vh-100" data-aos="fade-down">
      <div class="align-self-center col-md-8">
         <img src="<?= site_url('assets/img/login.png') ?>" alt="" class="mx-auto d-block" style="max-width: 90%;">
      </div>
      <div class="col-md-4 align-self-center">
         <div class="card shadow mb-5">
            <div class="card-body">
               <h2 class="text-center mt-4">Login</h2>
               <p class="text-center">Masukan <span class="text-primary fw-bold">username</span> dan <span class="text-primary fw-bold">password</span> anda untuk dapat masuk ke halaman utama.</p>

               <?= form_open() ?>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" id="password" name="username" placeholder="Masukan username anda" class="form-control mt-2 mb-3" required>
               </div>

               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" placeholder="Masukan password anda" class="form-control mt-2 mb-3" required>
               </div>

               <a href="<?= base_url('lupa_password') ?>" class="link-primary" style="text-decoration: none;">Lupa password?</a>

               <div class="d-grid gap-2 my-2">
                  <button type="submit" class="btn btn-primary">Login</button>
               </div>

               <p>Belum punya akun? <a href="<?= base_url('register') ?>" class="link-primary" style="text-decoration: none;">Daftar</a></p>
               <?= form_close() ?>
            </div>
         </div>
      </div>
   </div>