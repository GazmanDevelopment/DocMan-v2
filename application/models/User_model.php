<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function add_user($email, $first_name, $last_name = '', $company_id, $uac = 4, $password) {
		$query = "insert into user (email, first_name, last_name, company_id, uac_level) values (?, ?, ?, ?, ?)";

		
	}
}

?>