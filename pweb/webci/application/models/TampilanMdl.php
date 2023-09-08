<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TampilanMdl extends CI_Model {    
 public function edit($id)
 {
    $data = array(
        "namaweb" => $this->input->post('namaweb'),
        "hakcipta" => $this->input->post('hakcipta'),
        "term" => $this->input->post('term'),            
        "privasi" => $this->input->post('privasi'),
        "telp" => $this->input->post('telp'),
        "is_daftar" => $this->input->post('is_daftar')
    );
        
    $this->db->where('id', $id);
    $this->db->update('tampilan', $data); 
 }
 
 public function get_id($id)
 {
    $this->db->where('id', $id);
    return $this->db->get('tampilan')->row();
 }

}
