<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Pakan_model extends CI_Model
{

    public $table = 'pakan_pakai';
    public $id = 'id_pakan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function insert_pakan($data){
        $this->db->insert($this->table,$data);
    }

    function harga_aktif($jns){
        $this->db->where('jns_harga',$jns);
        $this->db->where('status',1);
        return $this->db->get('harga');
    }

    public function getOne_pakai($id_sp)
	{
		return $this->db->get_where($this->table, ['id_pakan' => $id_sp])->row();
    }
    public function getOne_bayar($id_byr)
	{
		return $this->db->get_where('pakan_bayar', ['id_byr_pkn' => $id_byr])->row();
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
    }
    function insert_bayar($data){
        $this->db->insert('pakan_bayar',$data);
    }

	public function update_pakai($data)
	{
		$this->db->where(['id_pakan' => $data['id_pakan']]);
		return $this->db->update($this->table, $data);
    }
    public function update_bayar($data)
	{
		$this->db->where(['id_byr_pkn' => $data['id_byr_pkn']]);
		return $this->db->update('pakan_bayar', $data);
	}

	public function delete_pakai($id)
	{
		return $this->db->delete($this->table, ['id_pakan' => $id]);
    }
    public function delete_bayar($id)
	{
		return $this->db->delete('pakan_bayar', ['id_byr_pkn' => $id]);
	}

    function pakan_bulanan($id){
        $sql="SELECT *
        FROM
        pakan_pakai
        INNER JOIN anggota ON pakan_pakai.id_anggota = anggota.id_anggota
        WHERE
        pakan_pakai.id_anggota = $id
        ORDER BY
        pakan_pakai.tgl_pakan DESC,
        pakan_pakai.id_pakan DESC";
        return $this->db->query($sql);
    }

    
    function pakan_bayar($id){
        $sql="SELECT
        *
        FROM
        pakan_bayar
        WHERE
        pakan_bayar.id_anggota = $id
        ORDER BY
        pakan_bayar.id_byr_pkn DESC,
        pakan_bayar.tgl_byr_pkn DESC";
        return $this->db->query($sql);
    }
}?>