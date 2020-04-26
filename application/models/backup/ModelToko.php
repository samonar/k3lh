<?php
defined("BASEPATH")  or exit ("Error 404");

class ModelToko extends CI_Model
{
	private $table = 'toko';

	public $id_anggota;
	public $jml_tagihan;

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getOne($id_toko)
	{
		return $this->db->get_where($this->table,['id_toko' => $id_toko])->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($data, $id_toko)
	{
		$this->db->where(['id_toko' => $id_toko]);
		return $this->db->update($this->table, $data);
	}

	public function delete($id_toko)
	{
		return $this->db->delete($this->table, ['id_toko' => $id_toko]);
	}
	public function kreditAnggota($id_anggota)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_anggota', $id_anggota);
		$this->db->where('jenis', 'K');
		return $query = $this->db->get()->result();
	}

	public function debitAnggota($id_anggota)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_anggota', $id_anggota);
		$this->db->where('jenis', 'D');
		return $query = $this->db->get()->result();
	}
	//munir
	function get_utangToko_byId($id){
		$this->db->where('id_anggota',$id);
		$this->db->order_by('tgl','DESC');
		return $this->db->get($this->table);
	}

}

?>