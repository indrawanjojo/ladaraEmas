<?php
// digital product konek ke sepulsa
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Digital extends CI_Controller
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
	   $data['title'] =  "Produk Digital di Ladara Indonesia";
       $data['description'] =  "LaDaRa menyediakan produk digital seperti pulsa, paket data, tagihan pln, voucher pln, pdam, multifinance, tv kabel, voucher game, tagihan prabayar.";   
       $this->load->view('digital_products/index',$data);
	}
	


    public function pulsa()
    {		
       $data['title'] =  "Isi Pulsa di Ladara Indonesia";
       $data['type'] =  "pulsa";
       $data['description'] =  "LaDaRa menjual pulsa elektrik dari berbagai operator seperti Telkomsel, Mentari, IM3, Tri, Smartfren, XL, Axis, dan lainnya.";   
	   $this->load->view('digital_products/pulsa',$data);		 
    }	



    public function paket_data()
    {       
        $data['title'] =  "Isi Paket Data di Ladara Indonesia";
        $data['type'] =  "paket";
        $data['description'] =  "LaDaRa menjual paket data untuk internet dari berbagai operator seperti Telkomsel, Mentari, IM3, Tri, Smartfren, XL, Axis, dan lainnya."; 
        $this->load->view('digital_products/pulsa',$data);   
    }   



    public function bpjs_kesehatan()   
    {			
        $data['type'] =  "BPJS";
        $data['title'] =  "Bayar Tagihan BPJS Kesehatan di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan BPJS Kesehatan kini tak perlu pergi jauh-jauh menuju kantor BPJS untuk menggunakan layanan antri di loket BPJS, Anda cukup bayar melalui LaDaRa."; 		 		  
	   $this->load->view('digital_products/bpjs_kesehatan',$data);   			 
    }	



    public function pln_pulsa()    
    {					 		 
       $data['title'] =  "Isi Pulsa Listrik PLN di Ladara Indonesia";
       $data['type'] =  "electricity_postpaid";
       $data['description'] =  "Pulsa listrik di rumah mau habis tapi belum beli token listrik karena males keluar? Tenang, kini Anda bisa beli token listrik prabayar dengan cepat dan mudah bisa di mana saja dan kapan saja hanya di ION MERCANTILE";  
	   $this->load->view('digital_products/pln_pulsa',$data); 			 
    }	


    public function pln_tagihan()   
    {					 		
        $data['type'] =  "PLN";
        $data['title'] =  "Bayar Tagihan Listrik PLN di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan Listrik PLN? Tenang, kini Anda bisa bayar listrik pascabayar dengan cepat dan mudah bisa di mana saja dan kapan saja hanya di LaDaRa";   
		$this->load->view('digital_products/pln_tagihan',$data); 		 
    }	


    public function telkom()    {	
        $data['type'] =  "TELKOM";
        $data['title'] =  "Bayar Tagihan Telkom di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan Telkom? Tenang, kini Anda bisa bayar Telkom dengan cepat dan mudah bisa di mana saja dan kapan saja hanya di LaDaRa";   				 		  
		$this->load->view('digital_products/telkom',$data);    		 
    }	


    public function pdam()    {		
        $data['type'] =  "PDAM";
        $data['title'] =  "Bayar Tagihan Air PDAM di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan Air PDAM? Tenang, kini Anda bisa bayar Air PDAM dengan cepat dan mudah bisa di mana saja dan kapan saja hanya di LaDaRa";   			 		  
		$this->load->view('digital_products/pdam',$data);    		 
    }	


    public function multifinance()    {	
        $data['type'] =  "Multifinance";
        $data['title'] =  "Bayar Tagihan Multifinance di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan Air Multifinance? Tenang, kini Anda bisa bayar Multifinance dengan cepat dan mudah bisa di mana saja dan kapan saja hanya di LaDaRa";   				 		  
		$this->load->view('digital_products/multifinance',$data);       		 
    }	


    public function game_voucher()    {			
        $data['type'] =  "Game";
        $data['title'] =  "Isi Voucher Game di Ladara Indonesia";
        $data['description'] =  "Isi Voucher Game dengan Harga Murah dan Promo di LaDaRa.  Game online populer di Indonesia di antaranya ada Steam Wallet, Gemscool, Garena, Game Facebook dan masih banyak lainnya.";   		 		  
		$this->load->view('digital_products/game_voucher',$data);  		 
    }	


    public function tv_cable()    {		
        $data['type'] =  "TVCAble";
        $data['title'] =  "Bayar Tagihan TV Kabel di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan TV Kabel dengan Harga Murah dan Promo di LaDaRa";   			 		  
		$this->load->view('digital_products/tv_cable',$data);   		 
    }	


    public function pascabayar_tagihan()    {		
        $data['type'] =  "PASCABAYAR";
        $data['title'] =  "Bayar Tagihan Pascabayar di Ladara Indonesia";
        $data['description'] =  "Bayar Tagihan Pascabayar Telkomsel Halo, Indosat Postpaid, dan XL Postpaid dengan Harga Murah dan Promo di LaDaRa";   			 		  
		$this->load->view('digital_products/pascabayar_tagihan',$data);		 
    }	



};
