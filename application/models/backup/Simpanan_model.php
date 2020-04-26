<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Simpanan_model extends CI_Model
{

    public $table = 'simpanan';
    public $id = 'id_simpanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function insert_simpanan($data){
        $this->db->insert($this->table,$data);
    }

    function harga_aktif($jns){
        $this->db->where('jns_harga',$jns);
        $this->db->where('status',1);
        return $this->db->get('harga');
    }

    public function getOne_simpanan($id)
	{
        $this->db->where($this->id,$id);
        return $this->db->get($this->table);
    }
    public function getOne_bayar($id_byr)
	{
		return $this->db->get_where('pakan_bayar', ['id_byr_pkn' => $id_byr])->row();
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update_simpanan($data)
	{
		$this->db->where($this->id,$data['id_simpanan']);
		return $this->db->update($this->table, $data);
    }
    public function update_bayar($data)
	{
		$this->db->where(['id_byr_pkn' => $data['id_byr_pkn']]);
		return $this->db->update('pakan_bayar', $data);
	}

	public function delete_simpanan($id)
	{
		return $this->db->delete($this->table, ['id_simpanan' => $id]);
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

    function get_simpanan_byId($id){
		$this->db->where('id_anggota',$id);
		$this->db->order_by('tgl','DESC');
		return $this->db->get($this->table);
	}
}?>