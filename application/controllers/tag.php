<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tag extends CI_Controller{
    function __construct(){
        parent::__construct();
         $this->load->model('tag_model');
    }
    function index(){
        
    }
    
    function tag_inserter(){
    	$this->_is_logged_administratzaile();
    	$data['title']= "Gaiak sartzeko formularioa";
    	$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
    	
    	//administratzaileak exekuta lezake soilik
    	$rol = $this->session->userdata('rol');
    	$data['active'] = 'tag_inserter';
    	if($rol == 'administratzaile'){
    		$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
    		$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
    	}
    		
    	$data['tagak'] = $this->tag_model->tagak()->result();
    	
    	$data['main_content'] = $this->load->view("tag/tag_inserter", $data, TRUE);
    	$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
    		
    	$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);
    	
    	$this->load->view("includes/plantilla", $data);
    }
    
    
    function insert(){
    	$this->form_validation->set_rules('tag', 'Gaia', 'trim|required');
    	$this->form_validation->set_rules('editor', 'Deskribapena', 'trim');
    	
    	//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    	
    	$this->form_validation->set_message('required', '%s bete behar da.');//%s coge el nombre de campo
    	
    	
    	if ($this->form_validation->run() == FALSE){
    		$this->inserter();
    	}else{
    		//gorde
    		$berba = utf8_encode($this->input->post('tag'));
    		$definizioa = utf8_encode($this->input->post('editor'));
    	
    		$berba_id = $this->tag_model->insert($berba, $definizioa);
    		//sartutako berbaren id eta chekeatutako tagen idekin insertak egin
    		//hemen edo berben tag controlodorean baina berben_tag_model->insert($berba_id, $tag_id) erabiliz
    		redirect('dashboard');
    	}
    }
    
   public function guztiak($offset='')
   {
      $limit = 24;
      $total = $this->tag_model->count_mensajes();
      $data['tagak'] = $this->tag_model->tagak($limit, $offset);
      $config['base_url'] = 'tag/guztiak/';
      $config['total_rows'] = $total;
      $config['per_page'] = $limit;
      $config['uri_segment'] = '3';
      $this->pagination->initialize($config);
      $data['pag_links'] = $this->pagination->create_links();
      //$data['title'] = 'Pagination';
      $this->load->view('tag/tag_paginado', $data);
   }
   
   function _is_logged_in(){
   	$is_logged_in = $this->session->userdata('is_logged_in');
   	$user_id = $this->session->userdata('user_id');
   	if ($is_logged_in != TRUE || $user_id == ""){
   		redirect('users/login');
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
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


?>