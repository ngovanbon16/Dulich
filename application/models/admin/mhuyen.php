<?php
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhuyen extends CI_Model{
    protected $_table = 'huyen';
    public function __construct() {
        parent::__construct();
    }
     
    public function getList(){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('huyen');
        $this->db->join('tinh', 'huyen.T_MA = tinh.T_MA');

        return $this->db->get()->result_array();

        //$this->db->select('T_MA, T_TEN, H_MA, H_TEN');
        //return $this->db->get($this->_table)->result_array();
    }

    public function getById($id, $id1){
        $this->db->where("T_MA", $id);
        $this->db->where("H_MA", $id1);
        return $this->db->get($this->_table)->row_array();
    }
 
    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id, $id1)
    {
        $this->db->where('T_MA', $id);
        $this->db->where('H_MA', $id1);
        return $this->db->delete('huyen');
    }

    public function update($data_update, $id, $id1){
        $this->db->where("T_MA", $id);
        $this->db->where("H_MA", $id1);
        $this->db->update($this->_table, $data_update);
    }

    public function getlistpage($total, $start)
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('huyen');
        $this->db->join('tinh', 'huyen.T_MA = tinh.T_MA');
        $this->db->limit($total, $start);
        $this->db->order_by('tinh.T_MA', 'desc');
        $this->db->order_by('huyen.H_MA', 'desc');
        $query=$this->db->get();
        return $query->result_array();
    }
}