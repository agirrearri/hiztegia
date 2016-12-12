<?php
class Iruzkin_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($hitz_id, $iruzkin, $autore){
		$data = array(
				'hitz_id' => $hitz_id ,
				'mensaje' => $description,
				'autor' => $autore
		);
		$this->db->insert('iruzkin', $data);
	}

}