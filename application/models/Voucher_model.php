<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher_model extends CI_Model
{

    public $table = 'voucher';
    public $id = 'id';
    public $order = 'DESC';
	public $voucher = 'voucher';

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
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	// get data by voucher
    function get_by_voucher($voucher)
    {
        $this->db->where($this->voucher, $voucher);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id', $keyword);
	$this->db->or_like('voucher', $keyword);
	$this->db->or_like('stock', $keyword);
	$this->db->or_like('min_trans', $keyword);
	$this->db->or_like('expired', $keyword);
	$this->db->or_like('create', $keyword);
	$this->db->or_like('update', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('voucher', $keyword);
	$this->db->or_like('stock', $keyword);
	$this->db->or_like('min_trans', $keyword);
	$this->db->or_like('expired', $keyword);
	$this->db->or_like('create', $keyword);
	$this->db->or_like('update', $keyword);
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
	
	function stok($voucher) {				
		$this->db->where($this->voucher, $voucher);
		$this->db->set('stock', 'stock-1', FALSE);
		$this->db->update($this->table);
    }

}

/* End of file Voucher_model.php */
/* Location: ./application/models/Voucher_model.php */