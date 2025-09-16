<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/auth_header');
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();


            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'as_id' => $user['as_id']

                    ];
                    $this->session->set_userdata($data);

                    if ($user['as_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Kata sandi anda salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
                Email anda salah, Anda belum mendaftar </div>');
                redirect('auth');
            }
        }
    }


    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|trim|matches[password1]');

        $query1 = $this->db->query("SELECT SUBSTRING(id, 2) as 'Hasil' FROM user ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja1 ="A1";
        $tb=$this->input->POST();
        foreach ($query1->result() as $row)
        {
           $codeaja1="A".($row->Hasil+1);
        }
        $data['auto_id'] = $codeaja1;


        if ($this->form_validation->run() == false) {


            $this->load->view('template/reg_header',$data);
            $this->load->view('auth/registrasi',$data);
            $this->load->view('template/auth_footer',$data);
        } else {


            $email = $this->input->post('email');
            
            $query_cek_akun = $this->db->query("SELECT * FROM user WHERE email='$email'");

            if ($query_cek_akun->num_rows() > 0) {
                $this->session->set_flashdata('pesan_buat-email', '<div class="alert alert-warning" role="alert">
                Email telah digunakan, mohon menggunakan alamat email lainnya!</div>');
                redirect('auth/registrasi');
            } else {
                $data = [
                    'id'            => $codeaja1,
                    'nama'          => $this->input->post('nama'),
                    'email'         => $this->input->post('email'),
                    'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'as_id'         => 2,
                    'gambar'        => 'user.png',
                    'date_created'  => time()
                ];
    
                $this->db->insert('user', $data);

                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
                Selamat, anda sudah terdaftar! Silahkan Login! </div>');
                redirect('auth');
                
            }
        }
    }

    public function lupa_password()
    {
         $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        $id = $this->input->post('id_user'); 
        $password = $this->input->post('password1');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/reg_header');
            $this->load->view('auth/lupa_password');
            $this->load->view('template/auth_footer');
        } else {

            $hasil_cek = $this->M_auth->ganti_password($id,$password);
            if($hasil_cek =='ada'){
                $data = [
                    'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    
                ];
                $this->db->where('id', $id);
                $this->db->update('user', $data);

                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
                Selamat, password anda berhasil diganti! Silahkan Login! </div>');
                redirect('auth');
            }
            elseif($hasil_cek == "tidak_ada"){
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
                Gagal melakukan pembaruan password, silahkan cek kembali email yang digunakan </div>');
            }

           
        }
    }
    
    public function konfirmasi_email(){
        
    require(APPPATH. 'PHPMailer-master/src/PHPMailer.php');
    require(APPPATH. 'PHPMailer-master/src/SMTP.php');
    require(APPPATH. 'PHPMailer-master/src/Exception.php');
    
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $email = $this->input->post('email');
        
    $hasil = $this->db->query("SELECT * FROM user where email='$email'");
     if($hasil->num_rows() > 0){
            $class_id = $hasil->row();
            $get_id= $class_id->id;}
        if ($this->form_validation->run() == false) {

            $this->load->view('template/konfirmasi_header');
            $this->load->view('auth/konfirmasi_email');
            $this->load->view('template/auth_footer');
            
        } elseif($this->form_validation->run() == true) {
            if($hasil->num_rows() > 0){
            
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'mail.quzresepsi.com';
                $config['smtp_port'] = 465;
                $config['smtp_user'] = 'quzresepsi@quzresepsi.com';
                $config['smtp_pass'] = 'Quzresepsi_221';
                $config['smtp_crypto'] = 'ssl';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['crlf'] = "\r\n";
                
                $this->load->library('email');
                $this->email->from('quzresepsi@quzresepsi.com', 'Quz Resepsi');
                $this->email->to($email);
                $this->email->subject('Konfirmasi Penggantian Password');
                $this->email->message('Silahkan Klik Link berikut untuk melakukan pengantian kata sandi anda: ' . site_url('auth/lupa_password') . '/?x=' . $get_id);
                    if ($this->email->send()) {
                        $this->session->set_flashdata('pesan_kirim_email', '<div class="alert alert-primary" role="alert">
                        Silahkan Cek Email Untuk Pengantian Kata Sandi</div>');
                        $this->load->view('template/konfirmasi_header');
                        $this->load->view('auth/konfirmasi_email');
                        $this->load->view('template/auth_footer');
                    } else {
                        $this->session->set_flashdata('pesan_kirim_email', '<div class="alert alert-danger" role="alert">
                        Gagal Kirim Email</div>');
                        $this->load->view('template/konfirmasi_header');
                        $this->load->view('auth/konfirmasi_email');
                        $this->load->view('template/auth_footer');
                    }

            }else{
            $this->session->set_flashdata('pesan_kirim_email', '<div class="alert alert-warning" role="alert">
            Email yang anda masukan tidak terdaftar </div>');
            $this->load->view('template/konfirmasi_header');
            $this->load->view('auth/konfirmasi_email');
            $this->load->view('template/auth_footer');
            }

        }
        
    }


    public function keluar()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('as_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">
        Anda sudah keluar! </div>');
        session_unset();
        session_destroy();
        redirect('auth');
    }
}
