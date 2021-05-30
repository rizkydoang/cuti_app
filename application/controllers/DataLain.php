<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataLain extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_pimpinan()) {
            redirect('dashboard');
        }

        $this->load->model('MasterData_model', 'master');
        $this->load->model('Users_model', 'user');
    }

    public function index()
    {
        $data['title'] = "Cuti | Master Data";
        $data['status'] = $this->master->get_status();
        $data['jabatan'] = $this->master->get_jabatan();
        $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
        $this->template->load('master/master-app', 'app/datalainya', $data);
    }
}
