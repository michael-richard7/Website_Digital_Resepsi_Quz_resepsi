<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   public function __construct(){

      parent::__construct();
      $this->load->model('M_Template');
      $this->load->model('M_user');
  }
 public function index()
 {
    //$data['nama_pria']='Rere';
    //$data['nama_wanita']='Veve';

    //querry data dari tabel banner
    //$data['banner'] = $this->db->get_where('banner')
    //->result_array(); 
   

       


    //$data['initial_pria']=substr('Rere',1,1);
    //$data['initial_wanita']=substr('Veve',1,1);
    $data['undangan'] = $this->M_Template1->get_undangan();
    $data['info_pria'] = $this->M_Template1->get_pria();
    $data['info_wanita'] = $this->M_Template1->get_wanita();

    $this->load->view('home/index',$data);
 }
}