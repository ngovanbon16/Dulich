<?php
class Mtinh extends CI_Model
{

    public function getList(){
        $this->db->select('T_MA, T_TEN');
        return $this->db->get('tinh')->result_array();
    }

	public function showTinh()
	{
        $this->db->order_by("T_MA", "desc");
		$query = $this->db->get('tinh');
		return $query->result();
	}

    public function showTinhCon($id)
    {
        $this->db->where('T_MA', $id);
        $result=$this->db->get('tinh');;
        return $result->row_array();
    }

    public function insertTinh($id, $name)
    {
        $data = array('T_MA' => $id, 'T_TEN'=>$name);
        return($this->db->insert('tinh',$data));
    }

    public function updateTinh($id, $name)
    {
    $data = array('T_MA'=>$id, 'T_TEN'=>$name);
    $this->db->where('T_MA', $id);
    return($this->db->update('tinh',$data));
    }

    public function deleteTinh($id)
    {
        $this->db->where('T_MA', $id);
        return($this->db->delete('tinh'));
    }
}