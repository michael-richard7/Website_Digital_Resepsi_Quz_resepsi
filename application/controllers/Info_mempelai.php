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
        //$data['acara_list'] = $this->M_acara_resepsi->getAll_acaraById($value);
        //$data['auto_id_acara'] = $this->M_acara_resepsi->get_autoId();
        $data['template'] = $this->M_info_mempelai->getAll_template();
        //ambil tampilan data menu sidemenu
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $data['cek'] = $this->M_info_mempelai->cek_undangan();
        $data['cek_cerita'] = $this->M_info_mempelai->cek_cerita();
        $data['cek_galeri'] = $this->M_info_mempelai->cek_galeri();

        $data['undangan'] = $this->M_info_mempelai->undangan();
        $data['pria'] = $this->M_info_mempelai->pria();
        $data['wanita'] = $this->M_info_mempelai->wanita();
        $data['galeri_foto'] = $this->M_info_mempelai->galeri_foto();
        $data['cerita_cinta'] = $this->M_info_mempelai->cerita_cinta();


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
        
        if(isset($_POST['simpan']) || isset($_POST['tambahdata'])){
            $pilih_opsi_rb = $this->input->post('opsi_gift');
        }
             
        $id_acara_resepsi = $_SESSION['id_acara'];

        $data_lama = explode(',', $this->input->post('file_lama'));
        $data_tanggal = explode(',', $this->input->post('file_tanggal'));
        $data_judul = explode(',', $this->input->post('file_judul'));
        $data_cerita = explode(',', $this->input->post('file_cerita'));

        foreach ($data_lama as $file) {
            // Lakukan pengecekan atau manipulasi data lama di sini
            // Contoh: Validasi file lama atau lakukan operasi lain
            if (file_exists($file)) {
                // File lama ada
                echo "File lama: $file<br>";
            } else {
                // File lama tidak ada
                echo "File lama tidak ditemukan: $file<br>";
            }
        }
        $button_submit = $this->input->post('simpan');
        if(isset($_FILES['galeri_nikah'])){
            
        $banyak_foto = $_FILES['galeri_nikah'];
        }


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

        

        $galeri_nikah = $this->input->post('galeri_nikah_fix');
       
        if($button_submit == 'update'){
            
            if ($this->form_validation->run() == FALSE ) {
                $this->load->view('template/admin_header', $data);
                $this->load->view('template/admin_sidebar', $data);
                $this->load->view('Info_mempelai/view', $data);

                }else{
                    //hapus data multi cerita cinta
                    //$this->M_info_mempelai->hapus_cerita();
                    //$this->M_info_mempelai->hapus_galeri(); 
                    
                    $this->M_info_mempelai->updateEvent($pilih_opsi_rb);
                    $this->M_info_mempelai->update_InfoMempelai();
                    $this->M_info_mempelai->update_galeri_foto($data_lama);
                    
                    $this->M_info_mempelai->update_cerita_cinta($data_tanggal,$data_judul,$data_cerita);
                    //$this->session->set_flashdata('pesan_info_mempelai',' Diperbarui');
                    redirect('Info_mempelai/view');  
                }

        }
        else{

            if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Info_mempelai/view', $data);

            }else{
                //upload Music
                

                $config['upload_path']   = './front-end/music/';
                $config['allowed_types'] = 'mp3';
                $config['max_size']      = 32768; // 32MB
        
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('musik_cover')) {
                    $upload_data = $this->upload->data();
                    $music_filename = $upload_data['file_name'];
        
                    // Lakukan apa yang perlu dilakukan setelah berhasil diunggah, misalnya menyimpan data file ke database atau menampilkan pesan sukses
                    echo 'File berhasil diunggah. Nama file: ' . $music_filename;
                } else {
                    $error = $this->upload->display_errors();
                    // Lakukan apa yang perlu dilakukan jika terjadi kesalahan, misalnya menampilkan pesan error
                    echo 'Terjadi kesalahan saat mengunggah file: ' . $error;
                } 
                
                $this->M_info_mempelai->tambahEvent($pilih_opsi_rb,$music_filename);
                $this->M_info_mempelai->tambah_InfoMempelai();
                $this->M_info_mempelai->multiple_upload_image();
                $this->M_info_mempelai->tambah_cerita_cinta($data_cerita);
        
                $this->session->set_flashdata('pesan_info_mempelai','Ditambahkan');
                redirect('Info_mempelai/view');    
            }

        }

        
    }

}


   
?>