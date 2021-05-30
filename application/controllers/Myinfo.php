<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myinfo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->model('Pengajuan_model', 'pengajuan');
    }

    public function index()
    {
        if($this->input->post('from_date') != null || $this->input->post('to_date') != null){
            $data['title'] = "Cuti | Info";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $data['cuti'] = $this->pengajuan->getPengajuanCuti($this->session->userdata('login_session')['user'], $this->input->post('from_date'), $this->input->post('to_date'));
            $this->template->load('master/master-app', 'app/myinfo', $data);
		}else{
            $data['title'] = "Cuti | Info";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $data['cuti'] = $this->pengajuan->getPengajuanCuti($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/myinfo', $data);
		}
    }
}
