<?php
class M_tamu extends CI_Model{


    public function get_list_meja($jumlah_tamu,$kategori_meja){
        //$id_resepsi = $this->input->post('id_resepsi',true);
        $id_resepsi =$_SESSION['id_acara'];
        $jumlah = $jumlah_tamu;
        $kategori = $kategori_meja;
        $query = $this->db->query("SELECT detil_meja.id_detil_meja, meja.id_meja,meja.nama_meja, COUNT(kursi.id_detil_meja) AS 'Kosong', IF(COUNT(kursi.id_detil_meja) >= $jumlah, 'Ya', 'Tidak') AS 'Sisa' FROM kursi JOIN detil_meja ON kursi.id_detil_meja = detil_meja.id_detil_meja JOIN meja ON detil_meja.id_meja = meja.id_meja WHERE kursi.id_tamu = '' AND meja.kategori_meja ='$kategori' AND meja.id_resepsi='$id_resepsi' GROUP BY kursi.id_detil_meja;");
        $result = $query->result_array();
        return $result;
    }
    
    public function get_tamu_update($id_tamu){
        $id_cek = $id_tamu;
        if(isset($id_cek)){
            $id_tamu = $id_cek;
        }else{
            $id_tamu = $this->uri->segment(3);
        }
        
        //$id_resepsi = $this->input->post('id_resepsi',true);
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT tamu.id_tamu,tamu.id_resepsi,tamu.id_meja,meja.nama_meja,meja.kategori_meja,tamu.nama_tamu,tamu.nomer_telp,tamu.jumlah FROM `tamu` JOIN meja on tamu.id_meja = meja.id_meja WHERE tamu.id_tamu='$id_tamu'");
        $result = $query->result_array();
        return $result;
    }
    
    public function get_tamu(){
        //$id_resepsi = $this->input->post('id_resepsi',true);
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT tamu.id_tamu,tamu.id_resepsi,tamu.id_meja,meja.nama_meja ,tamu.nama_tamu,tamu.nomer_telp,tamu.jumlah FROM `tamu` JOIN meja on tamu.id_meja = meja.id_meja WHERE tamu.id_resepsi='$id_resepsi'");
        $result = $query->result_array();
        return $result;
    }

    public function get_kategori(){
        //$id_resepsi = $this->input->post('id_resepsi',true);
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT meja.kategori_meja from meja where id_resepsi='$id_resepsi' GROUP BY kategori_meja");
        $result = $query->result_array();
        return $result;
    }

    public function tambah_aja(){
    
    //create id_tamu
    $query = $this->db->query("SELECT SUBSTRING(id_tamu, 2) as 'Hasil' FROM tamu ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
    $codeaja ="T1";
    $tb=$this->input->POST();
    foreach ($query->result() as $row)
    {
        $codeaja="T".($row->Hasil+1);
    }

    //create id_resepsi
    $id_resepsi =$_SESSION['id_acara'];

    $nama_tamu = $this->input->post('nama_tamu');
    $id_detil_meja = $this->input->post('meja');
    $kategori_meja = $this->input->post('input_kategori_tamu');
    $jumlah_tamu = $this->input->post('jumlah_tamu');
    $nomer_telp = $this->input->post('nomer_telp');
    $id_tamu = $codeaja;

    $meja_values = explode("|", $id_detil_meja);
    $id_detil_meja = $meja_values[0];
    $id_meja = $meja_values[1];

    $data = [
        'id_tamu' => $codeaja,
        'id_resepsi' => $id_resepsi,
        'id_meja' => $id_meja,
        'nama_tamu' => $nama_tamu,
        'nomer_telp' => $nomer_telp,
        'jumlah' => $jumlah_tamu         
    ];

    $this->db->insert('tamu', $data);
    for($hitung_kursi = 1; $hitung_kursi <= $jumlah_tamu; $hitung_kursi++){
        $query = $this->db->query("SELECT * FROM `kursi` WHERE kursi.id_tamu ='' AND kursi.id_detil_meja='$id_detil_meja' ORDER BY CAST(SUBSTRING(id_kursi, 2) AS UNSIGNED) ASC limit 1;");
        $id_kursi ='';
        foreach ($query->result() as $row)
        {
            $id_kursi=($row->id_kursi);
        }

        $update =[
            'id_tamu' => $codeaja,
        ];

        $this->db->where('id_kursi', $id_kursi);
        $this->db->update('kursi', $update);
    }
   
    }

    public function ubah_aja($id_tamu){
    
    //hapus data lama kursi  
    $null = '';
    $zero = '0';
    $id_tamu = $id_tamu;
    $null_data = [
        'id_tamu'=>$null,
        'waktu'=>$null,
        'status'=>$zero

    ];
    $this->db->where('id_tamu', $id_tamu);
    $this->db->update('kursi', $null_data);

    
    //create id_resepsi
    $id_resepsi =$_SESSION['id_acara'];

    $nama_tamu = $this->input->post('nama_tamu');
    $id_detil_meja = $this->input->post('meja');
    $kategori_meja = $this->input->post('input_kategori_tamu');
    $jumlah_tamu = $this->input->post('jumlah_tamu');
    $nomer_telp = $this->input->post('nomer_telp');
    //$id_tamu = $id_tamu;

    $meja_values = explode("|", $id_detil_meja);
    $id_detil_meja = $meja_values[0];
    $id_meja = $meja_values[1];

    $data = [
        'id_resepsi' => $id_resepsi,
        'id_meja' => $id_meja,
        'nama_tamu' => $nama_tamu,
        'nomer_telp' => $nomer_telp,
        'jumlah' => $jumlah_tamu         
    ];
    $this->db->where('id_tamu', $id_tamu);
    $this->db->update('tamu', $data);

    for($hitung_kursi = 1; $hitung_kursi <= $jumlah_tamu; $hitung_kursi++){
        $query = $this->db->query("SELECT * FROM `kursi` WHERE kursi.id_tamu ='' AND kursi.id_detil_meja='$id_detil_meja' ORDER BY CAST(SUBSTRING(id_kursi, 2) AS UNSIGNED) ASC limit 1;");
        
        foreach ($query->result() as $row)
        {
            $id_kursi=($row->id_kursi);
        }

        $update =[
            'id_tamu' => $id_tamu,
        ];

        $this->db->where('id_kursi', $id_kursi);
        $this->db->update('kursi', $update);
    }
   
    }


    public function get_link(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("select * from template_undangan");
        $result = $query->result_array();
        return $result;
    }
    public function get_undangan(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("select * from undangan where id_acara_resepsi='$id_resepsi'");
        $result = $query->result_array();
        return $result;
    }
    
    public function delete_aja($id_tamu)
    {
        $null ='';
        $id_tamu_get = $id_tamu;

        $this->db->where('id_tamu',$id_tamu_get);
        $this->db->delete('tamu');

        $update=[
            'id_tamu'=>$null,
            'waktu'=>$waktu,
            'status'=>'0'
        ];
        $this->db->where('id_tamu', $id_tamu_get);
        $this->db->update('kursi', $update);
    }
}
?>