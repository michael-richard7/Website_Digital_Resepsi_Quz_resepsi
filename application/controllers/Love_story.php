<?php

class love_story extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model('M_love_story');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }
    public function view()
    { 
        $data['judul'] = 'List Cerita Cinta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['love_story'] = $this->M_love_story->getAll_lovestory();
        //ambil tampilan data menu sidemenu
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $query2 = $this->db->query("SELECT SUBSTRING(id_LS, 2) as 'Hasil' FROM love_story ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja ="L1";
        $tb=$this->input->POST();
        foreach ($query2->result() as $row)
        {
           $codeaja="L".$row->Hasil+1;
        }
        $data['auto_id_LS'] = $codeaja;
        
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            //$this->load->view('template/admin_topbar', $data);
            $this->load->view('Love_story/view', $data);
            $this->load->view('template/admin_footer', $data);
        
     
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['title'] = 'List Love Story';
        $data['love_story'] = $this->M_love_story->getAll_lovestory();
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $query2 = $this->db->query("SELECT SUBSTRING(id_LS, 2) as 'Hasil' FROM love_story ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja ="L1";
        $tb=$this->input->POST();
        foreach ($query2->result() as $row)
        {
           $codeaja="L".$row->Hasil+1;
        }
        $data['auto_id_LS'] = $codeaja;

        $data['judul'] = 'Tambah Cerita Cinta';

        //validation pengecekan
      
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_resepsi', 'Id_resepsi', 'required');
        

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Love_story/tambah', $data);
        }else{
            
            $this->M_love_story->tambahDataLS();
            $this->session->set_flashdata('pesan_ls','Ditambahkan');
            redirect('Love_story/view');

            
            // insert ke tabel template undagan
            
        }
    }


    public function hapus($id_LS)
    {
        $this->M_love_story->hapusData_LS($id_LS);
        $this->session->set_flashdata('pesan_ls','Dihapus');
        redirect('Love_story/view');
    }


    public function update($id_LS)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //$data['title'] = 'List Love Story';
        $data['love_story'] = $this->M_love_story->getLS_Byid($id_LS);
        $data['user_menu'] = $this->M_user->getAll_usermenu();

        $data['judul'] = 'Update Cerita Cinta';

        //validation pengecekan
      
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('story', 'Story', 'required');
        $this->form_validation->set_rules('id_resepsi', 'Id_resepsi', 'required');
        

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Love_story/update', $data);
        }else{
            
            $this->M_love_story->updateDataLS($id_LS);
            $this->session->set_flashdata('pesan_ls','Diubah');
            redirect('Love_story/view');
            
        }
    }
  

}


?>