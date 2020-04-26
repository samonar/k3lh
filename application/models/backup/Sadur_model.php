<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Sadur_model extends CI_Model
{
    public $table = 'stk_pakan';
    public $id = 'id_stk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all(){
        return $this->db->get('bahan_baku');
    }

    function get_by_id($id){
        $this->db->where('id_bhn_baku',$id);
        return $this->db->get($this->table);
    }

    function get_stok($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table);
    }

    function sum_stok($id){
        $sql="SELECT
        Sum(stk_pakan.stk_masuk) as stok_lama
        FROM
        stk_pakan
        INNER JOIN bahan_baku ON stk_pakan.id_bhn_baku = bahan_baku.id_bahan
        WHERE
        id_bhn_baku=$id and
        MONTH(tgl) <> MONTH(NOW())
        GROUP BY
        bahan_baku.nama_bahan        
        ";
        return $this->db->query($sql);
    }

    function sum_stok_baru($id){
        $sql="SELECT
        Sum(stk_pakan.stk_masuk) as stok_baru
        FROM
        stk_pakan
        INNER JOIN bahan_baku ON stk_pakan.id_bhn_baku = bahan_baku.id_bahan
        WHERE
        id_bhn_baku=$id and
        MONTH(tgl) = MONTH(NOW())
        GROUP BY
        bahan_baku.nama_bahan        
        ";
        return $this->db->query($sql);
    }

    function sum_pakai_baru($id){
        $sql="SELECT
        Sum(stk_pakan.jml_pakai) as pakai_baru
        FROM
        stk_pakan
        INNER JOIN bahan_baku ON stk_pakan.id_bhn_baku = bahan_baku.id_bahan
        WHERE
        id_bhn_baku=$id and
        MONTH(tgl) = MONTH(NOW())
        GROUP BY
        bahan_baku.nama_bahan        
        ";
        return $this->db->query($sql);
    }

    function sum_pakai_lama($id){
        $sql="SELECT
        Sum(stk_pakan.jml_pakai) as pakai_lama
        FROM
        stk_pakan
        INNER JOIN bahan_baku ON stk_pakan.id_bhn_baku = bahan_baku.id_bahan
        WHERE
        id_bhn_baku=$id and
        MONTH(tgl) <> MONTH(NOW())
        GROUP BY
        bahan_baku.nama_bahan        
        ";
        return $this->db->query($sql);
    }
    

    function list_bb(){
        $this->db->order_by('nama_bahan', 'ASC');
        return $this->db->get('bahan_baku');
    }

    function insert_bb($data){
        $this->db->insert('bahan_baku',$data);
    }

    function create_stok($data){
        $this->db->insert($this->table,$data);
    }

    function create_pakaiSadur($data){
        $this->db->insert($this->table,$data);
    }


    function get_bb_byId($id_bb){
        $this->db->where('id_bahan',$id_bb);
        return $this->db->get('bahan_baku');   
    }

    function update_stkPakan($id,$data){
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_bb($id,$data){
        $this->db->where('id_bahan', $id);
        $this->db->update('bahan_baku', $data);
    }

    function get_historiPakan($bln){
       $sql="SELECT
       stk_pakan.id_stk,
       bahan_baku.nama_bahan,
       stk_pakan.stk_masuk,
       stk_pakan.jml_pakai,
       stk_pakan.tgl
       FROM
       stk_pakan
       INNER JOIN bahan_baku ON stk_pakan.id_bhn_baku = bahan_baku.id_bahan
       WHERE
       MONTH(tgl) = $bln";
       return $this->db->query($sql);
    }
}
?>