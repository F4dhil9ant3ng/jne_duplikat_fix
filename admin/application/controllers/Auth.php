<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $user;
	private $pass;
	private $level;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model','app_model');

	}

	public function index()
	{
		//$this->login();
		if ($this->session->userdata('login')) {
				redirect('Beranda');
		}
		else {
			$data['site_title'] = 'Please Login';
			$this->load->view('tpl/login_view',$data);
		}
	}

	public function login()
	{
		if ($this->input->post()) {
			$this->form_validation->set_rules('username','Username Feeder','trim|required');
			$this->form_validation->set_rules('password','Password Feeder','required');
			if ($this->form_validation->run() == TRUE) {
				$data = array('username' => $this->input->post('username', TRUE),'password' => $this->input->post('password', TRUE));
				//echo json_encode($data);
				//$temp_db = $this->input->post('db_ws',TRUE);
				$hasil = $this->app_model->cek_user($data);
				if ($hasil->num_rows() == 1) {
					foreach ($hasil->result() as $sess){
						$this->username = $sess->username;
						$this->pass = $sess->password;
						$this->level = $sess->level;

					}
					$session_prodi = array('login' => TRUE,
									 'username' => $this->username,
									 'level' => $this->level
						);

						$this->session->sess_expiration = '1800'; //session timeout 15 minute
						$this->session->set_userdata($session_prodi);

						if($this->level == 'A'){
							redirect('Beranda');
						}
						else if ($this->level == 'C') {
							redirect('Beranda');
						}
						else {
							redirect('auth');
						}
				}
				else {
					redirect('auth');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
