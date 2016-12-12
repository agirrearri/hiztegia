<?php
class Protagonista_model extends CI_Model{
    function __construct()
	{
		parent::__construct();
	}

	public function insert($izena, $abizena1, $abizena2, $ezizena, $jaiotze_data, $argazkia, $testua){
		$data = array(
				'izena' => $izena,
				'abizena1' => $abizena1,
				'abizena2' => $abizena2,
				'ezizena' => $ezizena,
				'jaiotze_data' => $jaiotze_data,
				'argazkia' => $argazkia,
				'testua' => $testua
		);
		$this->db->insert('protagonista', $data);
	}
    
    public function danak(){
         $this->db->order_by('abizena1');
        return $this->db->get('protagonista');
    }

	function argazkia_check($argazkia){
		// 		$argazkia = 'verd.jpg';
		if($argazkia==''){
			return true;
		}elseif($argazkia == null){
			return true;
		}else{
			$this->db->where('argazkia', $argazkia);
			$query = $this->db->get('protagonista');
			if ($query->num_rows()>0){
				//no ok
				return false;
			}else{
				//todo ok
				return true;
			}
		}
		// return false;
	}
    
    function delete($id){
        $this->db->delete('protagonista', array('id' => $id)); 
    }

	function protagonista_check($protagonista){
		 		$this->db->where($protagonista);
		$query = $this->db->get('protagonista');
		if ($query->num_rows()>0){
			//no ok
			return false;
		}else{
			//todo ok
			return true;
		}
	}



}//end class