<?php
defined("BASEPATH") or exit ("Error cannot reach your request");

class Harga extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model(array('ModelToko','Setoran_model','Harga_model','SimpanPinjam_model','ModelAnggota'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
   }

   function index(){
    $data=$this->Harga_model->get_all();
    $data = array(
        'title'     => 'Pengaturan Harga',
        'active'    => '',
        'active_header' => 'harga',
        'action1'    => site_url('/harga/update_susu'),
        'action2'    => site_url('/harga/update_katul'),
        'data'  =>$data,
    );

    $this->template->display('harga/harga_form',$data);
   }

   function update_susu(){
    if (isset($_POST['id_harga'])) {
        $data=array(
            
            'nominal_harga' => $this->input->post('nominal'),
        );

        $this->Harga_model->update_susu($this->input->post('id_harga'),$data);
        $this->session->set_flashdata('message','Ubah Data Berhasil');
        redirect(site_url('harga'));
    }
   }

   function update_katul(){
    if (isset($_POST['id_harga'])) {
        $data=array(
            
            'nominal_harga' => $this->input->post('nominal '),
        );

        $this->Harga_model->update_katul($this->input->post('id_harga'),$data);
        $this->session->set_flashdata('message','Ubah Data Berhasil');
        redirect(site_url('harga'));
    }
   }


}