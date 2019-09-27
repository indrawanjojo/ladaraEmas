<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_model extends CI_Model
{

    public $table = 'payment';
    public $id = 'id_payment';
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
        $this->db->like('id_payment', $keyword);
	$this->db->or_like('name_payment', $keyword);
	$this->db->or_like('bank_payment', $keyword);
	$this->db->or_like('rek_payment', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_payment', $keyword);
	$this->db->or_like('name_payment', $keyword);
	$this->db->or_like('bank_payment', $keyword);
	$this->db->or_like('rek_payment', $keyword);
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
        $this->db->select('id_payment,name_payment,bank_payment,rek_payment');
        $query = $this->db->get($this->table);
        $data = array();
		$data[' '] = '-- Pilih Tujuan Transfer --';
        foreach ($query->result_array() as $row) {
            $data[$row['rek_payment'].' - '.$row['bank_payment'].' - '.$row['name_payment']] = $row['rek_payment'].' - '.$row['bank_payment'].' - '.$row['name_payment'];
        }

        return $data;
    }

}

/* End of file Payment_model.php */
/* Location: ./application/models/Payment_model.php */