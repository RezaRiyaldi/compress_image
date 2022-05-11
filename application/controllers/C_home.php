<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_apps');
      $this->load->library('upload');
   }

   public function index()
   {
      if (!empty($this->session->userdata('id_user'))) {
         $data = [
            'title' => 'Home',
            'home' => TRUE,
            'content' => 'v_compress'
         ];

         $this->load->view('layout/wrapper', $data);
      } else {
         redirect('login');
      }
   }

   public function login()
   {
      if (empty($this->session->userdata('id_user'))) {
         $this->form_validation->set_rules('username', 'Username', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
         if ($this->form_validation->run() === FALSE) {
            $data = [
               'title' => 'Login',
               'content' => 'v_login'
            ];

            $this->load->view('layout/wrapper', $data);
         } else {
            $this->m_apps->login();
         }
      } else {
         redirect('home');
      }
   }

   public function register()
   {
      if (empty($this->session->userdata('id_user'))) {
         $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
         $this->form_validation->set_rules('repassword', 'RePassword', 'matches[password]');
         if ($this->form_validation->run() === FALSE) {
            $data = [
               'title' => 'Daftar',
               'content' => 'v_register'
            ];

            $this->load->view('layout/wrapper', $data);
         } else {
            $this->m_apps->register();
         }
      } else {
         redirect('home');
      }
   }

   public function logout()
   {
      $data_user = [
         'id_user', 'username', 'full_name'
      ];
      $this->session->unset_userdata($data_user);
      $this->session->set_flashdata('success', 'Berhasil logout, semoga harimu menyenangkan');
      redirect('login');
   }

   public function lupa_password()
   {
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'min_length[4]');
      $this->form_validation->set_rules('repassword', 'RePassword', 'matches[password]');
      if ($this->form_validation->run() === FALSE) {
         $data = [
            'title' => 'Lupa euy',
            'content' => 'v_lupa_password'
         ];

         $this->load->view('layout/wrapper', $data);
      } else {
         $this->m_apps->lupa_password();
      }
   }

   public function upload_image()
   {
      $username = $this->session->userdata('username');
      (int) $kualitas = $this->input->post('kualitas');
      $filename = $username . '-' . time() . '-' . $kualitas . 'p';
      $config = [
         'upload_path' => './assets/uploads/',
         'allowed_types' => 'gif|jpg|jpeg|png|bmp',
         'file_name' => $filename,
      ];

      $this->upload->initialize($config);
      if (!$this->upload->do_upload('image')) {
         $this->session->set_flashdata('error', 'Upload gagal, silahkan coba kembali');
         redirect('home');
      } else {
         $this->load->library('image_lib');
         $image_data = $this->upload->data();
         $config_resolusi = [
            'image_library' => 'gd2',
            'source_image' => $image_data['full_path'],
            'width' => round($image_data['image_width'] * ($kualitas / 100)),
            'height' => round($image_data['image_height'] * ($kualitas / 100)),
            'master_dim' => 'width',
            'quality' => $kualitas
         ];

         $this->image_lib->clear();
         $this->image_lib->initialize($config_resolusi);
         $this->image_lib->resize();

         $this->m_apps->compress_image($username, $image_data['file_name'], $filename);
      }
   }

   public function history()
   {
      if (!empty($this->session->userdata('id_user'))) {
         $images = $this->m_apps->get_images($this->session->userdata('id_user'));
         $data = [
            'title' => 'Riwayat kompres',
            'home' => TRUE,
            'content' => 'v_history',
            'images' => $images
         ];

         $this->load->view('layout/wrapper', $data);
      } else {
         redirect('login');
      }
   }

   public function setting_akun($aksi = NULL)
   {
      if (!empty($this->session->userdata('id_user'))) {
         $user = $this->db->get_where('users', ['id_user' => $this->session->userdata('id_user')])->row_array();
         if ($aksi == 'akun') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required');
         } else if ($aksi == 'pw') {
            $this->form_validation->set_rules('password', 'Password', 'min_length[4]');
            $this->form_validation->set_rules('repassword', 'RePassword', 'matches[password]');
         }
         if ($this->form_validation->run() === FALSE) {
            $data = [
               'title' => 'Riwayat kompres',
               'home' => TRUE,
               'content' => 'v_setting_akun',
               'user' => $user
            ];

            $this->load->view('layout/wrapper', $data);
         } else {
            $this->m_apps->ubah_akun($aksi);
         }
      } else {
         redirect('login');
      }
   }
}
