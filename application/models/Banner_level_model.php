<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner_level_model extends CI_Model
{
	var $status = array(
        1 => 'Active',
        0 => 'Inactive'
    );

    public $table = 'banner_level';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('level', 'ASC');
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
    

}

/* End of file Banner_model.php */
/* Location: ./application/models/Banner_model.php */