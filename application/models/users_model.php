<?php
class Users_model extends CI_Model{
	
	function username_check($username){
		$this->db->where('username', $username);
		$query = $this->db->get('user');
		if ($query->num_rows()>0){
			//no ok
			return false;
		}else{
			//todo ok
			return true;
		}
	}
	
	function email_check($email){
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		if ($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	function insert_user($name, $username, $email, $password){
		$datos = array(
				'name' => $name,
				'username' => $username,
				'email' => $email,
				'pasword' =>$password,
				'rol' => "kolaboratzaile"
				);
		return $this->db->insert('user', $datos);//devuelve un 1 si ok o 0 si no ok
	}
	
	function delete($id_user){
	$this->db->where('id', $id_user);
		$this->db->delete('user');
	}
	/*
	function confirm_registration($activation_code){
		$this->db->select('id');
		$this->db->where('activation_code', $activation_code);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			$datos = array(
					'status' => 1
					);
			$this->db->where('activation_code' , $activation_code);
			return $this->db->update('users', $datos);
		}else{
			return false;
		}
	}
	*/
	
	function change_attribute($id, $campo, $value){
		$data = array(
				$campo => $value
		);
		
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	
	function verify_login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('pasword', $password);
		$this->db->where('aktibatua', '1');
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	function all_users(){
		$query = $this->db->get('user');
		return $query;
	}
}