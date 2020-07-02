<?php 
	/**
	 * 
	 */
	class admin_model extends CI_Model
	{
		
		public function getMerkAll(){
			return $this->db->get('tb_merk')->result_array();
		}
	}