<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require(APPPATH.'external/libraries/PasswordHash.php');

class User extends CI_Controller {



	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		// Required
		parent::__construct();

		// Load stuff
		$this->load->library('session');
		$this->load->library('form_validation');

		$this->load->helper('url');


		// If the user is not logged in
		//if ( ! $this->session->userdata('user_name')) {
		//	redirect('login');
		//}
		
		// Load required models
		$this->load->model('user_model', 'user', TRUE);	
	}

	public function index() {
		$this->load->view('templates/header_generic');
		$this->load->view('templates/navigation');
		$this->load->view('user/add_user_form');
		$this->load->view('templates/footer_generic');
	}

	public function add() {
		$this->load->config('form_validation');
    	$this->form_validation->set_rules($this->config->item('user_add_edit'));

		if ($this->form_validation->run() == FALSE)
		{
			//Validation failed
			$this->load->view('templates/header_generic');
			$this->load->view('templates/navigation');
			$this->load->view('user/add_user_form');
			$this->load->view('templates/footer_generic');
			//$this->load->view('user/test');
		}
		else
		{
			echo "Form validated!";
		}
	}

	public function edit() {
		if ($this->form_validation->run('user_add_edit') == FALSE)
		{
			//Validation failed
			$this->load->view('user/add_user_form');
		}
		else
		{
			echo "Form validated!";
		}
	}

	public function disable() {

	}

	public function unlock() {
		$this->load->view('templates/header_generic');
		$this->load->view('login/login');
		$this->load->view('templates/footer_generic');
	}
}
?>