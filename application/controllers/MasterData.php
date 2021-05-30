<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_pimpinan()) {
            redirect('dashboard');
        }

        $this->load->model('MasterData_model', 'master');
        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Users_model', 'user');
    }


    private function _validasi()
    {
        $this->form_validation->set_rules('nama_kary', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan_id', 'Jabatan', 'required');
    }

    private function _validasijabatan()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('descript', 'Descript', 'required');
        
    }

    private function _validasibagian()
    {
        $this->form_validation->set_rules('nama_bagian', 'Nama Bagian', 'required');
        
    }
    private function _validasistatus()
    {
        $this->form_validation->set_rules('status', 'Status', 'required');
        
    }

    private function _validasijeniscuti()
    {
        $this->form_validation->set_rules('nama_cuti', 'Nama Cuti', 'required');
        
    }


    // public function index()
    // {
    //     $data['title'] = "Cuti | Master Data";
    //     $data['users'] = $this->master->getUsers();
    //     $data['cuti'] = $this->pengajuan->getPengajuanCuti();
    //     $data['jenis_cuti'] = $this->master->get_jeniscuti();
    //     $data['status'] = $this->master->get_status();
    //     $data['jabatan'] = $this->master->get_jabatan();
    //     $data['bagian'] = $this->master->get_bagian();
    //     $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
    //     $this->template->load('master/master-app', 'app/master_data', $data);
    // }


    public function reset_sisa_cuti(){
        $this->master->reset_sisa_cuti();
        set_pesan('Berhasil Mereset sisa cuti semua karyawan');
        redirect('datauser');
    }

    public function add_user()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Add User";
            $data['jabatan'] = $this->master->get_jabatan();
            $data['bagian'] = $this->master->get_bagian();
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/add_user', $data);
        } else {
            $input = $this->input->post(null, true);

            $insert = $this->pengajuan->insert('users', $input);

            if ($insert) {
                set_pesan('Berhasil menambahkan User');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/add_user/');
            }
        }
    }

    public function edit_user($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Edit User";
            $data['jabatan'] = $this->master->get_jabatan();
            $data['bagian'] = $this->master->get_bagian();
            $data['user'] = $this->master->get('users', ['user_id' => $id]);
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/edit_user', $data);
        } else {
            $input = $this->input->post(null, true);

            $update = $this->pengajuan->update('users', 'user_id', $id, $input);

            if ($update) {
                set_pesan('Berhasil mmengupdate User');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/edit_user/' . $id);
            }
        }
    }

    public function delete_user($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->pengajuan->delete('users', 'user_id', $id)) {
            set_pesan('User berhasil dihapus.');
        } else {
            set_pesan('User gagal dihapus.', false);
        }
        redirect('datauser');
    }

    public function activate_user($getId){
        $id = encode_php_tags($getId);
        $update = $this->pengajuan->update('users', 'user_id', $id, array('is_active' => 1));

        if ($update) {
            set_pesan('Akun Berhasil di aktifkan');
            redirect('datauser');
        }
    }

    public function deactivate_user($getId){
        $id = encode_php_tags($getId);
        $update = $this->pengajuan->update('users', 'user_id', $id, array('is_active' => 0));

        if ($update) {
            set_pesan('Akun Berhasil di non aktifkan');
            redirect('datauser');
        }
    }


    public function add_jeniscuti()
    {
        $this->_validasijeniscuti();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Add Jenis Cuti";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/add_jeniscuti', $data);
        } else {
            $input = $this->input->post(null, true);

            $insert = $this->pengajuan->insert('jenis_Cuti', $input);

            if ($insert) {
                set_pesan('Berhasil menambahkan Jenis Cuti');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/add_jeniscuti');
            }
        }
    }

    public function edit_jeniscuti($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasijeniscuti();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Edit Jenis Cuti";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $data['jenis_cuti'] = $this->master->get('jenis_cuti', ['jeniscuti_id' => $id]);
            $this->template->load('master/master-app', 'app/edit_jeniscuti', $data);
        } else {
            $input = $this->input->post(null, true);

            $update = $this->pengajuan->update('jenis_cuti', 'jeniscuti_id', $id, $input);

            if ($update) {
                set_pesan('Berhasil mmengupdate Jenis Cuti');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/edit_jeniscuti/' . $id);
            }
        }
    }

    public function delete_jeniscuti($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->pengajuan->delete('jenis_cuti', 'jeniscuti_id', $id)) {
            set_pesan('Jenis Cuti berhasil dihapus.');
        } else {
            set_pesan('Jenis Cuti gagal dihapus.', false);
        }
        redirect('datauser');
    }

    public function edit_status($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasistatus();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Edit Status";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $data['status'] = $this->master->get('status', ['status_id' => $id]);
            $this->template->load('master/master-app', 'app/edit_status', $data);
        } else {
            $input = $this->input->post(null, true);

            $update = $this->pengajuan->update('status', 'status_id', $id, $input);

            if ($update) {
                set_pesan('Berhasil mmengupdate Status');
                redirect('datalain');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/edit_status/' . $id);
            }
        }
    }

    public function edit_jabatan($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasijabatan();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Edit Jabatan";
            $data['jabatan'] = $this->master->get('jabatan', ['jabatan_id' => $id]);
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/edit_jabatan', $data);
        } else {
            $input = $this->input->post(null, true);

            $update = $this->pengajuan->update('jabatan', 'jabatan_id', $id, $input);

            if ($update) {
                set_pesan('Berhasil mmengupdate Jabatan');
                redirect('datalain');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/edit_jabatan/' . $id);
            }
        }
    }


    public function add_bagian()
    {
        $this->_validasibagian();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Add Bagian";
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/add_bagian', $data);
        } else {
            $input = $this->input->post(null, true);

            $insert = $this->pengajuan->insert('bagian', $input);

            if ($insert) {
                set_pesan('Berhasil menambahkan Bagian');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/add_bagian');
            }
        }
    }

   public function edit_bagian($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasibagian();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Edit Bagian";
            $data['bagian'] = $this->master->get('bagian', ['bagian_id' => $id]);
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
            $this->template->load('master/master-app', 'app/edit_bagian', $data);
        } else {
            $input = $this->input->post(null, true);

            $update = $this->pengajuan->update('bagian', 'bagian_id', $id, $input);

            if ($update) {
                set_pesan('Berhasil mmengupdate Jenis Cuti');
                redirect('datauser');
            } else {
                set_pesan('Opps ada kesalahan!', false);
                redirect('masterdata/edit_bagian/' . $id);
            }
        }
    }

    public function delete_bagian($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->pengajuan->delete('bagian', 'bagian_id', $id)) {
            set_pesan('Bagian berhasil dihapus.');
        } else {
            set_pesan('Bagian gagal dihapus.', false);
        }
        redirect('datauser');
    }
}
