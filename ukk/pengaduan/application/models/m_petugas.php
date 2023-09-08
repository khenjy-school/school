<?php
class m_petugas extends CI_Model
{

  public function ambildata()
  {
    return $this->db->get('petugas');
  }

  public function simpan($datapetugas)
  {
    return $this->db->insert('petugas', $datapetugas);
  }

  public function ubah($data, $where)
  {
    $this->db->where($where);
    return $this->db->update("petugas", $data, $where);
  }

  public function hapus($where)
  {
    return $this->db->delete("petugas", $where);
  }

  public function ceklogin($username, $password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    return $this->db->get("petugas");
  }
}
