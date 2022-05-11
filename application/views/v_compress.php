   <div style="text-align: center;" class="w-100 mt-3 mb-2">
      <h1>Kompres Gambar</h1>
      <p class="mb-4">Kompres Gambar <span class="text-primary fw-bold">JPG</span>, <span class="text-primary fw-bold">JPEG</span>, <span class="text-primary fw-bold">PNG</span>, <span class="text-primary fw-bold">BMP</span>, atau <span class="text-primary fw-bold">GIF</span> dengan kualitas dan kompresi terbaik.</p>
   </div>
   <div class="row m-0">
      <div class="col-md-8 mx-auto align-self-center">
         <div class="card shadow">
            <div class="card-body">
               <h3 class="text-center">Pilih gambar</h3>
               <?= form_open_multipart('upload_image') ?>

               <div class="form-group">
                  <label for="img">Masukan Gambar</label>
                  <input type="file" name="image" id="img" class="form-control mt-2 " onchange="imageValidation()" required>
                  <p class="small " id="ekstensi">Gambar harus berekstensi JPG, JPEG, PNG, BMP, atau GIF</p>                  
               </div>

               <label for="size">Ukuran</label>
               <select class="form-select mt-2" name="kualitas">
                   <option value="10">10% dari ukuran asli</option>
                   <option value="20">20% dari ukuran asli</option>
                   <option value="30">30% dari ukuran asli</option>
                   <option value="40">40% dari ukuran asli</option>
                   <option value="50">50% dari ukuran asli</option>
                  <option value="60">60% dari ukuran asli</option>
                  <option value="70">70% dari ukuran asli</option>
                  <option value="80">80% dari ukuran asli</option>
                  <option value="90" selected>90% dari ukuran asli</option>
               </select>  

               <div class="d-grid gap-2 mt-3">
                  <button type="submit" class="btn btn-primary">Upload</button>
               </div>
               <?= form_close() ?>
            </div>
         </div>
      </div>
   </div>