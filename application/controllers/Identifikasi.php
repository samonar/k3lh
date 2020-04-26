<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Identifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Identifikasi_model','Proyek_model','Bahaya_model','Bagian_model','Sumber_model'));
        
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
            'active_header' => 'identifikasi',
            'proyek_data' => $proyek_data
        );
        $this->template->display('identifikasi/identifikasi_list', $data);
    }
    public function evaluasi()
    {
        $proyek_data=$this->Proyek_model->get_all();
        $data = array(
            'title'     => 'Daftar Proyek ',
            'active'    => '',
            'active_header' => 'eval',
            'proyek_data' => $proyek_data
        );
        $this->template->display('identifikasi/evaluasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Identifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_proyek' => $row->id_proyek,
		'id_sumber' => $row->id_sumber,
		'likelihood' => $row->likelihood,
		'severity' => $row->severity,
	    );
            $this->template->display('identifikasi/identifikasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('identifikasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('identifikasi/create_action'),
	    'id' => set_value('id'),
	    'id_proyek' => set_value('id_proyek'),
	    'id_sumber' => set_value('id_sumber'),
	    'likelihood' => set_value('likelihood'),
	    'severity' => set_value('severity'),
	);
        $this->template->display('identifikasi/identifikasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_proyek' => $this->input->post('id_proyek',TRUE),
		'id_sumber' => $this->input->post('id_sumber',TRUE),
		'likelihood' => $this->input->post('likelihood',TRUE),
		'severity' => $this->input->post('severity',TRUE),
	    );

            $this->Identifikasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('identifikasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Idnetifikasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('identifikasi/update_action'),
		'id' => set_value('id', $row->id_proyek),
		'id_proyek' => set_value('id_proyek', $row->id_proyek),
		'id_sumber' => set_value('id_sumber', $row->id_sumber),
		'likelihood' => set_value('likelihood', $row->likelihood),
		'severity' => set_value('severity', $row->severity),
	    );
            $this->template->display('identifikasi/identifikasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('identifikasi'));
        }
    }

    function parameter($id){
        $row = $this->Proyek_model->get_by_id($id);
        $bagian=$this->Bagian_model->get_all();
        $count_bagian= count($bagian);
        $sumber=$this->Sumber_model->get_all();
        $count_sumber=count($sumber);
        $bahaya=$this->Bahaya_model->get_all();
        $count_bahaya=count($bahaya);

        $data=array(
            'title'     => 'Daftar Parameter Bahaya',
            'active'    => '',
            'active_header' => 'identifikasi',
            'proyek' => $row,
            'bagian' => $bagian,
            'sumber' => $sumber,
            'bahaya' => $bahaya,
        );
        
        $this->template->display('identifikasi/parameter',$data);
    }
    
    function parameter_simpan(){
        $bahaya=$this->Bahaya_model->get_all();
        $count_bahaya=count($bahaya);

        for ($i=0; $i <= $count_bahaya ; $i++) { 
            
           if($this->input->post('B'.$i) != null){ $data=array(
                'id_proyek' => $this->input->post('id_proyek'),
                'id_bahaya' => $this->input->post('B'.$i),
            );
            $this->Identifikasi_model->insert($data);}
        };
        $this->session->set_flashdata('message', 'Data Berhasil Disimpan');
        redirect(site_url('identifikasi'));
    }

    function penilaian($id){
        $row = $this->Proyek_model->get_by_id($id);
        $bagian=$this->Bagian_model->get_all();
        $count_bagian= count($bagian);
        $sumber=$this->Sumber_model->get_all();
        $count_sumber=count($sumber);
        $bahaya=$this->Bahaya_model->get_all();
        $bahaya_pilih=$this->Identifikasi_model->get_by_proyek($id)->result();
        $count_bahaya=count($bahaya);

        $data=array(
            'title'     => 'Penilaian Parameter Bahaya',
            'active'    => '',
            'active_header' => 'identifikasi',
            'bahaya_pilih' => $bahaya_pilih,
            'bagian' => $bagian,
            'id_proyek' => $id,
        );
        $this->template->display('identifikasi/penilaian',$data);
    }

    function penilaian_action(){
        $bahaya=$this->Bahaya_model->get_all();
        $count_bahaya=count($bahaya);
        $no=1;
        $cek_pos= (count($this->input->post())-1) /3;
        for ($i=1; $i <= $cek_pos ; $i++) { 
            $data=array(
                'likelihood' => $this->input->post('li'.$i),
                'severity' => $this->input->post('se'.$i)
            );
            $this->Identifikasi_model->update($this->input->post('id'.$i),$data);
            
        }
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('identifikasi'));
    }

    function eval_action(){
        $bahaya=$this->Bahaya_model->get_all();
        $count_bahaya=count($bahaya);
        $no=1;
       echo $cek_pos= (count($this->input->post())-1)/2;
        for ($i=1; $i <= $cek_pos ; $i++) { 
            $data=array(
                'pengendalian' => $this->input->post('ev'.$i)
            );
            $this->Identifikasi_model->update($this->input->post('id'.$i),$data);
            print_r($data);
        }
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('identifikasi/evaluasi'));
    }

    

    function hasil($id){
        $row = $this->Proyek_model->get_by_id($id);
        $bagian=$this->Bagian_model->get_all();
        $count_bagian= count($bagian);
        $sumber=$this->Sumber_model->get_all();
        $count_sumber=count($sumber);
        $bahaya=$this->Bahaya_model->get_all();
        $bahaya_pilih=$this->Identifikasi_model->get_by_proyek($id)->result();
        $count_bahaya=count($bahaya);

        $data=array(
            'title'     => 'Penilaian Parameter Bahaya',
            'active'    => '',
            'active_header' => 'identifikasi',
            'bahaya_pilih' => $bahaya_pilih,
            'bagian' => $bagian,
            'id_proyek' => $id,
        );
        $this->template->display('identifikasi/hasil',$data);
    }

    function eval_proyek($id){
        $row = $this->Proyek_model->get_by_id($id);
        $bagian=$this->Bagian_model->get_all();
        $count_bagian= count($bagian);
        $sumber=$this->Sumber_model->get_all();
        $count_sumber=count($sumber);
        $bahaya=$this->Bahaya_model->get_all();
        $bahaya_pilih=$this->Identifikasi_model->get_by_proyek($id)->result();
        $count_bahaya=count($bahaya);

        $data=array(
            'title'     => 'Penilaian Parameter Bahaya',
            'active'    => '',
            'active_header' => 'identifikasi',
            'bahaya_pilih' => $bahaya_pilih,
            'bagian' => $bagian,
            'id_proyek' => $id,
        );
        $this->template->display('identifikasi/eval_form',$data);
    }

    function hslEval_proyek($id){
        $row = $this->Proyek_model->get_by_id($id);
        $bagian=$this->Bagian_model->get_all();
        $count_bagian= count($bagian);
        $sumber=$this->Sumber_model->get_all();
        $count_sumber=count($sumber);
        $bahaya=$this->Bahaya_model->get_all();
        $bahaya_pilih=$this->Identifikasi_model->get_by_proyek($id)->result();
        $count_bahaya=count($bahaya);

        $data=array(
            'title'     => 'Penilaian Parameter Bahaya',
            'active'    => '',
            'active_header' => 'eval',
            'bahaya_pilih' => $bahaya_pilih,
            'bagian' => $bagian,
            'id_proyek' => $id,
        );
        $this->template->display('identifikasi/hasil_eval_form',$data);
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_proyek' => $this->input->post('id_proyek',TRUE),
		'id_sumber' => $this->input->post('id_sumber',TRUE),
		'likelihood' => $this->input->post('likelihood',TRUE),
		'severity' => $this->input->post('severity',TRUE),
	    );

            $this->Identifikasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('identifikasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Identifikasi_model->get_by_id($id);

        if ($row) {
            $this->Identifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('identifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('identifikasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_proyek', 'id proyek', 'trim|required');
	$this->form_validation->set_rules('id_sumber', 'id sumber', 'trim|required');
	$this->form_validation->set_rules('likelihood', 'likelihood', 'trim|required');
	$this->form_validation->set_rules('severity', 'severity', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Identifikasi.php */
/* Location: ./application/controllers/Identifikasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-22 14:07:31 */
/* http://harviacode.com */