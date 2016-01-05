<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtinh extends CI_Model
{
	protected $_table = 'tinh';

	public function __construct()
	{
		parent::__construct();
	}

	public function getList()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->order_by("T_MA", "desc");
		return $this->db->get()->result_array();
	}

	public function getById($id){
        $this->db->where("T_MA", $id);
        return $this->db->get($this->_table)->row_array();
   	}

	public function insert($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function delete($id)
    {
        $this->db->where('T_MA', $id);
        return $this->db->delete($this->_table);
    }

    public function update($data_update, $id){
        $this->db->where("T_MA", $id);
        $this->db->update($this->_table, $data_update);
	}

	public function countall()
    {
        return $this->db->count_all($this->_table);
    }

    public function getlistpage($total, $start)
    {
        $this->db->limit($total, $start);
        $this->db->order_by('T_MA', 'desc');
        $query=$this->db->get($this->_table);
        return $query->result_array();
    }

    public function data($per_page,$offset,$search_keywords_array,$search_orderby_string) {        
        $sdata = array();
        $this->db->select('*')->from('tinh');
        if(count($search_keywords_array)>0) $this->db->like($search_keywords_array);
        
        if(!empty($search_orderby_string)) $this->db->order_by($search_orderby_string);
        
        $this->db->limit($per_page,$offset);
        $query_result = $this->db->get();
        //echo $this->db->last_query(); // shows last executed query
        
        if($query_result->num_rows() > 0) {
            foreach ($query_result->result_array() as $row)
            {
                $sdata[] = array('T_MA' => $row['T_MA'],'T_TEN' => $row['T_TEN']);
            }           
        }
        return $sdata;
    }
 
 
 
    public function searchterm_handler($field,$searchterm)
    {
        if($searchterm)
        {
            $this->session->set_userdata($field, $searchterm);
            return $searchterm;
        }
        elseif($this->session->userdata($field))
        {
            $searchterm = $this->session->userdata($field);
            return $searchterm;
        }
        else
        {
            $searchterm ="";
            return $searchterm;
        }
    }
}