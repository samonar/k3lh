<?php
defined("BASEPATH") or exit ("Error 404");

class Sp_model extends CI_Model
{
	private $table = 'sp';

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getOne($id_sp)
	{
		return $this->db->get_where($this->table, ['id_sp' => $id_sp])->row();
	}

	public function getOne_angsuran($id_ssp)
	{
		return $this->db->get_where('skema_sp', ['id_ssp' => $id_ssp])->row();
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data)
	{
		$this->db->where(['id_sp' => $data['id_sp']]);
		return $this->db->update($this->table, $data);
	}

	public function delete($id_sp)
	{
		return $this->db->delete($this->table, ['id_sp' => $id_sp]);
	}

	//munir
	function get_sp_byId($id){
		$this->db->where('id_anggota',$id);
		$this->db->order_by('tgl_sp','DESC');
		return $this->db->get($this->table);
	}

	function get_sp_byIdAktf($id){
		$this->db->where('id_anggota',$id);
		$this->db->where('sp_aktif',1);
		return $this->db->get($this->table);
	}

	function update_aktif($id,$data){
		$this->db->where('id_anggota',$id);
		$this->db->update($this->table, $data);
	}

}
?>