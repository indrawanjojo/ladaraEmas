<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    var $cat = array(
        1 => 'Artikel',
        2 => 'Event',
        0 => 'Toko'
    );

    public $table = 'blog';
    public $id = 'id';
	public $url = 'url';
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

     // get all
    function get_cat($cat)
    {
         $this->db->where('cat', $cat);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
	
	 // get new
    function get_new()
    {
        $this->db->order_by($this->id, $this->order);
		$this->db->limit(2, 0);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	 // get data by url
    function get_by_url($url)
    {
        $this->db->where($this->url, $url);
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
	$this->db->or_like('description_short', $keyword);
	$this->db->or_like('image', $keyword);
	$this->db->or_like('create', $keyword);
	$this->db->or_like('update', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('title', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->or_like('description_short', $keyword);
	$this->db->or_like('image', $keyword);
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

}

/* End of file Blog_model.php */
/* Location: ./application/models/Blog_model.php */