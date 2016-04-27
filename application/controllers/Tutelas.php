<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* ensayo he echo un comit  */
class Tutelas extends CI_Controller {

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
		redirect('tutelas/administracion');
	}

	/*
	 * 
 	 **/
	function administracion()
	{
		
		
		try{

			/* Creamos el objeto */
			$crud = new grocery_CRUD();

			/* Seleccionamos el tema */
			$crud->set_theme('flexigrid');

			/* Seleccionmos el nombre de la tabla de nuestra base de datos*/
			$crud->set_table('tutela');

			/* Le asignamos un nombre */
			$crud->set_subject('Tutela');

			/* Asignamos el idioma español */
			$crud->set_language('spanish');

			
			$crud->field_type('Responsable','dropdown',array('Angelica','Ana'));
			
			/* Aqui le decimos a grocery que estos campos son obligatorios */
			$crud->required_fields(
				 
				'Radicado_Interno',
				'Radicado_UQ',
				'Asunto',
				'Responsable', 
				'Solicitante', 
				'Correo_Responsable',
				'Fecha_Recibido',
				'Fecha_Vencimiento',
				'Usuario_cedula'


			);

			/* Aqui le indicamos que campos deseamos mostrar */
			$crud->columns(
				'Radicado_Interno',
				'Asunto',
				'Solicitante',
				'Responsable',
				'Correo_Responsable', 
				'Fecha_Recibido',
				'Fecha_Vencimiento'
			
			);
			
			/* Generamos la tabla */
			$output = $crud->render();
			
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$this->load->view('tutelas/administracion', $output);
			
	
			
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
			
	}
	
	
}
