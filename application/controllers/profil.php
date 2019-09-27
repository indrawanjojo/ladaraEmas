<?php
// digital product konek ke guava
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class profil extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('simple_login');
    $this->load->helper('text');
  }

  // public function index(){
  //   $this->load->view('ladara_emas/profil_register');
  // }
}
