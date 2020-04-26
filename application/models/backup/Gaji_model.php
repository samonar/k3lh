<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Gaji_model extends CI_Model{
    public $table='gaji';
    public $id='id_gaji';
    public $order='DESC';

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function get_by_idAnggota($id_anggota)
    {
        $this->db->join('anggota','gaji.id_anggota = anggota.id_anggota');
        $this->db->where('gaji.id_anggota', $id_anggota);
        $this->db->Order_by('bulan',$this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
