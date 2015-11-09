<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class graficos extends CI_Controller 

{

	  function index(){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
	 
	     
      //cargo el modelo de artículos
      $this->load->model('Articulo_model');
	   $this->load->model('Reportes_model');
	  
      
      //pido los ultimos artículos al modelo
      $tutela = $this->Articulo_model->tamañoTutela();
      
      //creo el array con datos de configuración para la vista
     

       $quejas = $this->Reportes_model->tamañoQuejas();
       $informacion = $this->Reportes_model->tamañoInformacion();
       $consulta = $this->Reportes_model->tamañoConsulta();
	  
	  //var_dump($quejas);
	   $datos_vista = array('tutelas' => $tutela,'quejas' => $quejas,'informacion'=>$informacion,'consulta'=>$consulta);
	  
	    $this->load->view('graficos/administracion', $datos_vista);
	  
	  
	  
	 
	   
	 
	  

	  
	 
	  
	 //var_dump($ultimosArticulos);
      
      //cargo la vista pasando los datos de configuacion
    
	 
	
   }
   
  
   
 
	 
}