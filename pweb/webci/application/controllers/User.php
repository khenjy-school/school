<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 
 public function __construct()
 {
    parent::__construct();
    $this->load->model('UserMdl');
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('session', 'form_validation'));
    $this->load->library('pagination');
 }
 
 public function index()
 {
    $this->profil();
 }

 public function login()
 {        
    if ($this->session->userdata('is_logged_in'))
    { 
        $this->session->set_flashdata('msg_success',' Anda sudah login !');
        redirect('user/profil');  
    }

    $data['title'] = 'Login';
    $data['keyword'] = '';
    $data['description'] = '';

    $username = $this->input->post('username');
    $password = $this->input->post('password');
        
    $this->form_validation->set_rules('username', 'Username', 'trim|min_length[4]|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');        
            
    if ($this->form_validation->run() === FALSE)
    {            
        $this->load->view('templates/header', $data);
        $this->load->view('user/login');
        $this->load->view('templates/footer'); 
    }
    else
    { 
        if ($user = $this->UserMdl->dt_login($username, $password))
        {       
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('level', $user['level']);
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('is_logged_in', true);
                    
            $this->session->set_flashdata('msg_success','Login Berhasil!');
            redirect('user/profil');                
        }
        else
        {
            $this->session->set_flashdata('msg_error','User atau password SALAH !');
            redirect('user/login');
        }
    }
 }
    
 public function logout()
 {    
    if ($this->session->userdata('is_logged_in'))
    {       
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('user_id');            
    }
    redirect('');
 }

 public function daftar()
 {
    if ($this->session->userdata('is_logged_in') && $this->session->userdata('level')!='1')
    { 
        $this->session->set_flashdata('msg_error',' Maaf! Anda sudah terdaftar');
        redirect('user/profil/');  
    }

    $header = $this->db->query("SELECT is_daftar FROM tampilan LIMIT 1;"); $hdr = $header->result_array();

    if (!$this->session->userdata('is_logged_in') && $hdr[0]['is_daftar']!='1')
    { 
        $this->session->set_flashdata('msg_error',' Maaf! Hubungi Admin');
        redirect('user/login/');  
    }

    $data['title'] = 'Form Pendaftaran';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|min_length[4]|max_length[50]');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[user.username]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
    if ($this->form_validation->run() === FALSE)
    {            
        $this->load->view('templates/header', $data);
        $this->load->view('user/daftar');
        $this->load->view('templates/footer'); 
    }
    else
    { 
        if ($this->UserMdl->go_daftar())
        {                             
            $this->session->set_flashdata('msg_success','Pendaftaran berhasil !');
            redirect('user/login');            
        }
        else
        {                
            $this->session->set_flashdata('msg_error','Error! Silahkan coba lagi nanti.');
            redirect('user/daftar');
        }
    }
 }
    
 public function profil()
 {
    if (!$this->session->userdata('is_logged_in'))
    {
    redirect(site_url('user/login'));
    } 

    $user_id=$this->session->userdata('user_id');
    $dtuser = $this->db->query("SELECT * FROM user WHERE id=$user_id LIMIT 1;");
    $data['dsr'] = $dtuser->result_array(); 

    $data['title'] = 'Profil';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('user/profil');
    $this->load->view('templates/footer'); 
 }

 public function reset()
 {
    if (!$this->session->userdata('is_logged_in'))
    {
    redirect(site_url('user/login'));
    }

    $data['title'] = 'Ganti password';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->form_validation->set_rules('passlama', 'Password Lama', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
                
    if ($this->form_validation->run() === FALSE)
    {            
        $this->load->view('templates/header', $data);
        $this->load->view('user/reset');
        $this->load->view('templates/footer'); 
    }
    else
    { 
        $this->UserMdl->ubah_pwd();
    }
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

    $data['user'] = $this->UserMdl->get_id($id);
    $data['title'] = 'Ubah data';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required|min_length[4]|max_length[50]');
    $password = $this->input->post('password');

        if( ! empty($password))
        {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        }

        if ($this->form_validation->run() === FALSE)
        {            
            $this->load->view('templates/header', $data);
            $this->load->view('user/ubah');
            $this->load->view('templates/footer'); 
        }
        else
        { 
            $this->UserMdl->edit($id); 
        }    
 }
    
 public function hps($id)
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

    $this->UserMdl->delete($id); 
    $this->session->set_flashdata('msg_success','Pengguna berhasil dihapus !');
    redirect('user/manage');
 }

 public function manage()
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
        
    $config = array();
    $config["base_url"] = base_url() . "user/manage";
    $config["total_rows"] = $this->UserMdl->jmlh_user();
    $config["per_page"] = 5;
    $config["uri_segment"] = 3;

    $config['full_tag_open'] = "<ul class='nmr_style'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['next_link'] = '<i class="fa fa-angle-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data["user"] = $this->UserMdl->dri_user($config["per_page"], $page);
    $data["links"] = $this->pagination->create_links();

    $data['title'] = 'User Manager';
    $data['keyword'] = '';
    $data['description'] = '';

    $this->load->view('templates/header', $data);
    $this->load->view('user/manage', $data);
    $this->load->view('templates/footer');
 }

}