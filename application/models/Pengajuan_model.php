<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getCuti($id){
        return $this->db->get_where('form_cuti', ['cuti_id' => $id])->row_array();
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function getPengajuanCuti($user_id = null, $from_date = null, $to_date = null)
    {
        $this->db->select('*');
        $this->db->join('users u', 'pc.user_id = u.user_id');
        $this->db->join('jenis_cuti jc', 'pc.jeniscuti_id = jc.jeniscuti_id');
        $this->db->join('status s', 'pc.status_id = s.status_id');
        $this->db->join('jabatan j', 'u.jabatan_id = j.jabatan_id');

        if ($user_id != null) {
            $this->db->where('pc.user_id', $user_id);
        }

        if ($from_date != null AND $to_date != null){
            $this->db->where('mulai_cuti BETWEEN "'.$from_date.'" AND "'.$to_date.'"');
        }

        return $this->db->get('form_cuti pc')->result_array();
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function get_status($id){
        $data = $this->db->get_where('users', ['user_id' => $id])->row_array();
        return $data['status'];
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }
        
    public function get_sisa_cuti($id){
        $data = $this->db->get_where('users', ['user_id' => $id])->row_array();
        return $data['sisa_cuti'];
    }

    public function get_cuti_counter($cuti_id){
        $data = $this->db->get_where('form_cuti', ['cuti_id' => $cuti_id])->row_array();
        return $data['jumlah_cuti'];
    }
}