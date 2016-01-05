<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Huyen extends CI_Controller {
 
    protected $_data;
 
    public function __construct() {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('admin/mhuyen');
    }
 
    public function index() {

        $config['total_rows'] = $this->mhuyen->countall();
        $config['base_url'] = base_url()."index.php/admin/huyen/index";
        $config['per_page'] = 6;
        $config['num_links'] = 3;

        $start=$this->uri->segment(4);
        $this->load->library('pagination', $config);
        //$config['use_page_numbers'] = TRUE;

        $this->_data['total'] = $this->mhuyen->countall();
        $this->_data['subview'] = 'admin/huyen/vHuyen';
        $this->_data['titlePage'] = 'Huyện';
        $this->_data['linkpage'] = $this->pagination->create_links();
        $this->_data['info'] = $this->mhuyen->getlistpage($config['per_page'], $start);
        $this->load->view('Main.php', $this->_data);
    }

    public function add()
    {
        $this->_data['titlePage'] = 'Thêm huyện';
        $this->_data['subview'] = 'admin/huyen/vAdd';

        $this->load->model('admin/mtinh');
        $this->_data['info'] = $this->mtinh->getList();
 
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "required|trim");
        $this->form_validation->set_rules("H_MA", "Mã huyện", "trim");
        $this->form_validation->set_rules("H_TEN", "Tên huyện", "required");
 
       if ($this->form_validation->run() == TRUE) {
           $data_insert = array(
               "T_MA" => $this->input->post("T_MA"),
               "H_MA" => $this->input->post("H_MA"),
               "H_TEN" => $this->input->post("H_TEN"),
           );
           $this->mhuyen->insert($data_insert);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/huyen");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function edit($id, $id1)
    {
        $this->_data['titlePage'] = 'Thêm huyện';
        $this->_data['subview'] = 'admin/huyen/vEdit';

        $this->load->model('admin/mtinh');
        $this->_data['info'] = $this->mhuyen->getById($id,$id1);
 
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "required|trim");
        $this->form_validation->set_rules("H_MA", "Mã huyện", "trim");
        $this->form_validation->set_rules("H_TEN", "Tên huyện", "required");
 
       if ($this->form_validation->run() == TRUE) {
           $data_update = array(
               "T_MA" => $this->input->post("T_MA"),
               "H_MA" => $this->input->post("H_MA"),
               "H_TEN" => $this->input->post("H_TEN"),
           );
           $this->mhuyen->update($data_update, $id, $id1);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/huyen");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function delete($id, $id1)
    {
        $this->mhuyen->delete($id, $id1);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "index.php/admin/huyen");
    }
}