<?php
class M_Template extends CI_Model{

    public function get_undangan(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM undangan where id_acara_resepsi = '".$acara."'")->result_array();
    }

    public function get_galeri(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM galeri_foto where id_acara = '".$acara."'")->result_array();
    }

    public function get_cerita_cinta(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM cerita_cinta where id_acara = '".$acara."'")->result_array();
    }

    public function get_pria(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM info_pria where id_acara_resepsi = '".$acara."'")->result_array();
    }

    public function get_wanita(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM info_wanita where id_acara_resepsi = '".$acara."'")->result_array();
    }

    public function get_tamu(){
       $nilai = $_GET['s'];
        if(strpos($nilai, '|') !== false) {
        $value = explode("|",$nilai);
        $acara = $value[0];
        $tamu = $value[1];
        } else {
        $acara = $nilai;
        }
        return $this->db->query("SELECT * FROM tamu where id_resepsi = '".$acara."' and id_tamu='".$tamu."'")->result_array();
       
    }

}
?>