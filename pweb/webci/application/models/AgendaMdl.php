<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendaMdl extends CI_Model {


 public function get_agenda($id = FALSE)
 {
    if ($id === FALSE)
    {
    $query = $this->db->get('agenda');
    return $query->result_array();
    }

    $query = $this->db->get_where('agenda', array('id' => $id));
    return $query->row_array();
 }

 public function get_id($id)
 {
    $this->db->where('id', $id);
    return $this->db->get('agenda')->row();
 }
    
 public function save()
 {

    $data = array(
        "title" => $this->input->post('title'),
        "tek" => $this->input->post('tek'),
        "category" => $this->input->post('category'),
        "lokasi" => $this->input->post('lokasi'),
        "mulai" => $this->input->post('mulai'),
        "selesai" => $this->input->post('selesai'),
        "user_id" => $this->input->post('user_id'),
        "timestamp" => date('Y-m-d H:i:s')
    );
        
    $this->db->insert('agenda', $data); 
    redirect(site_url('agenda/manage'));
    
 }
    
 public function edit($id)
 {
    $data = array(
        "title" => $this->input->post('title'),
        "tek" => $this->input->post('tek'),
        "category" => $this->input->post('category'),
        "lokasi" => $this->input->post('lokasi'),
        "mulai" => $this->input->post('mulai'),
        "selesai" => $this->input->post('selesai'),            
        "user_id" => $this->input->post('user_id')
    );
        
    $this->db->where('id', $id);
    $this->db->update('agenda', $data); 
 }
    
 public function delete($id)
 {
    $this->db->where('id', $id);
    $this->db->delete('agenda'); 
 }

 public function jmlh_agenda()
 {
    return $this->db->count_all("agenda");
 }

 public function dri_agenda($limit, $start)
 {  
    $this->db->select('agenda.*, user.fullname');
    $this->db->order_by("agenda.id", "desc");
    $this->db->join('user', 'user.id = agenda.user_id', 'left'); 
    $this->db->limit($limit, $start);
    $query = $this->db->get("agenda");
    if ($query->num_rows() > 0)
    {
        foreach ($query->result_array() as $row)
        {
            $data[] = $row;
        }
        return $data;
    }
       return false;
 }

}