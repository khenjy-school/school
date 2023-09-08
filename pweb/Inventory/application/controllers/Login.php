<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CRUD');
    }

    public function index(){
        $this->load->view('login');
    }

    public function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->CRUD->cek_login($username,$password);
        if($cek->num_rows() == 1){
            foreach($cek->result() as $data){
                $user_data = array(
                    'nama' => $data->nama,
                    'username' => $data->username,
                    'level' => $data->level,
                    'img' =>$data->img
                );
                $this->session->set_userdata($user_data);
            }
            if($this->session->userdata('level') == 'admin'){
                redirect('Controller');
            }
            elseif($this->session->userdata('level') == 'member'){
                redirect('Member');
            }
        }else{
            $data['pesan'] = '<div class="pesanlog">Username atau password tidak sesuai!<button type="button" class="close">&times;</button></div>';
            $this->load->view('login',$data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }

}

