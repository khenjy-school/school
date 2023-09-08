<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DownloadMdl extends CI_Model {

 public function jmlh_download()
 {
       return $this->db->count_all("download");
 }

 public function dri_download($limit, $start)
 {  
    $this->db->select('download.*, user.fullname');
    $this->db->order_by("download.id", "desc");
    $this->db->join('user', 'user.id = download.user_id', 'left'); 
    $this->db->limit($limit, $start);
    $query = $this->db->get("download");
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

 public function get_download($id = FALSE)
 {
    if ($id === FALSE)
    {
    $query = $this->db->get('download');
    return $query->result_array();
    }

    $this->db->select('download.*, user.fullname');
    $this->db->join('user', 'user.id = download.user_id', 'left'); 
    $query = $this->db->get_where('download', array('download.id' => $id));
    return $query->row_array();
 }

 public function save()
 {
    $config['upload_path']          = './file/images/download/';
    $config['allowed_types']        = 'pdf|zip|rar|doc|docx';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('fileupload'))
    {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('download/tambah', $error);
    }
    else
    {    
        $config['source_image'] = './file/images/download/'.$gbr['file_name'];
        $config['new_image'] = './file/images/download/'.$gbr['file_name'];

        $this->load->library('upload', $config);
        $gbr = $this->upload->data();

        $data = array(
            "title" => $this->input->post('title'),
            "tek" => $this->input->post('tek'),
            "category" => $this->input->post('category'),
            "user_id" => $this->input->post('user_id'),
            "timestamp" => date('Y-m-d H:i:s'),
            "size" => $gbr['file_size'],
            "ext" => $gbr['file_ext'],
            "type" => $gbr['file_type'],
            "image_path" => $gbr['file_name']
        );
        
        $this->db->insert('download', $data); 
        redirect(site_url('download/manage'));
    }
 }

 public function edit($id)
 {
    $data = array(
        "title" => $this->input->post('title'),
        "tek" => $this->input->post('tek'),
        "category" => $this->input->post('category'),
        "user_id" => $this->input->post('user_id')
    );
        
    $this->db->where('id', $id);
    $this->db->update('download', $data); 
 }

 public function get_id($id)
 {
    $this->db->where('id', $id);
    return $this->db->get('download')->row();
 }
        
 public function delete($id)
 {
    $query = $this->db->get_where('download', array('id' => $id));
    $hp = $query->result_array(); 
    $nama='file/images/download/'.$hp[0]['image_path'];
    unlink ($nama);

    $this->db->where('id', $id);
    $this->db->delete('download');

 }

}