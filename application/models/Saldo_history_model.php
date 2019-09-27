<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldo_history_model extends CI_Model
{

    public $table = 'saldo_history';
    public $id = 'id_saldo_history';
	public $id_user = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

     // get data by code
    function getbyuser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->order_by('id_saldo_history', 'DESC');
        return $this->db->get($this->table)->result();
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
	
	 // get data by code
    function get_by_code($id)
    {
        $this->db->where($this->id, $id);
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
	

}