<?php
defined("BASEPATH") or exit ("Error cannot reach your request");

class StokPakan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelStokpakan');
		$this->load->library('form_validation');
		$this->load->helper(array('form','url','file'));
		if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
	}
	
	public function index()
	{
		$model['title'] = 'Stok pakan';
		$model['model'] = $this->modelStokpakan->getAll();

		return $this->load->view('stok-pakan/index', $model);
	}

	public function view($id_stk)
	{
		$model['title'] = 'Detail Stok pakan';
		$model['model']  = $this->modelStokpakan->getOne($id_stk);
		return $this->load->view('stok-pakan/view', $model);
	}

	public function create()
	{
		$model['title'] = 'Tambah Stok pakan';
		return $this->load->view('stok-pakan/create', $model);
	}

	public function input()
	{
		$tgl = $this->input->post('tgl');
		$b_baku = $this->input->post('b_baku');
		$stk_lama = $this->input->post('stk_lama');
		$hrg_stk_lama = $this->input->post('hrg_stk_lama');
		$stk_baru = $this->input->post('stk_baru');
		$hrg_stk_baru = $this->input->post('hrg_stk_baru');
		$jml_pakai = $this->input->post('jml_pakai');
		$hrg_pakai = $this->input->post('hrg_pakai');

		$data = array('tgl' => $tgl,'b_baku' => $b_baku, 'stk_lama' => $stk_lama, 'hrg_stk_lama' => $hrg_stk_lama, 'stk_baru' => $stk_baru, 'hrg_stk_baru' => $hrg_stk_baru, 'jml_pakai' => $jml_pakai, 'hrg_pakai' => $hrg_pakai);

		$this->modelStokpakan->save($data);
		redirect('StokPakan/index');
	}

	public function edit($id_stk)
	{
		$model['title'] = 'Ubah Stok pakan';
		$model['model'] = $this->modelStokpakan->getOne($id_stk);
		return $this->load->view('stok-pakan/edit', $model);
	}

	public function update()
	{
		$id_stk = $this->input->post('id_stk');
		$tgl = $this->input->post('tgl');
		$b_baku = $this->input->post('b_baku');
		$stk_lama = $this->input->post('stk_lama');
		$hrg_stk_lama = $this->input->post('hrg_stk_lama');
		$stk_baru = $this->input->post('stk_baru');
		$hrg_stk_baru = $this->input->post('hrg_stk_baru');
		$jml_pakai = $this->input->post('jml_pakai');
		$hrg_pakai = $this->input->post('hrg_pakai');

		$data = array('id_stk'=> $id_stk,'tgl' => $tgl , 'b_baku' => $b_baku, 'stk_lama' => $stk_lama, 'hrg_stk_lama' => $hrg_stk_lama, 'stk_baru' => $stk_baru, 'hrg_stk_baru' => $hrg_stk_baru, 'jml_pakai' => $jml_pakai, 'hrg_pakai' => $hrg_pakai);

		$this->modelStokpakan->update($data);
		redirect('stokPakan/index');
	}

	public function delete($id_stk)
	{
		$this->modelStokpakan->delete($id_stk);
		redirect('stokPakan/index');
	}

	public function searchbymonth()
	{
		return $this->load->view('stok-pakan/searchbymonth');
	}

	public function cari()
	{
		$bulan = $this->input->post('tgl');
		$model['title'] = 'Hasil Cari Bulanan';
		$model['model'] = $this->modelStokpakan->cari($bulan);
		$this->load->view('stok-pakan/hasilcari', $model);
	}
}
?>