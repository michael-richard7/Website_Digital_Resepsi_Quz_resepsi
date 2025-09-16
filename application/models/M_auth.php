<?php
class M_auth extends CI_Model{

    public function ganti_password($id,$password){
        $id_user =$id;
        $password_input = $password;

        $ada = 'ada';
        $tidak = 'tidak_ada';
        $query_cek = $this->db->query("SELECT * from user where id='".$id_user."'");
        if ($query_cek->num_rows() > 0) {
            // Data ditemukan
            return $ada;
        } else {
            // Data tidak ditemukan
            return $tidak;
        }

    }
}
?>