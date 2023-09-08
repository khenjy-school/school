<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
  private $tabel = 'tb_member';

  public function ambil()
  {
    return $this->db->get($this->tabel); // mengambil data dari tabel tb_member
  }

  public function ambildata($where)
  {
    $this->db->where('id_member', $where); // mengambil data dari tabel tb_member berdasarkan id
    return $this->db->get($this->tabel); // mengambil data dari tabel tb_member
  }

  public function simpan($data)
  {
    return $this->db->insert($this->tabel, $data);
  }

  public function update($data, $where)
  {
    $this->db->where('id_member', $where);
    return $this->db->update($this->tabel, $data, $where);
  }

  public function hapus($data, $where)
  {
    $this->db->where('id_member', $where);
    return $this->db->delete($this->tabel, $data);
  }
}
