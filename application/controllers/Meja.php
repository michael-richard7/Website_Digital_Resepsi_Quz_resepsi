<?php

class Meja extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->model('M_meja');
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function tamu(){
        $id_tamu = $this->input->post('id_tamu');
        $id_meja = $this->input->post('id_meja');
        $jumlah_pindah = $this->input->post('jumlah');
        $data['nama'] = $this->M_meja->get_nama($id_tamu);
        echo json_encode($data);
    }

    public function cek_meja(){
        $id_tamu = $this->input->post('id_tamu');
        $id_meja = $this->input->post('id_detil_meja');
        $jumlah_pindah = $this->input->post('jumlah');
        $this->load->model('M_meja');
        
        // Lakukan proses pemindahan meja
        $data['meja_kosong'] = $this->M_meja->get_meja_kosong($id_tamu, $id_meja, $jumlah_pindah);
        
        echo json_encode($data['meja_kosong']);
        
    }
    
    public function meja_resepsi()
    {
        
        $data['judul'] = 'List Meja';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
        $id_tamu = $this->input->post('id_tamu');
        $id_meja = $this->input->post('id_meja');
        $jumlah_pindah = $this->input->post('jumlah');
        $pilihan_kategori = $this->input->post('kategori_aja');

        $data['kategori_list'] = $this->M_meja->get_list_kategori();
        if(empty($pilihan_kategori)){
            $pilihan_kategori = 'ALL';
        }
        $this->session->set_userdata('meja_list', $pilihan_kategori);
        $data['all_meja'] = $this->M_meja->get_detil_meja($pilihan_kategori);
        $data['nama_meja'] = $this->M_meja->get_nama_meja();
        $data['nama_tamu'] = $this->M_meja->get_nama_tamu();
        $data['slot_kursi'] = $this->M_meja->get_banyak_kursi();
        $data['list_meja'] = $this->M_meja->get_list_meja();
        //$data['list_meja'] = $this->M_meja->get_list_meja();
        
        
        $h = $this->input->get('h');
        if($h == 1){
            $data['hasil'] = "pindah";
        }elseif($h == 2){
            $data['hasil'] = "tambah";
        }elseif($h == 3){
            $data['hasil'] = "update_meja";
        }
        
      

        if(isset($jumlah_pindah)){
            if($jumlah_pindah > 0){
                // Lakukan proses pemindahan meja
                $data['meja_kosong'] = $this->M_meja->get_meja_kosong($id_tamu, $id_meja, $jumlah_pindah);
                }
        }

        $this->load->view('template/desain',$data);
        $this->load->view('template/admin_header', $data);
        $this->load->view('template/admin_sidebar', $data);
        $this->load->view('Meja/meja_resepsi', $data);
    }

    public function tambah_meja()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->M_user->getAll_usermenu();
        $value = $data['user'];
        $data['user_use'] = $this->M_user->get_user($value);
        $kategori = $this->input->post('kategori_meja');
        $muncul_list = $this->input->post('muncul_list');
        

        $query1 = $this->db->query("SELECT SUBSTRING(id_detil_meja, 3) as 'Hasil' FROM detil_meja ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja1 ="MD1";
        $tb=$this->input->POST();
        foreach ($query1->result() as $row)
        {
           $codeaja1="MD".($row->Hasil+1);
        }
        $data['auto_id_detil_meja'] = $codeaja1;

        
        $query2 = $this->db->query("SELECT SUBSTRING(id_meja, 2) as 'Hasil' FROM meja ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja2 ="M1";
        $tb=$this->input->POST();
        foreach ($query2->result() as $row)
        {
           $codeaja2="M".($row->Hasil+1);
        }
        $data['auto_id_meja'] = $codeaja2;

        $query3 = $this->db->query("SELECT SUBSTRING(id_kursi, 2) as 'Hasil' FROM kursi ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja3 ="K1";
        $tb=$this->input->POST();
        foreach ($query3->result() as $row)
        {
           $codeaja3="K".($row->Hasil+1);
        }
        $data['auto_id_kursi'] = $codeaja3;

        $data['kategori_list'] = $this->M_meja->get_list_kategori();
        $data['judul'] = 'Tambah Meja Resepsi';

        
        $list_kategori = $this->input->post('kategori_aja');

        if(!empty($kategori) && $muncul_list == '1'){
            $this->form_validation->set_rules('kategori_meja', 'kategori_meja', 'required');
            $this->form_validation->set_rules('nama_meja', 'Nama_Meja', 'required');
            $this->form_validation->set_rules('jumlah_meja', 'Jumlah_Meja', 'required');
            $this->form_validation->set_rules('jumlah_orang', 'Jumlah_Orang', 'required');
            $kategori_use = $kategori;

        }elseif(!empty($list_kategori)){
            $this->form_validation->set_rules('kategori_aja', 'kategori_aja', 'required');
            $this->form_validation->set_rules('nama_meja', 'Nama_Meja', 'required');
            $this->form_validation->set_rules('jumlah_meja', 'Jumlah_Meja', 'required');
            $this->form_validation->set_rules('jumlah_orang', 'Jumlah_Orang', 'required');
            $kategori_use = $list_kategori;
        }
        
        if ($this->form_validation->run() == FALSE ) {
            
            $this->load->view('template/desain',$data);
            $this->load->view('template/admin_header', $data);
            $this->load->view('template/admin_sidebar', $data);
            $this->load->view('Meja/tambah_meja', $data);
            
        }
        else{
                
            $this->M_meja->tambahDataMeja($kategori_use);
            $this->M_meja->tambahData_DetilMeja();
            $this->M_meja->tambahData_kursi();
            $this->session->set_flashdata('pesan_meja','Ditambahkan');
            redirect('Meja/meja_resepsi?h=2');
            
        }
    }

    public function ubah_meja(){
         $id_tamu = $this->input->post('id_tamu');
        $id_meja = $this->input->post('id_detil_meja');
        $jumlah_pindah = $this->input->post('jumlah');
        $id_detil_dan_meja = $this->input->post('meja');

        $nilai = $id_detil_dan_meja;
        $arr = explode("|", $nilai);
        $detil_meja_tujuan = $arr[0];
        $meja = $arr[1];
        
        $this->M_meja->ubah_tempat($id_tamu,$id_meja,$jumlah_pindah,$detil_meja_tujuan,$meja);   
        $this->session->set_flashdata('pesan_pindah','Telah DiUbah');
        redirect('meja/meja_resepsi?h=1');

    }
    
    public function pembaruan_meja(){

        $id_meja = $this->input->post('id_meja');
        $nama_meja = $this->input->post('nama_meja');
        $kategori_meja = $this->input->post('kategori_meja');
        $jumlah_meja = $this->input->post('jumlah_meja');
        $jumlah_orang = $this->input->post('jumlah_orang');

        $this->M_meja->update_meja($id_meja,$nama_meja,$kategori_meja,$jumlah_meja,$jumlah_orang);
        $this->session->set_flashdata('pesan_pembaruan','DiUbah');
        redirect('meja/meja_resepsi?h=3');
        //echo $id_meja.','.$nama_meja.','.$kategori_meja.','.$jumlah_meja.','.$jumlah_orang;
    }
    public function hapus_meja(){

        $id_meja = $this->input->post('id_meja');

        $this->M_meja->hapus_meja($id_meja);
        $this->session->set_flashdata('pesan_pembaruan','Dihapus');
        redirect('meja/meja_resepsi?h=3');
    }
}
?>