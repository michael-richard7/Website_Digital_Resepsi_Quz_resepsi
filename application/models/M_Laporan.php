<?php 

class M_Laporan extends CI_Model{

    public function get_daftar_data(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT SUBSTRING(tamu.id_tamu, 2) as 'Hasil',tamu.id_tamu, tamu.nama_tamu, tamu.jumlah, meja.id_meja, meja.nama_meja
        FROM tamu
        JOIN meja ON tamu.id_meja = meja.id_meja
        JOIN detil_meja ON meja.id_meja = detil_meja.id_meja
        JOIN kursi ON detil_meja.id_detil_meja = kursi.id_detil_meja
        WHERE tamu.id_resepsi = '$id_resepsi'
        GROUP BY tamu.id_tamu ORDER BY CAST(Hasil AS UNSIGNED) ASC;");
        $hasil = $query->result_array();
        return $hasil;
    }
    public function get_keterangan(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT kursi.id_tamu,SUBSTRING(kursi.id_tamu, 2) as 'Hasil', IF(kursi.status = 1, 'Hadir', 'Tidak Hadir') as 'keterangan', kursi.waktu FROM kursi JOIN detil_meja on kursi.id_detil_meja = detil_meja.id_detil_meja JOIN meja on detil_meja.id_meja = meja.id_meja where kursi.id_tamu !='' AND meja.id_resepsi='$id_resepsi' GROUP BY kursi.id_tamu ORDER BY CAST(Hasil AS UNSIGNED) ASC;");
        $hasil = $query->result_array();
        return $hasil;
    }
    public function get_acara(){
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM acara_resepsi where id_resepsi='$id_resepsi'");
        $hasil = $query->result_array();
        return $hasil;
    }
}
?>