<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->_data['subview'] = 'vHome';
       	$this->_data['titlePage'] = 'Trang chủ';
       	$this->load->view('Main.php', $this->_data);
	}
}