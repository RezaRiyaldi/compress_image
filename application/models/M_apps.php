<?php

class M_apps extends CI_Model {
   public function cek_users($username = NULL, $full_name = NULL)
   {
      if ($username !== NULL && $full_name !== NULL) {
         $data_user = [
            'username' => $username,
            'full_name' => $full_name
         ];
         return $this->db->get_where('users', $data_user)->row_array();
      } else if ($username !== NULL) {
         $this->db->where('username', $username);
         return $this->db->get('users')->row_array();
      }  
   }

   public function register()
   {
      $id = uniqid('user_');
      $username = $this->input->post('username');
      $full_name = $this->input->post('full_name');
      $_password = $this->input->post('password');
      $password = password_hash($_password, PASSWORD_DEFAULT);

      $data = [
         'id_user' => $id,
         'username' => $username,
         'full_name' => ucwords(strtolower($full_name)),
         'password' => $password,
      ];

      $user = $this->cek_users($username);
      if (!$user) {
         $this->db->insert('users', $data);
         $this->session->set_flashdata('success', 'Berhasil membuat akun! Silahkan login');
         redirect('login');
      } else {
         $this->session->set_flashdata('error', 'Username sudah dipakai');
         redirect('register');
      }
   }

   public function login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user = $this->cek_users($username);
      if ($user) {
         if (password_verify($password, $user['password'])) {
            $data_user = [
               'id_user' => $user['id_user'],
               'username' => $user['username'],
               'full_name' => $user['full_name']
            ];

            $this->session->set_userdata($data_user);
            redirect('home');
         } else {
            $this->session->set_flashdata('error', 'Password salah!');
         }
      } else {
         $this->session->set_flashdata('error', 'Username tidak ditemukan!');
      }

      redirect('login');
   }

   public function lupa_password()
   {
      $username = $this->input->post('username');
      $full_name = $this->input->post('full_name');
      $_password = $this->input->post('password');
      $password = password_hash($_password, PASSWORD_DEFAULT);

      $user = $this->cek_users($username, $full_name);
      if ($user) {
         $data_user = [
            'password' => $password
         ];
         $this->db->where('username', $username);
         $this->db->update('users', $data_user);

         $this->session->set_flashdata('success', 'Berhasil mengganti dengan password baru! Silahkan login.');
         redirect('login');

      } else {
         $this->session->set_flashdata('error', 'Akun tidak ditemukan');
         redirect('lupa_password');
      }
   }

   public function compress_image($username, $file_name, $nama_file)
   {
      $id = uniqid('img_') . '-' . $username;
      $user = $this->cek_users($username);
      date_default_timezone_set('Asia/Jakarta');
      $now = date('Y-m-d H:i:s');
      $data_image = [
         'id' => $id,
         'user_id' => $user['id_user'],
         'nama_file' => $nama_file,
         'filename' => $file_name,
         'tgl_upload' => $now
      ];
      $this->db->insert('galery', $data_image);

      $this->session->set_flashdata('success', 'Berhasil mengompres gambar');
      redirect('history');
   }

   public function get_images($id_user)
   {
      return $this->db->get_where('galery', ['user_id' => $id_user])->result_array();
   }

   public function ubah_akun($aksi)
   {
      if ($aksi == 'akun'){
         $username = $this->input->post('username');
         $full_name = $this->input->post('full_name');

         $this->db->where('id_user', $this->session->userdata('id_user'));
         $this->db->update('users', ['username' => $username, 'full_name' => ucwords(strtolower($full_name))]);

         $this->session->set_flashdata('success', 'Berhasil mengganti info akun!');
         $this->session->set_userdata(['username' => $username, 'full_name' => $full_name]);
      } else if ($aksi == 'pw') {
         $_password = $this->input->post('password');
         $password = password_hash($_password, PASSWORD_DEFAULT);

         $this->db->where('id_user', $this->session->userdata('id_user'));
         $this->db->update('users', ['password' => $password]);

         $this->session->set_flashdata('success', 'Berhasil merubah dengan password baru!');       
      }

      redirect('setting_akun');
   }
}