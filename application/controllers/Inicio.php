<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Inicio extends CI_Controller {

	function __construct() 
	{
		
		parent::__construct();

		/* Cargamos la base de datos */
		$this->load->database();

		/* Cargamos la libreria*/
		$this->load->library('grocery_crud');

		/* Añadimos el helper al controlador */
		$this->load->helper('url');
	}

	function index() 
	{
		/*
		 * Mandamos todo lo que llegue a la funcion
		 * administracion().
		 **/

		$output = "";
		$this->load->view('inicio/index', $output);
	}

}