<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tinh extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('admin/khuvuc/mtinh');
    }

	public function index()
	{
	 	$this->_data['subview'] = 'admin/khuvuc/vTinh';
	 	$this->_data['titlePage'] = 'Tỉnh';
	 	//$this->load->model('admin/khuvuc/mtinh');

	 	$this->_data['query'] = $this->mtinh->showTinh();
	 	$this->load->view('Main.php', $this->_data);
	}

	public function add()
	{
		if (isset($_POST['submit']))
		{
			$this->form_validation->set_rules('T_MA', 'Mã tỉnh', 'trim');
			$this->form_validation->set_rules('T_TEN', 'Tên tỉnh', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				//$this->load->view('admin/khuvuc/form', $query);
				$this->_data['subview'] = 'admin/khuvuc/form';
			 	$this->_data['titlePage'] = 'Tỉnh';
			 	//$this->_data['data'] = $this->mtinh->showTinhCon($id);
			 	$this->load->view('Main.php', $this->_data);
			}
			else 
			{
				$id=$_POST['T_MA'];
				$name=$_POST['T_TEN'];
			
				$result=$this->mtinh->insertTinh($id, $name);
				if($result)
				{
					//echo "<script>alert('Thành công');</script>";
					$this->_data['subview'] = 'admin/khuvuc/vTinh';
				 	$this->_data['titlePage'] = 'Tỉnh';
				 	$this->_data['query'] = $this->mtinh->showTinh();
				 	$this->load->view('Main.php', $this->_data);
					//$this->session->set_flashdata('flashSuccess', 'This is a success message.');
					
				}
				else 
				{
					echo "<div class='error'>";
					echo "Lỗi";
					echo "</div>";
				}
			}
		}
		else 
		{
			//$this->load->view('admin/khuvuc/form', $query);
			$this->_data['subview'] = 'admin/khuvuc/form';
			$this->_data['titlePage'] = 'Tỉnh';
			//$this->_data['data'] = $this->mtinh->showTinhCon($id);
			$this->load->view('Main.php', $this->_data);
		}
	}

	public function edit($id)
	{
		$query['data']=$this->mtinh->showTinhCon($id);
		if (isset($_POST['submit']))
		{
			$this->form_validation->set_rules('T_MA', 'Mã tỉnh', 'trim|required');
			$this->form_validation->set_rules('T_TEN', 'Tên tỉnh', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				//$this->load->view('admin/khuvuc/form', $query);
				$this->_data['subview'] = 'admin/khuvuc/form';
			 	$this->_data['titlePage'] = 'Tỉnh';
			 	$this->_data['data'] = $this->mtinh->showTinhCon($id);
			 	$this->load->view('Main.php', $this->_data);
			}
			else 
			{
				$id=$_POST['T_MA'];
				$name=$_POST['T_TEN'];
			
				$result=$this->mtinh->updateTinh($id, $name);
				if($result)
				{
					//echo "<script>alert('Thành công');</script>";
					$this->_data['subview'] = 'admin/khuvuc/vTinh';
				 	$this->_data['titlePage'] = 'Tỉnh';
				 	$this->_data['query'] = $this->mtinh->showTinh();
				 	$this->load->view('Main.php', $this->_data);
					//$this->session->set_flashdata('flashSuccess', 'This is a success message.');
					
				}
				else 
				{
					echo "<div class='error'>";
					echo "Lỗi";
					echo "</div>";
				}
			}
		}
		else 
		{
			//$this->load->view('admin/khuvuc/form', $query);
			$this->_data['subview'] = 'admin/khuvuc/form';
			$this->_data['titlePage'] = 'Tỉnh';
			$this->_data['data'] = $this->mtinh->showTinhCon($id);
			$this->load->view('Main.php', $this->_data);
		}
	}

	public function delete($id)
	{ 
		
		$r=$this->mtinh->deleteTinh($id);
	  	if($r)
	  	{
	  		echo "Xóa thành công";
	  		redirect(base_url() . "index.php/admin/khuvuc/tinh");
	  	}
	  	else 
		 	{
		  echo "Can Not Delete Data";
		}
	}
}
