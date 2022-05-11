   <div class="container">
      <h1 class="text-center my-3">History</h1>
      <div class="row m-0 border p-3">
         <?php
         if ($images) {
            echo "<p>Jumlah: " . $this->db->get_where('galery', ['user_id' => $this->session->userdata('id_user')])->num_rows() . "</p>";
            foreach ($images as $image) {
         ?>
               <div class="col-md-3 p-0">
                  <div class="card m-2">
                     <div class="img">
                        <img src="<?= base_url('assets/uploads/' . $image['filename']) ?>" class="card-img-top" alt="...">
                     </div>
                     <div class="card-body">
                        <p class="card-title fw-bold"><?= $image['nama_file'] ?></p>
                        <p class="card-text text-muted"><?= $image['tgl_upload'] ?></p>
                        <form action="<?= base_url('assets/uploads/' . $image['filename']) ?>" method="get">
                           <div class="d-grid gap-2 my-2">
                              <button type="submit" class="btn btn-outline-primary">Preview</button>
                           </div>
                        </form>
                        <a href="<?= base_url('assets/uploads/' . $image['filename']) ?>" class="btn btn-primary d-block" download="">Download</a>
                     </div>
                  </div>
               </div>
            <?php }
         } else { ?>
            <div class="text-center">
               <h2>Anda belum melakukan kompres gambar!</h2>
               <img src="<?= base_url('assets/img/null_history.png') ?>" alt="" style="width: 300px;">
               <h4>Silahkan klik Home pada navigasi atau klik <a href="<?= site_url('home') ?>">Link</a> ini.</h4>
            </div>
         <?php } ?>




      </div>
   </div>