<?php 

class M_meja extends CI_Model{

    public function getAll_meja()
    {
        return $this->db->query('SELECT * FROM meja where id_resepsi="R1"')->result_array();
    }

    public function get_nama($id_tamu){
        $id_tamu = $id_tamu;
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM tamu  WHERE tamu.id_resepsi='$id_resepsi' and tamu.id_tamu ='$id_tamu'");
        $result = $query->row()->nama_tamu;
        return $result;
    }
    public function get_nama_meja()
    {
        //$id_resepsi = $this->input->post('id_resepsi',true);
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM meja where id_resepsi = '$id_resepsi'");
        $result = $query->result_array();
        return $result;
    }

    public function get_list_kategori(){
        $id_resepsi =$_SESSION['id_acara'];
        $query_list = $this->db->query("SELECT * FROM meja where id_resepsi='$id_resepsi' GROUP BY meja.kategori_meja");
        $result_list = $query_list->result_array();
        return $result_list;
    }
    public function get_detil_meja($pilihan_kategori)
    {
        $kategori = $pilihan_kategori;
        $id_resepsi =$_SESSION['id_acara'];
        
        if($pilihan_kategori == 'ALL' || empty($pilihan_kategori)){
            $query = $this->db->query("SELECT *, ROW_NUMBER() OVER (ORDER BY CAST(SUBSTRING(detil_meja.id_detil_meja, 3) AS UNSIGNED)) AS nomer_urut FROM detil_meja JOIN meja ON detil_meja.id_meja = meja.id_meja WHERE meja.id_resepsi = '$id_resepsi' ORDER BY CAST(SUBSTRING(detil_meja.id_detil_meja, 3) AS UNSIGNED) ASC;");
            $result = $query->result_array();
            return $result;
        }elseif(!empty($pilihan_kategori) AND $pilihan_kategori != 'ALL'){
            $query = $this->db->query("SELECT subquery.*
            FROM (
              SELECT dm.*, meja.id_meja AS meja_id, meja.nama_meja,meja.kategori_meja,meja.jumlah_meja,meja.jumlah_orang,meja.id_resepsi,meja.status_meja, ROW_NUMBER() OVER (ORDER BY CAST(SUBSTRING(dm.id_detil_meja, 3) AS UNSIGNED)) AS nomer_urut
              FROM detil_meja dm
              JOIN meja ON dm.id_meja = meja.id_meja
              WHERE meja.id_resepsi = '$id_resepsi'
            ) AS subquery
            WHERE subquery.kategori_meja = '$kategori'
            ORDER BY subquery.nomer_urut ASC;");
            $result = $query->result_array();
            return $result;
        }
        //$id_resepsi = $this->input->post('id_resepsi',true);
        
        
    }

    public function get_banyak_kursi()
    {
        
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT meja.id_meja,detil_meja.id_detil_meja, meja.nama_meja, meja.kategori_meja ,meja.jumlah_meja, meja.jumlah_orang,meja.status_meja, kursi.id_kursi,kursi.id_tamu, kursi.waktu,kursi.status FROM meja JOIN detil_meja on meja.id_meja = detil_meja.id_meja JOIN kursi on detil_meja.id_detil_meja = kursi.id_detil_meja WHERE meja.id_resepsi='$id_resepsi' ORDER BY CAST(SUBSTRING(kursi.id_kursi, 2) AS UNSIGNED) ASC;");
        $result = $query->result_array();
        return $result;
        //  $id_meja = $this->input->post('id_meja',true);
        //$query = $this->db->get_where('detail_',array('id_resepsi'=>$id_resepsi));
        //return $this->db->where('id_meja',$id_meja)->result_array();

    }

    public function get_meja_kosong($id_tamu,$id_detil_meja,$jumlah_pindah){
        $id_resepsi =$_SESSION['id_acara'];
        $jumlah = $jumlah_pindah;
        $id_meja_pindah = $id_detil_meja;

        $query_idmeja = $this->db->query("SELECT * FROM meja join detil_meja on meja.id_meja = detil_meja.id_meja WHERE detil_meja.id_detil_meja='$id_meja_pindah'");
        
        $tb=$this->input->POST();
        $kategori='';
        foreach ($query_idmeja->result() as $row)
        {
            $kategori=($row->kategori_meja);
        }
        
        $query = $this->db->query("SELECT subquery.*, row_number.nomer_urut FROM (SELECT detil_meja.id_detil_meja, meja.id_meja, meja.nama_meja, COUNT(kursi.id_detil_meja) AS 'Kosong', IF(COUNT(kursi.id_detil_meja) >= $jumlah, 'Ya', 'Tidak') AS 'Sisa' FROM kursi JOIN detil_meja ON kursi.id_detil_meja = detil_meja.id_detil_meja JOIN meja ON detil_meja.id_meja = meja.id_meja WHERE kursi.status = '0' AND meja.kategori_meja = '$kategori' AND meja.id_resepsi = '$id_resepsi' GROUP BY detil_meja.id_detil_meja HAVING Sisa = 'Ya' ) AS subquery JOIN ( SELECT ROW_NUMBER() OVER (ORDER BY CAST(SUBSTRING(id_detil_meja, 3) AS UNSIGNED)) AS nomer_urut, id_detil_meja FROM detil_meja JOIN meja ON detil_meja.id_meja = meja.id_meja WHERE meja.id_resepsi='$id_resepsi' ORDER BY CAST(SUBSTRING(id_detil_meja, 3) AS UNSIGNED) ASC ) AS row_number ON subquery.id_detil_meja = row_number.id_detil_meja");

        $result = $query->result_array();
        return $result;

        /*SELECT detil_meja.id_detil_meja, meja.id_meja, meja.nama_meja, COUNT(kursi.id_detil_meja) AS 'Kosong', IF(COUNT(kursi.id_detil_meja) >= $jumlah, 'Ya', 'Tidak') AS 'Sisa' FROM kursi JOIN detil_meja ON kursi.id_detil_meja = detil_meja.id_detil_meja JOIN meja ON detil_meja.id_meja = meja.id_meja WHERE kursi.status = '0' AND meja.kategori_meja = '$kategori' AND meja.id_resepsi = '$id_resepsi' GROUP BY detil_meja.id_detil_meja HAVING Sisa = 'Ya';*/
        
    }

    public function get_nama_tamu(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM tamu JOIN kursi on tamu.id_tamu = kursi.id_tamu WHERE tamu.id_resepsi='$id_resepsi' GROUP BY kursi.id_tamu,kursi.id_detil_meja;");
        $result = $query->result_array();
        return $result;
    }

    public function tambahDataMeja($kategori_use)
    {
        $id_resepsi = $_SESSION['id_acara'];

        $id_meja = $this->input->post('id_meja',true);
        $nama_meja   = $this->input->post('nama_meja',true);
        $jumlah_meja   = $this->input->post('jumlah_meja',true);
        $jumlah_orang   = $this->input->post('jumlah_orang',true);
        $status_meja = '1';
        $kategori_meja = $kategori_use;
            
        $data = [
            'id_meja' => $id_meja,
            'nama_meja' => $nama_meja,
            'kategori_meja' => $kategori_meja,
            'jumlah_meja' => $jumlah_meja,
            'jumlah_orang' => $jumlah_orang,
            'id_resepsi' => $id_resepsi,
            'status_meja' => $status_meja
            
        ];
        $this->db->insert('meja', $data);

    }
    public function tambahData_DetilMeja()
    {
            $id_detil_meja = $this->input->post('id_detil_meja',true);
            $id_meja = $this->input->post('id_meja',true);
            $id_tamu = $this->input->post('id_tamu',true);
            $waktu = $this->input->post('waktu',true);
            $jumlah_meja = $this->input->post('jumlah_meja',true);
            //jumlah_orang   = $this->input->post('jumlah_orang',true);
            //$status_meja = $this->input->post('status_meja',true);
            
            $tambah_data = substr($id_detil_meja,2);
        for ($hitung = 1; $hitung <= $jumlah_meja; $hitung++) {
            $id_detil_ambil = "MD".$tambah_data;
            $data = [
                'id_detil_meja' => $id_detil_ambil,
                'id_meja' => $id_meja,
                'id_tamu' => $id_tamu,
                'waktu' => $waktu
                
            ];
            $this->db->insert('detil_meja', $data);
            $tambah_data++;
        }
        

    }

    public function tambahData_kursi()
    {
            $id_detil_meja = $this->input->post('id_detil_meja',true);
            $id_kursi = $this->input->post('id_kursi',true);
            $id_meja = $this->input->post('id_meja',true);
            $id_tamu = $this->input->post('id_tamu',true);
            $waktu = $this->input->post('waktu',true);
            $jumlah_meja = $this->input->post('jumlah_meja',true);
            $jumlah_orang   = $this->input->post('jumlah_orang',true);
            //$status_meja = $this->input->post('status_meja',true);
            
            $tambah_data_meja = substr($id_detil_meja,2);
            $tambah_data_kursi = substr($id_kursi,1);
        for ($hitung = 1; $hitung <= $jumlah_meja; $hitung++) {
            $id_detil_ambil = "MD".$tambah_data_meja;
            for($hitung_kursi = 1; $hitung_kursi <= $jumlah_orang; $hitung_kursi++){
                $id_detil_kursi = "K".$tambah_data_kursi;
                $data = [
                    'id_kursi' => $id_detil_kursi,
                    'id_detil_meja' => $id_detil_ambil,
                    
                ];
                $this->db->insert('kursi', $data);
                $tambah_data_kursi++;
            }
            $tambah_data_meja++;
            
            
        }
        

    }

    
    public function cek_tempat_kosong($id_tamu){
        
        //Pengecekan kategori
        $k_m = $this->db->query("SELECT tamu.id_tamu, tamu.nama_tamu,meja.id_meja,meja.kategori_meja,meja.jumlah_orang,meja.jumlah_meja FROM tamu join meja on tamu.id_meja = meja.id_meja WHERE id_tamu='$id_tamu'");
        $kategori_meja = $k_m->row()->kategori_meja;

        //menampilkan [cek tempat kosong] kursi yang belum hadir (ada tamu nya)
        $c_t_k = $this->db->query("SELECT * FROM kursi join detil_meja on kursi.id_detil_meja = detil_meja.id_detil_meja join meja on detil_meja.id_meja=meja.id_meja where kursi.status='0' and meja.kategori_meja='$kategori_meja' ORDER BY CAST(SUBSTRING(id_kursi, 2) AS UNSIGNED) ASC");
        $cek_tempat_kosong = $c_t_k->result_rows();
        return $cek_tempat_kosong;

    }

    public function ubah_tempat($id_tamu,$id_meja,$jumlah_pindah,$detil_meja_tujuan,$meja){
        $id_tamu_lama = $id_tamu; 
        $id_meja_input = $id_meja;
        $jumlah_pindah_input = $jumlah_pindah;
        $detil_meja_input = $detil_meja_tujuan;
        $meja_input = $meja;

        for ($hitung = 1; $hitung <= $jumlah_pindah_input; $hitung++) {
        //pengcekan data kursi sebelum pindah
        
        
        $query_cek_lama= $this->db->query("SELECT *,kursi.id_tamu as 'id_tamu_real' FROM kursi JOIN detil_meja on kursi.id_detil_meja = detil_meja.id_detil_meja WHERE kursi.id_detil_meja='$id_meja_input' and kursi.id_tamu='$id_tamu_lama' and kursi.status ='1' ORDER BY CAST(SUBSTRING(kursi.id_kursi, 2) AS UNSIGNED) ASC LIMIT 1");
        
        $query_cek = $this->db->query("SELECT *,kursi.id_tamu as 'id_tamu_real' FROM kursi JOIN detil_meja on kursi.id_detil_meja = detil_meja.id_detil_meja WHERE kursi.id_detil_meja='$detil_meja_input' and kursi.status ='0' ORDER BY CAST(SUBSTRING(kursi.id_kursi, 2) AS UNSIGNED) ASC LIMIT 1");


        foreach ($query_cek_lama->result() as $row_1)
        {
            $id_tamu_lama =($row_1->id_tamu_real);
            $id_kursi_lama=($row_1->id_kursi);
        }

        //pengecekan data kursi yang kosong untuk digunakan
        
        //$id_kursi_baru= $query_cek->result()->id_kursi;
        //$id_tamu_baru=$query_cek->result()->id_tamu;
       
        foreach ($query_cek->result() as $row_2)
        {
           $id_kursi_baru=($row_2->id_kursi);
           $id_tamu_baru=($row_2->id_tamu_real);
        }
        $status_baru ='0';
        $status_lama ='1';


        //update data pindah A ke B 
        $data_update1 = [
            'id_tamu' => $id_tamu_baru,
            'status' =>$status_baru
        ];
        $this->db->where('id_kursi', $id_kursi_lama);
        $this->db->update('kursi', $data_update1);

        //update data pindah B ke A
        $data_update2 = [
            'id_tamu' => $id_tamu_lama,
            'status' =>$status_lama
        ];
        $this->db->where('id_kursi', $id_kursi_baru);
        $this->db->update('kursi', $data_update2);

        }
    }

    public function get_list_meja(){
        $id_resepsi = $_SESSION['id_acara'];
        $query_meja= $this->db->query("SELECT * FROM meja where id_resepsi='$id_resepsi'");
        return $query_meja->result_array();
    }

    public function update_meja($id_meja,$nama_meja,$kategori_meja,$jumlah_meja,$jumlah_orang){
        $id_meja = $id_meja;
        $nama_meja = $nama_meja;
        $kategori_meja = $kategori_meja;
        $jumlah_meja = $jumlah_meja;
        $jumlah_orang = $jumlah_orang;
        $id_resepsi = $_SESSION['id_acara'];

        //update meja
        $meja_update = [
            'nama_meja' => $nama_meja,
            'kategori_meja' => $kategori_meja,
            'jumlah_meja' => $jumlah_meja,
            'jumlah_orang' => $jumlah_orang
        ];
        $this->db->where('id_meja', $id_meja);
        $this->db->update('meja', $meja_update);

        //mengambil semua value id detil meja
        $query_detilmeja = $this->db->query("SELECT * FROM detil_meja where id_meja='$id_meja'");
        $hasil_detilmeja = $query_detilmeja->result_array();


        //Hapus detil meja
        foreach($hasil_detilmeja as $row){
            $detil_id = $row['id_detil_meja'];
            //proses hapus detil meja
            $this->db->where('id_detil_meja',$detil_id);
            $this->db->delete('detil_meja');

        }

        //Hapus kursi
        foreach($hasil_detilmeja as $row){
                $detil_id = $row['id_detil_meja'];
                //proses ambil id kursi
                $query_kursi = $this->db->query("SELECT * FROM kursi where id_detil_meja='$detil_id'");
                $hasil_kursi = $query_kursi->result_array();
            foreach($hasil_kursi as $k){
                $id_kursi = $k['id_kursi'];
                $this->db->where('id_kursi',$id_kursi);
                $this->db->delete('kursi');
            }

        }

        //Proses Insert Detil Meja Database
        $query1 = $this->db->query("SELECT SUBSTRING(id_detil_meja, 3) as 'Hasil' FROM detil_meja ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja1 ="MD1";
        $tb=$this->input->POST();
        foreach ($query1->result() as $row)
        {
           $codeaja1="MD".($row->Hasil+1);
        }
        $id_detil_meja_baru = $codeaja1;
        $id_tamu='';
        $waktu ='';
        $tambah_data = substr($id_detil_meja_baru,2);
        for ($hitung = 1; $hitung <= $jumlah_meja; $hitung++) {
            $id_detil_ambil = "MD".$tambah_data;
            $data = [
                'id_detil_meja' => $id_detil_ambil,
                'id_meja' => $id_meja,
                'id_tamu' => $id_tamu,
                'waktu' => $waktu
                
            ];
            $this->db->insert('detil_meja', $data);
            $tambah_data++;
        }


        //Proses Insert Kursi
        $query3 = $this->db->query("SELECT SUBSTRING(id_kursi, 2) as 'Hasil' FROM kursi ORDER BY CAST(Hasil AS UNSIGNED) DESC limit 1;");
        $codeaja3 ="K1";
        $tb=$this->input->POST();
        foreach ($query3->result() as $row)
        {
           $codeaja3="K".($row->Hasil+1);
        }
        $id_kursi = $codeaja3;

        $tambah_data_meja = substr($id_detil_meja_baru,2);
        $tambah_data_kursi = substr($id_kursi,1);
        for ($hitung = 1; $hitung <= $jumlah_meja; $hitung++) {
            $id_detil_ambil = "MD".$tambah_data_meja;
            for($hitung_kursi = 1; $hitung_kursi <= $jumlah_orang; $hitung_kursi++){
                $id_detil_kursi = "K".$tambah_data_kursi;
                $data = [
                    'id_kursi' => $id_detil_kursi,
                    'id_detil_meja' => $id_detil_ambil,
                    
                ];
                $this->db->insert('kursi', $data);
                $tambah_data_kursi++;
            }
            $tambah_data_meja++;
            
            
        }
    }
    

    public function hapus_meja($id_meja){
        $query_detil_meja =$this->db->query("SELECT * FROM detil_meja where id_meja = '$id_meja'");
        $hasil_id_detil = $query_detil_meja->result_array();

        foreach ($hasil_id_detil as $row2) {
            $detil_id = $row2['id_detil_meja'];
            $this->db->where('id_detil_meja', $detil_id);
            $this->db->delete('detil_meja');
        }

        foreach($hasil_id_detil as $row1){
            $detil_meja_to_kursi = $row1['id_detil_meja'];
            $this->db->where('id_detil_meja',$detil_meja_to_kursi);
            $this->db->delete('kursi');
        }

        $this->db->where('id_meja',$id_meja);
        $this->db->delete('meja');


    }
    
}
?>