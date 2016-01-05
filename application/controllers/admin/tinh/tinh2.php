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

	public function index($page_num=1, $sortfield='', $order='')
	{
      $search_keywords_array = array();
      $search_orderby_array = array();
      $search_orderby_string = '';
    
      $page_number = $this->uri->segment(5);
      $config['base_url'] = base_url()."index.php/admin/tinh/tinh/index";
      $config['uri_segment'] = 5;

      $this->load->library('pagination', $config);

      if(!empty($sortfield)) $search_orderby_array[] = $sortfield.' '.$order;
      
      if($this->input->post()) {    
        
        $T_MA = $this->input->post('T_MA');
        $T_TEN = $this->input->post('T_TEN');   
        
        if(!empty($T_MA)) { 
          $search_keywords_array['T_MA'] =  $T_MA;
          $this->site_model->searchterm_handler('T_MA',$T_MA); 
        } else {
          $this->session->unset_userdata('T_MA'); 
        }
        if(!empty($T_TEN)) { 
          $search_keywords_array['T_TEN'] =  $T_TEN;
          $this->site_model->searchterm_handler('T_TEN',$T_TEN);
        } else {
          $this->session->unset_userdata('T_TEN');  
        }     
        
       $reset = $this->input->post('reset');
        if(!empty($reset)) {
          $this->session->unset_userdata('T_MA');
          $this->session->unset_userdata('T_TEN');    
          $search_keywords_array = array();
          redirect('index.php/admin/tinh/tinh/index/');
        }     
        
      } else {    
        if($this->session->userdata("T_MA"))
          $search_keywords_array['T_MA'] = $this->session->userdata("T_MA");
        if($this->session->userdata("T_TEN"))
          $search_keywords_array['T_TEN'] = $this->session->userdata("T_TEN");
      }
      $search_orderby_string = implode(",",$search_orderby_array);

      $config['per_page'] = 10;
      $config['num_links'] = 2;
      if(empty($page_number)) $page_number = 1;
      $offset = ($page_number-1) * $config['per_page'];

      $config['use_page_numbers'] = TRUE;

      $this->_data["info"] = $this->mtinh->data($config['per_page'],$offset,$search_keywords_array,$search_orderby_string);
      
      $this->db->select('*')->from('tinh');
      $this->db->like($search_keywords_array);
      $query_result = $this->db->get();
           
      $config['total_rows'] = $this->mtinh->countall();
      $this->pagination->cur_page = $offset;

      $this->pagination->initialize($config);
      $this->_data['linkpage'] = $this->pagination->create_links();

  		$this->_data['subview'] = 'admin/tinh/vTinh';
  		$this->_data['titlePage'] = 'Tỉnh';
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