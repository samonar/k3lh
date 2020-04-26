<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setoran_model extends CI_Model
{

    public $table = 'setoran';
    public $id = 'id_setoran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id_anggota)
    {
        $this->db->select('*');
        $this->db->join('anggota','setoran.id_anggota = anggota.id_anggota');
        $this->db->join('pos','anggota.pos = pos.id_pos');
        $this->db->order_by('setoran.tgl', 'ASC');
        $this->db->where('anggota.id_anggota', $id_anggota);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table);
    }

    function get_by_id2($id_anggota)
    {
        $sql="Select
        *
        From
            (Select
                anggota.id_anggota,
                 kud.anggota.nama,
                 kud.setoran.sesi ,
                 kud.setoran.jml_setoran ,
                 kud.setoran.tgl
             From
                 kud.setoran Inner Join
                 kud.anggota On kud.anggota.id_anggota = kud.setoran.id_anggota Inner Join
                 kud.pos On kud.pos.id_pos = kud.anggota.pos
             Where
                 kud.setoran.sesi = 1) As t1,
            (Select
                 kud.anggota.nama,
                 kud.setoran.sesi as sesi1,
                 kud.setoran.jml_setoran as setoran1,
                 kud.setoran.tgl
             From
                 kud.setoran Inner Join
                 kud.anggota On kud.anggota.id_anggota = kud.setoran.id_anggota Inner Join
                 kud.pos On kud.pos.id_pos = kud.anggota.pos
             Where
                 kud.setoran.sesi = 2) As t2
                 Where t1.tgl=t2.tgl and t1.nama=t2.nama and t1.id_anggota=$id_anggota 
                 and month(t1.tgl)= month(now())
            Order By
                 t1.tgl";
        return $this->db->query($sql)->result();
        
    }


    function setoran_sesi1($id_anggota){
    $sql="Select
        anggota.id_anggota,
        kud.anggota.nama,
        kud.setoran.id_setoran ,
        kud.setoran.sesi ,
        kud.setoran.jml_setoran ,
        kud.setoran.tgl
    From
        kud.setoran Inner Join
        kud.anggota On kud.anggota.id_anggota = kud.setoran.id_anggota Inner Join
        kud.pos On kud.pos.id_pos = kud.anggota.pos
    Where
        kud.setoran.sesi = 1 
        and anggota.id_anggota=$id_anggota
        and month(setoran.tgl)= month(now())
    Order By
        setoran.tgl";
         return $this->db->query($sql)->result();
    }

    function setoran_sesi2($id_anggota){
        $sql="Select
        anggota.id_anggota,
         kud.anggota.nama,
         kud.setoran.sesi ,
         kud.setoran.id_setoran ,
         kud.setoran.jml_setoran ,
         kud.setoran.tgl
     From
         kud.setoran Inner Join
         kud.anggota On kud.anggota.id_anggota = kud.setoran.id_anggota Inner Join
         kud.pos On kud.pos.id_pos = kud.anggota.pos
     Where
         kud.setoran.sesi = 2 
         and anggota.id_anggota=$id_anggota
         and month(setoran.tgl  )= month(now())
    Order By
        setoran.tgl";
         return $this->db->query($sql)->result();
    }

    function get_Setoran_byId($id,$bln){
        $sql="SELECT *
        FROM
        setoran
        WHERE
        MONTH(tgl) = $bln AND setoran.id_anggota=$id
        and YEAR(tgl) = YEAR(NOW())
        ORDER BY
        setoran.tgl ASC
        ";
        return $this->db->query($sql);
    }

    function get_Setoran_byId2($id){
        $sql="SELECT *
        FROM
        setoran
        WHERE
        MONTH(tgl) = month(now()) AND setoran.id_anggota=$id
        ORDER BY
        setoran.tgl ASC
        ";
        return $this->db->query($sql);
    }

    function setoran_bulan_tertentu($id,$bln,$thn){
        $sql="SELECT *
        FROM
        setoran
        WHERE
        $thn=YEAR(setoran.tgl) and
        $bln=month(setoran.tgl) and
        $id=id_anggota
        ";
        return $this->db->query($sql);
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_setoran', $q);
	$this->db->or_like('id_anggota', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('sesi', $q);
	$this->db->or_like('jml_setoran', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_setoran', $q);
	$this->db->or_like('id_anggota', $q);
	$this->db->or_like('tgl', $q);
	$this->db->or_like('sesi', $q);
	$this->db->or_like('jml_setoran', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //setoran susu tahunan
    function setoran_byYear($thn,$bln){
        $sql="SELECT
        SUM(setoran.jml_setoran) as jumlah
        FROM
        setoran
        WHERE
        $thn=YEAR(setoran.tgl) and
        $bln=month(setoran.tgl)";
        return $this->db->query($sql);
    }

    // ts tahunan
    function ts_byYear($thn,$bln){
        $sql="SELECT
        SUM(ts.kadar) as jumlah
        FROM
        ts
        WHERE
        $thn=YEAR(ts.tgl_ts) and
        $bln=month(ts.tgl_ts)";
        return $this->db->query($sql);
    }

    function cek_update($id,$tgl,$sesi){
        $this->db->where('id_anggota',$id);
        $this->db->where('tgl',$tgl);
        $this->db->where('sesi',$sesi);
        return $this->db->get($this->table);
    }

}

