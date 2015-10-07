<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	protected $now;

	public function __construct() 
	{
		parent::__construct();
		/* Cargamos el helper url y date */
		$this->load->helper('url');
		$this->load->helper('date');
		
		/* Inicializamos la base de datos */
		$this->load->database();
		
		/* Obtenemos la fecha actual */
		$timestamp = now();
		$timezone = 'UM8';
		$daylight_saving = FALSE;

		$now = gmt_to_local($timestamp, $timezone, $daylight_saving);
		$datestring = "%Y-%m-%d %h:%i:%s";
		
		$this->now = mdate($datestring, $now);
	}

	public function index()
	{
		/* Redirigimos a la funcion promociones() */
		redirect('catalogo/promociones');
	}
	
	public function promociones()
	{
		/* Si la fecha de inicio de la promocion es menor o igual a la fecha actual */
		$this->db->where('fecha_inicio <=', $this->now);
		
		/* Y la fecha de vencimiento es mayor a la fecha actual */
		$this->db->where('fecha_vencimiento >', $this->now);
		
		/* Traemos todas las promociones de nuestra base de datos */
		$data['promociones'] = $this->db->get('promociones')->result();
		//print_r($data['promociones']);
		
		/* Mandamos las variables a la vista alarma/application/view/catalogo/promociones.php */
		$this->load->view('catalogo/promociones', $data);
	}
}