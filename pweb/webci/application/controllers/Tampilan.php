<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tampilan extends CI_Controller {

 public function __construct()
 {
    parent::__construct();
    $this->load->model('TampilanMdl'); 
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
 }

 public function index()
    {
    $data['title'] = '';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('tampilan/index', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
 }

 public function ubh($id)
 {
    if (!$this->session->userdata('is_logged_in'))
    {
    redirect(site_url('user/login'));
    }
    else if ($this->session->userdata('level')!='1')
    { 
        $this->session->set_flashdata('msg_error',' Maaf! Akses terbatas !');
        redirect('user/profil/');  
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('namaweb', 'namaweb', 'required|max_length[50]');
    $this->form_validation->set_rules('hakcipta', 'hakcipta', 'required|max_length[50]');
    $this->form_validation->set_rules('telp', 'telp', 'required|max_length[30]');
    $this->form_validation->set_rules('term', 'term', 'required');
    $this->form_validation->set_rules('privasi', 'privasi', 'required');

    if($this->input->post('submit'))
    { 
        if(!$this->form_validation->run() == FALSE)
        { 
            $this->TampilanMdl->edit($id); 
            $this->session->set_flashdata('msg_success','Data berhasil diubah !');
            redirect('tampilan/ubh/'.$id); 
        }
    }
        
    $data['tampilan'] = $this->TampilanMdl->get_id($id);
    $data['title'] = 'Pengaturan Website';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('tampilan/ubah', $data);
    $this->load->view('templates/footer');   
 }

 public function term()
 {
    $data['title'] = 'term';
    $data['keyword'] = 'term';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('tampilan/term');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
 }

 public function privasi()
    {
    $data['title'] = 'privasi';
    $data['keyword'] = 'privasi';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('tampilan/privasi');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/footer');
 }

}