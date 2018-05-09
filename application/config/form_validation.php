<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	// User login validation
	'user_login' => array(
		array(
			'field'	=> 'identity',
			'label'	=> 'Email address',
			'rules'	=> 'trim|valid_email|required',
			'errors'	=> array(
				'required'	=> 'You must enter a %s',
				'valid_email'	'%s is not a valid email address'
			)
		),
		array(
			'field'	=> 'password',
			'label'	=> 'Password',
			'rules'	=> 'trim|required',
			'errors'	=> array(
				'required'	=> 'You must enter a %s'
			)
		)
	),
	// Add new user validation
	'user_add_edit'	=> array(
		array(
			'field'	=> 'identity',
			'label'	=> 'Email Address',
			'rules' => 'trim|required|valid_email|is_unique[users.email]',
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
			'field'	=> 'pass_confirm',
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
		)
	)
);
?>