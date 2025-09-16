<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_Template');
      $this->load->model('M_user');
      $this->load->library('Ciqrcode');
  }

 public function tmp_pertama() 
 {
    //$data['nama_pria']='Rere';
    //$data['nama_wanita']='Veve';

    //querry data dari tabel banner
    //$data['banner'] = $this->db->get_where('banner')
    //->result_array(); 

    //$data['initial_pria']=substr('Rere',1,1);
    //$data['initial_wanita']=substr('Veve',1,1);
    $data['cerita_cinta'] = $this->M_Template->get_cerita_cinta();
    $data['undangan'] = $this->M_Template->get_undangan();
    $data['info_pria'] = $this->M_Template->get_pria();
    $data['info_wanita'] = $this->M_Template->get_wanita();
    $data['galeri'] = $this->M_Template->get_galeri();
    
    $nilai = $_GET['s'];
    if(strpos($nilai, '|') !== false) {
    $value = explode("|",$nilai);
    $acara = $value[0];
    $tamu = $value[1];
    } else {
    $acara = $nilai;
    }

    if(isset($tamu)){
      $data['tamu'] = $this->M_Template->get_tamu();
    }
    

    $this->load->view('Undangan/temp_pertama',$data);
 }

public function QRcode($kode){
   
   QRcode::png(
      $kode,
      $outfile = false,
      $level = 'H',
      $size  = 6,
      $margin = 2
    );
}

 public function tmp_kedua()
 {
    //$data['nama_pria']='Rere';
    //$data['nama_wanita']='Veve';

    //querry data dari tabel banner
    //$data['banner'] = $this->db->get_where('banner')
    //->result_array(); 

    //$data['initial_pria']=substr('Rere',1,1);
    //$data['initial_wanita']=substr('Veve',1,1);
    $data['cerita_cinta'] = $this->M_Template->get_cerita_cinta();
    $data['undangan'] = $this->M_Template->get_undangan();
    $data['info_pria'] = $this->M_Template->get_pria();
    $data['info_wanita'] = $this->M_Template->get_wanita();
    $data['galeri'] = $this->M_Template->get_galeri();
    
   $nilai = $_GET['s'];
   if(strpos($nilai, '|') !== false) {
   $value = explode("|",$nilai);
   $acara = $value[0];
   $tamu = $value[1];
   } else {
   $acara = $nilai;
   }

    if(isset($tamu)){
      $data['tamu'] = $this->M_Template->get_tamu();
    }
    
    $this->load->view('Undangan/temp_kedua',$data);
 }

 public function tmp_ketiga()
 {
    //$data['nama_pria']='Rere';
    //$data['nama_wanita']='Veve';

    //querry data dari tabel banner
    //$data['banner'] = $this->db->get_where('banner')
    //->result_array(); 

    //$data['initial_pria']=substr('Rere',1,1);
    //$data['initial_wanita']=substr('Veve',1,1);
    $data['cerita_cinta'] = $this->M_Template->get_cerita_cinta();
    $data['undangan'] = $this->M_Template->get_undangan();
    $data['info_pria'] = $this->M_Template->get_pria();
    $data['info_wanita'] = $this->M_Template->get_wanita();
    $data['galeri'] = $this->M_Template->get_galeri();
    
   $nilai = $_GET['s'];
   if(strpos($nilai, '|') !== false) {
   $value = explode("|",$nilai);
   $acara = $value[0];
   $tamu = $value[1];
   } else {
   $acara = $nilai;
   }

    if(isset($tamu)){
      $data['tamu'] = $this->M_Template->get_tamu();
    }

    $this->load->view('Undangan/temp_ketiga',$data);
 }
}