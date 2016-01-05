<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dangky extends CI_Controller {
 
    protected $_data;
 
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/mdangky');
    }
 
    public function index() {

        $config['total_rows'] = $this->mdangky->countall();
        $config['base_url'] = base_url()."index.php/admin/dangky/index";
        $config['per_page'] = 6;
        $config['num_links'] = 3;

        $start=$this->uri->segment(4);
        $this->load->library('pagination', $config);
        //$config['use_page_numbers'] = TRUE;

        $this->_data['total'] = $this->mdangky->countall();
        $this->_data['subview'] = 'admin/dangky/vDangky';
        $this->_data['titlePage'] = 'Đăng ký';
        $this->_data['linkpage'] = $this->pagination->create_links();
        $this->_data['info'] = $this->mdangky->getlistpage($config['per_page'], $start);
        $this->load->view('Main.php', $this->_data);
    }

    public function add1()
    {
        $this->_data['titlePage'] = 'Thêm ';
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
           $this->mdangky->insert($data_insert);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/xa");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function add()
    {
         $ho = $this->input->post('ho');
         $ten = $this->input->post('ten');
         $email = $this->input->post('email');
         $matkhau = $this->input->post('matkhau');
         $matkhau1 = $this->input->post('matkhau1');
         //$data = 'Họ: '.$ho.'; Ten: '.$ten.'; email: '.$email.'; matkhau: '.$matkhau.'; matkhau1: '.$matkhau1;
         $data = "Báo lỗi <br />";
         $test = "0";
        if ($ho == '') 
        {
            $data = $data.'Họ không được rỗng!<br />';
            $test = "1";
        }
        if ($ten == '') 
        {
           $data = $data.'Tên không được rỗng!<br />';
            //echo $data;
           $test = "1";
        }
        if ($email == '') 
        {
           $data = $data.'Email không được rỗng!<br />';
            //echo $data;
            $test = "1";
        }
        if ($matkhau == '') 
        {
           $data = $data.'Mật khẩu không được rỗng!<br />';
            //echo $data;
            $test = "1";
        }
        if($matkhau != $matkhau1)
        {
            $data = $data.'Mật khẩu không trùng khớp!<br />';
            //echo $data;
            $test = "1";
        }
        if($test == "0")
        {
            $data_insert = array(
               "ND_HO" => $ho,
               "ND_TEN" => $ten,
               "ND_DIACHIMAIL" => $email,
               "ND_MATKHAU" => $matkhau,
            );
            $this->mdangky->insert($data_insert);
            echo "1";
        } 
        else{
            echo $data;
         } 
    }

    public function edit($id, $id1, $id2)
    {
        $this->_data['titlePage'] = 'Thêm xã';
        $this->_data['subview'] = 'admin/xa/vEdit';

        $this->load->model('admin/mtinh');
        $this->_data['info'] = $this->mdangky->getById($id,$id1,$id2);
 
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
           $this->mdangky->update($data_update, $id, $id1, $id2);
           $this->session->set_flashdata("flash_mess", "Added");
           redirect(base_url() . "index.php/admin/xa");
       }
       $this->load->view('Main.php', $this->_data);
    }

    public function delete($id)
    {
        $this->mdangky->delete($id);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "index.php/admin/dangky");
    }
}