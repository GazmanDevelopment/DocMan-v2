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
		$this->load->library(array('form_validation', 'ion_auth'));

		$this->load->helper(array('url', 'language'));

		$this->load->database();
		
		// Load required models
		$this->load->model('user_model', 'user', TRUE);	
		$this->lang->load('auth');
	}

	public function index() {
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('user/login', 'refresh');
		}
	}

	public function login()
	{
		// validate form input
		$this->load->config('form_validation');
    	$this->form_validation->set_rules($this->config->item('user_login'));
		//$this->form_validation->set_rules('identity', 'Email Address', 'required', 'Email address is required');
		//$this->form_validation->set_rules('password', 'Password', 'required', 'Password field is required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('user/add', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->data['message'] = $this->ion_auth->errors();
				$this->load->view('templates/header_generic');
				$this->load->view('login/login', $this->data);
				$this->load->view('templates/footer_generic');
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = '';

			$this->load->view('templates/header_generic');
			$this->load->view('login/login', $this->data);
			$this->load->view('templates/footer_generic');
		}
	}
	
	public function logout(){
		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->data['message'] = $this->ion_auth->messages();
		redirect('user', 'refresh');
	}

	public function add() {
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('user/login', 'refresh');
		}else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		
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
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('user/login', 'refresh');
		}else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

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