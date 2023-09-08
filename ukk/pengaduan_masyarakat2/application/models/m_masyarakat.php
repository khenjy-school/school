<?php
class m_masyarakat extends CI_Model
{

  public function ambildata()
  {
    return $this->db->get('masyarakat');
  }

  public function ambil($nik, $tabel)
  {
    //select * from $tabel where nik = $nik
    $this->db->where("nik", $nik);
    return $this->db->get($tabel);
  }

  public function simpan($data, $tabel)
  {
    return $this->db->insert($tabel, $data);
  }

  public function ubah($data, $where)
  {
    $this->db->where($where);
    return $this->db->update("masyarakat", $data, $where);
  }

  public function hapus($tabel, $where)
  {
    return $this->db->delete($tabel, $where);
  }

  public function ceklogin($username, $password, $tabel)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    return $this->db->get($tabel);
  }
}
