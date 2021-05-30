<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('user_id !=', $id);
        return $this->db->get('users')->result_array();
    }

    public function userdata($id)
    {
        $this->db->select('*');
        $this->db->join('jabatan j', 'pc.jabatan_id = j.jabatan_id', 'left outer');
        $this->db->join('bagian b', 'pc.bagian_id = b.bagian_id', 'left outer');
        return $this->db->get_where('users pc', ['user_id' => $id])->row_array();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }


    public function countUser($table=null, $field=null, $value=null, $count=false)
    {
        if ($count){
            return $this->db->where([$field=>$value])->from($table)->count_all_results();
        }else{
            if ($value == 'cuti'){
                $this->db->select('*');
                $this->db->join('users u', 'c.user_id = u.user_id');
                $this->db->join('jenis_cuti j', 'c.jeniscuti_id = j.jeniscuti_id');
                return $this->db->get_where("$table c", [$field => $value, 'status_id' => 3, 'is_cuti' => 'T'])->result_array();
            }elseif($value == 'wait'){
                $this->db->select('*');
                $this->db->join('users u', 'c.user_id = u.user_id');
                $this->db->join('jenis_cuti j', 'c.jeniscuti_id = j.jeniscuti_id');
                return $this->db->get_where("$table c", [$field => $value, 'status_id >=' => 1, 'status_id <=' => 2])->result_array();
            }elseif($value == 'aktif'){
                $this->db->select('*');
                $this->db->join('jabatan j', 'c.jabatan_id = j.jabatan_id');
                $this->db->join('bagian b', 'c.bagian_id = b.bagian_id', 'left outer');
                return $this->db->get_where("$table c", [$field => $value])->result_array();
            }
        }
    }

    public function getUserfromCuti($userId){
        $this->db->select('*');
        $this->db->join('users u', 'c.user_id = u.user_id');
        $this->db->join('jenis_cuti j', 'c.jeniscuti_id = j.jeniscuti_id');
        return $this->db->get_where("form_cuti c", ['u.user_id' => $userId, 'is_cuti' => 'T'])->result_array();
    }
}