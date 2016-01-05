<?php
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mxa extends CI_Model{
    protected $_table = 'xa';
    public function __construct() {
        parent::__construct();
    }
     
    public function getList(){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('huyen');
        $this->db->join('tinh', 'huyen.T_MA = tinh.T_MA');
        $this->db->join('xa', 'xa.H_MA = huyen.H_MA');

        return $this->db->get()->result_array();

        //$this->db->select('T_MA, T_TEN, H_MA, H_TEN');
        //return $this->db->get($this->_table)->result_array();
    }

    public function getById($id, $id1, $id2){
        $this->db->where("T_MA", $id);
        $this->db->where("H_MA", $id1);
        $this->db->where('X_MA', $id2);
        return $this->db->get($this->_table)->row_array();
    }
 
    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id, $id1, $id2)
    {
        $this->db->where('T_MA', $id);
        $this->db->where('H_MA', $id1);
        $this->db->where('X_MA', $id2);
        return $this->db->delete('xa');
    }

    public function update($data_update, $id, $id1, $id2){
        $this->db->where("T_MA", $id);
        $this->db->where("H_MA", $id1);
        $this->db->where('X_MA', $id2);
        $this->db->update($this->_table, $data_update);
    }

    public function getlistpage($total, $start)
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('xa');
        //$this->db->join('huyen', 'huyen.H_MA = xa.H_MA');
        //$this->db->join('tinh', 'xa.T_MA = tinh.T_MA');
        $this->db->limit($total, $start);
        //$this->db->order_by('tinh.T_MA', 'desc');
        //$this->db->order_by('huyen.H_MA', 'desc');
        //$this->db->order_by('xa.X_MA', 'desc');
        $query=$this->db->get();
        return $query->result_array();
    }

    function mgethuyen($matinh){
        $this->db->where('T_MA',$matinh);
        $this->db->order_by('H_TEN','asc');
        $result = $this->db->get('huyen');
        if ($result->num_rows() > 0 ){
             return $result->result_array(); 
        }
        else{
             return array(); 
        }
     }
}