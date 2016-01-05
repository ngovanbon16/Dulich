<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xa extends CI_Controller {
 
    protected $_data;
 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/mxa');
    }
 
    public function index() {

        $config['total_rows'] = $this->mxa->countall();
        $config['base_url'] = base_url()."index.php/admin/xa/index";
        $config['per_page'] = 6;
        $config['num_links'] = 3;

        $start=$this->uri->segment(4);
        $this->load->library('pagination', $config);
        //$config['use_page_numbers'] = TRUE;

        $this->_data['total'] = $this->mxa->countall();
        $this->_data['subview'] = 'admin/xa/vXa';
        $this->_data['titlePage'] = 'Xã';
        $this->_data['linkpage'] = $this->pagination->create_links();
        $this->_data['info'] = $this->mxa->getlistpage($config['per_page'], $start);
        $this->load->view('Main.php', $this->_data);
    }

    public function add()
    {
        $this->_data['titlePage'] = 'Thêm xã';
        $this->_data['subview'] = 'admin/xa/vAdd';

        $this->load->model('admin/mtinh');
        $this->_data['info'] = $this->mtinh->getList();
 
 		$this->form_validation->set_rules("T_MA", "Mã tỉnh", "required|trim");
        $this->form_validation->set_rules("H_MA", "Mã Huyện", "required|trim");
        $this->form_validation->set_rules("X_MA", "Mã xã", "trim");
        $this->form_validation->set_rules("X_TEN", "Tên xã", "required");
 
       if ($this->form_validation->run() == TRUE) {
           $data_insert = array(
               "T_MA" => $this->input->post("T_MA"),
               "H_MA" => $this->input->post("H_MA"),
               "X_MA" => $this->input->post("X_MA"),
               "X_TEN" => $this->input->post("X_TEN"),
           );
           $this->mxa->insert($data_insert);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/xa");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function edit($id, $id1, $id2)
    {
        $this->_data['titlePage'] = 'Thêm xã';
        $this->_data['subview'] = 'admin/xa/vEdit';

        $this->load->model('admin/mtinh');
        $this->_data['info'] = $this->mxa->getById($id,$id1,$id2);
 
        $this->form_validation->set_rules("T_MA", "Mã tỉnh", "required|trim");
        $this->form_validation->set_rules("H_MA", "Mã Huyện", "required|trim");
        $this->form_validation->set_rules("X_MA", "Mã xã", "trim");
        $this->form_validation->set_rules("X_TEN", "Tên xã", "required");
 
       if ($this->form_validation->run() == TRUE) {
           $data_update = array(
               "T_MA" => $this->input->post("T_MA"),
               "H_MA" => $this->input->post("H_MA"),
               "X_MA" => $this->input->post("X_MA"),
               "X_TEN" => $this->input->post("X_TEN"),
           );
           $this->mxa->update($data_update, $id, $id1, $id2);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/xa");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function delete($id, $id1, $id2)
    {
        $this->mxa->delete($id, $id1, $id2);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "index.php/admin/xa");
    }

    function gethuyen(){
     $matinh = $this->input->post('matinh');
     $huyen = $this->mxa->mgethuyen($matinh);
     $data = "<select class='form-control' name='H_MA'>";
     //$data = $data."<option value=''>--Huyện--</option>";
     foreach ($huyen as $mp){
          $data = $data."<option value='$mp[H_MA]'>$mp[H_TEN]</option>\n"; 
     }
     $data = $data."</select>";
     echo $data;
  }
}