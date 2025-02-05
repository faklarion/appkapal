<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pembaruan_model extends CI_Model
{

    public $table = 'tbl_pembaruan';
    public $id = 'id_pembaruan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat');
        return $this->db->get($this->table)->result();
    }

    function get_all_by_kapal($id)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat');
        $this->db->where('tbl_pembaruan.id_sertifikat', $id);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat');
        return $this->db->get($this->table)->row();
    }

    function get_by_id_sertifikat($id)
    {
        $this->db->where('tbl_pembaruan.id_sertifikat', $id);
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat');
        return $this->db->get($this->table)->row();
    }

    function get_all_by_id_sertifikat($id)
    {
        $this->db->where('tbl_pembaruan.id_sertifikat', $id);
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.id_sertifikat = tbl_pembaruan.id_sertifikat');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pembaruan', $q);
	$this->db->or_like('id_sertifikat', $q);
	$this->db->or_like('tempat_pembaruan', $q);
	$this->db->or_like('tanda_pembaruan', $q);
	$this->db->or_like('tanggal_pembaruan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pembaruan', $q);
	$this->db->or_like('id_sertifikat', $q);
	$this->db->or_like('tempat_pembaruan', $q);
	$this->db->or_like('tanda_pembaruan', $q);
	$this->db->or_like('tanggal_pembaruan', $q);
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

}

/* End of file Tbl_pembaruan_model.php */
/* Location: ./application/models/Tbl_pembaruan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2025-01-24 07:45:20 */
/* http://harviacode.com */