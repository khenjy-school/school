<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_m extends CI_Model
{
  private $tabel = 'user';

  public function ambildata()
  {
    return $this->db->get($this->tabel);
  }

  public function simpan($datauser)
  {
    return $this->db->insert($this->tabel, $datauser);
  }

  public function ubah($data, $where)
  {
    $this->db->where($where);
    return $this->db->update($this->tabel, $data, $where);
  }

  public function hapus($where)
  {
    return $this->db->delete($this->tabel, $where);
  }

  public function ceklogin($username, $password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    return $this->db->get($this->tabel);
  }
}
