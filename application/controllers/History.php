<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('users_model', 'user');
    }

    public function index()
    {
        $data['title'] = "Cuti | History";
        $data['history'] = $this->pengajuan->getPengajuanCuti();
        $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
        $this->template->load('master/master-app', 'app/history', $data);
    }
}
