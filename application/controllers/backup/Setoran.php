<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Setoran_model','Pos_model','ModelAnggota'));
        $this->load->library(array('form_validation','upload','image_lib','template','session'));
        $this->load->helper(array('form', 'url', 'html'));
        if(empty($this->session->userdata('id_user'))){
            redirect('user');
        }
    }

    public function index()
    {
        $setoran = $this->Pos_model->get_setoran_pos();
        $data = array(
            'title'     => 'Setoran Susu',
            'setoran_data' => $setoran,
            'active'    => 'setoran',
            'active_header' => '',
        );
        $this->template->display('setoran/setoran_list1', $data);
    }

    function bar(){
        $thn_ini=date('Y');
         $thn_lalu=date('Y')-1;
        for ($i=1 ; $i <=12; $i++) { 
            $query_this=$this->Setoran_model->setoran_byYear($thn_ini,$i)->row();
            $query_last=$this->Setoran_model->setoran_byYear($thn_lalu,$i)->row();
            if (isset($query_this->jumlah)) {
                $data_this[]=$query_this->jumlah;
            } else {
                $data_this[]=0;
            }

            if (isset($query_last->jumlah)) {
                $data_last[]=$query_last->jumlah;
                
            } else {
                $data_last[]=0;
            }
        }

		$data = array(
			'action' => site_url('absensi/finish_action'),
			'title'    	 => 'Grafik Setoran Susu',
			'active'    => 'bar',
            'active_header' => 'grafik',
            'data1' => $data_this,
            'data2'=> $data_last,
        );
        
		$this->template->display('setoran/bar',$data);
    }
    
    function ts(){
        $thn_ini=date('Y');
         $thn_lalu=date('Y')-1;
        for ($i=1 ; $i <=12; $i++) { 
            $query_this=$this->Setoran_model->ts_byYear($thn_ini,$i)->row();
            $query_last=$this->Setoran_model->ts_byYear($thn_lalu,$i)->row();
            if (isset($query_this->jumlah)) {
                $data_this[]=$query_this->jumlah;
            } else {
                $data_this[]=0;
            }

            if (isset($query_last->jumlah)) {
                $data_last[]=$query_last->jumlah;
                
            } else {
                $data_last[]=0;
            }
        }

		$data = array(
			'action' => site_url('absensi/finish_action'),
			'title'    	 => 'Grafik Setoran Susu',
			'active'    => 'ts',
            'active_header' => 'grafik',
            'data1' => $data_this,
            'data2'=> $data_last,
        );
        $this->template->display('setoran/line',$data);
	}

    public function anggota_pos($id_pos){
        $anggota_pos=$this->Pos_model->get_anggota_pos($id_pos);
        $data = array(
            'title'             => 'Anggota Pos',
            'list_anggota_pos'  =>  $anggota_pos,
            'active'    => 'setoran',
            'active_header' => '',
        );
        $this->template->display('setoran/anggota_pos_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Setoran_model->setoran_sesi1($id);
        $row2 = $this->Setoran_model->setoran_sesi2($id);
        if (isset($row)) {
            $data = array(
            'title'     => 'Setoran Anggota',
            'active'    => 'setoran',
            'active_header' => '',
            'sesi1'      => $row,
            'sesi2'      => $row2,
            'id_anggota'    => $id,
            // 'tot_data'  => count($row),
	    );
            $this->template->display('setoran/setoran_read_cpy', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            
        }
    }

    public function create($id) 
    {
        $identitas=$this->ModelAnggota->get_by_id($id)->row();
        $row = $this->Setoran_model->setoran_sesi1($id);
        $row2 = $this->Setoran_model->setoran_sesi2($id);
        $data = array(
        'button' => 'Create',
        'action' => site_url('setoran/create_action_2'),
        'title'         => 'Tambah Setoran',
        'active'    => 'setoran',
        'active_header' => '',
	    'id_setoran'    => set_value('id_setoran'),
	    'id_anggota' => $id,
        'tgl' => set_value('tgl'),
        'identitas'     => $identitas,
        'sesi1' => $row,
        'sesi2' => $row2,
        'jml_setoran' => set_value('jml_setoran'),
        
	);
        $this->template->display('setoran/setoran_form_copy', $data);
    }
    
    public function create_action($id) 
    {
        
        if ($_POST==!null) {
            $hit=count($_POST);
            for ($i=1; $i <= $hit  ; $i++) { 
                $setor_pagi=$this->input->post($i.'P',TRUE);
                $setor_sore=$this->input->post($i.'S',TRUE);
                $kalender= CAL_GREGORIAN;
                $bulan= date('m');
                $tahun= date('Y');
                $hari=$i;
                $date=$tahun.'-'.$bulan.'-'.$hari;
                if (isset($setor_pagi)) {
                    $data = array(
                        'id_anggota'    => $id,
                        'tgl'           => $date,
                        'sesi'          => 1,
                        'jml_setoran'   => $setor_pagi,
                    );
                    $this->Setoran_model->insert($data);
                }
                if (isset($setor_sore)) {
                    $data = array(
                        'id_anggota'    => $id,
                        'tgl'           => $date,
                        'sesi'          => 2,
                        'jml_setoran'   => $setor_sore,
                    );
                    $this->Setoran_model->insert($data);
                }
                
            }
        } else {
            
        }
        $this->session->set_flashdata('message', 'Input Data Sukses');
        redirect(site_url('setoran/read/'.$id));
    }

    public function create_action_2($id) 
    {
        
        if ($_POST==!null) {
            $hit=count($_POST);
            for ($i=1; $i <= 31  ; $i++) { 
            $setor_pagi=$this->input->post($i.'P',TRUE);
            $setor_sore=$this->input->post($i.'S',TRUE);
                if (isset($setor_pagi) and isset($setor_sore)) {
                    $pagi=str_replace(',','.',$setor_pagi);
                    $sore=str_replace(',','.',$setor_sore);
                break;
                }
            }
            $kalender= CAL_GREGORIAN;
            $bulan= date('m');
            $tahun= date('Y');
            $hari=$i;
            $date=$tahun.'-'.$bulan.'-'.$hari;
            if (isset($pagi)) {
                $data = array(
                    'id_anggota'    => $id,
                    'tgl'           => $date,
                    'sesi'          => 1,
                    'jml_setoran'   => $pagi,
                );
                $cek_update=$this->Setoran_model->cek_update($id,$date,1)->row();
                if(isset($cek_update)){
                    $this->Setoran_model->update($cek_update->id_setoran,$data);
                }else{$this->Setoran_model->insert($data);}
            }
            if (isset($sore)) {
                $data = array(
                    'id_anggota'    => $id,
                    'tgl'           => $date,
                    'sesi'          => 2,
                    'jml_setoran'   => $sore,
                );
                $cek_update=$this->Setoran_model->cek_update($id,$date,2)->row();
                if(isset($cek_update)){
                    $this->Setoran_model->update($cek_update->id_setoran,$data);
                }else{$this->Setoran_model->insert($data);}

            }
            
        } else {
            
        }
        $this->session->set_flashdata('message', 'Input Data Sukses');
        redirect(site_url('setoran/create/'.$id));
    }
    
    public function update($id) 
    {
        $identitas=$this->ModelAnggota->get_by_id($id)->row();
        $row = $this->Setoran_model->setoran_sesi1($id);
        $row2 = $this->Setoran_model->setoran_sesi2($id);
        if (isset($row)) {
            $data = array(
            'title'         => 'Setoran Anggota',
            'active'        => 'setoran',
            'active_header' => '',
            'identitas'     => $identitas,
            'sesi1'         => $row,
            'sesi2'         => $row2,
            'id_anggota'    => $id,
            'action'        => site_url('setoran/update_action'),
	    );
            $this->template->display('setoran/update_setoran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            
        }
    }
    
    public function update_action($id) 
    {
        if ($_POST==!null) {
            echo $hit=count($_POST);
            for ($i=1; $i <= $hit  ; $i++) { 
                echo $setor_pagi=$this->input->post($i.'P',TRUE);
                echo $setor_sore=$this->input->post($i.'S',TRUE);
                $kalender= CAL_GREGORIAN;
                $bulan= date('m');
                $tahun= date('Y');
                $hari=$i;
                $date=$tahun.'-'.$bulan.'-'.$hari;
                if ($setor_pagi==!null ) {
                    $data = array(
                        'id_anggota'    => $id,
                        'tgl'           => $date,
                        'sesi'          => 1,
                        'jml_setoran'   => $setor_pagi,
                    );
                    // $this->Setoran_model->insert($data);
                }
                if ($setor_sore==!null) {
                    $data = array(
                        'id_anggota'    => $id,
                        'tgl'           => $date,
                        'sesi'          => 2,
                        'jml_setoran'   => $setor_pagi,
                    );
                    // $this->Setoran_model->insert($data);
                }
                
            }
        } else {
            
        }
    }

    public function edit($id1,$id2){
        
        $row_pagi = $this->Setoran_model->get_id($id1)->row();
        $row_sore = $this->Setoran_model->get_id($id2)->row();
        $identitas=$this->ModelAnggota->get_by_id($row_pagi->id_anggota)->row();
        $data= array(
            'title'         => 'Edit Setoran',
            'active'        => 'setoran',
            'active_header' => '',
            'identitas'     => $identitas,
            'id_anggota'    => $row_pagi->id_anggota,
            'id_setoran1'   => set_value('id_setoran1',$row_pagi->id_setoran),
            'id_setoran2'   => set_value('id_setoran2',$row_sore->id_setoran),
            'set_pagi'   => set_value('set_pagi',$row_pagi->jml_setoran),
            'set_sore'   => set_value('set_pagi',$row_sore->jml_setoran),
        );
        $this->template->display('setoran/setoran_edit', $data);
    }

    function edit_action(){
        
        $id_pagi=$this->input->post('id_setoran1',TRUE);
        $id_sore=$this->input->post('id_setoran2',TRUE);
        $data_pagi = array(
            'jml_setoran'   => $this->input->post('set_pagi',TRUE),
        );
        $data_sore = array(
            'jml_setoran'   => $this->input->post('set_sore',TRUE),
        );

        $this->Setoran_model->update($id_pagi,$data_pagi);
        $this->Setoran_model->update($id_sore,$data_sore);
        $this->session->set_flashdata('message', 'Ubah Data Sukses');
        redirect(site_url('setoran/update/'.$this->input->post('id_anggota')));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Setoran_model->get_by_id($id);

        if ($row) {
            $this->Setoran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('setoran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('setoran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "setoran.xls";
        $judul = "setoran";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Anggota");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Sesi");
	xlsWriteLabel($tablehead, $kolomhead++, "Jml Setoran");

	foreach ($this->Setoran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_anggota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sesi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jml_setoran);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Setoran.php */
/* Location: ./application/controllers/Setoran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-28 08:54:46 */
/* http://harviacode.com */