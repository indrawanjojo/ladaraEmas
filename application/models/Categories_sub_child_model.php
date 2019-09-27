<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_sub_child_model extends CI_Model
{

    public $table = 'categories_sub_child';
    public $id = 'id_child';
    public $order = 'DESC';
    public $name = 'name';
    public $order1 = 'ASC';

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

    // get data by permalink
    function get_by_permalink($permalink)
    {
        $this->db->where('permalink', $permalink);
        return $this->db->get($this->table)->row();
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
        $this->db->like('id_child', $keyword);
	$this->db->or_like('id_parent', $keyword);
	$this->db->or_like('id_sub', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_child', $keyword);
	$this->db->or_like('id_parent', $keyword);
	$this->db->or_like('id_sub', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
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
        $this->db->select('id_child,name');
        $query = $this->db->get($this->table);

        $data = array();
        foreach ($query->result_array() as $row) {
            $data[$row['id_child']] = $row['name'];
        }

        return $data;
    }
	
	function getDropDown3($id_sub) {		
		$this->db->select('id_child,name, id_parent, id_sub');
		$this->db->where('id_sub', $id_sub);
        $query = $this->db->get($this->table);
		$result=$query->result_array();
		return $result;
    }

    // get data by id
    function get_menu($id)
    {
        $this->db->where('id_sub', $id);
        $this->db->order_by($this->name, $this->order1);
        return $this->db->get($this->table)->result();
    }

}

/* End of file Categories_sub_child_model.php */
/* Location: ./application/models/Categories_sub_child_model.php */