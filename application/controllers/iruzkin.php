<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Iruzkin extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
    	
    }
    function insert(){
    	$this->load->model('iruzkin_model');
    	
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>