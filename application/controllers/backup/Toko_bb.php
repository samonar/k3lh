<?php
defined("BASEPATH") or exit ("Error cannot reach your request");

class Toko extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('modelToko');
        $this->load->model('modelAnggota');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url','file'));
        /*$cek=$this->session->userdata('nama');
        if($session_jabatan!='admin'){
            redirect(site_url('login'));
        }*/

    }

    public function index()
    {
    	$model = $this->modelToko->getAll();
        $data_anggota=$this->SimpanPinjam_model->get_all_peternak()->result();
        $data = array(
            'title'     => 'Utang Peternak',
            'active'    => 'setoran',
            'active_header' => '',
            'model' => $model,
            'data_anggota'  =>$data_anggota,
        );
    	
    	return $this->template->display('toko/index', $data);
    }

    public function view($id_toko)
    {
    	$model['model'] = $this->modelToko->getOne($id_toko);
    	return $this->load->view('toko/view', $model);
    }

    public function create()
    {
    	$anggota['anggota'] = $this->modelAnggota->getAll();
    	return $this->load->view('toko/create', $anggota);
    }

    public function input()
    {
    	$id_anggota = $this->input->post('id_anggota');
    	$jml_tagihan = $this->input->post('jml_tagihan');
    	//echo $this->input->post('id_anggota');

    	$data = array('id_anggota' => $id_anggota,
    		'jml_tagihan' => $jml_tagihan,
    	);

    	$this->modelToko->save($data, 'toko');
    	redirect('toko/index');
    }

    public function edit($id_toko)
    {
    	$data['toko'] = $this->modelToko->getOne($id_toko);
    	$data['anggota'] = $this->modelAnggota->getAll();
    	return $this->load->view('toko/edit', $data);
    }

    public function update()
    {
        $id_toko = $this->input->post('id_toko');
        $id_anggota = $this->input->post('id_anggota');
        $jml_tagihan = $this->input->post('jml_tagihan');

        $data = array('id_anggota' => $id_anggota, 'jml_tagihan' => $jml_tagihan);

        $this->modelToko->update($data, $id_toko);
        redirect('toko/index');

    }

    public function delete($id_toko=null)
    {
    	if(!isset($id_toko))
    	{
    		show_404();
    	}

    	if($this->modelToko->delete($id_toko))
    	{
    		redirect('toko/index');
    	}
    }
}
?>
