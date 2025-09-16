<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
 public function index()
 {
    //$data['nama_pria']='Rere';
    //$data['nama_wanita']='Veve';

    //querry data dari tabel banner
    //$data['banner'] = $this->db->get_where('banner')
    //->result_array(); 
    $id_acara_resepsi = $_GET['id_acara'];
    $data['info_pria'] = $this->db->query('SELECT * FROM info_pria where id_acara_resepsi=id_acara')
    ->result_array();

       


    //$data['initial_pria']=substr('Rere',1,1);
    //$data['initial_wanita']=substr('Veve',1,1);
    $this->load->view('home/index',$data);
 }
}