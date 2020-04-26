<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Admin_model'));
		$this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));	
    }

    	
	public function index()
	{
		$data = array(
			'action' => site_url('absensi/finish_action'),
			'title'    	 => 'Dasboard',
			'active'    => '',
            'active_header' => '',
		);
		$this->template->display('user/beranda_admin',$data);
	
	}

	
	
}