<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Huyen extends CI_Controller {
 
    protected $_data;
 
    public function __construct() {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('admin/huyen/mhuyen');
    }
 
    public function index() {
        $this->_data['subview'] = 'admin/huyen/vHuyen';
        $this->_data['titlePage'] = 'Huyện';
        $this->_data['total_huyen'] = $this->mhuyen->countAll();
        $this->_data['info'] = $this->mhuyen->getList();

        $this->_data['subviewadd'] = 'admin/huyen/vAdd';
        $this->load->view('Main.php', $this->_data);
    }

    public function add()
    {
        $this->_data['titlePage'] = 'Thêm huyện';
        $this->_data['subview'] = 'admin/huyen/vAdd';

        $this->load->model('admin/khuvuc/mtinh');
        $this->_data['info'] = $this->mtinh->getList();
 
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "required|trim");
        $this->form_validation->set_rules("H_MA", "Mã huyện", "trim");
        $this->form_validation->set_rules("H_TEN", "Tên huyện", "required");
 
       if ($this->form_validation->run() == TRUE) {
           //$this->load->model("Muser");
           $data_insert = array(
               "T_MA" => $this->input->post("T_MA"),
               "H_MA" => $this->input->post("H_MA"),
               "H_TEN" => $this->input->post("H_TEN"),
           );
           $this->mhuyen->insertHuyen($data_insert);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/huyen/huyen");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {
        $this->mhuyen->deleteHuyen($id);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "index.php/admin/huyen/huyen");
    }
}