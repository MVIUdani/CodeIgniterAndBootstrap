<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
class Sale_model extends CI_Model {		
	
	private $sales = 'sales';

	function get_salesinfo() {
		$query = $this->db->get($this->sales);

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		
		return NULL;
	}
	
}

