<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos_model extends CI_Model
{
    public function posBerita()
    {

       $data = [
                "judul" => $this->input->post('judul', true),
                "kategori" => $this->input->post('kategori', true),
                "berita" => $this->input->post('berita', true),
                "keyword" => $this->input->post('keyword', true),

       ];

       $this->db->insert('pos_berita', $data);
    }
    public function semuaBerita($id)
    {

        return $this->db->get_where('pos_berita', ['id' => $id])->row_array();
    }
    public function editBerita()
    {

        $data = [
            "judul" => $this->input->post('judul', true),
            "kategori" => $this->input->post('kategori', true),
            "berita" => $this->input->post('berita', true),
            "keyword" => $this->input->post('keyword', true),

        ];
        $this->db->input('id', $this->input->post('id'));
        $this->db->update('pos_berita', $data);
    }
}
