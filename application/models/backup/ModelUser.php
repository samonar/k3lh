<?php
defined("BASEPATH") or exit ("Error 404");

class ModelUser extends CI_Model
{
	public $table = 'user';

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getOne($username)
	{
		return $this->db->get_where($this->table, ['username' => $username])->row();
	}

	public function regis($userbaru)
	{
		return $this->db->insert($this->table, $userbaru);
	}
}
?>