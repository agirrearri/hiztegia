<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Obretan extends CI_Controller{
    function __construct(){
		parent::__construct();
	}

    function index(){
		$this->load->view('includes/obretan_mezua');
	}



}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>