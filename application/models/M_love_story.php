<?php 

class M_love_story extends CI_Model
{
    public function getAll_lovestory()
    {
        return $this->db->query('SELECT * FROM love_story where id_resepsi="R1"')->result_array();
    }

    public function tambahDataLS()
    {
        $config['upload_path']   = './front-end/images/love_story';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size']      =  2048;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar_story')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gambar Anda belum diupload! </div>');
            redirect('Love_story/index');
        } else {
            $gambar_story   = $this->upload->data();
            $gambar_story   = $gambar_story['file_name'];
            $id_LS = $this->input->post('id_LS',true);
            $judul   = $this->input->post('judul',true);
            $tanggal   = $this->input->post('tanggal',true);
            $story   = $this->input->post('story',true);
            $id_resepsi = $this->input->post('id_resepsi',true);
            $status = $this->input->post('status',true);
        }

        $data = [
            'id_LS' => $id_LS,
            'judul' => $judul,
            'tanggal' => $tanggal,
            'story' => $story,
            'gambar_story' => $gambar_story,
            'id_resepsi' => $id_resepsi,
            'status' => $status
            
        ];
        $this->db->insert('love_story', $data);

    } 


    public function hapusData_LS($id_LS)
    {
        $this->db->where('id_LS',$id_LS);
        $this->db->delete('love_story');
    }

    public function getLS_Byid($id_LS)
    {
        return $this->db->get_where('love_story',['id_LS' => $id_LS])->row_array();
    } 

    public function updateDataLS($id_LS)
    {
        $config['upload_path']   = './front-end/images/love_story';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size']      =  2048;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar_story')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Gambar Anda belum diupload! </div>');
            redirect('Love_story/index');
        } else {
            $gambar_story   = $this->upload->data();
            $gambar_story   = $gambar_story['file_name'];
            //$id_LS = $this->input->post('id_LS',true);
            $judul   = $this->input->post('judul',true);
            $tanggal   = $this->input->post('tanggal',true);
            $story   = $this->input->post('story',true);
            $id_resepsi = $this->input->post('id_resepsi',true);
            $status = $this->input->post('status',true);
        }

        $data = [
            //'id_LS' => $id_LS,
            'judul' => $judul,
            'tanggal' => $tanggal,
            'story' => $story,
            'gambar_story' => $gambar_story,
            'id_resepsi' => $id_resepsi,
            'status' => $status
            
        ];
        $this->db->where('id_LS', $this->input->post('id_LS'));
        $this->db->update('love_story', $data);

    } 

    

}
?>