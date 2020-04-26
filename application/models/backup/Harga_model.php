<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Harga_model extends CI_Model
{

    public $table = 'harga';
    public $id = 'id_ssp';
    public $order = 'DESC';

    function harga_aktif($jenis){
        $this->db->where('jns_harga',$jenis);
        $this->db->where('status',1);
        return $this->db->get($this->table);
    }

    function get_all(){
        return $this->db->get($this->table)->result();
    }

    function update_susu($id,$nom){
        $this->db->where('id_harga',$id);
		$this->db->update($this->table, $nom);
    }
    function update_katul($id,$nom){
        $this->db->where('id_harga',$id);
		$this->db->update($this->table, $nom);
    }
}