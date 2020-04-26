<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';

    
    
    function cek_login($where){		
    return $this->db->get_where($this->table,$where);
    }
    
    function cek_login_perusahaan($table,$where){		
      return $this->db->get_where($table,$where);
      }	
    
  //fungsi uplaod gambar
    function upload($data){
      $this->db->insert('tb_artikel',$data);
    }

    public function get_all(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table);
    }

    //cek sesion user
    public function cek_sesion($id_user,$bagian)
    {
        $this->db->where($this->id,$id_user);
        $this->db->where('bagian',$bagian);
        return $this->db->get($this->table)->row();
    }

    //get by username dan password
    public function check_user_account($username,$password)
    {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get();
    }

    function cek_sesion_admin($username)
    {
		$this->db->select('*');
		$this->db->from('t_admin');
		$this->db->where('id_user',$username);
    $this->db->where('status','admin');
		return $this->db->get();
    }
    
    function cek_admin($username,$password){
		$this->db->select('*');
		// $this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
    $this->db->where('jabatan','admin TU');
		return $this->db->get($this->table);
	}

}
?>