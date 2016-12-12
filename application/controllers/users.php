<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('users_model');

		//$this->_is_logged_in();
	}

	function index(){
		$this->login();
	}

	function login(){
	//login egiteko vista kargatu
		$data['title'] = 'Accesso a taskstart';
		$data['main_content'] = 'users/login';
		$this->load->view('includes/template_login', $data);
	}

    function user_register(){
// 		$this->_is_logged_administratzaile();
// 		$data['title']	= 'Registro de usuairo';
// 		$data['main_content'] = 'users/register';
// 		$this->load->view('includes/template_login',$data);
		
		
		//segurtasun kontrola
		$this->_is_logged_administratzaile();
		
		$data['title']= 'Erabiltzailea erregistratu';
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		$data['active'] = '';
		$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
		$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);

		$data['main_content'] = $this->load->view( 'users/register', $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);
		
		$this->load->view("includes/plantilla", $data);
	}
	
	function activar_usuario($id){
		$this->_is_logged_administratzaile();
		//cuando el campo administrator es 0 no el usuario no tiene permisos de admin
		$activate = 1;
		$campo = 'aktibatua';
		$this->users_model->change_attribute($id, $campo, $activate);
		redirect('users/users_gestor');
	}
	
	function desactivar_usuario($id){
		$this->_is_logged_administratzaile();
		//cuando el campo administrator es 0 no el usuario no tiene permisos de admin
		$activate = 0;
		$campo = 'aktibatua';
		$this->users_model->change_attribute($id, $campo, $activate);
		redirect('users/users_gestor');
	}
	
	function kolaboratzailetu($id){
		$this->_is_logged_administratzaile();
		//cuando el campo administrator es 0 no el usuario no tiene permisos de admin
		$activate = 'kolaboratzaile';
		$campo = 'rol';
		$this->users_model->change_attribute($id, $campo, $activate);
		redirect('users/users_gestor');
	}
	function kritikotu($id){
		$this->_is_logged_administratzaile();
		//cuando el campo administrator es 0 no el usuario no tiene permisos de admin
		$activate ='kritiko';
		$campo = 'rol';
		$this->users_model->change_attribute($id, $campo, $activate);
		redirect('users/users_gestor');
	}

	function retry_password(){
		
	}

	function verify_login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login = $this->users_model->verify_login($username, $password);
		if($login){
			$data = array(
					'is_logged_in' 		=> TRUE,
					'nombre_usuario' 	=> $login[0]->username,
					'name'				=> $login[0]->name,
					'user_id'			=> $login[0]->id,
					'rol'				=> $login[0]->rol,
			'aktibatua'=>$login[0]->aktibatua
			);
			$this->session->set_userdata($data);
			redirect('dashboard');
		}else{
			$this->login();
		}
	}
	function delete_user($id_user){
		$this->_is_logged_administratzaile();
		$this->users_model->delete($id_user);
		$this->users_gestor();
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('users');
	}

	function create_account(){

		/*callback_ llama a funciones pasando como parametro el valor del campo
		 * si la funcion devuelve true valida si devuelve false no valida*/
		$this->form_validation->set_rules('name', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('username', 'Usuario', 'trim|required|callback__username_check');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback__email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|md5');
		$this->form_validation->set_rules('re_password', 'Re password', 'trim|required|matches[password]|md5');

		$this->form_validation->set_message('required', 'El campo %s no esta relleno');//%s coge el nombre de campo
		$this->form_validation->set_message('valid_email', 'El %s no es v�lido');
		$this->form_validation->set_message('_username_check', 'El %s ya existe');//mensage para validaciones callback_
		$this->form_validation->set_message('_email_check', 'El %s ya existe');
		$this->form_validation->set_message('min_length', '%s demasiado corto');
		$this->form_validation->set_message('matches', 'Las contrase�as no coinciden');

		if ($this->form_validation->run() == FALSE)
		{
			$this->user_register();
		}
		else
		{
			//guardar usuario enviar correo de validacion
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//$activation_code = $this->_random_string(10);
			$rol="administratzaile";
			$inserted = $this->users_model->insert_user($name, $username, $email, $password);

			// // 			$config['protocol']='smtp';
			//  			$config['smtp_host']= 'smtp.empresa.euskaltel.com';
			//  			$config['smtp_port']=25;
			// // 			$config['smtp_user']='agirrearri@gmail.com	';
			// // 			$config['smtp_pass']='Agirrearri1983';
			// 			//$config['mailtype']='html';
				
			// 			$this->email->initialize($config);
				
			/*
			$this->email->from('agirrearri@hotmail.com', 'E�aut Agirre Arrizabalaga');
			$this->email->to($email);
			$this->email->subject('Alta en el sistema');
			$this->email->message('Verifique su alta en '.anchor(site_url('users/register_confirm/'.$activation_code), 'Valide su correo'));
			$this->email->send();
			*/
			$this->users_gestor();
		}
	}

	function register_confirm($activation_code = ''){
		if($activation_code==''){
			die('Codigo de verificaci�n errado');
		}else{
			$updated = $this->users_model->confirm_registration($activation_code);
			if($updated){
				echo('Registro completo');
			}else{
				echo('La verificaci�n de registro a fallado');
			}
		}
	}

	function _username_check($username){
		return $this->users_model->username_check($username);
	}

	function username_check_ajax(){
		if($this->input->is_ajax_request()){
			$username =  $this->input->post('nombre_usuario');
			if(trim($username) == ""){
				echo false;
			}else{
				$balidacion = $this->_username_check($username);
				echo $balidacion;
			}
		}else{
			echo 'acceso denegado';
		}
	}
	
    function users_gestor(){
// 		$this->_is_logged_administratzaile();

// 		$data['title']	= 'Gestion de usuarios';
// 		$data['users']= $this->users_model->all_users();
// 		$data['main_content'] = 'users/gestor';
// 		$this->load->view('includes/template_login',$data);
		
		
		$this->_is_logged_administratzaile();
		
		$data['title']= 'Erabiltzaileak kudeatu';
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		$data['active'] = '';
		$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
		$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		
		$data['users']= $this->users_model->all_users();
		$data['main_content'] = $this->load->view( 'users/gestor', $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);
		
		$this->load->view("includes/plantilla", $data);
	}

	function _email_check($email){
		return $this->users_model->email_check($email);
	}

	function _random_string($number_of_characters){
		$base = 'ABCDEFGHIJKLMNOPQRSTUVWZabcdefghijklmnopqrstuvwz1234567890';
		$max = strlen($base)-1;
		$activation_code= '';
		while (strlen($activation_code)<$number_of_characters) {
			$activation_code .= $base{mt_rand(0, $max)};
		}
		return $activation_code;
	}

	 	function _is_logged_in(){
	 		$is_logged_in = $this->session->userdata('is_logged_in');
	 		if(!isset($is_logged_in) || $is_logged_in != true){
	 			$this->login();
	 		}else{
	 			$this->dashboard();
	 		}
	 	}
	 	
	function _is_logged_kolaboratzaile(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_id = $this->session->userdata('user_id');
		$rol = $this->session->userdata('rol');
		if ($is_logged_in != TRUE || $user_id == ""){
			redirect('users/logout');
		}
		if($rol !='kolaboratzaile' && $rol !='administratzaile'){
			redirect('users/logout');
		}
	}
	
	function _is_logged_administratzaile(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_id = $this->session->userdata('user_id');
		$rol = $this->session->userdata('rol');
			if ($is_logged_in != TRUE || $user_id == ""){
			redirect('users/logout');
		}
		if($rol !='administratzaile'){
			redirect('users/logout');
		}
	}

}