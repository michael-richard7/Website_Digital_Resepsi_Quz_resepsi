<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanQR extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_scan');
      $this->load->model('M_user');

      $this->load->library('Ciqrcode');
  }

  public function scan(){
    $data['judul'] = 'Scan QR Code';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['session_value'] = $this->session->userdata('id_acara');
    
    $id_tamu = $this->input->post('id_tamu');

    $data['tamu'] = $this->M_scan->pengecekan_tamu($id_tamu);    
    $data['cek'] = $this->M_scan->cek_tamu($id_tamu);

    if (!$data['tamu']) {
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('ScanQR/scan', $data);
    } else {
      // tampilkan data produk ke view
      
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('ScanQR/scan', $data);


    }
  }

  public function add_tamu(){
    $data['judul'] = 'Scan QR Code';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
      $data['user_use'] = $this->M_user->get_user($value);
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['session_value'] = $this->session->userdata('id_acara');
    
    $id_tamu = $this->input->post('id_tamu');
    

    $data['tamu'] = $this->M_scan->pengecekan_tamu($id_tamu);    
    $data['cek'] = $this->M_scan->cek_tamu($id_tamu);
    $data['update_kehadiran'] = $this->M_scan->pendataan($id_tamu);
    $data['acara'] = $this->M_scan->acara_nikah();
    

    if (!$data['tamu']) {
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('ScanQR/scan', $data);
    } else {
      // tampilkan data produk ke view
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('ScanQR/scan', $data);
    }
  }
}
?>