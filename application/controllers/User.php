<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct(){

        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
        $data['akun_petugas'] = $this->M_user->get_akun_petugas($value);
       
       
       if(substr($value['id'], 0, 1) == "P"){
            $split = explode("_", $value['id']);
            $id_acara = $split[1];
            $_SESSION['id_acara'] = $id_acara;
        }
       
       
        $this->load->view('template/desain',$data);
        $this->load->view('template/admin_header', $data);
        $this->load->view('user/index', $data);
        //$this->load->view('template/desain',$data);
        $this->load->view('template/admin_sidebar', $data);
        
    }
}
?>
