<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proyek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proyek_model');
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    public function index()
    {
        $proyek_data=$this->Proyek_model->get_all();
        $data = array(
            'title'     => 'Daftar Proyek ',
            'active'    => '',
            'active_header' => 'proyek',
            'proyek_data' => $proyek_data
        );
        $this->template->display('proyek/proyek_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Proyek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nm_proyek' => $row->nm_proyek,
		'alamat' => $row->alamat,
		'tgl' => $row->tgl,
	    );
            $this->load->view('proyek/proyek_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }

    public function create() 
    {
        $data = array(
            'title'     => 'Daftar Proyek ',
            'active'    => '',
            'active_header' => 'proyek',
            'button' => 'Create',
            'action' => site_url('proyek/create_action'),
	    'id' => set_value('id'),
	    'nm_proyek' => set_value('nm_proyek'),
	    'alamat' => set_value('alamat'),
	    'tgl' => set_value('tgl'),
	);
    $this->template->display('proyek/proyek_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nm_proyek' => $this->input->post('nm_proyek',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
	    );

            $this->Proyek_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('proyek/identifikasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Proyek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('proyek/update_action'),
		'id' => set_value('id', $row->id),
		'nm_proyek' => set_value('nm_proyek', $row->nm_proyek),
		'alamat' => set_value('alamat', $row->alamat),
		'tgl' => set_value('tgl', $row->tgl),
	    );
            $this->load->view('proyek/proyek_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nm_proyek' => $this->input->post('nm_proyek',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'tgl' => $this->input->post('tgl',TRUE),
	    );

            $this->Proyek_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('proyek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Proyek_model->get_by_id($id);

        if ($row) {
            $this->Proyek_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('proyek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('proyek'));
        }
    }

    public function identifikasi(){
        
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nm_proyek', 'nm proyek', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

