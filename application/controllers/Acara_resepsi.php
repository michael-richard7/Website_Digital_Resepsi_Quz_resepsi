<?php

class Acara_resepsi extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model('M_acara_resepsi');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function view()
    {
        $data['judul'] = 'List Acara';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $value = $data['user'];
        $data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
        $data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
        $data['user_use'] = $this->M_user->get_user($value);
        $data['get_email_petugas'] =$this->M_acara_resepsi->get_email_petugas($value);

        //ambil tampilan data menu sidemenu
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Acara_resepsi/view', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['title'] = 'List Love Story';
        //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById();
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $data['user_use'] = $this->M_user->get_user($value);
        $value = $data['user'];
        $data['judul'] = 'Tambah Acara Resepsi';

        //validation pengecekan
      
        $this->form_validation->set_rules('id_resepsi', 'Id Resepsi', 'required');
        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('nama_resepsi', 'Nama resepsi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Acara_resepsi/view', $data);
        }else{
            
            $this->M_acara_resepsi->tambahData($value);

            $this->session->set_flashdata('pesan_acara_resepsi','Ditambahkan');
            redirect('Acara_resepsi/view');
            
        }
    }
    public function update()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['title'] = 'List Love Story';
        //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById();
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $data['judul'] = 'Tambah Acara Resepsi';
        //validation pengecekan
      
        $this->form_validation->set_rules('id_resepsi', 'Id Resepsi', 'required');
        $this->form_validation->set_rules('nama_resepsi', 'Nama resepsi', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        
        $password = $this->input->post('password_1',true);



        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Acara_resepsi/view', $data);
        }else{
            if(!empty($password)){
                $this->M_acara_resepsi->update_akun_petugas();
            }
            $this->M_acara_resepsi->updateData();
            $this->session->set_flashdata('pesan_acara_resepsi','Diperbarui');
            redirect('Acara_resepsi/view');
            
        }
    }
    public function hapus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['title'] = 'List Love Story';
        //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById();
        $data['user_menu'] = $this->M_user->getAll_usermenu();

       

        $data['judul'] = 'Tambah Acara Resepsi';

        //validation pengecekan
      
        $this->form_validation->set_rules('id_resepsi', 'Id Resepsi', 'required');
        

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Acara_resepsi/view', $data);
        }else{
            
            $this->M_acara_resepsi->hapusData();

            $this->session->set_flashdata('pesan_acara_resepsi','Dihapus');
            redirect('Acara_resepsi/view');
            
        }
    }
    public function ambil_id()
    {
        $id_option = $_POST['id_acara'];
        $_SESSION['id_acara'] = $id_option;
        redirect('Acara_resepsi/view');
    }

}
?>