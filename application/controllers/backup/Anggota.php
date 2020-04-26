<?php
defined("BASEPATH") or exit ("Error, Cannot Handle Yor Request");

class Anggota extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('modelAnggota','modelToko','Setoran_model','Pos_model','Sadur_model','SimpanPinjam_model','ModelAnggota','Pakan_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
		$this->load->helper(array('form', 'url', 'html'));
		if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
	}

	public function index()
	{
		$data_anggota=$this->SimpanPinjam_model->get_all_peternak()->result();
		$data=array(
			'title' => 'Dafta Peternak',
            'active_header' => 'anggota',
			'active'        => '',
			'data_anggota'			=> $data_anggota,
		);
		$this->template->display('anggota/index', $data);
	}

	public function view($id_anggota)
	{
		$model['title'] = 'Detail Anggota';
		$model['anggota'] = $this->modelAnggota->dataAnggota($id_anggota);
		$model['kredit'] = $this->modelToko->kreditAnggota($id_anggota);
		$model['debit'] = $this->modelToko->debitAnggota($id_anggota);
		$this->template->display('anggota/view', $model);
	}

	public function create()
	{
		$pos=$this->Pos_model->get_all();
		$data=array(
			'title' => 'Tambah Peternak',
            'active_header' => 'anggota',
			'active'        => '',
			'action'		=> site_url('anggota/input'),
			'pos'			=> $pos,
		);
		$this->template->display('anggota/create', $data);
	}

	public function input()
	{
		if($_POST['id_anggota']==!null){
			$id_anggota = $this->input->post('id_anggota');
			$nama = $this->input->post('nama');
			$pos = $this->input->post('id_pos');
			$jns_anggota = $this->input->post('jns_anggota');
			$sapi_perah = $this->input->post('sapi_perah');
			$sapi_kering = $this->input->post('sapi_kering');
			$sapi_pedet = $this->input->post('sapi_pedet');
			$username = $this->input->post('id_anggota');
			$password = $this->input->post('id_anggota');

			$data = array(
				'id_anggota' => $id_anggota,
				'nama' => $nama, 
				'pos' => $pos, 
				'jns_anggota' => $jns_anggota, 
				'sapi_perah' => $sapi_perah, 
				'sapi_kering' => $sapi_kering, 
				'sapi_pedet' => $sapi_pedet, 
				'username' => $username, 
				'password' => $password
			);
			$data1=array(
				'id_anggota'=>$id_anggota,
				'jn_saldo'=>1,
			);
			$data2=array(
				'id_anggota'=>$id_anggota,
				'jn_saldo'=>2,
			);
			$this->modelAnggota->create_saldo($data1);
			$this->modelAnggota->create_saldo($data2);
			$this->modelAnggota->save($data);
			$this->session->set_flashdata('mesage','Tambah Peternak Berhasil');
        	redirect(site_url('anggota/index'));
		}else{
			$this->session->set_flashdata('allert','Perubahan Berhasil');
        	redirect(site_url('anggota/index'));
		}

	}

	public function edit($id_anggota)
	{
		
		$anggota= $this->modelAnggota->getData($id_anggota);
		$pos=$this->Pos_model->get_all();
		$data=array(
			'title' => 'Tambah Peternak',
            'active_header' => 'anggota',
			'active'        => '',
			'action'		=> site_url('anggota/update'),
			'pos'			=> $pos,
			'anggota'		=> $anggota,
		);
		$this->template->display('anggota/create', $data);
	}

	public function update()
	{
		$id_anggota = $this->input->post('id_anggota');
		$nama = $this->input->post('nama');
		$pos = $this->input->post('id_pos');
		$jns_anggota = $this->input->post('jns_anggota');
		$sapi_perah = $this->input->post('sapi_perah');
		$sapi_kering = $this->input->post('sapi_kering');
		$sapi_pedet = $this->input->post('sapi_pedet');
		
		$data = array(
			'id_anggota' => $id_anggota, 
			'nama' => $nama, 
			'pos' => $pos, 
			'jns_anggota' => $jns_anggota, 
			'sapi_perah' => $sapi_perah, 
			'sapi_kering' => $sapi_kering, 
			'sapi_pedet' => $sapi_pedet, 
		);
		print_r($data);
		$this->modelAnggota->update($data);
		$this->session->set_flashdata('message', 'Ubah Data Berhasil');
		redirect('anggota/index');
	}

	public function delete($id_anggota)
	{
		$this->modelAnggota->delete($id_anggota);
		$this->modelAnggota->delete_saldo($id_anggota);
		$this->session->set_flashdata('message', 'Hapus Data Berhasil');
		redirect('anggota/index');
	}
}

?>