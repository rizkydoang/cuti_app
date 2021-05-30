<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }


  
    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login | Cuti";
            $this->template->load('master/master-auth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_nip = $this->auth->cek_nip($input['nip']);
            if ($cek_nip > 0) {
                $password = $this->auth->get_password($input['nip']);
                if ($input['password'] == $password) {
                    $user_db = $this->auth->userdata($input['nip']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('Akun anda belum diaktifkan.', false);
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user'  => $user_db['user_id'],
                            'role'  => $user_db['jabatan_id'],
                            'status'  => $user_db['status'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('NIP belum terdaftar', false);
                redirect('auth');
            }
        }
    }
}
