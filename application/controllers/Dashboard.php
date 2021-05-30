<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Users_model', 'user');
    }

    public function index()
    {
        $data['title'] = "Cuti | Dashboard";
        $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
        $data['total_user'] = $this->user->count('users');
        $data['jabatan'] = $this->session->userdata('login_session')['role'];
        $data['status'] = $this->session->userdata('login_session')['status'];
        $data['user_aktif_count'] = $this->user->countUser('users', 'status', 'aktif', true);
        $data['user_cuti_count'] = $this->user->countUser('users', 'status', 'cuti', true);
        $data['user_wait_count'] = $this->user->countUser('users', 'status', 'wait', true);
        $data['user_aktif'] = $this->user->countUser('users', 'status', 'aktif');
        $data['user_cuti'] = $this->user->countUser('form_cuti', 'status', 'cuti');
        $data['user_wait'] = $this->user->countUser('form_cuti', 'status', 'wait');
        $this->template->load('master/master-app', 'app/dashboard', $data);
    }

    public function akhiriCuti(){
        if ($this->session->userdata('login_session')['status'] == 'cuti'){
            $form_cuti = $this->user->getUserfromCuti($this->session->userdata('login_session')['user']);
            $this->user->update('users', 'user_id', $this->session->userdata('login_session')['user'], array('status' => 'aktif'));
            $this->user->update('form_cuti', 'cuti_id', $form_cuti[0]['cuti_id'], array('is_cuti' => 'F'));
            set_pesan('Kembali Masuk / Aktif');
            redirect('dashboard');
        }
    }
}
