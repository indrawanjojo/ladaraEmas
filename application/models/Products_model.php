<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products_model extends CI_Model
{
	var $status = array(
		' ' => '-- Choose Status --',
        1 => 'Active',
        0 => 'Inactive'
    );
	
	var $condition = array(
		' ' => '-- Choose Condition --',
        1 => 'Used',
        0 => 'New'
    );

    public $table = 'products';
	public $table2 = 'products_img';
    public $table3 = 'products_info';
    public $id = 'id';
	public $code = 'code';
	public $permalink = 'permalink';
	public $code_product = 'code_product';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get top
    function get_top()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by('terjual', $this->order);
		$this->db->where('status', 1);
		$this->db->limit(6, 0);
        return $this->db->get($this->table)->result();
    }
	
     // get new
    function get_promo()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
        $this->db->where('status', 1);
        $this->db->where('featured', 1);
        $this->db->limit(6, 0);
        return $this->db->get($this->table)->result();
    }

	 // get new
    function get_new()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
		$this->db->where('status', 1);
		$this->db->limit(8, 0);
        return $this->db->get($this->table)->result();
    }
	
	// get new
    function get_new_mobile()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
		$this->db->where('status', 1);
		$this->db->limit(6, 0);
        return $this->db->get($this->table)->result();
    }
	
	// get all
    function get_all()
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
		$this->db->where('status', 1);
        return $this->db->get($this->table)->result();
    }

    // get last view
    function get_lastview($id_product)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);            
        $this->db->where($this->id, $id_product);
        $this->db->where('status', 1);
        return $this->db->get($this->table)->result();
    }
	
	// get home
    function get_home($id)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
		$this->db->where('category_id', $id);
		$this->db->where('status', 1);
        return $this->db->get($this->table)->result();
    }
	
	// get menu
    function get_menu()
    {
        $this->db->order_by($this->id, $this->order);     
		$this->db->where('featured', 1);
		$this->db->where('status', 1);
		$this->db->limit(3, 0);
        return $this->db->get($this->table)->result();
    }
	
	 // get search q
    function get_q($q = NULL)
    {
        $curr_date = date('Y-m-d');
		$this->db->order_by($this->id, $this->order);
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);      
        $this->db->where('status', 1);  
		$this->db->like('name', $q);
        return $this->db->get($this->table)->result();
    }
	
	// get data by url
    function get_by_url($permalink)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->where($this->permalink, $permalink);
		$this->db->where('status', 1);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->where($this->id, $id);
		$this->db->where('status', 1);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function getpromo($id)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        //$this->db->having('promo', $id);
        //$this->db->where("(SUBSTRING(promo,',') = '$id')"); 
        $this->db->where('status', 1);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_wishlist($id)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->where($this->id, $id);
        $this->db->where('status', 1);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	// get total rows category
    function total_rows_category($id) {
        $this->db->from($this->table);
		$this->db->where('category_id', $id);
        return $this->db->count_all_results();
    }
	
	// get total rows brand
    function total_rows_brand($id) {
        $this->db->from($this->table);
		$this->db->where('category_merk', $id);
        return $this->db->count_all_results();
    }
	
	// get total rows category sub
    function total_rows_category_sub($id) {
        $this->db->from($this->table);
		$this->db->where('category_sub', $id);
        return $this->db->count_all_results();
    }

    // get total rows category child
    function total_rows_category_child($id) {
        $this->db->from($this->table);
        $this->db->where('category_child', $id);
        return $this->db->count_all_results();
    }

    // get data with limit
   // function index_limit($limit, $start = 0) {
      //  $this->db->order_by($this->id, $this->order);
      //  $this->db->limit($limit, $start);
      //  return $this->db->get($this->table)->result();
    //}
     function index_limit() {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);  
        $this->db->order_by($this->id, $this->order);
        //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
	
	// get data with limit category
    function index_limit_category($id) {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);  
        $this->db->order_by($this->id, $this->order);
		$this->db->where('category_id', $id);
      //  $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
	
	// get data with limit brand
    function index_limit_brand($id) {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date); 
        $this->db->order_by($this->id, $this->order);
		$this->db->where('category_merk', $id);
      //  $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
	
	// get data with limit category sub
    function index_limit_category_sub($id) {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date); 
        $this->db->order_by($this->id, $this->order);
		$this->db->where('category_sub', $id);
        //$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data with limit category sub
    function index_limit_category_child($id) {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date); 
        $this->db->order_by($this->id, $this->order);
        $this->db->where('category_child', $id);
      //  $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id', $keyword);
	$this->db->or_like('user_id', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
	$this->db->or_like('price', $keyword);
	$this->db->or_like('discount_percent', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->or_like('weight', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('condition', $keyword);
	$this->db->or_like('category_id', $keyword);
	$this->db->or_like('category_sub', $keyword);
	$this->db->or_like('category_child', $keyword);
	$this->db->or_like('category_merk', $keyword);
	$this->db->or_like('gambar', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('user_id', $keyword);
	$this->db->or_like('code', $keyword);
	$this->db->or_like('name', $keyword);
	$this->db->or_like('permalink', $keyword);
	$this->db->or_like('price', $keyword);
	$this->db->or_like('discount_percent', $keyword);
	$this->db->or_like('description', $keyword);
	$this->db->or_like('weight', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('condition', $keyword);
	$this->db->or_like('category_id', $keyword);
	$this->db->or_like('category_sub', $keyword);
	$this->db->or_like('category_child', $keyword);
	$this->db->or_like('category_merk', $keyword);
	$this->db->or_like('gambar', $keyword);
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
	
	// get product image detail
    function product_img($code)
    {
        $this->db->where($this->code_product, $code);
        return $this->db->get($this->table2)->result();		
    }
	
	
	 function get_menu_cat($id)
    {
        $curr_date = date('Y-m-d');
        $this->db->where('tayang_mulai <=', $curr_date);
        $this->db->where('tayang_akhir >=', $curr_date);        
        $this->db->order_by($this->id, $this->order);
		$this->db->where('category_id', $id);
		$this->db->where('featured', 1);
		$this->db->where('status', 1);
		$this->db->limit(2, 0);
        return $this->db->get($this->table)->result();
    }

    function getsize($code) {
        $this->db->select('id_info,size');
        $this->db->group_by('size'); 
        $this->db->where('code_product', $code);
        $query = $this->db->get($this->table3);
        $data = array();
        $data[' '] = '-- Pilih Ukuran --';
        foreach ($query->result_array() as $row) {
            $data[$row['size']] = $row['size'];
        }

        return $data;
    }

    function getcolor($code) {
        $this->db->select('id_info,color');
        $this->db->group_by('color'); 
        $this->db->where('code_product', $code);
        $query = $this->db->get($this->table3);
        $data = array();
        $data[' '] = '-- Pilih Warna --';
        //foreach ($query->result_array() as $row) {
            //$data[' '] = '-- Pilih Ukuran Terlebih Dahulu --';
        //}

        return $data;
    }

    function getcolor2($size, $idp) {        
        $this->db->select('id_info,color');
        $this->db->group_by('color'); 
        $this->db->where('code_product', $idp);
        $this->db->where('size', $size);
        $query = $this->db->get($this->table3);
        $result=$query->result_array();
        return $result;
    }

    // get area product
    function get_area_product($cdproductarea)
    {   
        //$this->db->order_by($this->id, $this->order);
        $this->db->where('code_product', $cdproductarea);
        return $this->db->get('products_area')->result();
    }

    function searc_suggest($q){
        $this->db->select('*');
        $this->db->like('name', $q);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
             $row_set[] = htmlentities(stripslashes($row['name'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
      }


    function get_products_area($destination, $code_product) {   
        $this->db->select('area_kota,code_product,id_area,area_harga,area_estimasi,code_kota');
        $this->db->where('code_kota', $destination);
        $this->db->where('code_product', $code_product);
        $query = $this->db->get('products_area');
        $result=$query->result_array();
        return $result;


    }



}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */