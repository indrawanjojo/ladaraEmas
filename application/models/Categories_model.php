<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    var $status = array(
        0 => 'Active',
        1 => 'Inactive'
    );

    public $table = 'categories';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('urutan', 'ASC');
        $this->db->where('status', 0);    
        return $this->db->get($this->table)->result();
    }

    // get all list mobile
    function get_list_mobile()
    {
        $this->db->order_by('name', 'ASC');
        $this->db->where('status', 0);    
        return $this->db->get($this->table)->result();
    }

    // get mobile
    function get_mobile()
    {
        $this->db->order_by('urutan', 'ASC');
        $this->db->where('status', 0);    
        $this->db->limit(8, 0);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->where('status', 0); 
        return $this->db->get($this->table)->row();
    }
	
	// get data by permalink
    function get_by_permalink($permalink)
    {
        $this->db->where('permalink', $permalink);
        $this->db->where('status', 0); 
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
	$this->db->or_like('urutan', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('urutan', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
	$this->db->or_like('description', $keyword);
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
	
	function getDropDown() {
        $this->db->select('id,name');
        $query = $this->db->get($this->table);
        $data = array();
		$data[' '] = '-- Choose Category --';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = $row['name'];
        }

        return $data;
    }

}

/* End of file Categories_model.php */
/* Location: ./application/models/Categories_model.php */