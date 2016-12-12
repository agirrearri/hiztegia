<?php
class Testuak_model extends CI_Model{
    function __construct()
	{
		parent::__construct();
	}

	function honi_buruz(){
		return $this->db->get('honi_buruz');
	}

	function update_honi_buruz($testua){
		$data = array(
				//'testua'=> strtolower(utf8_decode($testua)),
				'testua'=>$testua
		);
		$this->db->where('id', 1);
		$this->db->update('honi_buruz', $data);
	}
	
	function pertsonak(){
		return $this->db->get('pertsonak');
	}
	
	function update_pertsonak($testua){
		$data = array(
				//'testua'=> strtolower(utf8_decode($testua)),
				'testua'=>$testua
		);
		$this->db->where('id', 1);
		$this->db->update('pertsonak', $data);
	}
	
	function desixenak(){
		return $this->db->get('desixenak');
	}
	
	function update_desixenak($testua){
		$data = array(
				//'testua'=> strtolower(utf8_decode($testua)),
				'testua'=>$testua
		);
		$this->db->where('id', 1);
		$this->db->update('desixenak', $data);
	}


}