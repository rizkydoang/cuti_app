<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
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
        $data['users'] = $this->master->getUsers();
        $data['jabatan'] = $this->master->get_jabatan();
        $data['bagian'] = $this->master->get_bagian();
        $data['jenis_cuti'] = $this->master->get_jeniscuti();
        $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
        $this->template->load('master/master-app', 'app/datauser', $data);
    }
}
?>