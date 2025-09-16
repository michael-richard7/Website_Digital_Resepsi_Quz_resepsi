<?php
class M_Template_1 extends CI_Model
{
    public function get_undangan($id_acara_resepsi)
    {
        return $this->db->query("SELECT * FROM undangan where id_acara_resepsi='$id_acara_resepsi'")->result_array();
        
    }
    public function get_info_pria($id_acara_resepsi)
    {
        return $this->db->query("SELECT * FROM info_pria where id_acara_resepsi='$id_acara_resepsi'")->result_array();
    }
    public function get_info_wanita($id_acara_resepsi)
    {
        return $this->db->query("SELECT * FROM info_wanita where id_acara_resepsi='$id_acara_resepsi'")->result_array();
    }
    public function get_cerita_cinta($id_acara_resepsi)
    {
        return $this->db->query("SELECT * FROM cerita_cinta where id_acara='$id_acara_resepsi'")->result_array();
    }
}
?>