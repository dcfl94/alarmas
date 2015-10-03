<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codigofaclito extends CI_Controller {

	/* comentarios de bloque */ 
	// comentarios de linea

	// funcion  contructor que llama el //constructor del padre 

	function _construct(){
		parent::_construct();
	}

	// funcion index para cargar el controlador de codigo facilito 

	function index(){
		//vamos a cargar una vista bienvenido   
		//dentro de la carpeta codigofacilito

		$this->load->view('codigofacilito/bienvenido');

	}
}
?>
