<?php
class Articulo_model extends CI_Model {

   function __construct(){
		
		parent::__construct();
        $this->load->database();
    }
   
   
   function dame_ultimos_articulos(){
     
	    $query = $this->db->query("SELECT Fecha_Vencimiento,Solicitante,Fecha_Recibido,Responsable,Radicado_Interno,Asunto FROM tutela");
        $result= $query->result();
        ;
		 $tamaño=count($result);
		 
		 
		 
		  $hoy= date('Y-m-d',strtotime('-1 day')) ;

                $hoy = strtotime($hoy);
		 
		if($tamaño>0)
	      {
			// echo $tamaño;
			// echo "hay datos"; 
			 foreach ($result as $row)
					{
						
						 $Solicitante=$row->Solicitante;
						 $FechaVencimiento=$row->Fecha_Vencimiento;
						 $FechaRecibido=$row->Fecha_Recibido;
						 $Responsable=$row->Responsable;
						 $RadicadoInterno=$row->Radicado_Interno;
						 $Asunto=$row->Asunto;
					   
					   
					             $aceptable1 = date('Y-m-d',strtotime('-10 days', strtotime($FechaVencimiento))); // osea faltan 5 dias para que se venza
								 $aceptable2= date('Y-m-d',strtotime('-9 days', strtotime($FechaVencimiento))); 
								 $aceptable3= date('Y-m-d',strtotime('-8 days', strtotime($FechaVencimiento))); 
								 $aceptable4= date('Y-m-d',strtotime('-6 days', strtotime($FechaVencimiento))); 
								 $aceptable5= date('Y-m-d',strtotime('-6 days', strtotime($FechaVencimiento))); 
	
								 $critico1 = date('Y-m-d',strtotime('-5 days', strtotime($FechaVencimiento))); // osea faltan 5 dias para que se venza
								 $critico2= date('Y-m-d',strtotime('-4 days', strtotime($FechaVencimiento))); 
								 $critico3= date('Y-m-d',strtotime('-3 days', strtotime($FechaVencimiento))); 
								 $critico4= date('Y-m-d',strtotime('-2 days', strtotime($FechaVencimiento))); 
								 $critico5= date('Y-m-d',strtotime('-1 days', strtotime($FechaVencimiento))); 
								 
							
								if(strtotime($critico1) == $hoy || strtotime($critico2) == $hoy || strtotime($critico3) == $hoy
								|| strtotime($critico4) == $hoy || strtotime($critico5) == $hoy)
								{			
								  $fechas[]= array('Solicitante'=> $Solicitante, "color"=>"red",
					                 'fechaVencimiento'=>$FechaVencimiento,'fechaRecibido'=>$FechaRecibido,
					                 'Responsable'=>$Responsable,'radicadoInterno'=>$RadicadoInterno,
					                 'asunto'=>$Asunto);

								}
								
								if(strtotime($aceptable1) == $hoy || strtotime($aceptable2) == $hoy || strtotime($aceptable3) == $hoy
								|| strtotime($aceptable4) == $hoy || strtotime($aceptable5) == $hoy)
								{			
									 $fechas[]= array('Solicitante'=> $Solicitante, "color"=>"yellow",
					                 'fechaVencimiento'=>$FechaVencimiento,'fechaRecibido'=>$FechaRecibido,
					                 'Responsable'=>$Responsable,'radicadoInterno'=>$RadicadoInterno,
					                 'asunto'=>$Asunto);
								}
					 
					}
				
									
			 
			 
		  }
		
      return $fechas;

  
   }
   
   
   
   
    function tamañoTutela(){
		
	     $query = $this->db->query("SELECT Fecha_Vencimiento,Solicitante,Fecha_Recibido,Responsable,Radicado_Interno,Asunto FROM tutela");
        $result= $query->result();
        ;
		 $tamaño=count($result);
		
		return $tamaño;
		
		
	}
   
   
   
   
   
}
?>