<?php
class Reportes_model extends CI_Model {

   function __construct(){
		
		parent::__construct();
        $this->load->database();
    }
   
   function dame_ultimos_articulos(){
     
	    $query = $this->db->query("SELECT Solicitante,Asunto,Radicado_Interno,Responsable,Fecha_Recibido,Fecha_Vencimiento,Tipo_Derecho_Peticion FROM derechopeticion");
        $result= $query->result();
        ;
		 $tamaño=count($result);
		 
		 
		  $hoy= date('Y-m-d',strtotime('-1 day')) ;
		  $actual=date('Y-m-d',strtotime('-1 day')) ;

                $hoy = strtotime($hoy);
			
		 
		if($tamaño>0)
	      {
			 
			// echo "hay datos"; 
			 foreach ($result as $row)
					{
						
						 $Solicitante=$row->Solicitante;
						 $FechaVencimiento=$row->Fecha_Vencimiento;
						 $FechaRecibido=$row->Fecha_Recibido;
						 $Responsable=$row->Responsable;
						 $RadicadoInterno=$row->Radicado_Interno;
						 $Asunto=$row->Asunto;
						 $tipo=$row->Tipo_Derecho_Peticion;
						 
						 
						         $consulta1= date('Y-m-d',strtotime('-30 days', strtotime($FechaVencimiento))); 
								 $consulta2= date('Y-m-d',strtotime('-29 days', strtotime($FechaVencimiento))); 
							     $consulta3= date('Y-m-d',strtotime('-28 days', strtotime($FechaVencimiento))); 
								 $consulta4= date('Y-m-d',strtotime('-27 days', strtotime($FechaVencimiento))); 
								 $consulta5= date('Y-m-d',strtotime('-26 days', strtotime($FechaVencimiento))); 
								 $consulta6= date('Y-m-d',strtotime('-25 days', strtotime($FechaVencimiento))); 
								 $consulta7= date('Y-m-d',strtotime('-24 days', strtotime($FechaVencimiento))); 
								 $consulta8= date('Y-m-d',strtotime('-23 days', strtotime($FechaVencimiento))); 
								 $consulta9= date('Y-m-d',strtotime('-22 days', strtotime($FechaVencimiento))); 
							     $consulta10= date('Y-m-d',strtotime('-21 days', strtotime($FechaVencimiento))); 
							     $consulta11= date('Y-m-d',strtotime('-20 days', strtotime($FechaVencimiento))); 
								 $consulta12= date('Y-m-d',strtotime('-19 days', strtotime($FechaVencimiento))); 
								 $consulta13= date('Y-m-d',strtotime('-18 days', strtotime($FechaVencimiento))); 
								 $consulta14= date('Y-m-d',strtotime('-17 days', strtotime($FechaVencimiento))); 
								 $consulta15= date('Y-m-d',strtotime('-16 days', strtotime($FechaVencimiento))); 
								 
						 
						         $informacion1  = date('Y-m-d',strtotime('-15 days', strtotime($FechaVencimiento))); 
								 $informacion2= date('Y-m-d',strtotime('-14 days', strtotime($FechaVencimiento))); 
								 $informacion3= date('Y-m-d',strtotime('-13 days', strtotime($FechaVencimiento))); 
								 $info4= date('Y-m-d',strtotime('-12 days', strtotime($FechaVencimiento))); 
								 $info5= date('Y-m-d',strtotime('-11 days', strtotime($FechaVencimiento))); 
							
			
					             $aceptable1 = date('Y-m-d',strtotime('-10 days', strtotime($FechaVencimiento))); // osea faltan 5 dias para que se venza
								 $aceptable2= date('Y-m-d',strtotime('-9 days', strtotime($FechaVencimiento))); 
								 $aceptable3= date('Y-m-d',strtotime('-8 days', strtotime($FechaVencimiento))); 
								 $aceptable4= date('Y-m-d',strtotime('-7 days', strtotime($FechaVencimiento))); 
								 $aceptable5= date('Y-m-d',strtotime('-6 days', strtotime($FechaVencimiento))); 
								 
								
	
								 $critico1 = date('Y-m-d',strtotime('-5 days', strtotime($FechaVencimiento))); // osea faltan 5 dias para que se venza
								 $critico2= date('Y-m-d',strtotime('-4 days', strtotime($FechaVencimiento))); 
								 $critico3= date('Y-m-d',strtotime('-3 days', strtotime($FechaVencimiento))); 
								 $critico4= date('Y-m-d',strtotime('-2 days', strtotime($FechaVencimiento))); 
								 $critico5= date('Y-m-d',strtotime('-1 days', strtotime($FechaVencimiento)));
						 
			
							 if($tipo=="queja")
							 {
					 
		
								if(strtotime($critico1) == $hoy || strtotime($critico2) == $hoy || strtotime($critico3) == $hoy
								|| strtotime($critico4) == $hoy || strtotime($critico5) == $hoy)
								{			
									$fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FF0000");
						
								}
								
							     if(strtotime($aceptable1) == $hoy || strtotime($aceptable2) == $hoy || strtotime($aceptable3) == $hoy
								|| strtotime($aceptable4) == $hoy || strtotime($aceptable5) == $hoy)
								{			
									 $fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FFFF00");
								}
							
								
								  if(strtotime($informacion1)== $hoy || strtotime($informacion2)== $hoy || strtotime($informacion3)== $hoy || strtotime($info4)== $hoy || strtotime($info5)== $hoy)
								  
								{
									 $fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#01DF01");
									
								}
				 
				            }
				 
				 
				              if($tipo=="informacion")
				             {
                               
					 
					             if(strtotime($aceptable1) == $hoy || strtotime($aceptable2) == $hoy || strtotime($aceptable3) == $hoy)
								
								{
									$fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#01DF01");
									
								}
								
								   if(strtotime($aceptable4) == $hoy || strtotime($aceptable5) == $hoy || strtotime($critico1) == $hoy)
								
								{
									$fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FFFF00");
									
								}
								
								
								   if(strtotime($critico2) == $hoy || strtotime($critico3) == $hoy || strtotime($critico4) == $hoy || strtotime($critico5) == $hoy)
								
								{
									$fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
									 'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
									 'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FF0000");
									
								}
					 
				            }
							
							
							
								 if($tipo=="consulta")
				             {
							
							 if(strtotime($consulta1) == $hoy || strtotime($consulta2) == $hoy || strtotime($consulta3) == $hoy || strtotime($consulta4) == $hoy || strtotime($consulta5) == $hoy
							 || strtotime($consulta6) == $hoy || strtotime($consulta7) == $hoy || strtotime($consulta8) == $hoy || strtotime($consulta9) == $hoy || strtotime($consulta10) == $hoy)
							 {
							
							 $fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
							'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
							'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#01DF01");
							
							 }
							
							
							if(strtotime($consulta11) == $hoy || strtotime($consulta12) == $hoy || strtotime($consulta13) == $hoy || strtotime($consulta14) == $hoy || strtotime($consulta15) == $hoy
							 || strtotime($informacion1) == $hoy || strtotime($informacion2) == $hoy || strtotime($informacion3) == $hoy || strtotime($info4) == $hoy || strtotime($info5) == $hoy)
							
							{
							 $fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
							'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
							'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FFFF00");
							
							}
							
							
							if(strtotime($aceptable1) == $hoy || strtotime($aceptable2) == $hoy || strtotime($aceptable3) == $hoy || strtotime($aceptable4) == $hoy || strtotime($aceptable5) == $hoy
							 || strtotime($critico1) == $hoy || strtotime($critico2) == $hoy || strtotime($critico3) == $hoy || strtotime($critico4) == $hoy || strtotime($critico5) == $hoy)
							
							{
							 $fechas[]= array('Solicitante'=> $Solicitante,'asunto'=>$Asunto,
							'radicadoInterno'=>$RadicadoInterno,'Responsable'=>$Responsable,
							'fechaRecibido'=>$FechaRecibido,'fechaVencimiento'=>$FechaVencimiento,'tipo'=>$tipo,"color"=>"#FF0000");
							
							}
							
							
							
							
							
							
							
					         }
							 
							
					
						

							

					 
					}
				
									
			 
			 
		  }
		
      return $fechas;

  
   }
   
     function tamañoQuejas(){
		
	     $query = $this->db->query("SELECT Solicitante,Asunto,Radicado_Interno,Responsable,Fecha_Recibido,Fecha_Vencimiento,Tipo_Derecho_Peticion FROM derechopeticion where Tipo_Derecho_Peticion='queja'");
         $result= $query->result();
		 $tamaño=count($result);

		return $tamaño;
		
	}

	    function tamañoInformacion(){
		
	     $query = $this->db->query("SELECT Solicitante,Asunto,Radicado_Interno,Responsable,Fecha_Recibido,Fecha_Vencimiento,Tipo_Derecho_Peticion FROM derechopeticion where Tipo_Derecho_Peticion='informacion'");
         $result= $query->result();
		 $tamaño=count($result);

		
		return $tamaño;
		
		
	}
   
      function tamañoConsulta(){
		
	     $query = $this->db->query("SELECT Solicitante,Asunto,Radicado_Interno,Responsable,Fecha_Recibido,Fecha_Vencimiento,Tipo_Derecho_Peticion FROM derechopeticion where Tipo_Derecho_Peticion='consulta'");
         $result= $query->result();
		 $tamaño=count($result);

		
		return $tamaño;
		
		
	}
   
   
   

}
?>