<?php
class Berba_model extends CI_Model{
    function __construct()
	{
		parent::__construct();
	}

	public function insert($berba, $letra, $description){
		$berba= strtolower ( utf8_decode($berba) );
		$data = array(
				'name' =>$berba ,
                'letra' => $letra,
				'definizio' =>$description
		);
		$this->db->insert('berba', $data);/*
		$sql="INSERT INTO `berba` ( `name` , `definizio` )
VALUES (
'".$berba."', '".$description."'
)";
		$this->db->query($sql);*/
		return $this->get_id($berba);
	}
	function update($id, $berba, $description){
		$data = array(
			'name'=> strtolower(utf8_decode($berba)),
			'definizio'=>$description
		);
				$this->db->where('id', $id);
		$this->db->update('berba', $data);
	}
	
	
function danak(){
    $this->db->order_by('name');
	return $this->db->get('berba');
}
	public function get_id($berba){
		$this->db->select('id');
		$this->db->where('name', $berba);
		$query = $this->db->get('berba');
		if($query->num_rows() == 1){
			$id = $query->row();
			$id = $id->id;
			return $id;
		}else{
			return -1;
		}
	}
	
	public function get_like($st=''){
		$this->db->select('id, name');
		$this->db->like('name', $st); 
		return $this->db->get('berba');
	}
	
	public function azken_berbak(){
		/*SELECT *
		 FROM berba
		 ORDER BY sortze_data
		 LIMIT 2 */
		$query = $this->db->query("SELECT id, name, sortze_data
FROM `berba`
order by sortze_data DESC limit 10");
		return $query;
	}
	public function get($id){
		$query = $this->db->get_where('berba', array('id' => $id));
		return $query;
	}
	
	public function letrak(){
		return  $this->db->query('SELECT left( name, 1 ) as letra FROM `berba` GROUP BY left( name, 1 ) order by left(name,1)');
	}

	public function count_mensajes()
	{
		return $this->db->count_all_results('berba');
	}
	
	public function count_berba_hasieradunak($letra){
		//$this->db->like('title', 'match', 'after'); 
		$this->db->like('name', $letra, 'after');
		//$this->db->limit($limit, $offset);
		$this->db->order_by("name"); 
		$query = $this->db->get('berba');
		return $query->num_rows();
	}

	public function berbak($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$this->db->order_by("name"); 
		return $this->db->get('berba');
// 		$query = $this->db->get('berba');
// 		return $query->result();
	}
	
	public function berba_hasieradunak($limit, $offset, $letra)
	{
		//$this->db->like('title', 'match', 'after'); 
		$this->db->like('name', $letra, 'after');
		$this->db->limit($limit, $offset);
		$this->db->order_by("name"); 
		$query = $this->db->get('berba');
		return $query->result();
	}
    
     function delete($id){
        $this->db->delete('berba', array('id' => $id)); 
    }

	public function berbak1($letra){
		$this->db->select('name');
		$this->db->from('berba');
		$this->db->like('name', $letra);

		return  $this->db->get();
	}
	
	public function tagdunak($limit, $offset, $tag_id){
		$this->db->select('berba.id, berba.name');
		$this->db->from('berba');
		$this->db->join('berben_tag', 'berba.id = berben_tag.berba_id');
		$this->db->where('berben_tag.tag_id', $tag_id);
		$this->db->limit($limit, $offset);
		$this->db->order_by('berba.name');
		$query= $this->db->get();
		return $query->result();
	}
	
	function count_tagdunak($tag_id){
		$this->db->select('berba.id, berba.name');
		$this->db->from('berba');
		$this->db->join('berben_tag', 'berba.id = berben_tag.berba_id');
		$this->db->where('berben_tag.tag_id', $tag_id);
		$query= $this->db->get();
		return $query->num_rows();
	}
	
	function berba_check($berba){
		$this->db->where('name', $berba);
		$query = $this->db->get('berba');
		if ($query->num_rows()>0){
			//no ok
			return false;
		}else{
			//todo ok
			return true;
		}
	}

}