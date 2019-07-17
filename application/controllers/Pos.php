<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('text');
    }
    public function index()
    {
        $data['title'] = 'Pos Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori_berita')->result_array();
        $data['pos'] = $this->db->get('pos_berita')->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('berita', 'Berita', 'required');
        $this->form_validation->set_rules('keyword', 'Keyword', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('posberita/index', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            $kategori = $this->input->post('kategori');
            $berita = $this->input->post('berita');
            $keyword = $this->input->post('keyword');
            $gambar = $_FILES['gambar'];
            $terbit = time();

            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/gambar_berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            
            $data = array(
                'judul' => $judul,
                'kategori' => $kategori,
                'berita' => $berita,
                'keyword' => $keyword,
                'gambar' => $gambar,
                'terbit' => $terbit,
            );
            $this->db->insert('pos_berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Berita</div>');
            redirect('pos/editberita');
        }
    }
    public function tabelberita()
    {
        $data['title'] = 'Tabel Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $data['pos'] = $this->db->get('pos_berita')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('posberita/tabel_berita', $data);
        $this->load->view('templates/footer');
    }
    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori_berita')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('posberita/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('kategori_berita', ['kategori' => $this->input->post('kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Add Kategori</div>');
            redirect('pos/kategori');
        }
        
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori_berita')->result_array();
        $data['editberita'] = $this->db->get_where('pos_berita', ['id' => $id])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('berita', 'Berita', 'required');
        $this->form_validation->set_rules('keyword', 'Keyword', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('posberita/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $judul = $this->input->post('judul');
            $kategori = $this->input->post('kategori');
            $berita = $this->input->post('berita');
            $keyword = $this->input->post('keyword');
            $gambar = $_FILES['gambar'];
            $terbit = time();

            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/gambar_berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'judul' => $judul,
                'kategori' => $kategori,
                'berita' => $berita,
                'keyword' => $keyword,
                'gambar' => $gambar,
                'terbit' => $terbit,
            );
            $this->db->insert('pos_berita', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Berita</div>');
            redirect('pos/editberita');
        }
    }
    
    
}   