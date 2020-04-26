<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Pakan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Setoran_model','Pos_model','Sadur_model','SimpanPinjam_model','ModelAnggota','Pakan_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    function index(){
        $data_anggota=$this->SimpanPinjam_model->get_all_peternak()->result();
        $data=array(
            'title' => 'Pakan Peternak',
            'active_header' => 'pakan',
            'active'        => '',
            'data_anggota'  => $data_anggota,
        );
        $this->template->display('pakan/anggota_list',$data);
    }

    function ambil_pakan($id_anggota){
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $pakan= $this->Pakan_model->pakan_bulanan($id_anggota)->result();
        $bayar=$this->Pakan_model->pakan_bayar($id_anggota)->result();
        $data=array(
            'title' => 'Peternak Ambil Pakan',
            'active_header' => 'pakan',
            'active'        => '',
            'show'          => 'hist_ambil',
            'jn_form'       =>'form_pakai',
            'action'        => site_url('pakan/ambil_pakan_action'),
            'identitas'     => $identitas,
            'pakan'         => $pakan,
            'bayar'         => $bayar,
        );
        $this->template->display('pakan/tambahPakan_form',$data);
    }
    function bayar_pakan($id_anggota){
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $pakan= $this->Pakan_model->pakan_bulanan($id_anggota)->result();
        $bayar=$this->Pakan_model->pakan_bayar($id_anggota)->result();
        $data=array(
            'title' => 'Peternak Ambil Pakan',
            'active_header' => 'pakan',
            'active'        => '',
            'show'          => 'hist_bayar',
            'jn_form'       =>'form_pakai',
            'action'        => site_url('pakan/ambil_pakan_action'),
            'identitas'     => $identitas,
            'pakan'         => $pakan,
            'bayar'         => $bayar,
        );
        $this->template->display('pakan/tambahPakan_form',$data);
    }

    function ambil_pakan_action(){
        $harga_aktif=$this->Pakan_model->harga_aktif('katul')->row();
        $data=array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'jml_pakan'     => $this->input->post('jml_pakan'),
            'tgl_pakan'     => date('yy-m-d'),
            'hrg_jml_pakan' => $harga_aktif->nominal_harga * $this->input->post('jml_pakan'),
        );
        $this->Pakan_model->insert_pakan($data);
        $this->session->set_flashdata('message','Pencatatan Berhasil');
        redirect(site_url("pakan/ambil_pakan/".$data['id_anggota']));
    }

    function edit_pakai($id){
        $data_sp=$this->Pakan_model->getOne_pakai($id);
        $identitas=$this->ModelAnggota->get_by_id($data_sp->id_anggota)->row();
        $pakan= $this->Pakan_model->pakan_bulanan($data_sp->id_anggota)->result();
        $bayar=$this->Pakan_model->pakan_bayar($data_sp->id_anggota)->result();
        $data=array(
            'title' => 'Pinjaman Peternak',
            'active_header' =>'pakan',
            'active'        =>'',
            'show'          =>'ambil',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('pakan/editPakai_action'),
            'id_pakan'         => $id,
            'id_anggota'    => $data_sp->id_anggota,
            'jml_pakan'      => $data_sp->jml_pakan,
            'identitas'     => $identitas,
            'pakan'         => $pakan,
            'bayar'         => $bayar,
        );
        $this->template->display('pakan/tambahPakan_form',$data);
    }

    function editPakai_action(){
        $harga_aktif=$this->Pakan_model->harga_aktif('katul')->row();
        if(isset($_POST)){
            $data=array(
            'id_pakan'         => $this->input->post('id_pakan'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'jml_pakan'      => $this->input->post('jml_pakan'),
            'hrg_jml_pakan' => $harga_aktif->nominal_harga * $this->input->post('jml_pakan'),
            );
            $this->Pakan_model->update_pakai($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("pakan/ambil_pakan/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("simpan_pinjam"));
        }
    }

    function delete_pakai($data,$id){
		
		if (!null==$data) {
			$row=$this->Pakan_model->delete_pakai($data);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('pakan/ambil_pakan/'.$id));
        } else {
            $this->session->set_flashdata('message', 'Record User Found');
            redirect(site_url('user'));
        }
    }
    
    function edit_bayar($id){
        $data_byr=$this->Pakan_model->getOne_bayar($id);
        $identitas=$this->ModelAnggota->get_by_id($data_byr->id_anggota)->row();
        $pakan= $this->Pakan_model->pakan_bulanan($data_byr->id_anggota)->result();
        $bayar=$this->Pakan_model->pakan_bayar($data_byr->id_anggota)->result();
        $data=array(
            'title' => 'Pinjaman Peternak',
            'active_header' =>'pakan',
            'active'        =>'',
            'show'          =>'ambil',
            'jn_form'       => 'form_bayar',
            'action'        => site_url('pakan/editBayar_action'),
            'id_byr_pkn'    => $id,
            'id_anggota'    => $data_byr->id_anggota,
            'nominal_byr'   => $data_byr->nominal_byr,
            'identitas'     => $identitas,
            'pakan'         => $pakan,
            'bayar'         => $bayar,
        );
        $this->template->display('pakan/tambahPakan_form',$data);
    }

    function editBayar_action(){
        $harga_aktif=$this->Pakan_model->harga_aktif('katul')->row();
        if(isset($_POST)){
            $data=array(
            'id_byr_pkn'         => $this->input->post('id_byr_pkn'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'nominal_byr'      => $this->input->post('nominal_byr'),
            );
            $this->Pakan_model->update_bayar($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("pakan/bayar_pakan/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("pakan"));
        }
    }

    function delete_Bayar($data,$id){
		
		if (!null==$data) {
			$row=$this->Pakan_model->delete_bayar($data);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url('pakan/bayar_pakan/'.$id));
        } else {
            $this->session->set_flashdata('message', 'Record User Found');
            redirect(site_url('user'));
        }
	}
}