<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class General {

    var $ci;

    function __construct() {
        $this->ci = &get_instance();
//        $this->isLogin();
    }

    function generateRandomCode($length = 8) {
        // Available characters
        $chars = '0123456789abcdefghjkmnoprstvwxyz';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }
	
	 function generateRandomNo($length = 3) {
        // Available characters
        $chars = '0123456789';

        $Code = '';
        // Generate code
        for ($i = 0; $i < $length; ++$i) {
            $Code .= substr($chars, (((int) mt_rand(0, strlen($chars))) - 1), 1);
        }
        return strtoupper($Code);
    }

   public function setting() {
        $this->ci->load->model('setting_model');
        $setting = $this->ci->setting_model->get_all();
        return $setting;
    }
	
	public function categorimenu() {
        $this->ci->load->model('categories_model');
        $categorimenu = $this->ci->categories_model->get_all();
        return $categorimenu;
    }
	
	public function productmenu() {
        $this->ci->load->model('products_model');
        $productmenu = $this->ci->products_model->get_menu();
        return $productmenu;
    }
	
	public function bannermenu() {
        $this->ci->load->model('banner_model');
        $bannermenu = $this->ci->banner_model->get_menu();
        return $bannermenu;
    }

    public function promomenu() {
        $this->ci->load->model('promo_model');
        $promomenu = $this->ci->promo_model->get_all();
        return $promomenu;
    }
  
    public function humanDate($datetime) {
        return date("D, d M Y H:i:s", strtotime($datetime));
    }

    public function humanDate2($date) {
        return date("D, d M Y", strtotime($date));
    }
	
	public function path() {		
        $path = 'https://officer.ladaraindonesia.com/';       
        return $path;
    }

    public function apiurl() {        
        $apiurl = 'https://api.ladaraindonesia.com/';       
        return $apiurl;
    }

    public function point() {        
        $this->ci->load->model('users_model');
        $gpoint = $this->ci->users_model->get_by_id($this->ci->session->userdata('id'));
        $point = $gpoint->point;
        return $point;
    }


    public function saldo() {        
        $this->ci->load->model('users_model');
        $gsaldo = $this->ci->users_model->get_by_id($this->ci->session->userdata('id'));
        $saldo = $gsaldo->saldo;
        return $saldo;
    }


    function getbadge() {
        $this->ci->load->model('badge_model');
        $gbadge = $this->ci->badge_model->get_all();
        return $gbadge;
    }
	
	function getBankName() {
        $this->ci->load->model('payment_model');
        $banks = $this->ci->payment_model->getDropDown();
        return $banks;
    }


}

?>
