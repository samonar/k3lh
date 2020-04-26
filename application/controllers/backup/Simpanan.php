<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Simpanan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Setoran_model','Simpanan_model','Sadur_model','SimpanPinjam_model','ModelAnggota','Simpanan_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    function index(){
        $data_anggota=$this->SimpanPinjam_model->get_all_peternak()->result();
        $data=array(
            'title' => 'Simpanan Peternak',
            'active_header' => 'simpanan',
            'active'        => '',
            'data_anggota'  => $data_anggota,
        );
        $this->template->display('simpanan/anggota_list',$data);
    }

     function hist_simpanan_wjb($id_anggota){
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $simpanan= $this->Simpanan_model->get_simpanan_byId($id_anggota)->result();
        $data=array(
            'title' => 'Histori Simpanan Peternak',
            'active_header' => 'simpanan',
            'active'        => '',
            'show'          => 'hist_wjb',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('simpanan/ambil_wajib_action'),
            'action2'        => site_url('simpanan/ambil_sukarela_action'),
            'identitas'     => $identitas,
            'simpanan'      => $simpanan,
        );
        $this->template->display('simpanan/simpanan_view',$data);
    }
    

    function edit_simpanan_wjb($id){
        $data=$this->Simpanan_model->getOne_simpanan($id)->row();
        $identitas=$this->ModelAnggota->get_by_id($data->id_anggota)->row();
        $simpanan= $this->Simpanan_model->get_simpanan_byId($data->id_anggota)->result();
        $data=array(
            'title' => 'Histori Simpanan Peternak',
            'active_header' =>'simpanan',
            'active'        =>'',
            'show'          =>'ubah',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('simpanan/simpananWjb_action'),
            'action2'        => site_url('simpanan/ambil_sukarela_action'),
            'id_simpanan'   => $id,
            'id_anggota'    => $data->id_anggota,
            'nominal'       => $data->nominal,
            'identitas'     => $identitas,
            'simpanan'      => $simpanan,
        );
        $this->template->display('simpanan/simpanan_view',$data);
    }

    function simpananWjb_action(){
        if(isset($_POST)){
            $data=array(
            'id_simpanan'   => $this->input->post('id_simpanan'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'nominal'       => $this->input->post('nominal'),
            );
            $this->Simpanan_model->update_simpanan($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("simpanan/hist_simpanan_wjb/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('alert','Pencatatan Gagal');
            redirect(site_url("simpanan"));
        }
    }

    function delete_simpanan($data,$id){
		
		if (!null==$data) {
			$row=$this->Simpanan_model->delete_simpanan($data);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url("simpanan/hist_simpanan_wjb/".$id));
        } else {
            $this->session->set_flashdata('message', 'Record User Found');
            redirect(site_url('user'));
        }
    }
    
    function hist_simpanan_skr($id_anggota){
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $simpanan= $this->Simpanan_model->get_simpanan_byId($id_anggota)->result();
        $data=array(
            'title' => 'Histori Simpanan Peternak',
            'active_header' => 'simpanan',
            'active'        => '',
            'show'          => 'hist_bayar',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('simpanan/ambil_wajib_action'),
            'action2'        => site_url('simpanan/ambil_sukarela_action'),
            'identitas'     => $identitas,
            'simpanan'      => $simpanan,
        );
        $this->template->display('simpanan/simpanan_view',$data);
    }
    

    function edit_simpanan_skr($id){
        $data=$this->Simpanan_model->getOne_simpanan($id)->row();
        $identitas=$this->ModelAnggota->get_by_id($data->id_anggota)->row();
        $simpanan= $this->Simpanan_model->get_simpanan_byId($data->id_anggota)->result();
        $data=array(
            'title' => 'Histori Simpanan Peternak',
            'active_header' =>'simpanan',
            'active'        =>'',
            'show'          =>'ubah',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('simpanan/simpananSkr_action'),
            'action2'        => site_url('simpanan/ambil_sukarela_action'),
            'id_simpanan'   => $id,
            'id_anggota'    => $data->id_anggota,
            'nominal'       => $data->nominal,
            'identitas'     => $identitas,
            'simpanan'      => $simpanan,
        );
        $this->template->display('simpanan/simpanan_view',$data);
    }

    function simpananSkr_action(){
        if(isset($_POST)){
            $data=array(
            'id_simpanan'   => $this->input->post('id_simpanan'),
            'id_anggota'    => $this->input->post('id_anggota'),
            'nominal'       => $this->input->post('nominal'),
            );
            $this->Simpanan_model->update_simpanan($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("simpanan/hist_simpanan_skr/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('alert','Pencatatan Gagal');
            redirect(site_url("simpanan"));
        }
    }

    function delete_simpananSkr($data,$id){
		
		if (!null==$data) {
			$row=$this->Simpanan_model->delete_simpanan($data);
            $this->session->set_flashdata('message', 'Hapus Data Berhasil');
            redirect(site_url("simpanan/hist_simpanan_skr/".$id));
        } else {
            $this->session->set_flashdata('message', 'Record User Found');
            redirect(site_url('user'));
        }
    }

    function ambil_wajib($id_anggota){
        $identitas=$this->ModelAnggota->get_by_id($id_anggota)->row();
        $simpanan= $this->Simpanan_model->get_simpanan_byId($id_anggota)->result();
        $data=array(
            'title' => 'Histori Simpanan Peternak',
            'active_header' => 'simpanan',
            'active'        => '',
            'show'          => 'ambil_bayar',
            'jn_form'       => 'form_pakai',
            'action'        => site_url('simpanan/ambil_wajib_action'),
            'identitas'     => $identitas,
            'simpanan'      => $simpanan,
        );
        $this->template->display('simpanan/simpanan_view',$data);
    }

    function ambil_wajib_action($id){
        if(isset($_POST)){
            $data=array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nominal'       => $this->input->post('nominal'),
            'jenis'         => '1',
            'tgl'           => date('Y-m-d'),
            'ket'           => 'K',
            );
            $this->Simpanan_model->save($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("simpanan/hist_simpanan_wjb/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('alert','Pencatatan Gagal');
            redirect(site_url("simpanan"));
        }
    }

    function ambil_sukarela_action($id){
        if(isset($_POST)){
            $data=array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'nominal'       => $this->input->post('nominal'),
            'jenis'         => '2',
            'tgl'           => date('Y-m-d'),
            'ket'           => 'K',
            );
            $this->Simpanan_model->save($data);
            $this->session->set_flashdata('message','Pencatatan Berhasil');
            redirect(site_url("simpanan/hist_simpanan_skr/".$data['id_anggota']));
        }else {
            $this->session->set_flashdata('alert','Pencatatan Gagal');
            redirect(site_url("simpanan"));
        }
    }
}