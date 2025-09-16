<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_menu extends CI_Controller
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

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();
        //$data['detil'] = $this->db->query("SELECT * FROM admin_menu where id='$id'")->result_array();
        // set rules
        $this->form_validation->set_rules('nama', 'Nama Menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/index', $data);
            $this->load->view('template/admin_footer', $data);
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'icon' => $this->input->post('icon'),
                'url' => $this->input->post('url')
            ];
            // insert ke tabel admin menu
            $this->db->insert('admin_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data menu anda sudah ditambahkan! </div>');
            redirect('admin_menu');
        }
    }




    public function edit($id)
    {

        $data['judul'] = 'Halo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //$data['detil'] = $this->db->query("SELECT * FROM admin_menu where id='$id'")->result_array();

        // set rules untuk edit menu
        $this->form_validation->set_rules('nama', 'Nama Menu', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('url', 'URL', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/edit', $data);
            $this->load->view('template/admin_footer', $data);
        } else {

            $nama = $this->input->post('nama', true);
            $icon = $this->input->post('icon', true);
            $url  = $this->input->post('url', true);

            // kita set data mana yg mau di update
            $this->db->set('nama', $nama);
            $this->db->set('icon', $icon);
            $this->db->set('url', $url);
            $this->db->where('id', $this->input->post('id'));

            // update data ke tabel admin menu
            $this->db->update('admin_menu');
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data menu anda sudah diupdate! </div>');
            redirect('admin_menu');
        }
    }


    // fungsi hapus
    public function hapus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // hapus data yg ada dalam admin_menu
        $this->db->delete('admin_menu', ['id' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Selamat, Data menu anda sudah dihapus! </div>');
        redirect('admin_menu');
    }
    public function banner()
    {
        $data['judul'] = 'Banner';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['banner'] = $this->db->get_where('banner')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('nama_lk', 'Nama Pengantian Pria', 'required|trim');
        $this->form_validation->set_rules('nama_pr', 'Nama Pengantian Wanita', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal Pernikahan', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/banner', $data);
            $this->load->view('template/admin_footer', $data);
        } else {

                $nama_lk   = $this->input->post('nama_lk', true);
                $nama_pr   = $this->input->post('nama_pr', true);
                $tgl   = $this->input->post('tgl', true);
            
            $data = [
                'nama_lk' => $nama_lk,
                'nama_pr' => $nama_pr,
                'tgl' => $tgl
            ];
            // insert ke tabel admin menu
            $this->db->insert('banner', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data Banner anda sudah ditambahkan! </div>');
            redirect('admin_menu/banner');
        }
    }

    //edit banner


    //hapus banner


    //hero images
    public function hero_images()
    {

        $data['judul'] = 'Hero Images';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['hero'] = $this->db->get_where('hero')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('text', 'Text', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/hero_images', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/images/banner';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gambar Anda belum diupload! </div>');
                redirect('admin_menu/hero_images');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $text   = $this->input->post('text', true);
            }

            $data = [
                'text' => $text,
                'image' => $gambar
            ];
            // insert ke tabel admin menu
            $this->db->insert('hero', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data Hero Images anda sudah ditambahkan! </div>');
            redirect('admin_menu/hero_images');
        }
    }

//edit hero image

//hapus hero image

//Info mempelai

public function Info_mempelai()
{

    $data['judul'] = 'Info Mempelai';

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // query tabelnya (ambil tabelnya)
    $data['info_mempelai'] = $this->db->get_where('info_mempelai')->result_array();
    $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

    // set rules
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('ayah', 'Ayah', 'required|trim');
    $this->form_validation->set_rules('ibu', 'Ibu', 'required|trim');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('nomer_handphone', 'Nomer Handphone', 'required|trim');
    $this->form_validation->set_rules('bio', 'Bio', 'required|trim');


    if ($this->form_validation->run() == false) {

        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin_menu/info_mempelai', $data);
        $this->load->view('template/admin_footer', $data);
    } else {


        $config['upload_path']   = './front-end/images/info-mempelai';
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['max_size']      =  2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gambar Anda belum diupload! </div>');
            redirect('admin_menu/info_mempelai');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama   = $this->input->post('nama', true);
            $ayah   = $this->input->post('ayah', true);
            $ibu   = $this->input->post('ibu', true);
            $tgl_lahir   = $this->input->post('tgl_lahir', true);
            $nomer_handphone   = $this->input->post('nomer_handphone', true);
            $bio   = $this->input->post('bio', true);
        }

        $data = [
            'nama' => $nama,
            'image' => $gambar,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'tgl_lahir' => $tgl_lahir,
            'nomer_handphone' => $nomer_handphone,
            'bio' => $bio
        ];
        // insert ke tabel admin menu
        $this->db->insert('info_mempelai', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
        Selamat, Data Info Mempelai anda sudah ditambahkan! </div>');
        redirect('admin_menu/info_mempelai');
    }
}


//Music

        public function music()
        {
            $data['judul'] = 'Music';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
            // query tabelnya (ambil tabelnya)
            $data['music'] = $this->db->get_where('music')->result_array();
            $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();
        
            // set rules
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        
        
            if ($this->form_validation->run() == false) {
        
                $this->load->view('template/admin_header', $data);
                $this->load->view('template/admin_sidebar', $data);
                $this->load->view('template/admin_topbar', $data);
                $this->load->view('admin_menu/music', $data);
                $this->load->view('template/admin_footer', $data);
            } else {
        
        
                
                $config['upload_path']   = './front-end/music';
                $config['allowed_types'] = 'mp3|mp4';
                $config['max_size']      =  50050;
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('file_music')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Music Anda belum diupload! </div>');
                    redirect('admin_menu/music');
                } else {
                    $music   = $this->upload->data();
                    $music   = $music['file_name'];
                    $nama   = $this->input->post('nama', true);
                }
        
                $data = [
                    'nama' => $nama,
                    'file' => $music
                ];
                // insert ke tabel admin menu
                $this->db->insert('music', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
                Selamat, Data Music anda sudah ditambahkan! </div>');
                redirect('admin_menu/music');
            }
        }
        

//Generate Auto Code

//public function generate_code(){
  //  $this->db->select_max('id_template','max_id_template');
    //$query=$this->db->get('template_undangan');
    //$cek= intval(substr('max_id_template',2,1));
    //$cek++;
    //$huruf="T";
    //$id_baru=$huruf.sprintf("%02s",$cek);
//}

//Template Undangan

    public function undangan()
        {
            //$id_template;
            $data['judul'] = 'Undangan';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
            // query tabelnya (ambil tabelnya)
            $data['template_undangan'] = $this->db->get_where('template_undangan')->result_array();
            $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();
            $data['template_undangan']=$this->db->get('template_undangan')->result();
            
            $query1 = $this->db->query("SELECT SUBSTRING(id_template, 2) as 'Hasil' FROM template_undangan ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
            foreach ($query1->result() as $row)
            {
                $data['auto_id']=$row->Hasil+1;
            }
            //$autocode = $this-> generate_code();


            // set rules
            $this->form_validation->set_rules('id_template', 'id_template', 'required|trim');
            $this->form_validation->set_rules('nama_template', 'nama_template', 'required|trim');
            $this->form_validation->set_rules('status', 'status', 'required|trim');
            
            
            if ($this->form_validation->run() == false) {
        
                $this->load->view('template/admin_header', $data);
                $this->load->view('template/admin_sidebar', $data);
                $this->load->view('template/admin_topbar', $data);
                $this->load->view('admin_menu/undangan', $data);
                $this->load->view('template/admin_footer', $data);
            } else {
        
        
                $config['upload_path']   = './front-end/images/template_undangan';
                $config['allowed_types'] = 'png|jpg|jpeg|gif';
                $config['max_size']      =  2048;
        
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gambar Anda belum diupload! </div>');
                    redirect('admin_menu/undangan');
                } else {
                    $gambar   = $this->upload->data();
                    $gambar   = $gambar['file_name'];
                    $id_template = $this->input->post('id_template',true);
                    $nama_template   = $this->input->post('nama_template',true);
                    $status = $this->input->post('status',true);
                }
        
                $data = [
                    'id_template' => $id_template,
                    'nama_template' => $nama_template,
                    'gambar' => $gambar,
                    'status' => $status
                    
                ];
                // insert ke tabel template undagan
                $this->db->insert('template_undangan', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
                Selamat, Data Template Undangan anda sudah ditambahkan! </div>');
                redirect('admin_menu/undangan');
            }
        }
        

    //Love Story
  

    public function meja()
    {
        $data['judul'] = 'Meja';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // query tabelnya (ambil tabelnya)
        $data['meja'] = $this->db->query('SELECT * FROM meja where id_resepsi="R1"')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        $this->form_validation->set_rules('id_meja', 'id_meja', 'required|trim');
        $this->form_validation->set_rules('nama_meja', 'nama_meja', 'required|trim');
        $this->form_validation->set_rules('jumlah_orang', 'jumlah_orang', 'required|trim');
        $this->form_validation->set_rules('id_resepsi', 'id_resepsi', 'required|trim');
        $this->form_validation->set_rules('status_meja', 'status_meja', 'required|trim');
        
        
        if ($this->form_validation->run() == false) {
    
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/meja', $data);
            $this->load->view('template/admin_footer', $data);
        } else {}
        
    }

    public function about()
    {

        $data['judul'] = 'About';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['about'] = $this->db->get_where('about')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('hb', 'Header Bio', 'required|trim');
        $this->form_validation->set_rules('motto', 'Motto', 'required|trim');
        $this->form_validation->set_rules('detail_bio', 'Detail Bio', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/about', $data);
            $this->load->view('template/admin_footer', $data);
        } else {

            $data = [
                'hb' => $this->input->post('hb'),
                'motto' => $this->input->post('motto'),
                'detail_bio' => $this->input->post('detail_bio')
            ];
            // insert ke tabel admin menu
            $this->db->insert('about', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data About anda sudah ditambahkan! </div>');
            redirect('admin_menu/about');
        }
    }


    public function web()
    {

        $data['judul'] = 'Web';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['web'] = $this->db->get_where('web')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/web', $data);
            $this->load->view('template/admin_footer', $data);
        } else {

            $data = [
                'nama' => $this->input->post('nama')
            ];
            // insert ke tabel admin menu
            $this->db->insert('web', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data WEb anda sudah ditambahkan! </div>');
            redirect('admin_menu/web');
        }
    }



    public function banner_image()
    {

        $data['judul'] = 'Banner Image';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['banner_img'] = $this->db->get_where('banner_img')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('text', 'Text', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/banner_image', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/assets/img/banner';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gambar Anda belum diupload! </div>');
                redirect('admin_menu/banner_image');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $text   = $this->input->post('text', true);
            }

            $data = [
                'text' => $text,
                'image' => $gambar
            ];
            // insert ke tabel admin menu
            $this->db->insert('banner_img', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data Banner anda sudah ditambahkan! </div>');
            redirect('admin_menu/banner_image');
        }
    }


    public function film_baru()
    {

        $data['judul'] = 'Film Baru';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['film_baru'] = $this->db->get_where('film_baru')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/film_baru', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/assets/img/film-baru';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                poster film Anda belum diupload! </div>');
                redirect('admin_menu/film_baru');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $judul  = $this->input->post('judul', true);
                $youtube  = $this->input->post('youtube', true);
            }

            $data = [
                'judul' => $judul,
                'image' => $gambar,
                'youtube' => $youtube
            ];
            // insert ke tabel admin menu
            $this->db->insert('film_baru', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data poster film anda sudah ditambahkan! </div>');
            redirect('admin_menu/film_baru');
        }
    }



    public function karyawan()
    {

        $data['judul'] = 'Karyawan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['karyawan'] = $this->db->get_where('karyawan')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('nm_kry', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('fb', 'Facebook', 'required|trim');
        $this->form_validation->set_rules('ig', 'Instagram', 'required|trim');
        $this->form_validation->set_rules('tw', 'Twitter', 'required|trim');
        $this->form_validation->set_rules('jbt', 'Jabatan', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/karyawan', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/assets/img/karyawan';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Foto Karyawan Anda belum diupload! </div>');
                redirect('admin_menu/karyawan');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $nm     = $this->input->post('nm_kry', true);
                $fb     = $this->input->post('fb', true);
                $ig     = $this->input->post('ig', true);
                $tw     = $this->input->post('tw', true);
                $jbt    = $this->input->post('jbt', true);
            }

            $data = [
                'nm_kry' => $nm,
                'image' => $gambar,
                'fb' => $fb,
                'ig' => $ig,
                'tw' => $tw,
                'jbt' => $jbt,
            ];
            // insert ke tabel admin menu
            $this->db->insert('karyawan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data karyawan anda sudah ditambahkan! </div>');
            redirect('admin_menu/karyawan');
        }
    }


    public function detail_karyawan($id)
    {

        $data['judul'] = 'Detail Karyawan';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->db->get_where('karyawan', ['id' => $id])->row_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('template/admin_topbar', $data);
        $this->load->view('admin_menu/detail_karyawan', $data);
        $this->load->view('template/admin_footer', $data);
    }



    public function blog()
    {

        $data['judul'] = 'Blog';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['blog'] = $this->db->get_where('blog')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim');
        $this->form_validation->set_rules('isi_blog', 'Isi Blog', 'required|trim');
        $this->form_validation->set_rules('created_by', 'Created By', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/blog', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/assets/img/blog';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Foto Blog Anda belum diupload! </div>');
                redirect('admin_menu/blog');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $judul        = $this->input->post('judul', true);
                $slug         = $this->input->post('slug', true);
                $isi_blog     = $this->input->post('isi_blog', true);
                $created_by   = $this->input->post('created_by', true);
            }

            $data = [
                'judul'      => $judul,
                'image'      => $gambar,
                'slug'       => $slug,
                'isi_blog'   => $isi_blog,
                'created_by' => $created_by,
                'created_at' => time()
            ];
            // insert ke tabel admin menu
            $this->db->insert('blog', $data);
            $this->session->set_flashdata('pesan', 'ditambahkan!');
            redirect('admin_menu/blog');
        }
    }


    public function edit_blog($id)
    {

        $data['judul'] = 'Edit Blog';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['blog'] = $this->db->get_where('blog', ['id' => $id])->row_array();

        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim');
        $this->form_validation->set_rules('isi_blog', 'Isi Blog', 'required|trim');
        $this->form_validation->set_rules('created_by', 'Created By', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/edit_blog', $data);
            $this->load->view('template/admin_footer', $data);
        } else {
            $judul = $this->input->post('judul', true);
            $slug = $this->input->post('slug', true);
            $isi_blog = $this->input->post('isi_blog', true);
            $created_by = $this->input->post('created_by', true);

            // cek jika ada gambar yang akan diganti

            $upload = $_FILES['image']['name'];

            if ($upload) {
                $config['upload_path']   = './front-end/assets/img/blog';
                $config['allowed_types'] = 'png|jpg|jpeg|gif';
                $config['max_size']      =  2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['blog']['image'];

                    unlink(FCPATH . '/front-end/assets/img/blog/' . $gambar_lama);
                }

                //  UPLOAD GAMBAR USER BARU
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('image', $gambar_baru);
            } else {
                // echo $this->upload->display_errors();
            }


            // kita set data mana yg mau di update
            $this->db->set('judul', $judul);
            $this->db->set('slug', $slug);
            $this->db->set('isi_blog', $isi_blog);
            $this->db->set('created_by', $created_by);
            $this->db->where('id', $this->input->post('id'));

            // update data ke tabel admin menu
            $this->db->update('blog');
            $this->session->set_flashdata('pesan', 'diupdate!');
            redirect('admin_menu/blog');
        }
    }


    // fungsi hapus
    public function hapus_blog($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // hapus data yg ada dalam admin_menu
        $this->db->delete('blog', ['id' => $id]);
        $this->session->set_flashdata('pesan', 'dihapus!');
        redirect('admin_menu/blog');
    }


    public function contact()
    {

        $data['judul'] = 'Contact';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query tabelnya (ambil tabelnya)
        $data['contact'] = $this->db->get_where('contact')->result_array();
        $data['admin_menu'] = $this->db->get_where('admin_menu')->result_array();

        // set rules
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('nope', 'Nomor HP', 'required|trim');
        $this->form_validation->set_rules('tw', 'Twitter', 'required|trim');
        $this->form_validation->set_rules('ig', 'Instagram', 'required|trim');
        $this->form_validation->set_rules('fb', 'Facebook', 'required|trim');
        $this->form_validation->set_rules('yt', 'Youtube', 'required|trim');
        $this->form_validation->set_rules('maps', 'Maps', 'required|trim');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('template/admin_topbar', $data);
            $this->load->view('admin_menu/contact', $data);
            $this->load->view('template/admin_footer', $data);
        } else {


            $config['upload_path']   = './front-end/assets/img/contact';
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['max_size']      =  2048;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Foto Blog Anda belum diupload! </div>');
                redirect('admin_menu/contact');
            } else {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $alamat     = $this->input->post('alamat', true);
                $email      = $this->input->post('email', true);
                $nope       = $this->input->post('nope', true);
                $tw         = $this->input->post('tw', true);
                $ig         = $this->input->post('ig', true);
                $fb         = $this->input->post('fb', true);
                $yt         = $this->input->post('yt', true);
                $maps       = $this->input->post('maps', true);
            }

            $data = [
                'alamat'     => $alamat,
                'image'      => $gambar,
                'email'      => $email,
                'nope'       => $nope,
                'tw'         => $tw,
                'ig'         => $ig,
                'fb'         => $fb,
                'yt'         => $yt,
                'maps'       => $maps,
            ];
            // insert ke tabel admin menu
            $this->db->insert('contact', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">
            Selamat, Data Contact anda sudah ditambahkan! </div>');
            redirect('admin_menu/contact');
        }
    }
}
