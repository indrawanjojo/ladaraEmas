<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{
	var $status = array(
        1 => 'Member',
        0 => 'Admin'
    );

    public $table = 'users';
    public $table2 = 'user_cookies';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by nomor
    function get_by_nomor($phone)
    {
        $this->db->where('phone', $phone);
        return $this->db->get($this->table)->row();
    }

     // get data by id hp
    function get_by_id_hp($id)
    {
        $this->db->where($this->id, $id);
        $this->db->where('status_phone', 0);
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
        $this->db->like('id', $keyword);
	$this->db->or_like('fb_id', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('reset_token', $keyword);
	$this->db->or_like('full_name', $keyword);
	$this->db->or_like('jk', $keyword);
	$this->db->or_like('tgl_lahir', $keyword);
	$this->db->or_like('hobi', $keyword);
	$this->db->or_like('provinsi', $keyword);
	$this->db->or_like('provinsi_nama', $keyword);
	$this->db->or_like('kota', $keyword);
	$this->db->or_like('kota_nama', $keyword);
	$this->db->or_like('kecamatan', $keyword);
	$this->db->or_like('address', $keyword);
	$this->db->or_like('phone', $keyword);
	$this->db->or_like('zip', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('foto', $keyword);
	$this->db->or_like('bank_akun', $keyword);
	$this->db->or_like('bank_no', $keyword);
	$this->db->or_like('bank_nama', $keyword);
	$this->db->or_like('bank_cabang', $keyword);
	$this->db->or_like('last_login', $keyword);
	$this->db->or_like('created', $keyword);
	$this->db->or_like('modified', $keyword);
	$this->db->or_like('url', $keyword);
	$this->db->or_like('kurir', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
	$this->db->or_like('fb_id', $keyword);
	$this->db->or_like('email', $keyword);
	$this->db->or_like('password', $keyword);
	$this->db->or_like('reset_token', $keyword);
	$this->db->or_like('full_name', $keyword);
	$this->db->or_like('jk', $keyword);
	$this->db->or_like('tgl_lahir', $keyword);
	$this->db->or_like('hobi', $keyword);
	$this->db->or_like('provinsi', $keyword);
	$this->db->or_like('provinsi_nama', $keyword);
	$this->db->or_like('kota', $keyword);
	$this->db->or_like('kota_nama', $keyword);
	$this->db->or_like('kecamatan', $keyword);
	$this->db->or_like('address', $keyword);
	$this->db->or_like('phone', $keyword);
	$this->db->or_like('zip', $keyword);
	$this->db->or_like('status', $keyword);
	$this->db->or_like('foto', $keyword);
	$this->db->or_like('bank_akun', $keyword);
	$this->db->or_like('bank_no', $keyword);
	$this->db->or_like('bank_nama', $keyword);
	$this->db->or_like('bank_cabang', $keyword);
	$this->db->or_like('last_login', $keyword);
	$this->db->or_like('created', $keyword);
	$this->db->or_like('modified', $keyword);
	$this->db->or_like('url', $keyword);
	$this->db->or_like('kurir', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // insert data seller
    function insert_seller($data)
    {
        $this->db->insert('categories_supplier', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // update data saldo
    function update_saldo($user_id, $saldo)
    {
        $this->db->where($this->id, $user_id);
        $this->db->set('saldo', 'saldo+'.$saldo, FALSE);
        $this->db->update($this->table);
    }

    // minus data saldo
    function minus_saldo($user_id, $saldo)
    {
        $this->db->where($this->id, $user_id);
        $this->db->set('saldo', 'saldo-'.$saldo, FALSE);
        $this->db->update($this->table);
    }

     // update update_user_cookies
    function update_user_cookies($data)
    {
         $this->db->insert($this->table2, $data);
    }

    // delete user cookies
    function delete_user_cookies($cookie)
    {
        $this->db->where('cookie', $cookie);
        $this->db->delete($this->table2);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	
	function check_email($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_email_seller($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('categories_supplier', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_nomor($phone) {
        $this->db->select('*');
        $this->db->where('phone', $phone);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

	
	function check_reg($token) {
        $this->db->select('*');
        $this->db->where('reset_token', $token);
        $this->db->where('aktif', 0);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function check_reg_hp($id, $code_ver_phone) {
        $this->db->select('*');
        $this->db->where('code_ver_phone', $code_ver_phone);
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
	
	function updateConfirmReg($id) {
        $data = array(
            'reset_token' => '',
			'aktif' => 1
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
	
	function provinsi_json() {
		$this->load->library('rajaongkir');
		$provinces = $this->rajaongkir->province();
		$provincesrray = json_decode($provinces);
		$results = $provincesrray->rajaongkir->results;
		foreach($results as $r):
			$data[$r->province_id.'-'.$r->province] = $r->province;
		endforeach;
		 return $data;
	}
	
	

    function kota_json($idprovince) {
        $this->load->library('rajaongkir');
        $cities = $this->rajaongkir->city($idprovince);
        $kotarray = json_decode($cities);
        $results = $kotarray->rajaongkir->results;
        foreach($results as $r):
            $data[$r->city_id.'-'.$r->city_name] = $r->city_name;
        endforeach;
         return $data;
    }
	
	function findByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function createToken($userId, $token) {
        $data = array(
            'reset_token' => $token
        );
        $this->db->where('id', $userId);
        $this->db->update($this->table, $data);
    }

    function resetPassword($id, $password) {
        $data = array(
            'password' => $password
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function truncateToken($id) {
        $data = array(
            'reset_token' => null
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function findByEmailAndResetPasswordToken($email, $restoken) {

        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('reset_token', $restoken);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
	
	
	 function getUserById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
	
	 function getUserByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

     function getUserByCode($code) {
        $this->db->select('*');
        $this->db->where('code_user', $code);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

     // get data log login
    function log_login($id)
    {
        $this->db->where('id_user', $id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('user_cookies')->result();
    }

    
    

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */