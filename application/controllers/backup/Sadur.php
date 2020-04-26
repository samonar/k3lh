<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Sadur extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Setoran_model','Pos_model','Sadur_model'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    function index(){
        $data_bahan_baku=$this->Sadur_model->get_all()->result();
       
       

        foreach ($data_bahan_baku as $data) {
            $data_stok_pakan[$data->id_bahan]= $this->Sadur_model->sum_stok($data->id_bahan)->row();
            $data_stok_baru[$data->id_bahan]= $this->Sadur_model->sum_stok_baru($data->id_bahan)->row();
            $data_pakai_lama[$data->id_bahan]= $this->Sadur_model->sum_pakai_lama($data->id_bahan)->row();
            $data_pakai_baru[$data->id_bahan]= $this->Sadur_model->sum_pakai_baru($data->id_bahan)->row();
        }
        $data=array(
            'title' => 'Unit Makanan Ternak',
            'active_header' => 'sadur',
            'active'    => 'sadur',
            'bahan_baku'    => $data_bahan_baku,
            'stok_lama' => $data_stok_pakan,
            'stok_baru' => $data_stok_baru,
            'pakai_lama'    =>$data_pakai_lama,
            'pakai_baru'    => $data_pakai_baru,
        );
        $this->template->display('sadur/stok_terbaru',$data);
    }

    function bahan_baku(){
        $list_bb=$this->Sadur_model->list_bb()->result();

        $data = array(
            'title'     => 'Daftar Bahan Baku',
            'active_header' => 'sadur',
            'active'    => 'bahan_baku',
            'bahan_baku' => $list_bb,
            
        );

        $this->template->display('sadur/bahan_baku_list',$data);
    }

    function create_bahan(){
        $data= array (
            'title'     => 'Tambah Bahan Baku',
            'action'    => site_url('sadur/create_bb_action'),
            'active_header' => 'sadur',
            'active'    => 'bahan_baku',
            'id_bahan' => set_value('id_bahan'),
            'nama_bahan'=> set_value('nama'),
            'harga_bahan'=> set_value('harga'),
        );
        $this->template->display('sadur/bahan_baku_form',$data);
    }

    function create_bb_action(){
        $data= array(
            'nama_bahan'    => $this->input->post('nama_bahan'),
            'harga_bahan'   => $this->input->post('harga_bahan'),
        );
        
        $this->Sadur_model->insert_bb($data);
        $this->session->set_flashdata('mesage','Perubahan Berhasil');
        redirect(site_url('sadur/bahan_baku'));
    }

    function update_bb($id_bb){
        $data_bb=$this->Sadur_model->get_bb_byId($id_bb)->row();
        $data= array (
            'title'     => 'Ubah Bahan Baku',
            'action'     => site_url('sadur/update_bb_action'),
            'active'    => 'setoran',
            'active_header' => '',
            'id_bahan' => $data_bb->id_bahan,
            'nama_bahan'=> $data_bb->nama_bahan,
            'harga_bahan'=> $data_bb->harga_bahan,
        );
        $this->template->display('sadur/bahan_baku_form',$data);
    }

    function update_bb_action(){
        $data= array(
            'nama_bahan'    => $this->input->post('nama_bahan'),
            'harga_bahan'   => $this->input->post('harga_bahan'),
        );
        $this->Sadur_model->update_bb($this->input->post('id_bahan'),$data);
        $this->session->set_flashdata('mesage','Perubahan Berhasil');
        redirect(site_url('sadur/bahan_baku'));
    }

    function setok_baru(){
        $data_bahan_baku=$this->Sadur_model->get_all()->result();
        $data=array(
            'title' => 'Tambah Setok Pakan',
            'active_header' => 'sadur',
            'active'    => 'sadur',
            'action'    => site_url('sadur/create_setok_baru_action'),
            'button'    => 'sadur',
            'id_stk'    => set_value('id_stk'),
            'id_bhn_baku' => set_value('id_bhn_baku'),
            'stk_masuk' => set_value('stk_masuk'),
            'data_bb'   => $data_bahan_baku,
            
        );
        $this->template->display('sadur/tambah_stok_form',$data);
    }

    function create_setok_baru_action(){
        $data= array(
            'id_bhn_baku'   =>$this->input->post('id_bhn_baku'),
            'stk_masuk'     =>$this->input->post('stk_masuk'),
            'tgl'           => date('y-m-d'),
        );
        $this->Sadur_model->create_stok($data);
        $this->session->set_flashdata('mesage','Tambah Setok Pakan Berhasil');
        redirect(site_url('sadur'));
    }

    function pakai_sadur(){
        $data_bahan_baku=$this->Sadur_model->get_all()->result();
        $data=array(
            'title' => 'Pakai Sadur Pakan',
            'active_header' => 'sadur',
            'active'    => 'sadur',
            'action'    => site_url('sadur/create_pakaiSadur_action'),
            'button'    => 'sadur',
            'id_stk'    => set_value('id_stk'),
            'id_bhn_baku' => set_value('id_bhn_baku'),
            'jml_pakai' => set_value('stk_masuk'),
            'data_bb'   => $data_bahan_baku,
            
        );
        $this->template->display('sadur/tambah_pakaiSadur_form',$data);
    }
    
    function create_pakaiSadur_action(){
        $data= array(
            'id_bhn_baku'   =>$this->input->post('id_bhn_baku'),
            'jml_pakai'     =>$this->input->post('jml_pakai'),
            'tgl'           => date('y-m-d'),
        );
        $this->Sadur_model->create_pakaiSadur($data);
        $this->session->set_flashdata('mesage','Tambah Setok Pakan Berhasil');
        redirect(site_url('sadur'));
    }

    function histori(){
        if (isset($_POST['histori'])) {
            echo "oke";
        }else {
            $data_historiPakan=$this->Sadur_model->get_historiPakan(date('m'))->result();
        }
        $data=array(
            'title' => 'Histori Unit Pakan',
            'active_header' => 'sadur',
            'active'    => 'histori',
            'data_pakan'    => $data_historiPakan,

        );
        $this->template->display('sadur/histori_list',$data);
    }

    function editPakai($id){
        $data_pakan=$this->Sadur_model->get_stok($id)->row();
        $data_bahan_baku=$this->Sadur_model->get_all()->result();
        $data=array(
            'title' => 'Tambah Setok Pakan',
            'action'    => site_url('sadur/editPakai_action'),
            'active_header' => 'sadur',
            'active'    => 'histori',
            'button'    => 'sadur/histori',
            'id_stk'    => $data_pakan->id_stk,
            'id_bhn_baku' => $data_pakan->id_bhn_baku,
            'jml_pakai' => $data_pakan->jml_pakai,
            'data_bb'   => $data_bahan_baku,
            
        );
        $this->template->display('sadur/tambah_pakaiSadur_form',$data);
    }
    
    function editPakai_action(){
        $data= array(
            'id_bhn_baku'   =>$this->input->post('id_bhn_baku'),
            'jml_pakai'     =>$this->input->post('jml_pakai'),
        );
        $this->Sadur_model->update_stkPakan($this->input->post('id_stk'),$data);
        $this->session->set_flashdata('mesage','Ubah Pakan Berhasil');
        redirect(site_url('sadur/histori'));
    }

    function editMasuk($id){
        $data_pakan=$this->Sadur_model->get_stok($id)->row();
        $data_bahan_baku=$this->Sadur_model->get_all()->result();
        $data=array(
            'title' => 'Tambah Setok Pakan',
            'action'    => site_url('sadur/editMasuk_action'),
            'active_header' => 'sadur',
            'active'    => 'histori',
            'button'    => 'sadur/histori',
            'id_stk'    => $data_pakan->id_stk,
            'id_bhn_baku' => $data_pakan->id_bhn_baku,
            'stk_masuk' => $data_pakan->stk_masuk,
            'data_bb'   => $data_bahan_baku,
            
        );
        $this->template->display('sadur/tambah_stok_form',$data);
    }
    
    function editMasuk_action(){
        $data= array(
            'id_bhn_baku'   =>$this->input->post('id_bhn_baku'),
            'stk_masuk'     =>$this->input->post('stk_masuk'),
        );
        $this->Sadur_model->update_stkPakan($this->input->post('id_stk'),$data);
        $this->session->set_flashdata('mesage','Ubah Pakan Berhasil');
        redirect(site_url('sadur/histori'));
    }
}
?>