<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Log_model extends CI_Model {
	 public $table = 'log';
	 public $table2 = 'pencarian';
	 public $table3 = 'products_view';
     public $order = 'DESC';

	
    function __construct() {
        parent::__construct();
    }

    function updateLastLogin($id) {
        $data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
	
	function insert_pencarian($qes, $id_user) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
        $data = array(
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'keyword' => $qes,
			'user_id' => $id_user
        );

        $this->db->insert($this->table2, $data);
    }
	
	function insert_produk_view($id,$cookie) {
        if($this->session->userdata('id') != '') {
            $iduser = $this->session->userdata('id');
        } else {
             $iduser = "";
        }
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
        $data = array(
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'id_product' => $id,
            'os' => $this->agent->platform(),
            'browser' => $this->agent->browser(),
            'cookie' => $cookie,
            'id_user' => $iduser
        );

        $this->db->insert($this->table3, $data);
    }

    function get_last_view($cookie)
    {
        $this->db->where('cookie', $cookie);        
        $this->db->order_by('id', $this->order);
        $this->db->group_by('id_product'); 
        return $this->db->get($this->table3)->result();
    }


    function insert_login($id) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
        $data = array(
            'id_user' => $id,
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'deskripsi' => 'User melakukan login'
        );

        $this->db->insert($this->table, $data);
    }
	
	 function insert_reg($email) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
        $data = array(
            'id_user' => $email,
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'deskripsi' => 'User mendaftar'
        );

        $this->db->insert($this->table, $data);
    }
	
	function insert_logout($id) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
        $data = array(
            'id_user' => $id,
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'deskripsi' => 'User logout'
        );

        $this->db->insert($this->table, $data);
    }
	
	function insert_forgotpwd($id) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
		$id_user = $id;
		$deskripsi = "user forgot password id #".$id;
        $data = array(
            'id_user' => $id_user,
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'deskripsi' => $deskripsi
        );

        $this->db->insert($this->table, $data);
    }
	
	function insert_resetpwd($id) {
		$agent = $this->input->user_agent();
		$ip = $this->input->ip_address();
		$id_user = $id;
		$deskripsi = "user reset password id #".$id;
        $data = array(
            'id_user' => $id_user,
            'date' => date('Y-m-d H:i:s'),
            'user_agent' => $agent,           
            'ip' =>  $ip,
            'deskripsi' => $deskripsi
        );

        $this->db->insert($this->table, $data);
    }

    // get data by id user
    function get_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->limit(4, 0);
        $this->db->order_by('id_log', $this->order);
        return $this->db->get($this->table)->result();
    }

  

}

?>