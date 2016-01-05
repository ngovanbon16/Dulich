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
 
    public function countAll(){
        return $this->db->count_all($this->_table); 
    }

    public function insertHuyen($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function deleteHuyen($id)
    {
        $this->db->where('H_MA', $id);
        return $this->db->delete('huyen');
    }
}