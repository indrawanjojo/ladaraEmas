<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slides_mobile_model extends CI_Model
{
	var $status = array(
        1 => 'Active',
        0 => 'Inactive'
    );

    public $table = 'slides_mobile';
    public $id = 'id';
    public $order = 'DESC';
	

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->where('status', 1);    
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
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
	$this->db->or_like('title', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->or_like('link', $keyword);
	$this->db->or_like('position', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('title', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->or_like('link', $keyword);
	$this->db->or_like('position', $keyword);
	$this->db->or_like('status', $keyword);
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

/* End of file Slides_model.php */
/* Location: ./application/models/Slides_model.php */