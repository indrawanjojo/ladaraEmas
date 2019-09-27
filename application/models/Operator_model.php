<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Operator_model extends CI_Model
{

    public $table = 'operator_pulsa_nomor';
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
        return $this->db->get($this->table)->result();
    }

    // get data by nomor
    function get_by_nomor($customer_number)
    {
        $this->db->where('nomor', $customer_number);
        return $this->db->get($this->table)->row();
    }
	
	function check_nomor($customer_number) {
        $this->db->select('*');
        $this->db->where('nomor', $customer_number);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
	


}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */