<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class latihan_model extends CI_Model {

  public function tambah() {
    $data = array (
      'judul' => 'Berita sore',
      'nama' => 'Nama saya',
      'tanggal' => '2018-09-09'
    );
    
    $this->db->insert('namatabel', $data);
  }
}
