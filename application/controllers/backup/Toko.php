<?php
defined("BASEPATH") or exit ("Error cannot reach your request");

class Toko extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model(array('ModelToko','Setoran_model','Pos_model','SimpanPinjam_model','ModelAnggota'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    public function index()
    {
        $model = $this->ModelToko->getAll();
        $data_anggota=$this->SimpanPinjam_model->get_all_peternak()->result();
        $data = array(
            'title'     => 'Utang Peternak',
            'active'    => '',
            'active_header' => 'toko',
            'model' => $model,
            'data_anggota'  =>$data_anggota,
        );
    	
    	return $this->template->display('toko/index', $data);
    }

    public function view($id_anggota)
    {
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $data_toko=$this->ModelToko->get_utangToko_byId($id_anggota)->result();
        $data = array(
            'title'     => 'Toko',
            'active'    => '',
            'active_header' => 'toko',
            'show'          => 'hist_utangToko',
            'jn_form'       =>'form_pakai',
            'action'        => site_url('toko/input'),
            'identitas'     => $identitas,
            'data_toko'     => $data_toko,
        );
    	$this->template->display('toko/utangToko_form', $data);
    }

    public function view_bayar($id_anggota)
    {
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $data_toko=$this->ModelToko->get_utangToko_byId($id_anggota)->result();
        $data = array(
            'title'     => 'Toko',
            'active'    => '',
            'active_header' => 'toko',
            'show'          => 'hist_bayarToko',
            'jn_form'       =>'form_pakai',
            'action'        => site_url('toko/input'),
            'identitas'     => $identitas,
            'data_toko'     => $data_toko,
        );
    	$this->template->display('toko/utangToko_form', $data);
    }

    public function input()
    {
    	$id_anggota = $this->input->post('id_anggota');
        $jml_tagihan = $this->input->post('jml_tagihan');
        
    	
    	$data = array(
            'id_anggota' => $id_anggota,
            'jml_tagihan' => $jml_tagihan,
            'tgl'        => date('Y-m-d'),
            'jenis'      => 'K',
    	);
        $this->ModelToko->save($data);
        $this->session->set_flashdata('message','Pencatatan Berhasil');
    	redirect(site_url('toko/view/'.$id_anggota));
    }

    public function edit_utang($id_toko)
    {
        $toko=$this->ModelToko->getOne($id_toko);
    	$identitas=$this->ModelAnggota->get_by_id($toko->id_anggota)->row();
        $data_toko=$this->ModelToko->get_utangToko_byId($toko->id_anggota)->result();
        $data = array(
            'title'     => 'Toko',
            'active'    => '',
            'active_header' => 'toko',
            'show'          => 'utangToko',
            'jn_form'       =>'form_utang',
            'action'        => site_url('toko/update_utang'),
            'id_toko'       => $id_toko,
            'id_anggota'    => $toko->id_anggota,
            'jml_tagihan'   => $toko->jml_tagihan,
            'tgl'           => $toko->tgl,
            'jenis'         => $toko->jenis,
            'identitas'     => $identitas,
            'data_toko'     => $data_toko,
        );
    	return $this->template->display('toko/utangToko_form', $data);
    }

    public function update_utang()
    {
        $id_toko = $this->input->post('id_toko');
        $id_anggota = $this->input->post('id_anggota');
        $jml_tagihan = $this->input->post('jml_tagihan');

        $data = array(
            'jml_tagihan' => $jml_tagihan);

        $this->ModelToko->update($data, $id_toko);
        $this->session->set_flashdata('message','Pencatatan Berhasil');
        redirect('toko/view/'.$id_anggota);

    }

    public function delete_utang($id_toko,$id_anggota)
    {
    	if(!isset($id_toko))
    	{
    		show_404();
    	}

    	if($this->ModelToko->delete($id_toko))
    	{
            $this->session->set_flashdata('message','Hapus Data Berhasil');
    		redirect('toko/view/'.$id_anggota);
    	}
    }

    public function edit_bayar($id_toko)
    {
        $toko=$this->ModelToko->getOne($id_toko);
    	$identitas=$this->ModelAnggota->get_by_id($toko->id_anggota)->row();
        $data_toko=$this->ModelToko->get_utangToko_byId($toko->id_anggota)->result();
        $data = array(
            'title'     => 'Toko',
            'active'    => '',
            'active_header' => 'toko',
            'show'          => 'utangToko',
            'jn_form'       =>'form_bayar',
            'action'        => site_url('toko/update_bayar'),
            'id_toko'       => $id_toko,
            'id_anggota'    => $toko->id_anggota,
            'jml_tagihan'   => $toko->jml_tagihan,
            'tgl'           => $toko->tgl,
            'jenis'         => $toko->jenis,
            'identitas'     => $identitas,
            'data_toko'     => $data_toko,
        );
    	$this->template->display('toko/utangToko_form', $data);
    }

    public function update_bayar()
    {
        $id_toko = $this->input->post('id_toko');
        $id_anggota = $this->input->post('id_anggota');
        $jml_tagihan = $this->input->post('jml_tagihan');

        $data = array(
            'jml_tagihan' => $jml_tagihan);

        $this->ModelToko->update($data, $id_toko);
        $this->session->set_flashdata('message','Pencatatan Berhasil');
        redirect('toko/view_bayar/'.$id_anggota);

    }

    public function delete_bayar($id_toko,$id_anggota)
    {
    	if(!isset($id_toko))
    	{
    		show_404();
    	}

    	if($this->ModelToko->delete($id_toko))
    	{
            $this->session->set_flashdata('message','Hapus Data Berhasil');
    		redirect('toko/view_bayar/'.$id_anggota);
    	}
    }
}
?>
