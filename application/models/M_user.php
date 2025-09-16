<?php 

class M_user extends CI_Model{

    public function getAll_usermenu()
    {
        return $this->db->get_where('user_menu')->result_array();
    }


    public function get_user($value){
        $id_akun = $value['id'];
        $query = $this->db->query("SELECT * FROM user where id='$id_akun'");
        return $query->result_array();
    }
    
    public function get_akun_petugas($value){
        $id_akun = $value['id'];
        $id_petugas ="P".$id_akun.'_';
        $query = $this->db->query("SELECT * FROM user WHERE LEFT(id, 4) =  '$id_petugas' AND id LIKE '$id_petugas%'");
        return $query->result_array();
    }
}
?>