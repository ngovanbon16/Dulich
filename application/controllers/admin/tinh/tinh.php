<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tinh extends CI_Controller
{
	protected $_data;

	public function __construct() 
	{
      parent::__construct();
      $this->load->model('admin/tinh/mtinh');
  }

	public function index()
	{
    //$this->load->model("mtinh");
    $config['total_rows'] = $this->mtinh->countall();
    //echo $config['total_rows'];
    $config['base_url'] = base_url()."index.php/admin/tinh/tinh/index";
    $config['per_page'] = 6;
    $config['num_links'] = 3;

    $start=$this->uri->segment(5);
    $this->load->library('pagination', $config);
    //$config['use_page_numbers'] = TRUE;

    $this->_data['total'] = $this->mtinh->countall();
		$this->_data['subview'] = 'admin/tinh/vTinh';
		$this->_data['titlePage'] = 'Tỉnh';
    $this->_data['linkpage'] = $this->pagination->create_links();
		$this->_data['info'] = $this->mtinh->getlistpage($config['per_page'], $start);
		$this->load->view('Main.php', $this->_data); 
	}

	public function add()
	{
		$this->_data['titlePage'] = 'Tỉnh';
        $this->_data['subview'] = 'admin/tinh/vAdd';
 
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "trim");
        $this->form_validation->set_rules("T_TEN", "Tên tỉnh", "required");
 
       if ($this->form_validation->run() == TRUE) 
       {
           $data_insert = array(
               "T_MA" => $this->input->post("T_MA"),
               "T_TEN" => $this->input->post("T_TEN"),
           );
           $this->mtinh->insert($data_insert);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/tinh/tinh");
       }
       $this->load->view('Main.php', $this->_data);
	}

	public function edit($id)
	{
        $this->_data['titlePage'] = "Sửa tỉnh";
        $this->_data['subview'] = "admin/tinh/vEdit";
 
        $this->_data['info'] = $this->mtinh->getById($id);
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "trim");
        $this->form_validation->set_rules("T_TEN", "Tên tỉnh", "required");
        if ($this->form_validation->run() == TRUE) {
            $data_update = array(
                "T_MA" => $this->input->post("T_MA"),
                "T_TEN" => $this->input->post("T_TEN"),
            );
            $this->mtinh->update($data_update, $id);
            $this->session->set_flashdata("flash_mess", "Update Success");
            redirect(base_url() . "index.php/admin/tinh/tinh");
        }
        $this->load->view('Main.php', $this->_data);
	}

	public function delete($id)
	{
		$this->mtinh->delete($id);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "index.php/admin/tinh/tinh");
	}
}