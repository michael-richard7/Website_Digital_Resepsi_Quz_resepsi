<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tamu extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_tamu');
      $this->load->model('M_user');
      $this->load->library('form_validation');
    
  }

  public function daftar(){
    $data['judul'] = 'Daftar Tamu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['list_tamu'] = $this->M_tamu->get_tamu();
    $data['link_undangan'] = $this->M_tamu->get_link();
    $data['undangan'] = $this->M_tamu->get_undangan();

    $after_add =$this->input->get('after_add');
    if(isset($after_add)){
      if($after_add == 'ya'){
        $data['pesan_muncul'] = 'ok';
      }
    }else{
      $data['pesan_muncul'] = 'no';
    }
    $data['session_value'] = $this->session->userdata('id_acara');

    $this->load->view('template/admin_header', $data);
    $this->load->view('template/admin_sidebar', $data);
    //$this->load->view('template/admin_topbar', $data);
    $this->load->view('template/desain',$data);
    $this->load->view('Tamu/daftar', $data);
  }

  public function tambah_tamu(){
    $data['judul'] = 'Tambah Tamu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['user_use'] = $this->M_user->get_user($value);
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['session_value'] = $this->session->userdata('id_acara');
    $data['list_kategori'] = $this->M_tamu->get_kategori();
    
    $data['nama_tamu'] = $this->input->post('nama_tamu');
    $data['nomer_telp'] = $this->input->post('nomer_telp');
    $data['kategori_meja'] = $this->input->post('input_kategori_tamu');
    $data['jumlah_tamu'] = $this->input->post('jumlah_tamu');

    $nama_tamu = $this->input->post('nama_tamu');
    $id_detil_meja = $this->input->post('meja');
    $kategori_meja = $this->input->post('input_kategori_tamu');
    $jumlah_tamu = $this->input->post('jumlah_tamu');
   
    $submit_button = $this->input->post('submit_button');
    //awal kalo data baru
    $data['tampilan_opsi'] = 'NO';

    if($submit_button == 'cari_meja'){
      if($jumlah_tamu >= '0'){
        $data['data_meja'] = $this->M_tamu->get_list_meja($jumlah_tamu,$kategori_meja);
        $data['tampilan_opsi'] = 'OK';

        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Tamu/tambah_tamu', $data);
      } elseif(empty($jumlah_tamu)){
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Tamu/tambah_tamu', $data);
      }
    }elseif($submit_button == 'simpan_data'){
      
      $this->form_validation->set_rules('nama_tamu', 'nama_tamu', 'required');
      $this->form_validation->set_rules('nomer_telp', 'nomer_telp', 'required');
      $this->form_validation->set_rules('input_kategori_tamu', 'input_kategori_tamu', 'required');
      $this->form_validation->set_rules('jumlah_tamu', 'jumlah_tamu', 'required');
      $this->form_validation->set_rules('meja', 'meja', 'required');

      if ($this->form_validation->run() == FALSE ) {
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Tamu/tambah_tamu', $data);
        
      }else{
        $this->M_tamu->tambah_aja();

        $this->session->set_flashdata('pesan_tamu','Ditambahkan');
        redirect('tamu/daftar?after_add=ya');   
      }
    }elseif(empty($submit_button)){
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      //$this->load->view('template/admin_topbar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('Tamu/tambah_tamu', $data);
    }
  }

  
  public function tambah_aja(){
    $data['judul'] = 'Tambah Tamu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
      $data['user_use'] = $this->M_user->get_user($value);
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['session_value'] = $this->session->userdata('id_acara');
    $data['list_kategori'] = $this->M_tamu->get_kategori();

    $this->form_validation->set_rules('nama_tamu', 'nama_tamu', 'required');
    $this->form_validation->set_rules('nomer_telp', 'nomer_telp', 'required');
    $this->form_validation->set_rules('input_kategori_tamu', 'input_kategori_tamu', 'required');
    $this->form_validation->set_rules('jumlah_tamu', 'jumlah_tamu', 'required');
    $this->form_validation->set_rules('id_meja', 'id_meja', 'required');
    $this->form_validation->set_rules('meja', 'meja', 'required');

    $this->M_tamu->tambahTamu();
    $this->session->set_flashdata('pesan_tamu','Ditambahkan');
    redirect('Tamu/daftar');   
    
  }
  
  public function edit(){
    $data['judul'] = 'Ubah Data Tamu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $value = $data['user'];
    $data['id_tamu'] = $this->uri->segment(3);

    $data['user_use'] = $this->M_user->get_user($value);
    //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
    //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
    //ambil tampilan data menu sidemenu
    $data['user_menu'] = $this->M_user->getAll_usermenu();
    $data['session_value'] = $this->session->userdata('id_acara');
    $data['list_kategori'] = $this->M_tamu->get_kategori();

    $id_tamu = $this->input->post('id_tamu');
    $nama_tamu = $this->input->post('nama_tamu');
    $id_detil_meja = $this->input->post('meja');
    $kategori_meja = $this->input->post('input_kategori_tamu');
    $jumlah_tamu = $this->input->post('jumlah_tamu');

    $data['list_tamu'] = $this->M_tamu->get_tamu_update($id_tamu);  
    $data['nama_tamu'] = $this->input->post('nama_tamu');
    $data['nomer_telp'] = $this->input->post('nomer_telp');
    $data['kategori_meja'] = $this->input->post('input_kategori_tamu');
    $data['jumlah_tamu'] = $this->input->post('jumlah_tamu');
    
    
   
    $submit_button = $this->input->post('submit_button');
    //awal kalo data baru
    $data['tampilan_opsi'] = 'NO';

    if($submit_button == 'cari_meja'){
      if(isset($kategori_meja)){
        if($jumlah_tamu >= '0'){
          $data['id_tamu'] = $this->input->post('id_tamu');
          $data['data_meja'] = $this->M_tamu->get_list_meja($jumlah_tamu,$kategori_meja);
          $data['tampilan_opsi'] = 'OK';
          $data['list_tamu'] = $this->M_tamu->get_tamu_update($id_tamu); 

          $this->load->view('template/admin_header', $data);
          $this->load->view('template/admin_sidebar', $data);
          //$this->load->view('template/admin_topbar', $data);
          $this->load->view('template/desain',$data);
          $this->load->view('Tamu/edit', $data);
        } elseif(empty($jumlah_tamu)){
          $this->load->view('template/admin_header', $data);
          $this->load->view('template/admin_sidebar', $data);
          //$this->load->view('template/admin_topbar', $data);
          $this->load->view('template/desain',$data);
          $this->load->view('Tamu/edit', $data);
        }
      }
      
    }elseif($submit_button == 'simpan_data'){
      
      $this->form_validation->set_rules('nama_tamu', 'nama_tamu', 'required');
      $this->form_validation->set_rules('nomer_telp', 'nomer_telp', 'required');
      $this->form_validation->set_rules('input_kategori_tamu', 'input_kategori_tamu', 'required');
      $this->form_validation->set_rules('jumlah_tamu', 'jumlah_tamu', 'required');
      $this->form_validation->set_rules('meja', 'meja', 'required');

      if ($this->form_validation->run() == FALSE ) {
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Tamu/edit', $data);
        
      }else{
        $id_tamu = $this->input->post('id_tamu');
        $this->M_tamu->ubah_aja($id_tamu);
        $this->session->set_flashdata('pesan_tamu',' Di Ubah ');
        redirect('tamu/daftar?after_add=ya');   
      }
    }elseif(empty($submit_button)){
      $this->load->view('template/admin_header', $data);
      $this->load->view('template/admin_sidebar', $data);
      //$this->load->view('template/admin_topbar', $data);
      $this->load->view('template/desain',$data);
      $this->load->view('Tamu/edit', $data);
    }
  }

  public function delete(){
    $id_tamu = $this->input->post('id_tamu_hapus');
    $this->M_tamu->delete_aja($id_tamu);
    $this->session->set_flashdata('pesan_tamu',' Dihapus ');
    redirect('Tamu/daftar?after_add=ya'); 
  }
  
  

}

?>