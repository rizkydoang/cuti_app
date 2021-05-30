<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Pengajuan_model', 'pengajuan');
        $this->load->model('Users_model', 'user');
        $this->load->library('form_validation');

        function dateDiffInDays($date1, $date2) 
        {
            $diff = strtotime($date2) - strtotime($date1);
                
            return abs(round($diff / 86400));
        }
    }


    private function _validasi()
    {
        $this->form_validation->set_rules('user_id', 'UserId', 'required');
        $this->form_validation->set_rules('mulai_cuti', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('akhir_cuti', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('jeniscuti_id', 'Jenis Cuti', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }



    public function index()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Cuti | Pengajuan";
            $data['cuti'] = $this->pengajuan->get('jenis_cuti');
            $data['userdata'] = $this->user->userdata($this->session->userdata('login_session')['user']);

            $this->template->load('master/master-app', 'app/form_pengajuan', $data);
        } else {
            $input = $this->input->post(null, true);
            $total_cuti = dateDiffInDays($input['mulai_cuti'], $input['akhir_cuti']);

            $date_now = date('Y-m-d');

            $input['jumlah_cuti'] = $total_cuti;

            $sisa_cuti = $this->pengajuan->get_sisa_cuti($this->session->userdata('login_session')['user']);
            // var_dump($input['mulai_cuti']);
            // var_dump($date_now);
            if ($input['mulai_cuti']>=$date_now){
                if ($input['mulai_cuti'] < $input['akhir_cuti']){
                    if ($total_cuti <= $sisa_cuti){
                        if ($total_cuti > 0){
                            if ($this->pengajuan->get_status($this->session->userdata('login_session')['user']) == 'aktif'){
                                if($this->session->userdata('login_session')['role'] != 3){
                                    $insert = $this->pengajuan->insert('form_cuti', $input);
                                } else{
                                    $input['status_id'] = 1;
                                    $insert = $this->pengajuan->insert('form_cuti', $input);
                                }
                            }else{
                                set_pesan('Anda sudah mengajukan cuti sebelumnya', false);
                                redirect('pengajuan');
                            }
                        }else{
                            set_pesan('Masukan tanggal cuti dengan benar', false);
                            redirect('pengajuan');
                        }
                    } else {
                        set_pesan('Masa Cuti anda melebihi batas yang ditentukan', false);
                        redirect('pengajuan');
                    }
                } else {
                    set_pesan('Masukan Tanggal Cuti dengan benar', false);
                    redirect('pengajuan');
                }
            } else{
                set_pesan('Masukan mulai tanggal cuti yang lebih dari tanggal sekarang', false);
                redirect('pengajuan');
            }

            if ($insert) {
                $update = $this->pengajuan->update('users', 'user_id', $this->session->userdata('login_session')['user'], array('sisa_cuti' => $sisa_cuti - $total_cuti));
                if ($update) {
                    $this->pengajuan->update('users', 'user_id', $this->session->userdata('login_session')['user'], array('status' => 'wait'));
                    set_pesan('Cuti sedang diajukan.');
                    redirect('approve');
                }
            } else {
                set_pesan('Masukan data cuti dengan benar', false);
                redirect('pengajuan');
            }
        }
    } 
}
