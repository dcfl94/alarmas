<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>INTERNO APLICACION</title>

</style>
</head>
<body>
	<h1>REPORTE DE ALARMAS</h1>
    
	   </section>




<title>proyecto software</title>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://localhost/alarma/application/views/reportes/flexigrid.pack.js"></script>
<link rel="stylesheet" type="text/css" href="http://localhost/alarma/application/views/reportes/flexigrid.css">
<div><h3>Tabla con la Informacion </h1></div>


<div> 

<div> 
<table id="flex1" style=""></table> 

</div>

<script>



jQuery(document).ready(function() 
{
	
var issueListingGrid = null;
       jQuery("#flex1").flexigrid({
		 url: 'http://localhost/alarma/reportes/load', dataType: 'json', colModel : 
	   [ 
	   {display: 'Fecha Inicio ', name : 'fechaI',width: 140 , sortable : true, align: 'left'},
	   {display: 'Fecha Vencimiento', name : 'fechaF', width: 140 , sortable : true, align: 'left'},
	       {display: 'solicitante', name : 'Solicitante',width: 140 , sortable : true, align: 'left'},
	 {display: 'Responsable', name : 'res',width: 140 , sortable : true, align: 'left'}
		      
		   ], 
        searchitems : [ {display: 'Name', name : 'name', isdefault: true} ],
				
        sortname: "name", 
        sortorder: "asc", 
        usepager: true, 
        title: 'informacion vencimiento de tutelas', 
		onSuccess:function(){
            },
        useRp: true, 
        rp: 5, 
        showTableToggleBtn: true, 
        width: 700, 
        //onSubmit: addFormData, 
        height: 200 
}); 
});



</script>

	
	
	
	
		
    </div>
</body>
</html>
