<?php 
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }

    public function _validation()
    {
        $this->form_validation->set_rules('nama_kary', 'Nama_kary', 'required');
        $this->form_validation->set_rules('nip', 'Nip', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tgl_masuk', 'required');
    }

    public function index()
    {
        $this->_validation();

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Register | Cuti";
            $this->template->load('master/master-auth', 'auth/register', $data);
        }
        else 
        {
            $input = $this->input->post(null, true);
            $data = array
            (
                'nama_kary'     => $input['nama_kary'],
                'nip'           => $input['nip'],
                'tgl_lahir'     => $input['tgl_lahir'],
                'password'      => $input['password'],
                'tgl_masuk'     => $input['tgl_masuk'],
                'jabatan_id'    => 3
            );

            $this->auth->insert_data($data, 'users');
            set_pesan('Akun Berhasil Dibuat, silahkan Lakukan Login.');
            redirect('auth');
        }
        
    }
}