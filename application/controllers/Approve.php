<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approve extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_karyawan()) {
            redirect('dashboard');
        }

        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Users_model', 'user');
    }

    public function index()
    {
        $data['cuti'] = $this->pengajuan->getPengajuanCuti();
        $data['title'] = "Cuti | Approve";
        $data['role'] = $this->session->userdata('login_session')['role'];
        $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);
        $this->template->load('master/master-app', 'app/approve_cuti', $data);
    }
        
    public function acceptPimpinan($getId){
        $id = encode_php_tags($getId);
        $cuti = $this->pengajuan->getCuti($id);
        
        $update = $this->pengajuan->update('form_cuti', 'cuti_id', $id, array('status_id' => 3, 'is_cuti' => 'T'));
        
        if ($update) {
            $this->pengajuan->update('users', 'user_id', $cuti['user_id'], array('status' => 'cuti'));
            set_pesan('Berhasil di approve');
            redirect('approve');
        }
    }

    public function declinePimpinan($getId){
        $id = encode_php_tags($getId);
        $jumlah_cuti = $this->pengajuan->get_cuti_counter($id);
        $cuti = $this->pengajuan->getCuti($id);
        $sisa_cuti = $this->pengajuan->get_sisa_cuti($cuti['user_id']);
        
        $update = $this->pengajuan->update('form_cuti', 'cuti_id', $id, array('status_id' => 4));

        if ($update) {
            $update_sisa_cuti = $this->pengajuan->update('users', 'user_id', $cuti['user_id'], array('sisa_cuti' => $sisa_cuti + $jumlah_cuti, 'status' => 'aktif'));
            if ($update_sisa_cuti) {
                set_pesan('Berhasil di ditolak');
                redirect('approve');
            }
        }
    }
        
    public function acceptKabag($getId){
        $id = encode_php_tags($getId);
        $update = $this->pengajuan->update('form_cuti', 'cuti_id', $id, array('status_id' => 2));

        if ($update) {
            set_pesan('Berhasil di approve, Menunggu Persetujuan Pimpinan');
            redirect('approve');
        }
    }

    public function declineKabag($getId){
        $id = encode_php_tags($getId);
        $jumlah_cuti = $this->pengajuan->get_cuti_counter($id);
        $cuti = $this->pengajuan->getCuti($id);
        $sisa_cuti = $this->pengajuan->get_sisa_cuti($cuti['user_id']);
        
        $update = $this->pengajuan->update('form_cuti', 'cuti_id', $id, array('status_id' => 4));

        if ($update) {
            $update_sisa_cuti = $this->pengajuan->update('users', 'user_id', $cuti['user_id'], array('sisa_cuti' => $sisa_cuti + $jumlah_cuti, 'status' => 'aktif'));
            if ($update_sisa_cuti) {
                set_pesan('Berhasil di ditolak');
                redirect('approve');
            }
        }
    }
}
