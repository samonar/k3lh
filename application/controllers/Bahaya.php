<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bahaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Bahaya_model','Sumber_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    public function index()
    {
        $bahaya=$this->Bahaya_model->get_all();
        $data = array(
            'title'     => 'Daftar Proyek ',
            'active'    => '',
            'active_header' => 'bahaya',
            'bahaya_data' => $bahaya,
        );
        $this->template->display('bahaya/bahaya_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Bahaya_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_sumber' => $row->id_sumber,
		'nm_bahaya' => $row->nm_bahaya,
	    );
            $this->template->display('bahaya/bahaya_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahaya'));
        }
    }

    public function create() 
    {   $data_sumber=$this->Sumber_model->get_all();
        $data = array(
            'title'     => 'Daftar Proyek ',
            'active'    => '',
            'active_header' => 'bahaya',
            'button' => 'Create',
            'action' => site_url('bahaya/create_action'),
	    'id' => set_value('id'),
	    'id_sumber' => set_value('id_sumber'),
        'nm_bahaya' => set_value('nm_bahaya'),
        'data_sumber' => $data_sumber
	);
        $this->template->display('bahaya/bahaya_form', $data);
        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_sumber' => $this->input->post('id_sumber',TRUE),
		'nm_bahaya' => $this->input->post('nm_bahaya',TRUE),
	    );

            $this->Bahaya_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bahaya'));
        }
    }
    
    public function update($id) 
    {
        $data_sumber=$this->Sumber_model->get_all();
        $row = $this->Bahaya_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title'     => 'Daftar Proyek ',
                'active'    => '',
                'active_header' => 'bahaya',
                'button' => 'Update',
                'action' => site_url('bahaya/update_action'),
		'id' => set_value('id', $row->id_bahaya),
		'id_sumber' => set_value('id_sumber', $row->id_sumber),
        'nm_bahaya' => set_value('nm_bahaya', $row->nm_bahaya),
        'data_sumber' => $data_sumber,
	    );
            $this->template->display('bahaya/bahaya_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahaya'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_sumber' => $this->input->post('id_sumber',TRUE),
		'nm_bahaya' => $this->input->post('nm_bahaya',TRUE),
	    );

            $this->Bahaya_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bahaya'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bahaya_model->get_by_id($id);

        if ($row) {
            $this->Bahaya_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bahaya'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bahaya'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_sumber', 'id sumber', 'trim|required');
	$this->form_validation->set_rules('nm_bahaya', 'nm bahaya', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

