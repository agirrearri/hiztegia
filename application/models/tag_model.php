<?php
class Tag_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($name, $description){
		$data = array(
				'name' => $name ,
				'description' => $description
		);
		$this->db->insert('tag', $data);
	}
	
	function hitzak($id_tag){
		
		
	}
	
	public function count_mensajes()
	{
		return $this->db->count_all_results('tag');
	}

	public function tagak($limit='', $offset='')
	{
		if($limit!='' && $offset!=''){
			$this->db->limit($limit, $offset);
		}
		
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('tag');
		return $query;
	}

}