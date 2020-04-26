<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keswan_model extends CI_Model{

    public $table = 'keswan';
    public $id = 'id';
    public $order = 'DESC';

    function get_keswan_byId($id){
        $this->db->where('id_anggota',$id);
        return $this->db->get($this->table);
    }
    function insert($data){
        $this->db->insert($this->table,$data);
    }
}

