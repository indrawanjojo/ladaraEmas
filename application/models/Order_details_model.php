<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_details_model extends CI_Model
{

    public $table = 'order_details';
    public $id = 'id';
	public $orderCode = 'code';
    public $order = 'DESC';

    //status order
    var $status_detail = array(        
        0 => 'Proses',
        1 => 'Terkirim'
    );


    //status order biller
    var $status_detail_biller = array(        
        0 => '',
        1 => 'Proses',
        2 => 'Selesai',
        3 => 'gagal'
    );

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

     // get data by code order row
    function get_by_code_row($orderCode)
    {
        $this->db->where('code_order', $orderCode);
        return $this->db->get($this->table)->row();
    }

    // get data by code order row
    function get_data_saldo($orderCode)
    {
        $this->db->where('code_order', $orderCode);
        $this->db->where('code_order', $orderCode);
        return $this->db->get($this->table)->row();
    }
	
	 // get data by code
	function get_by_code($orderCode) {
      
		//$this->db->select('o.id as IDO, o.code, o.status, o.nama_penerima, o.kota, o.provinsi, o.alamat, o.product_id, o.price,o.qty, o.discount_percent, o.ongkir, p.id as IDP, p.name, p.gambar');
		//$this->db->join('products p', 'o.product_id = p.id');
        //$this->db->order_by('o.id', 'DESC');
		//$this->db->where('o.code_order', $orderCode);
        //$query = $this->db->get('order_details o');

         $this->db->select('o.id as IDO, o.code, o.id_product_info, o.product_id, o.price,o.qty, o.  discount_percent, o.ongkir, o.product_id as IDP, o.name_product AS name, o.image_product AS gambar, o.harga_beli, o.harga_ritel, i.id_info, i.code_product, i.size, i.color,o.nama_penerima, o.kota, o.provinsi, o.negara, o.tlp, o.email,o.alamat,o.ongkir,o.harga_satuan,o.subtotal,o.kurir,o.kode_pos,o.status');
        //$this->db->join('products p', 'o.product_id = p.id');
        $this->db->join('products_info i', 'o.id_product_info = i.id_info');
        $this->db->order_by('o.id', 'DESC');
        $this->db->where('o.code_order', $orderCode);
        $query = $this->db->get('order_details o');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
		
    }


    // get data to email trx
    function get_email_trx($orderCode) {
        
        $this->db->where('code_order', $orderCode);
        return $this->db->get($this->table)->result();
        
    }


     // get data by code 2 (data product) 
    function get_by_code_2($orderCode) {
      
         $this->db->select('o.id as IDO, o.code, o.id_product_info, o.product_id, o.price,o.qty, o.  discount_percent, o.ongkir, o.product_id as IDP, o.name_product AS name, o.image_product AS gambar, o.harga_beli, o.harga_ritel, o.nama_penerima, o.kota, o.provinsi, o.negara, o.tlp, o.email,o.alamat,o.ongkir,o.harga_satuan,o.subtotal,o.kurir,o.kode_pos,o.status, p.permalink, p.category_id');
        $this->db->join('products p', 'o.product_id = p.id');
        //$this->db->join('products_info i', 'o.id_product_info = i.id_info');
        $this->db->order_by('o.id', 'DESC');
        $this->db->where('o.code_order', $orderCode);
        $query = $this->db->get('order_details o');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        
    }

    // get data invoice
    function get_data_invoice($code_detail) {      
        $this->db->select('o.id as IDO, o.seller, o.code, o.id_product_info, o.product_id, o.price,o.qty, o.  discount_percent, o.ongkir, o.product_id as IDP, o.name_product, o.image_product, o.harga_beli, o.harga_ritel, i.id_info, i.code_product, i.size, i.color,o.nama_penerima, o.kota, o.provinsi, o.negara, o.tlp, o.email,o.alamat,o.ongkir,o.harga_satuan,o.subtotal,o.kurir,o.kode_pos,o.status AS status_detail');
       // $this->db->join('products p', 'o.product_id = p.id');
        $this->db->join('products_info i', 'o.id_product_info = i.id_info');
        $this->db->order_by('o.id', 'DESC');
        $this->db->where('o.code_order', $code_detail);
        $query = $this->db->get('order_details o');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        
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
	$this->db->or_like('status', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('product_id', $keyword);
	$this->db->or_like('qty', $keyword);
	$this->db->or_like('price', $keyword);
	$this->db->or_like('discount_percent', $keyword);
	$this->db->or_like('net_price', $keyword);
	$this->db->or_like('order_id', $keyword);
	$this->db->or_like('ongkir', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('product_id', $keyword);
	$this->db->or_like('qty', $keyword);
	$this->db->or_like('price', $keyword);
	$this->db->or_like('discount_percent', $keyword);
	$this->db->or_like('net_price', $keyword);
	$this->db->or_like('order_id', $keyword);
	$this->db->or_like('ongkir', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
	
	 // insert data order
    function create_order_detail($detail)
    {
        $this->db->insert($this->table, $detail);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // update data by code
    function updatebycode($code, $data)
    {
        $this->db->where('code', $code);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Order_details_model.php */
/* Location: ./application/models/Order_details_model.php */