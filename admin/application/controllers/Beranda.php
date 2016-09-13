<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      if (!$this->session->userdata('login')) {
  			redirect('auth');
  		}
  		else if($this->session->userdata('level') != 'A' && $this->session->userdata('level') != 'C'){
  				redirect('auth/logout');
  		}
  		else {
        $this->load->model('App_model','app_model');
      }
  }
  public function index()
  {
    $data['site_title'] = 'Marco';
    $data['title_page'] = 'SELAMAT DATANG DI ADMIN || MULYA GEMILANG';
    $data['assign_js'] = '';
    load_view('beranda/beranda', $data);
  }
}
