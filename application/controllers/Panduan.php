<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_panduan');
      $this->load->model('M_user');
  }
 public function user()
 {
    $data['judul'] = 'Panduan Pengguna';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);

    $this->load->view('template/desain',$data);
    $this->load->view('template/admin_header', $data);
    $this->load->view('Panduan/user', $data);
    $this->load->view('template/admin_sidebar', $data);
 }
}