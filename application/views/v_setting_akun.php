<div class="row m-0">
   <div class="col-md-5 mx-auto">
      <div class="card mt-4 shadow">
         <div class="card-body">
            <h3 class="text-center my-3">Ubah Akun</h3>
            <?= form_open('setting_akun/akun') ?>

            <div class="form group mb-3">
               <label for="username">Username</label>
               <input type="text" name="username" class="form-control form-control-sm mt-2" value="<?= $user['username'] ?>" required>
            </div>

            <div class="form group mb-3">
               <label for="full_name">Nama lengkap</label>
               <input type="text" name="full_name" class="form-control form-control-sm mt-2" value="<?= $user['full_name'] ?>" required>
            </div>

            <button type="submit" class="btn btn-warning btn-sm ms-auto d-block w-25">Ubah Akun</button>
            <?= form_close() ?>

            <hr>
            
            <?= form_open('setting_akun/pw') ?>
            <h3 class="text-center my-3">Ubah Password</h3>

            <div class="form group mb-3">
               <label for="password">Password</label>
               <input type="password" name="password" class="form-control form-control-sm mt-2" placeholder="Masukan password baru" required>
               <p class="text-muted small">Password minimal 4 karakter</p>
            </div>

            <div class="form group mb-3">
               <label for="repassword">RePassword</label>
               <input type="password" name="repassword" class="form-control form-control-sm mt-2" placeholder="Konfirmasi password baru" required>
            </div>

            <button type="submit" class="btn btn-warning btn-sm ms-auto d-block w-25">Ubah Password</button>
            <?= form_close() ?>
         </div>
      </div>
   </div>
</div>