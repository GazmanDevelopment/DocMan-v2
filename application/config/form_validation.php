<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'user_add_edit'	=> array(
		array(
			'field'	=> 'email',
			'label'	=> 'Email Address',
			'rules' => 'trim|required|valid_email|is_unique[user.email]',
			'errors' 	=> array(
				'required'	=> 'You must enter a %s',
				'valid_email'	=> '%s is not a valid email address',
				'is_unique'		=> 'This email address already exists'
			)
		),
		array(
			'field'	=> 'password',
			'label'	=> 'Password',
			'rules'	=> 'trim|required|min_length['.MIN_PASS_LENGTH.']',
			'errors'	=> array(
				'required'		=> 'You must provide a %s',
				'min_length'	=> '%s must be at least '.MIN_PASS_LENGTH.' long'
			)
		),
		array(
			'field'	=> 'password_confirm',
			'label'	=> 'Password confirmation',
			'rules'	=> 'trim|required|matches[password]',
			'errors'	=> array(
				'required'		=> 'You must provide %s',
				'matches'		=> 'Passwords do not match'
			)
		),
		array(
			'field'	=> 'first_name',
			'label'	=> 'First Name',
			'rules'	=> 'trim|required',
			'errors'	=> array(
				'required'	=> '%s is required'
			)
		),
		array(
			'field'	=> 'company_id',
			'label'	=> 'Company',
			'rules'	=> 'trim|required|numeric',
			'errors'	=>array(
				'required'	=> 'A company is required',
				'numeric'	=> 'Company ID must be a number'
			)
		),
		array(
			'field'	=> 'uac_level',
			'label'	=> 'User Access Level',
			'rules'	=> 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[4]',
			'errors'	=> array(
				'required'	=> '%s is required to be supplied',
				'numeric'	=> '%s must be a number between 0 and 4',
				'greater_than_equal_to'	=> '%s must be a number between 0 and 4',
				'less_than_equal_to'	=> '%s must be a number between 0 and 4'
			)
		)
	)
);
?>