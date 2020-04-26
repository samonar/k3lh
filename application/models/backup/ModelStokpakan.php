<?php
defined("BASEPATH") or exit ("Error 404");

class ModelStokpakan extends CI_Model
{
	private $table = 'stk_pakan';

	public $tgl;
	public $b_baku;
	public $stk_lama;
	public $hrg_stk_lama;
	public $stk_baru;
	public $hrg_stk_baru;
	public $jml_pakai;
	public $hrg_pakai; 

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getOne($id_stk)
	{
		return $this->db->get_where($this->table, ['id_stk' => $id_stk])->row();
	}

	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data)
	{
		$this->db->where(['id_stk' => $data['id_stk']]);
		return $this->db->update($this->table, $data);
	}

	public function delete($id_stk)
	{
		return $this->db->delete($this->table, ['id_stk' => $id_stk]);
	}

	public function cari($bulan)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->like('tgl', $bulan);
		return $query = $this->db->get()->result();
	}
}
?>