<?php
class Info_mempelai extends CI_Controller 
{
    public function __construct(){

        parent::__construct();
        $this->load->model('M_info_mempelai');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function view()
    {
        $data['judul'] = 'Informasi Mempelai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
       
        //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
        $data['template'] = $this->M_info_mempelai->getAll_template();
        //ambil tampilan data menu sidemenu
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $data['cek'] = $this->M_info_mempelai->cek_undangan();
        $data['undangan'] = $this->M_info_mempelai->undangan();
        $data['pria'] = $this->M_info_mempelai->pria();
        $data['wanita'] = $this->M_info_mempelai->wanita();


        $data['session_value'] = $this->session->userdata('id_acara');
    
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        //$this->load->view('template/admin_topbar', $data);
        $this->load->view('template/desain',$data);
        $this->load->view('Info_mempelai/view', $data);

    }
    
    public function update_template()
    {
        $id_acara = $_SESSION['id_acara'];
        $template = $this->input->post('template_id');
        $this->M_info_mempelai->pakai_template($template,$id_acara);
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
        $this->session->set_flashdata('pesan_info_mempelai','Terpilih');
        
            
    }


    public function tambah_data()
    {
        $data['judul'] = 'Informasi Mempelai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $data['auto_id_banner'] = $this->M_info_mempelai->get_Idbanner();
        $data['template'] = $this->M_info_mempelai->getAll_template();
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
        //ambil tampilan data menu sidemenu

        //$data['auto_id_pria'] = $this->M_info_mempelai->get_Idpria();
        //$data['auto_id_wanita'] = $this->M_info_mempelai->get_Idwanita();
        
        //$selected_value = $_POST['opsi_gift'];
   
        if(isset($_POST['tambahdata'])){
            $pilih_opsi_rb = $this->input->post('opsi_gift');
        }
             
        $id_acara_resepsi = $_SESSION['id_acara'];

        

        $banyak_foto = $_FILES['galeri_nikah'];
       
        

        //Cover Undangan
        $this->form_validation->set_rules('nm_cover_pria', 'nm_cover_pria', 'required');
        $this->form_validation->set_rules('nm_cover_wanita', 'nm_cover_wanita', 'required|trim');

        //Informasi Mempelai Pria
        $this->form_validation->set_rules('mempelai_pria_nama', 'mempelai_pria_nama', 'required|trim');
        $this->form_validation->set_rules('mempelai_pria_tgl_lahir', 'mempelai_pria_tgl_lahir', 'required|trim');
        $this->form_validation->set_rules('mempelai_pria_anak_ke', 'mempelai_pria_anak_ke', 'required|trim');
        $this->form_validation->set_rules('mempelai_pria_nama_ayah', 'mempelai_pria_nama_ayah', 'required|trim');
        $this->form_validation->set_rules('mempelai_pria_nama_ibu', 'mempelai_pria_nama_ibu', 'required|trim');
        $this->form_validation->set_rules('mempelai_pria_telepon', 'mempelai_pria_telepon', 'required|trim');
        $this->form_validation->set_rules('bio_pria', 'bio_pria', 'required|trim');

        //Informasi Mempelai Wanita
        $this->form_validation->set_rules('mempelai_wanita_nama', 'mempelai_wanita_nama', 'required|trim');
        $this->form_validation->set_rules('mempelai_wanita_tgl_lahir', 'mempelai_wanita_tgl_lahir', 'required|trim');
        $this->form_validation->set_rules('mempelai_wanita_anak_ke', 'mempelai_wanita_anak_ke', 'required|trim');
        $this->form_validation->set_rules('mempelai_wanita_nama_ayah', 'mempelai_wanita_nama_ayah', 'required|trim');
        $this->form_validation->set_rules('mempelai_wanita_nama_ibu', 'mempelai_wanita_nama_ibu', 'required|trim');
        $this->form_validation->set_rules('mempelai_wanita_telepon', 'mempelai_wanita_telepon', 'required|trim');
        $this->form_validation->set_rules('bio_wanita', 'bio_wanita', 'required|trim');

        //Event
        $this->form_validation->set_rules('tanggal_akad', 'tanggal_akad', 'required|trim');
        $this->form_validation->set_rules('jam_akad', 'jam_akad', 'required|trim');
        $this->form_validation->set_rules('tanggal_resepsi', 'tanggal_resepsi', 'required|trim');
        $this->form_validation->set_rules('jam_resepsi', 'jam_resepsi', 'required|trim');
        $this->form_validation->set_rules('alamat_resepsi', 'alamat_resepsi', 'required|trim');
        $this->form_validation->set_rules('lokasi_gmap', 'lokasi_gmap', 'required|trim');
        $this->form_validation->set_rules('nomer_tujuan', 'nomer_tujuan', 'required|trim');
        $this->form_validation->set_rules('alamat_wedding_gift', 'alamat_wedding_gift', 'required|trim');
        $this->form_validation->set_rules('nomer_wa', 'nomer_wa', 'required|trim');

        //Multiple input
        $judul = $_POST['field_judul'];
        $cerita = $_POST['field_cerita'];
        $date = $_POST['field_date'];
        $data_cerita = array();
        $code_id_cerita = $this->M_info_mempelai->get_Idcerita_cinta();
        $code_id_galeri = $this->M_info_mempelai->get_IdGaleri();
        //$Id_khusus = (int) preg_replace('/\D/', '', $code_id_cerita);
        //$id_cerita = "C". ($Id_khusus +1);
        $index = 0;
        foreach($judul as $data_judul){
            array_push($data_cerita,array(
                'id_cerita_cinta' => $code_id_cerita,
                'id_acara' => $id_acara_resepsi,             
                'judul_cerita' => $data_judul,
                'isi_cerita' => $cerita[$index],
                'tanggal_cerita' => $date[$index]
            ));
            $Id_khusus = (int) preg_replace('/\D/', '', $code_id_cerita);
            $id_cerita = "C". ($Id_khusus +1);
            $code_id_cerita = $id_cerita;
            $index++;
        }
        $this->M_info_mempelai->tambah_cerita_cinta($data_cerita);

        if ($this->form_validation->run() == FALSE ) {
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('Info_mempelai/view', $data);

        }else{
            $this->M_info_mempelai->tambahEvent($pilih_opsi_rb);
            $this->M_info_mempelai->tambah_InfoMempelai();
            $this->M_info_mempelai->multiple_upload_image();
       

            $this->session->set_flashdata('pesan_info_mempelai','Ditambahkan');
            redirect('Info_mempelai/view');    
        }
    }
}

?>