<?php
// digital product konek ke guava
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Travel_products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
		$this->load->model('promo_model');
        $this->load->library('form_validation');
		$this->load->library('simple_login');
		$this->load->helper('text');		
		$this->load->model('categories_model');
		$this->load->model('categories_sub_model');
		$this->load->model('categories_sub_child_model');
		$this->load->model('categories_merk_model');
    }
	


	public function index()
    {	
	   $data['title'] =  "Produk Travel di ION MERCANTILE";
       $data['description'] =  "ION MERCANTILE menyediakan produk travel seperti tiket kereta api, tiket pesawat terbang, dan hotel yang lengkap dan harga menarik";   
       $this->load->view('travel_guava/index',$data);
	}
	


    public function kereta_api()
    {		
       $data['title'] =  "Tiket Kereta Api di ION MERCANTILE";
       $data['type'] =  "kereta_api";
       $data['description'] =  "ION MERCANTILE menjual Tiket Resmi Kereta Api (KAI) ke berbagai tujuan di Indonesia";   
	   $this->load->view('travel_guava/kereta_api',$data);		 
    }	

   
   public function pesawat()
    {		
       $data['title'] =  "Tiket Pesawat Terbang di ION MERCANTILE";
       $data['type'] =  "pesawat";
       $data['description'] =  "ION MERCANTILE menjual Tiket Pesawat Terbang berbagai maskapai";   
	   $this->load->view('travel_guava/kereta_api',$data);		 
    }	



};
