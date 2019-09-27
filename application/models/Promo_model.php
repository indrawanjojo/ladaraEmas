<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promo_model extends CI_Model
{

    public $table = 'promo';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->where('status', 1);    
        $this->db->where('featured', 1);    
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
	
	// get data by permalink
    function get_by_permalink($permalink)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('permalink', $permalink);
        $this->db->where('status', 1);
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);
        return $this->db->get($this->table)->row();
    }
    
}

/* End of file Categories_model.php */
/* Location: ./application/models/Categories_model.php */