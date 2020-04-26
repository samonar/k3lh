<?php
defined("BASEPATH") or exit ("Error 404");

class ModelAnggota extends CI_Model
{
	private $table = 'anggota';

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getOne($user)
	{
		return $this->db->get_where($this->table,['username' => $user])->row();
	}

	public function getData($id_anggota)
	{
		return $this->db->get_where($this->table,['id_anggota' => $id_anggota])->row();	
	}

	public function dataAnggota($id_anggota)
	{
		return $this->db->get_where($this->table,['id_anggota' => $id_anggota])->row();	
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}

	function create_saldo($data){
		$this->db->insert('saldo',$data);
	}
	public function update($data)
	{
		$this->db->where(['id_anggota' => $data['id_anggota']]);
		$this->db->update($this->table, $data);
	}

	public function delete($id_anggota)
	{
		return $this->db->delete($this->table, ['id_anggota' => $id_anggota]);
	}
	public function delete_saldo($id_anggota)
	{
		return $this->db->delete('saldo', ['id_anggota' => $id_anggota]);
	}

	//munir
	function get_by_id($id){
		$this->db->select('anggota.id_anggota,anggota.nama,anggota.pos,pos.nm_pos');
		$this->db->join('pos','anggota.pos=pos.id_pos');
		$this->db->where('id_anggota',$id);
		return $this->db->get($this->table);
	}

	
}
?>