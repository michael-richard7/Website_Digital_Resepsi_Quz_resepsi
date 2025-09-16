<?php
class M_scan extends CI_Model{

public function acara_nikah(){
        $id_acara = $_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM acara_resepsi where id_resepsi = '$id_acara'");
        $hasil = $query->row();
        return $hasil;
    }
    public function pengecekan_tamu($id_tamu)
    {
        $id_tamu = $id_tamu;
        $id_resepsi =$_SESSION['id_acara'];
        $query = $this->db->query("SELECT * FROM tamu JOIN meja on tamu.id_meja = meja.id_meja where tamu.id_tamu ='$id_tamu' AND tamu.id_resepsi = '$id_resepsi'");
        $result = $query->row();
        return $result;

    }

    public function cek_tamu($id_tamu){
        $ada = 'ada';
        $tidak = 'tidak_ada';
        $id_tamu = $id_tamu;
        $id_acara = $_SESSION['id_acara'];
        $sql = "SELECT * FROM tamu JOIN meja on tamu.id_meja = meja.id_meja where tamu.id_tamu ='$id_tamu' AND tamu.id_resepsi = '$id_acara'";
        $query = $this->db->query($sql, array($id_tamu, $id_acara));
        if ($query->num_rows() > 0) {
            // Data ditemukan
            return $ada;
        } else {
            // Data tidak ditemukan
            return $tidak;
        }

    }

    public function pendataan($id_tamu){
        
        $baru_terdata = 'baru';
        $telah_terdata = 'lama';
        $tidak_tau ='null value';
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');

        $id_tamu = $id_tamu;
        $id_acara = $_SESSION['id_acara'];
        $sql = "SELECT * FROM `kursi`JOIN tamu ON kursi.id_tamu = tamu.id_tamu where tamu.id_tamu ='$id_tamu' and tamu.id_resepsi='$id_acara'";
        $query_aja = $this->db->query($sql);
        $hasil = $query_aja->result();
        
        if(!empty($hasil)){
            foreach($hasil as $coba){
                $query2 = $this->db->query("SELECT * FROM `tamu` WHERE tamu.id_tamu ='$id_tamu'");
                        $banyak_kursi ='';
                        foreach ($query2->result() as $row)
                        {
                            $banyak_kursi=($row->jumlah);
                        }

                if($coba->status =='0'){
                    $status_baru = '1';

                    for($hitung_kursi = 1; $hitung_kursi <= $banyak_kursi; $hitung_kursi++){
                        
                        $update =[
                            'waktu' => $tanggal,
                            'status' => $status_baru
                        ];
                
                        $this->db->where('id_tamu', $id_tamu);
                        $this->db->update('kursi', $update);
                    }
                    return $baru_terdata;
                    
                }elseif($coba->status =='1'){
                    
                    return $telah_terdata;
                }
            }
        }elseif(empty($hasil)){
            return $tidak_tau;
        }
        
    }
}
?>