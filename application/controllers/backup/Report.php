<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation','upload','image_lib','template','session'));
    $this->load->helper(array('form', 'url', 'html','pembilang'));
    if(empty($this->session->userdata('id_user'))){
      redirect('user');
  }
  }

  function top()
  {
    $this->load->library('pdfgenerator');

		$data['users']=array(
			array('firstname'=>'monar','lastname'=>'Programmer','email'=>'iam@programmer.com'),
			array('firstname'=>'sadas','lastname'=>'Designer','email'=>'iam@designer.com'),
			array('firstname'=>'asdasd','lastname'=>'User','email'=>'iam@user.com'),
			array('firstname'=>'I am','lastname'=>'Quality Assurance','email'=>'iam@qualityassurance.com')
		);

    $html = $this->load->view('table_report', $data, true);
    $filename = 'kwitansi'.date('m');
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }

  public function sa(){
    $this->load->library('pdfgenerator');

		$data['users']=array(
			array('firstname'=>'monar','lastname'=>'Programmer','email'=>'iam@programmer.com'),
			array('firstname'=>'sadas','lastname'=>'Designer','email'=>'iam@designer.com'),
			array('firstname'=>'asdasd','lastname'=>'User','email'=>'iam@user.com'),
			array('firstname'=>'I asdasdasooo am','lastname'=>'Quality Assurance','email'=>'iam@qualityassurance.com')
		);

    $html = $this->load->view('table_report', $data, true);
    $filename = 'kwitansi'.date('m');
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }

}
