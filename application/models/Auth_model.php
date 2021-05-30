<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_nip($nip)
    {
        $query = $this->db->get_where('users', ['nip' => $nip]);
        return $query->num_rows();
    }

    public function get_password($nip)
    {
        $data = $this->db->get_where('users', ['nip' => $nip])->row_array();
        return $data['password'];
    }

    public function userdata($nip)
    {
        return $this->db->get_where('users', ['nip' => $nip])->row_array();
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
}
