<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData_model extends CI_Model
{

    public function getUsers()
    {
        $this->db->select('*');
        $this->db->join('jabatan j', 'pc.jabatan_id = j.jabatan_id', 'left outer');
        $this->db->join('bagian b', 'pc.bagian_id = b.bagian_id', 'left outer');

        $this->db->order_by('user_id', 'ASC');
        return $this->db->get('users pc')->result_array();
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function get_jabatan(){
        return $this->db->get('jabatan')->result_array();
    }

    public function get_jeniscuti(){
        return $this->db->get('jenis_cuti')->result_array();
    }

    public function get_status(){
        return $this->db->get('status')->result_array();
    }

    public function get_bagian(){
        return $this->db->get('bagian')->result_array();
    }


    public function userdata($nip)
    {
        return $this->db->get_where('users', ['nip' => $nip])->row_array();
    }


    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function reset_sisa_cuti(){
        $this->db->update('users', ['sisa_cuti' => 12]);
    }
}
