<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Heredamos de la clase CI_Controller */
class reportes extends CI_Controller {

	
function index()
{
	

	$this->load->view('reportes/administracion');
}

public function load(){
	$mysqli = new mysqli("localhost", "root", "", "alarmas");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta = "SELECT FechaVencimiento,Solicitante,FechaRecibido FROM tutela";
$result = $mysqli->query($consulta);

$hoy= date('Y-m-d',strtotime('-1 day')) ;
$hoy = strtotime($hoy);


if ($result->num_rows > 0) 
{

	for ($x = 0; $x <= $result->num_rows; $x++) 
{
     if($row = $result->fetch_assoc()) 
	 {
		  $id=$row[ "FechaVencimiento"];
		  $solicitante=$row["Solicitante"];
		  $fechaInicio=$row["FechaRecibido"];
		 
		 // echo $hoy ." ";
		  $critico = date('Y-m-d',strtotime('-6 days', strtotime($id))); // osea faltan 5 dias para que se venza
		  
		  // echo strtotime($fechaProgramada) ." ";
			if(strtotime($critico) <= $hoy)
			{			
				 $fechas['userList']= array('fechaF'=> $id, "color"=>"red",'Solicitante'=>$solicitante,'fechaI'=>$fechaInicio);
				
			}
			else
			{
				$fechas['userList']= array('fechaF'=> $id ,'Solicitante'=>$solicitante,'fechaI'=>$fechaInicio);
			}
			 
		
     }
	 
}
		
		       // print_r($fechas);
			
}
	 else {
    echo "0 results";
}

//SELECT DATEDIFF('2015-10-11',NOW())


	$offset = isset($_POST['rp']) ? intval($_POST['rp']) : 5;
                 $page=isset($_POST['page']) ? intval($_POST['page']) : 1;
				 $limit = ($page-1)*$offset;
				 	 
                 $userdata = array_slice($fechas,$limit, $offset);
				 
		$response['userList'] = array(
	        'page' => $page,
			'total' => count($fechas),
	        'rows' => $userdata );


	  $json =  json_encode($response);
	  
	  
	echo '{"page":1,"total":3,"rows":[{"fechaF":"2015-10-24","color":"green","Solicitante":"Javier montoya ","fechaI":"2015-10-14","res":"Felipe Arias"},{"fechaF":"2015-10-27","color":"yellow","Solicitante":"Edwin Tabares","fechaI":"2015-10-14","res":"Andres Perez"},{"fechaF":"2015-10-23","color":"red","Solicitante":"Diana Farfan","fechaI":"2015-10-15","res":"Jose Rodriguez"}]}';
     
$mysqli->close();
}
}