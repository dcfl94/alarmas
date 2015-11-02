<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class Tutelas extends CI_Controller
{

	function __construct() 
	{
		
		parent::__construct();

		/* Cargamos la base de datos */
		$this->load->database();

		/* Cargamos la libreria*/
		$this->load->library('grocery_crud');

		/* Añadimos el helper al controlador */
		$this->load->helper('url');
		$this->load->helper('date');
	

		/* Obtenemos la fecha actual */
		$timestamp =now();
		$timezone = 'UM8';
		$daylight_saving = FALSE;
 
		$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
		$datestring = "%Y-%m-%d %h:%i:%s";
 
		$this->now = mdate($datestring, $now);

		
		/*
		 * Mandamos todo lo que llegue a la funcion
		 * administracion().
		 **/
		//redirect('tutelas/administracion');
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
			$crud->set_subject('tutela');

			/* Asignamos el idioma español */
			$crud->set_language('spanish');

			/* Añadimos una funcionalidad extra a las columnas */
			$crud ->callback_column('estado',array($this,'_GC_Estatus'));


			/* Aqui le decimos a grocery que estos campos son obligatorios */
			$crud->required_fields(
				 
				'Radicado_Interno',
				'Radicado_UQ',
				'Asunto', 
				'Solicitante', 
				'Responsable', 
				'Correo_Responsable', 
				'Fecha_Recibido',
				'Fecha_Vencimiento',
				'Usuario_Cedula'

			);

			/* Aqui le indicamos que campos deseamos mostrar 

				


			*/
			$crud->columns(
				'Radicado_Interno',
			
				'Responsable', 
			
				'Fecha_Recibido',
				'Fecha_Vencimiento',
				'estado'
		

			
			);
			
			/* Generamos la tabla 
				
			*/
			$output = $crud->render();
		
			/* La cargamos en la vista situada en 
			/applications/views/productos/administracion.php */
			$this->load->view('tutelas/administracion', $output);
			
	        
			
			
		}catch(Exception $e){
			/* Si algo sale mal cachamos el error y lo mostramos */
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
			
	}

			public function _GC_Estatus($value, $row)
	 {
	
 
		/* Si la fecha actual es mayor o igual a la del inicio de la promocion y es menor
		 * a la de la fecha de vencimiento, la promocion esta activa.
		 */
		if($this->now >= $row->Fecha_Recibido AND $this->now < $row->Fecha_Vencimiento) 
		{

		return '<span class="alert alert-success">Activa</span>';

		}
		else {
		
			echo 'Fecha_Recibido';
			return '<span class="alert alert-danger">Critico</span>';
		}
	}

}


		
	
