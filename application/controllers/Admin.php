<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('as_id') == 1) {
            redirect('auth');
        } elseif ($this->session->userdata('as_id') == 2) {
            redirect('user');
        }
    }

    public function index()
    {

        // query tabelnya (ambil tabelnya)
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/admin_footer', $data);
    }
}





























// public function __construct()
//     {
//         parent::__construct();
//         if (!$this->session->userdata('as_id') == 1) {
//             redirect('auth');
//         } elseif ($this->session->userdata('as_id') == 2) {
//             redirect('user');
//         }
//     }
