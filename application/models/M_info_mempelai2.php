<?php
class M_info_mempelai extends CI_Model{

    public function getAll_template()
    {
        return $this->db->query('SELECT * FROM template_undangan')->result_array();
    }

    public function cek_undangan(){
        $ada = 'ada';
        $tidak = 'tidak_ada';
        $id_acara = $_SESSION['id_acara'];
        $sql = "SELECT * FROM undangan WHERE id_acara_resepsi ='".$id_acara."'";
        $query = $this->db->query($sql, array($id_acara));
        if ($query->num_rows() > 0) {
            // Data ditemukan
            return $ada;
        } else {
            // Data tidak ditemukan
            return $tidak;
        }

    }
    public function undangan(){
        $id_akun = $_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM undangan where id_acara_resepsi = '$id_akun'");
        $hasil = $query->result_array();
        return $hasil;
    }
    public function pria(){
        $id_akun = $_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM info_pria where id_acara_resepsi = '$id_akun'");
        $hasil = $query->result_array();
        return $hasil;
    }
    public function wanita(){
        $id_akun = $_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM info_wanita where id_acara_resepsi = '$id_akun'");
        $hasil = $query->result_array();
        return $hasil;
    }

    public function get_Idbanner()
    {
        $query_undangan = $this->db->query("SELECT SUBSTRING(id_banner, 2) as 'Hasil' FROM undangan ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $req_code_idbanner ="B1";
        $tb=$this->input->POST();
        foreach ($query_undangan->result() as $row)
        {
           $req_code_idbanner="B".($row->Hasil+1);
        }
        return  $req_code_idbanner;
    }

    public function get_Idpria()
    {
        $query_id = $this->db->query("SELECT SUBSTRING(id_info_pria, 3) as 'Hasil' FROM info_pria ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $req_code_idpria ="IP1";
        $tb=$this->input->POST();
        foreach ($query_id->result() as $row)
        {
           $req_code_idpria="IP".($row->Hasil+1);
        }
        return $req_code_idpria;
    }

    public function get_Idwanita()
    {
        $query_id = $this->db->query("SELECT SUBSTRING(id_info_wanita, 3) as 'Hasil' FROM info_wanita ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $req_code_idwanita ="IW1";
        $tb=$this->input->POST();
        foreach ($query_id->result() as $row)
        {
           $req_code_idwanita="IW".($row->Hasil+1);
        }
        return  $req_code_idwanita;
    }

    public function get_Idcerita_cinta()
    {
        $query_id = $this->db->query("SELECT SUBSTRING(id_cerita_cinta, 2) as 'Hasil' FROM cerita_cinta ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $req_code_idcerita_cinta ="C1";
        $tb=$this->input->POST();
        foreach ($query_id->result() as $row)
        {
           $req_code_idcerita_cinta ="C".($row->Hasil+1);
        }
        return  $req_code_idcerita_cinta;
    }
    public function get_IdGaleri()
    {
        $query_id = $this->db->query("SELECT SUBSTRING(id_galeri, 2) as 'Hasil' FROM galeri_foto ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $req_code_id_galeri ="G1";
        $tb=$this->input->POST();
        foreach ($query_id->result() as $row)
        {
           $req_code_id_galeri ="G".($row->Hasil+1);
        }
        return  $req_code_id_galeri;
    }

    public function update_template($pilih_opsi){
        $id_acara_resepsi = $_SESSION['id_acara'];
        $data = ['id_template' => $pilih_opsi];
        $this->db->where('id_acara_resepsi',$id_acara_resepsi);
        $this->db->update('undangan',$data);
    }

   public function pakai_template($template,$id_acara)
   {
    $template = $template;
    $id_acara = $id_acara;

    $this->db->query("UPDATE undangan SET id_template ='".$template."' where id_acara_resepsi ='".$id_acara."'");
   }

    public function tambahEvent($pilih_opsi_rb)
    {
        $code_idbanner = $this->get_Idbanner();
        
        $id_acara_resepsi = $_SESSION['id_acara'];
        
        $this->load->library('upload');
        
            //upload Music
    
            $config_musik['upload_path']   = './front-end/music/';
            $config_musik['allowed_types'] = 'mp3';
            $config_musik['max_size']      =  8050;
    
            $this->upload->initialize($config_musik);
    
            if ($this->upload->do_upload('musik_cover')){
                $music_data = array('upload_data' => $this->upload->data());
                $music_filename = $music_data['upload_data']['file_name'];
    
            }else{
                $this->session->set_flashdata('pesan_info_mempelai', '<div class="alert alert-danger" role="alert">
                Musik Anda belum diupload! </div>');
                redirect('Info_mempelai/view');
            }
    
            //Upload Gambar
    
            $config_gambar['upload_path']   = './front-end/images/gambar_cover/';
            $config_gambar['allowed_types'] = 'png|jpg|jpeg';
            $config_gambar['max_size'] =  10048;
            $this->upload->initialize($config_gambar);
            
            if ($this->upload->do_upload('cover_img')){
                $gambar_data = array('upload_data' => $this->upload->data());
                $gambar_filename = $gambar_data['upload_data']['file_name'];
                
            }else{
                $this->session->set_flashdata('pesan_info_mempelai', '<div class="alert alert-danger" role="alert">
                Musik Anda belum diupload! </div>');
                redirect('Info_mempelai/view');
            }


            $idbanner = $code_idbanner;
            $id_resepsi = $id_acara_resepsi;
            $nm_cover_pria = $this->input->post('nm_cover_pria',true);
            $nm_cover_wanita = $this->input->post('nm_cover_wanita',true);
            $tanggal_akad = $this->input->post('tanggal_akad',true);
            $jam_akad = $this->input->post('jam_akad',true);
            $tanggal_resepsi = $this->input->post('tanggal_resepsi',true);
            $jam_resepsi = $this->input->post('jam_resepsi',true);
            $alamat_resepsi = $this->input->post('alamat_resepsi',true);
            $lokasi_gmap = $this->input->post('lokasi_gmap',true);
            $nomer_tujuan = $this->input->post('nomer_tujuan',true);
            $alamat_wedding_gift = $this->input->post('alamat_wedding_gift',true);
            $nomer_wa   = $this->input->post('nomer_wa',true);

        $data = [

            'id_banner' => $idbanner,
            'id_acara_resepsi' => $id_resepsi,
            'gambar_cover' => $gambar_filename,
            'nama_pria' => $nm_cover_pria,
            'nama_wanita' => $nm_cover_wanita,
            'tanggal_akad' => $tanggal_akad,
            'jam_akad' => $jam_akad,
            'tanggal_resepsi' => $tanggal_resepsi,
            'jam_resepsi' => $jam_resepsi,
            'alamat_resepsi' => $alamat_resepsi,
            'peta_lokasi' => $lokasi_gmap,
            'gift_non_fisik' => $pilih_opsi_rb,
            'no_tujuan' => $nomer_tujuan,
            'alamat_gift_fisik' => $alamat_wedding_gift,
            'tlp_gift_fisik' => $nomer_wa,
            'musik' => $music_filename
            
        ];
        $this->db->insert('undangan', $data);
    }
    
    public function tambah_InfoMempelai()
    {
        $id_acara_resepsi = $_SESSION['id_acara'];
        $code_idpria = $this->get_Idpria();
        $code_idwanita = $this->get_Idwanita();
        $code_idcerita = $this->get_Idcerita_cinta();

        $this->load->library('upload');
    
        //Upload Gambar Pria
        $config_pria['upload_path']   = './front-end/images/foto_pria/';
        $config_pria['allowed_types'] = 'png|jpg|jpeg';
        $config_pria['max_size'] =  10048;
        $this->upload->initialize($config_pria);
        
        if ($this->upload->do_upload('foto_pria')){
            $gambar_pria_data = array('upload_data' => $this->upload->data());
            $gambar_pria_filename = $gambar_pria_data['upload_data']['file_name'];
            
        }else{
            $this->session->set_flashdata('pesan_info_mempelai', '<div class="alert alert-danger" role="alert">
            Gambar pria Anda belum diupload! </div>');
            redirect('Info_mempelai/view');
        }

         //Upload Gambar Wanita
         $config_wanita['upload_path']   = './front-end/images/foto_wanita/';
         $config_wanita['allowed_types'] = 'png|jpg|jpeg';
         $config_wanita['max_size'] =  10048;
         $this->upload->initialize($config_wanita);
         
         if ($this->upload->do_upload('foto_wanita')){
             $gambar_wanita_data = array('upload_data' => $this->upload->data());
             $gambar_wanita_filename = $gambar_wanita_data['upload_data']['file_name'];
             
         }else{
             $this->session->set_flashdata('pesan_info_mempelai', '<div class="alert alert-danger" role="alert">
             Gambar wanita Anda belum diupload! </div>');
             redirect('Info_mempelai/view');
         }

         //Id 
         $id_pria = $code_idpria;
         $id_wanita = $code_idwanita;
        
         //Pria
         $mempelai_pria_nama = $this->input->post('mempelai_pria_nama',true);
         $mempelai_pria_tgl_lahir = $this->input->post('mempelai_pria_tgl_lahir',true);
         $mempelai_pria_anak_ke = $this->input->post('mempelai_pria_anak_ke',true);
         $mempelai_pria_nama_ayah = $this->input->post('mempelai_pria_nama_ayah',true);
         $mempelai_pria_nama_ibu = $this->input->post('mempelai_pria_nama_ibu',true);
         $mempelai_pria_telepon = $this->input->post('mempelai_pria_telepon',true);
         $bio_pria = $this->input->post('bio_pria',true);

         //Wanita
         $mempelai_wanita_nama = $this->input->post('mempelai_wanita_nama',true);
         $mempelai_wanita_tgl_lahir = $this->input->post('mempelai_wanita_tgl_lahir',true);
         $mempelai_wanita_anak_ke = $this->input->post('mempelai_wanita_anak_ke',true);
         $mempelai_wanita_nama_ayah = $this->input->post('mempelai_wanita_nama_ayah',true);
         $mempelai_wanita_nama_ibu = $this->input->post('mempelai_wanita_nama_ibu',true);
         $mempelai_wanita_telepon = $this->input->post('mempelai_wanita_telepon',true);
         $bio_wanita = $this->input->post('bio_wanita',true);

        $field_dates = $this->input->post('field_date');
        $field_juduls = $this->input->post('field_judul');
        $field_ceritas = $this->input->post('field_cerita');
        
        


         $data_pria = [
            'id_info_pria' => $id_pria,
            'id_acara_resepsi' => $id_acara_resepsi,
            'nama_lengkap' => $mempelai_pria_nama,
            'tanggal_lahir' => $mempelai_pria_tgl_lahir,
            'anak_ke' => $mempelai_pria_anak_ke,
            'ayah' => $mempelai_pria_nama_ayah,
            'ibu' => $mempelai_pria_nama_ibu,
            'nomer_telp' => $mempelai_pria_telepon,
            'bio' => $bio_pria,
            'foto' => $gambar_pria_filename
        ];

        $data_wanita = [
            'id_info_wanita' => $id_wanita,
            'id_acara_resepsi' => $id_acara_resepsi,
            'nama_lengkap' => $mempelai_wanita_nama,
            'tanggal_lahir' => $mempelai_wanita_tgl_lahir,
            'anak_ke' => $mempelai_wanita_anak_ke,
            'ayah' => $mempelai_wanita_nama_ayah,
            'ibu' => $mempelai_wanita_nama_ibu,
            'nomer_telp' => $mempelai_wanita_telepon,
            'bio' => $bio_wanita,
            'foto' => $gambar_wanita_filename
        ];
        
        $this->db->insert('info_pria', $data_pria);
        $this->db->insert('info_wanita', $data_wanita);

    }

    public function tambah_cerita_cinta($data_cerita)
    {
        $this->db->insert_batch('cerita_cinta', $data_cerita);
    }
    
    public function multiple_upload_image()
    {

        $this->load->library('upload');
        $id_acara_resepsi = $_SESSION['id_acara'];
        $code_id_galeri = $this->get_IdGaleri();

        //Multiple Image 
        
        $files = $_FILES['galeri_nikah'];
        $count = count($_FILES['galeri_nikah']['name']);

        for($i=0; $i<$count; $i++)
        {
            $_FILES['userfile']['name'] = $files['name'][$i];
            $_FILES['userfile']['type'] = $files['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['userfile']['error'] = $files['error'][$i];
            $_FILES['userfile']['size'] = $files['size'][$i];

            $config['upload_path'] = './front-end/images/galeri_foto/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '4048';

            $this->upload->initialize($config);
            if($this->upload->do_upload('userfile'))
            {
                $upload_data = $this->upload->data();
                $filename = $upload_data['file_name'];
                $data[] = $filename;
            }
        }

        foreach($data as $filename)
        {
            $insert_data = array(
                'id_galeri' => $code_id_galeri,
                'id_acara' => $id_acara_resepsi,
                'foto' => $filename
            );
            $Id_khusus = (int) preg_replace('/\D/', '', $code_id_galeri);
            $id_galeri = "G". ($Id_khusus +1);
            $code_id_galeri = $id_galeri;
            $this->db->insert('galeri_foto', $insert_data);
        }


        
    }
    
}

?>