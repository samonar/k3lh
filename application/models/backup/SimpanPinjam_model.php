<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SimpanPinjam_model extends CI_Model
{

    public $table = 'skema_sp';
    public $id = 'id_ssp';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_peternak(){
        $this->db->join('pos','anggota.pos=pos.id_pos');
        return $this->db->get('anggota');
    }

    function get_bayar_byId($id){
        $this->db->where('id_anggota',$id);
        $this->db->order_by('tgl_ssp',$this->order);
        return $this->db->get($this->table);
    }
    
    function get_bayar_byIdSp($id){
        $this->db->where('id_sp',$id);
        $this->db->order_by('tgl_ssp',$this->order);
        return $this->db->get($this->table);
    }

    function get_bayarAktf_byId($id_anggota,$id_sp){
        $this->db->join('sp','skema_sp.id_sp=sp.id_sp');
        $this->db->where('sp.id_anggota',$id_anggota);
        $this->db->where('sp.id_sp',$id_sp);
        $this->db->where('sp_aktif','1');
        $this->db->order_by('tgl_ssp',$this->order);
        return $this->db->get($this->table);
    }

    public function update($data)
	{
		$this->db->where(['id_ssp' => $data['id_ssp']]);
		return $this->db->update($this->table, $data);
    }
    
    public function delete($id_ssp)
	{
		return $this->db->delete($this->table, ['id_ssp' => $id_ssp]);
    }
    
    function insert($data){
        $this->db->insert($this->table,$data);
    }
}
?>