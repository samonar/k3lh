<?php
defined("BASEPATH") or exit ("Error cannot handle your request");

class Sp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelSp');
		$this->load->model('modelAnggota');
		$this->load->helper(array('form', 'url', 'file'));
		if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
	}

	public function index()
	{
		$model['title'] = 'Simpan Pinjam';
		$model['model'] = $this->modelSp->getAll();
		return $this->load->view('sp/index', $model);
	}

	public function view($id_sp)
	{
		$model['model'] = $this->modelSp->getOne($id_sp);
		return $this->load->view('sp/view', $model);
	}

	public function create()
	{
		$model['title'] = 'Tambah SP';
		$model['anggota'] = $this->modelAnggota->getAll();
		return $this->load->view('sp/create', $model);
	}

	public function input()
	{
		$id_anggota = $this->input->post('id_anggota');
		$tgl = $this->input->post('tgl');
		$angsuran = $this->input->post('angsuran');
		$nominal = $this->input->post('nominal');

		$data = array('id_anggota' => $id_anggota, 'tgl' => $tgl, 'angsuran' => $angsuran, 'nominal' => $nominal);

		$this->modelSp->save($data);
		redirect('sp/index');
	}

	public function edit($id_sp)
	{
		$model['title'] = 'Ubah SP';
		$model['anggota'] = $this->modelAnggota->getAll();
		$model['model'] = $this->modelSp->getOne($id_sp);

		return $this->load->view('sp/edit', $model);
	}

	public function update()
	{
		$id_sp = $this->input->post('id_sp');
		$id_anggota = $this->input->post('id_anggota');
		$tgl = $this->input->post('tgl');
		$angsuran = $this->input->post('angsuran');
		$nominal = $this->input->post('nominal');

		$data = array('id_sp' => $id_sp,'id_anggota' => $id_anggota, 'tgl' => $tgl, 'angsuran' => $angsuran, 'nominal' => $nominal);

		$this->modelSp->update($data);
		redirect('sp/index');
	}

	public function delete($id_sp)
	{
		$this->modelSp->delete($id_sp);
		redirect('sp/index');
	}
}
?>