<?php
class Berben_tag_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($berba_id, $tag_id){
	
		$data = array(
				'berba_id' => $berba_id ,
				'tag_id' => $tag_id
		);
		$this->db->insert('berben_tag', $data);
	}
	
	function berben_tag($berba_id){
		$this->db->select('tag_id');
		$this->db->where('berba_id', $berba_id);
				$this->db->order_by("tag_id", "asc"); 
		return $this->db->get('berben_tag');
	}
	
	function delete($berba_id, $tag_id){
		$this->db->where('berba_id', $berba_id);
		$this->db->where('tag_id', $tag_id);
	
		$this->db->delete('berben_tag');
	}
	
	function delete_berbalotura($berba_id){
		
		$this->db->delete('berben_tag', array('berba_id' => $berba_id)); 
	
	}
	
	
	function exist($berba_id, $tag_id){
		$this->db->where('berba_id', $berba_id);
		$this->db->where('tag_id', $tag_id);
		$query = $this->db->get('berben_tag');
		
		if($query->num_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}