<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_1 extends CI_Controller
{
    public function __construct(){

        parent::__construct();
        $this->load->model('M_Template_1');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }
 public function index()
 {
    $id_acara_resepsi = $_SESSION['id_acara'];

    //$data['judul'] = 'Informasi Mempelai';
    //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    //$id_acara_resepsi = $_GET['id_acara'];
    $data['undangan'] = $this->M_Template_1->get_undangan($id_acara_resepsi);
    $data['info_pria'] = $this->M_Template_1->get_info_pria($id_acara_resepsi);
    $data['info_wanita'] = $this->M_Template_1->get_info_wanita($id_acara_resepsi);
    $data['cerita_cinta'] = $this->M_Template_1->get_cerita_cinta($id_acara_resepsi);
 
    //$music = $this->db->get_where('music');
   // $cc = $this->db->get_where('cerita_cinta')
    //$gf = $this->db->get_where('galeri_foto');
    
    $this->load->view('Template_1/index',$data);
 }
}
?>