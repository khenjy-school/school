<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMdl extends CI_Model {
 
 public function __construct()
 {
    $this->load->database();
 }
    
 public function dt_login($username, $password)
 {
    $query = $this->db->get_where('user', array('username' => $username));
    $lgn = $query->result_array(); 

    if (password_verify($password, $lgn[0]['password']))
    {
    return $query->row_array();
    }
 }

 public function go_daftar($id = 0)
 {
    $data = array(
        "fullname" => $this->input->post('fullname'),
        "username" => $this->input->post('username'),
        "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        "level"    => '2',
        "updated"  => date('Y-m-d H:i:s')
    );
            
    if ($id == 0) {
        return $this->db->insert('user', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }
 }

 public function ubah_pwd($id)
 {

    $query = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')));
    $hdr = $query->result_array(); 

    if (password_verify($this->input->post('passlama'), $hdr[0]['password']))

    {
    $data = array(
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'updated' => date('Y-m-d H:i:s')
    );        
    $this->db->where('id', $this->session->userdata('user_id'));
    $this->db->update('user', $data); 
    $this->session->set_flashdata('msg_success','Password berhasil diubah !');
    redirect('user/reset');             
    }
    else 
    {
        $this->session->set_flashdata('msg_error','Error! Password lama salah.');
        redirect('user/reset');
    }
 }

 public function get_id($id)
 {
    $this->db->where('id', $id);
    return $this->db->get('user')->row();
 }

 public function edit($id)
 {
    $password = $this->input->post('password');

    if( ! empty($password))
    {
    $data = array(
        "fullname" => $this->input->post('fullname'),
        "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        "level" => $this->input->post('level'),
        "updated" => date('Y-m-d H:i:s')
    );} else {
    $data = array(
        "fullname" => $this->input->post('fullname'),
        "level" => $this->input->post('level'),
        "updated" => date('Y-m-d H:i:s')
    );

    }        
    $this->db->where('id', $id);
    $this->db->update('user', $data); 
    $this->session->set_flashdata('msg_success','Data Pengguna berhasil diubah !');
    redirect('user/manage');          
 }

 public function delete($id)
 {
    $this->db->where('id', $id);
    $this->db->delete('user'); 
 }

 public function jmlh_user()
 {
    return $this->db->count_all("user");
 }

 public function dri_user($limit, $start)
 {
    $this->db->order_by("id", "desc");
    $this->db->limit($limit, $start);
    $query = $this->db->get("user");
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