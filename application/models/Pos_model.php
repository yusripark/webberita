<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos_model extends CI_Model
{
    public function posBerita()
    {

        return $this->db->get('pos_berita');

    }
}
