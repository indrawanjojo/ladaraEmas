<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($email, $password, $url_from) {
		$this->CI->load->helper(array('Form', 'Cookie', 'String'));
		$this->CI->load->library('user_agent');

		$where_array = array(
               'email'=>$email,
			   'password'=> md5($password)
               //'aktif'=>'1'
              );
		//$query = $this->CI->db->get_where('users',array('email'=>$email,'password' => $password));
		$query = $this->CI->db->get_where('users',$where_array);
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT id, status, full_name, aktif, kota_nama, code_user FROM users where email = "'.$email.'"');			
				$admin 	= $row->row();			
				$id 	= $admin->id;
				$status = $admin->status;
				$code_user = $admin->code_user;
				$full_name 	= $admin->full_name;
				$kota_nama 	= $admin->kota_nama;
				$status_phone 	= $admin->status_phone;

				$browseruser = $this->CI->agent->browser();
				$osuser 	= $this->CI->agent->platform();
				$dateuser = date("d-M-Y H:i:s");
				
				if($admin->aktif == 1) {
					$this->CI->session->set_userdata('email', $email);
					$this->CI->session->set_userdata('status', $status);
					$this->CI->session->set_userdata('full_name', $full_name);
					$this->CI->session->set_userdata('code_user', $code_user);
					$this->CI->session->set_userdata('id_login', uniqid(rand()));
					$this->CI->session->set_userdata('id', $id);
					
					$data = array(
						'last_login' =>  date("d-M-Y H:i:s")
					);
					$this->CI->load->model('users_model');
					$this->CI->users_model->update($id, $data);
					
					//$this->CI->load->model('log_model');
					//$this->CI->log_model->insert_login($id);

					//set cookies dan simpan di user_cookies
					$ran_cookie = random_string('alnum', 20);
					$datecookies = date("dmyHis");
					$key = $datecookies.$id.$ran_cookie;

	                set_cookie('ionaccess', $key, 3600*24*30, '', '/', '', 'TRUE', 'TRUE'); // set expired 30 hari kedepan               

	                // simpan key di database
	                $update_key = array(
	                	'id_user' => $id,
	                    'cookie' => $key,
	                    'created' =>  date("d-M-Y H:i:s"),
	                    'browser' => $this->CI->agent->browser(),
	                    'ip_address' => $this->CI->input->ip_address(),
	                    'os' => $this->CI->agent->platform()
	                );
	                $this->CI->users_model->update_user_cookies($update_key);
	                //$this->Auth_model->update($update_key, $row->id_user);

	                //------- Send email notif to customer------------------//
						$this->CI->load->library('email');
						$this->CI->email->to($email);
						$this->CI->email->from('no-reply@ladaraindonesia.com', 'ladaraindonesia.com');
						$this->CI->email->subject('Pemberitahuan Aktivitas Login Akun ladaraindonesia.com');
						$data = array(
						 'userName'=> $full_name,
						 'pesan'=> '		
							Akun  '.$email.' baru saja digunakan untuk masuk di ladaraindonesia.com pada tanggal '.$dateuser.' dari '.$browseruser.' di '.$osuser.'.
							<br><br>		
							Tidak mengenali aktivitas ini?<br>
							Tinjau perangkat yang baru-baru ini digunakan sekarang.<br>
							<br>
							Mengapa kami mengirimnya? Kami memperhatikan keamanan dengan sangat serius dan ingin memberi tahu Anda tentang tindakan penting pada akun Anda.
							<br>
							<br>
							Tim 
							<br>
							ladaraindonesia.com'
						);					
						$body = $this->CI->load->view('email/email_template.php',$data,TRUE);
						$this->CI->email->message($body);   
						$this->CI->email->send();  					

					
				    if($kota_nama == '') {
						redirect(base_url('member/profil'));
					} elseif($status_phone == 0) {
						redirect(base_url('member/profil_hp'));
					} else {
						if($url_from == '') {
							redirect(base_url('member/account'));
						} else {
							redirect($url_from);
						}
					}
				} else {
					$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login gagal. <br>Akun belum aktif, silahkan Anda aktivasi akun atau <a href="resend_activation/'.$code_user.'">kirim permintaan kembali email aktivasi akun</a></div>');
				redirect(base_url('member/masuk'));
				}
		}else{
			$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login gagal.<br> Data tidak ditemukan, silahkan Anda Daftar</div>');
			redirect(base_url('member/masuk'));
		}
		return false;
	}	
	
	// Proteksi halaman user
	public function cek_login_user() {
		if($this->CI->session->userdata('email') == '') {
			$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda harus login</div>');
			redirect(base_url('member/masuk'));
		}
	}


	// cek belum login
	public function cek_login_kosong() {
		if($this->CI->session->userdata('email') != '') {
			$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda harus login</div>');
			redirect(base_url('member/account'));
		}
	}
	
	// Fungsi logout member
	public function logout() {
		$this->CI->load->helper(array('Form', 'Cookie', 'String'));
		//$this->CI->load->model('log_model','users_model');
		//$this->CI->log_model->insert_logout($this->CI->session->userdata('id'));

		//delete data user cookie from database
		$cookie = get_cookie('ionaccess');
		$this->CI->users_model->delete_user_cookies($cookie);
		
	    //delete_cookie('ionaccess','', 0, '', '/', '', 'TRUE', 'TRUE');
	    delete_cookie('ionaccess');

		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda berhasil logout</div>');
		redirect(base_url('member/masuk'));
	}


	// Fungsi login google
	public function login_google($email) {
		$this->CI->load->helper(array('Form', 'Cookie', 'String'));
		$this->CI->load->library('user_agent');

		$where_array = array(
               'email'=>$email
              );
		$query = $this->CI->db->get_where('users',$where_array);
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT id, status, full_name, aktif, kota_nama, code_user FROM users where email = "'.$email.'"');			
				$admin 	= $row->row();			
				$id 	= $admin->id;
				$status = $admin->status;
				$code_user = $admin->code_user;
				$full_name 	= $admin->full_name;
				$kota_nama 	= $admin->kota_nama;
				$status_phone 	= $admin->status_phone;

				$browseruser = $this->CI->agent->browser();
				$osuser 	= $this->CI->agent->platform();
				$dateuser = date("d-M-Y H:i:s");
				
				if($admin->aktif == 1) {
					$this->CI->session->set_userdata('email', $email);
					$this->CI->session->set_userdata('status', $status);
					$this->CI->session->set_userdata('full_name', $full_name);
					$this->CI->session->set_userdata('code_user', $code_user);
					$this->CI->session->set_userdata('id_login', uniqid(rand()));
					$this->CI->session->set_userdata('id', $id);
					
					$data = array(
						'last_login' =>  date("d-M-Y H:i:s")
					);
					$this->CI->load->model('users_model');
					$this->CI->users_model->update($id, $data);
					
					//$this->CI->load->model('log_model');
					//$this->CI->log_model->insert_login($id);

					//set cookies dan simpan di user_cookies
					$ran_cookie = random_string('alnum', 20);
					$datecookies = date("dmyHis");
					$key = $datecookies.$id.$ran_cookie;

	                set_cookie('ionaccess', $key, 3600*24*30, '', '/', '', 'TRUE', 'TRUE'); // set expired 30 hari kedepan               

	                // simpan key di database
	                $update_key = array(
	                	'id_user' => $id,
	                    'cookie' => $key,
	                    'created' =>  date("d-M-Y H:i:s"),
	                    'browser' => $this->CI->agent->browser(),
	                    'ip_address' => $this->CI->input->ip_address(),
	                    'os' => $this->CI->agent->platform()
	                );
	                $this->CI->users_model->update_user_cookies($update_key);
	                //$this->Auth_model->update($update_key, $row->id_user);

	                //------- Send email notif to customer------------------//
						$this->CI->load->library('email');
						$this->CI->email->to($email);
						$this->CI->email->from('no-reply@ladaraindonesia.com', 'ladaraindonesia.com');
						$this->CI->email->subject('Pemberitahuan Aktivitas Login Akun ladara Indonesia');
						$data = array(
						 'userName'=> $full_name,
						 'pesan'=> '		
							Akun  '.$email.' baru saja digunakan untuk masuk di ladaraindonesia.com pada tanggal '.$dateuser.' dari '.$browseruser.' di '.$osuser.'.
							<br><br>		
							Tidak mengenali aktivitas ini?<br>
							Tinjau perangkat yang baru-baru ini digunakan sekarang.<br>
							<br>
							Mengapa kami mengirimnya? Kami memperhatikan keamanan dengan sangat serius dan ingin memberi tahu Anda tentang tindakan penting pada akun Anda.
							<br>
							<br>
							Tim
							<br>
							ladaraindonesia.com'
						);					
						$body = $this->CI->load->view('email/email_template.php',$data,TRUE);
						$this->CI->email->message($body);   
						$this->CI->email->send();  					

					
				    if($kota_nama == '') {
						redirect(base_url('member/profil'));
					} elseif($status_phone == 0) {
						redirect(base_url('member/profil_hp'));
					} else {
						if($url_from == '') {
							redirect(base_url('member/account'));
						} else {
							redirect($url_from);
						}
					}
				} else {
					$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login gagal. <br>Akun belum aktif, silahkan Anda aktivasi akun atau <a href="resend_activation/'.$code_user.'">kirim permintaan kembali email aktivasi akun</a></div>');
				redirect(base_url('member/masuk'));
				}
		}else{
			$this->CI->session->set_flashdata('item','<div align="center" class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Login gagal.<br> Data tidak ditemukan, silahkan Anda Daftar</div>');
			redirect(base_url('member/masuk'));
		}
		return false;
	}	

}