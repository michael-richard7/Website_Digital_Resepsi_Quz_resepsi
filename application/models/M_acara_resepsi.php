<?php 

class M_acara_resepsi extends CI_Model{

    public function getAll_acaraById($value)
    {   
        $nilai='';
        $id_akun = $value['id'];
        if (substr($id_akun, 0, 1) == 'P') {
            $nilai = substr($id_akun, 1);
        } else {
            $nilai = $id_akun;
        }
        $query = $this->db->query("SELECT * FROM acara_resepsi where id_user = '$nilai'");
        $hasil = $query->result_array();
        return $hasil;
    }

    public function get_autoId()
    {
        $query = $this->db->query("SELECT SUBSTRING(id_resepsi, 2) as 'Hasil' FROM acara_resepsi ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja ="R1";
        $tb=$this->input->POST();
        foreach ($query->result() as $row)
        {
           $codeaja="R".($row->Hasil+1);
        }
        return  $codeaja;
    }

    
    public function tambahData($value)
    {
            $id_resepsi = $this->input->post('id_resepsi',true);
            $id_user   = $this->input->post('id_user',true);
            $nama_resepsi   = $this->input->post('nama_resepsi',true);
            $tanggal   = $this->input->post('tanggal',true);
            
        $data = [
            'id_resepsi' => $id_resepsi,
            'id_user' => $id_user,
            'nama_resepsi' => $nama_resepsi,
            'tanggal' => $tanggal
            
        ];

        $this->db->insert('acara_resepsi', $data);

        $id_akun = $value['id'];
        $value_email = str_replace(' ', '', $nama_resepsi);
        $email_petugas = 'petugas_'.$value_email;
        $email_cek = 'petugas_'.$value_email.'@gmail.com';

        $nama = $this->input->post('nama');
        $nama_petugas = 'petugas_'.$nama_resepsi;
        $number =1;

        do {

            $query_cek_akun = $this->db->query("SELECT * FROM user WHERE email='$email_cek'");
        
            if ($query_cek_akun->num_rows() > 0) {
                $email_filter = $email_petugas.$number;
                $email_coba = $email_filter.'@gmail.com';
                $number = $number+1;
                $email_cek = $email_coba;
            } else {
                $email_jadi = $email_cek;
                break; // Keluar dari loop jika tidak ada data yang ditemukan
                
            }
        } while (true);



        $password="12345";
        $id_petugas = 'P'.$id_akun.'_'.$id_resepsi;
        $akun_petugas = [
            'id'            => $id_petugas,
            'nama'          => $nama_petugas,
            'email'         => $email_jadi,
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'as_id'         => 3,
            'gambar'        => 'user.png',
            'date_created'  => time()
        ];

        $this->db->insert('user', $akun_petugas);

    } 
    public function updateData()
    {
            $id_resepsi = $this->input->post('id_resepsi',true);
            $nama_resepsi   = $this->input->post('nama_resepsi',true);
            $tanggal   = $this->input->post('tanggal',true);
      
        $update = [
            'id_resepsi' => $id_resepsi,
            'nama_resepsi' => $nama_resepsi,
            'tanggal' => $tanggal
            
        ];
        $this->db->where('id_resepsi', $id_resepsi);
        $this->db->update('acara_resepsi', $update);


    }

    public function update_akun_petugas()
    {
        $password_baru = $this->input->post('password_1',true);
        $email_petugas = $this->input->post('email_petugas_modal',true); 
        $update = [
            'email' => $email_petugas,
            'password' => password_hash($this->input->post('password_1'), PASSWORD_DEFAULT)
        ];
        $this->db->where('email', $email_petugas);
        $this->db->update('user', $update);
        
    }
    
    



    public function hapusData()
    {
            $id_resepsi = $this->input->post('id_resepsi',true);
      
        $update = [
            'id_resepsi' => $id_resepsi
            
        ];
        $this->db->where('id_resepsi', $id_resepsi);
        $this->db->delete('acara_resepsi');

    } 
    
    public function get_email_petugas($value){
        $id_akun = $value['id'];
        $query_aja = $this->db->query("SELECT * FROM user where id LIKE 'P".$id_akun."_%'");
        $hasil = $query_aja->result_array();
        return $hasil;
    }

    
}
?>