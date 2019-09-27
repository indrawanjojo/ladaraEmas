<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders_model extends CI_Model
{
    //status payment
	var $status = array(        
        0 => 'Menunggu Pembayaran',
        1 => 'Verifikasi Pembayaran',
        2 => 'Lunas',
        //3 => 'Done / Sent',
        4 => 'Pembayaran Gagal'
    );

    //type order
    var $type_order = array(        
        0 => 'Products',
        1 => 'Digital / Biller',
        2 => 'Saldo Deposit'
    );

    //type order
    var $type_biller = array(        
        0 => 'Products',
        1 => 'Pulsa',
        2 => 'Paket Data',
        3 => 'BPJS Kesehatan',
        4 => 'PLN Tagihan',
        5 => 'PLN Pulsa',
        6 => 'Telkom Tagihan',
        7 => 'PDAM',
        8 => 'Multifinance',
        9 => 'Game Voucher',
        10 => 'TV Cable',
        11 => 'Pascabayar Tagihan'
    );
	
    var $paymentMethods = array(
        1 => 'Doku Wallet',
        2 => 'Kartu Kredit (Full Payment)',
        3 => 'Bank BNI (VA)',
        4 => 'Klik BCA',
	    5 => 'Kartu Kredit (Cicilan)',
        6 => 'Permata Bank (Doku)',
        7 => 'Doku Wallet',
        8 => 'Bank BCA (VA)',
        9 => 'Kredivo',
        10 => 'ION Deposit',
    );

    public $table = 'orders';
    public $id = 'id';
	public $user_id = 'user_id';
	public $orderCode = 'code';
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
	
	 // get data by code
    function get_by_code($orderCode)
    {
        $this->db->where($this->orderCode, $orderCode);
        return $this->db->get($this->table)->result();
    }
	
	// get data by url
    function get_by_code2($orderCode)
    {
        $this->db->where($this->orderCode, $orderCode);
        return $this->db->get($this->table)->row();
    }
	
	 // get data by user
    function get_by_user($user_id)
    {
        $this->db->where($this->user_id, $user_id);
        return $this->db->get($this->table)->result();
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
	$this->db->or_like('type', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('total', $keyword);
	$this->db->or_like('order_date', $keyword);
	$this->db->or_like('payment_deadline', $keyword);
	$this->db->or_like('payment_method', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('user_id', $keyword);
	$this->db->or_like('kodeunik', $keyword);
	$this->db->or_like('created', $keyword);
	$this->db->or_like('modified', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('type', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('total', $keyword);
	$this->db->or_like('order_date', $keyword);
	$this->db->or_like('payment_deadline', $keyword);
	$this->db->or_like('payment_method', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('user_id', $keyword);
	$this->db->or_like('kodeunik', $keyword);
	$this->db->or_like('created', $keyword);
	$this->db->or_like('modified', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // insert data
    function insertwishlist($data)
    {
        $this->db->insert('wishlist', $data);
    }

    function check_wish($id_user, $id_product) {
        $this->db->select('*');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_product', $id_product);
        $query = $this->db->get('wishlist', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

   
    function checkwishlist($user_id)
    {
        $this->db->where('id_user', $user_id);
        return $this->db->get('wishlist')->result();
    }

    function getwishid($id)
    {
        $this->db->where('id_wishlist', $id);
        return $this->db->get('wishlist')->row();
    }

    function deletewish($id)
    {
        $this->db->where('id_wishlist', $id);
        $this->db->delete('wishlist');
    }
	
	 // insert data order
    function create_order($order)
    {
        $this->db->insert($this->table, $order);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	// update data status
    function update_status($orderCode, $data)
    {
        $this->db->where($this->orderCode, $orderCode);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function check_biller($oid) {
        $this->db->select('*');
        $this->db->where('code', $oid);
        $this->db->where('type_order', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_trxsaldo($oid) {
        $this->db->select('*');
        $this->db->where('code', $oid);
        $this->db->where('type_order', 2);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

}

/* End of file Orders_model.php */
/* Location: ./application/models/Orders_model.php */