<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Administracion Tutelas - Sourcezilla</title>
	<style type='text/css'>
		body
		{
			font-family: Arial;
			font-size: 14px;
			background-color: #eee;
		}
		a
		{
		    color: blue;
		    text-decoration: none;
		    font-size: 14px;
		}
		a:hover
		{
			text-decoration: underline;
		}
		#container{
			width: 50%;
		    margin: 0 auto;
		    margin-top: 50px;
		    border: 1px solid #ccc;
		    padding: 10px;
		    background: #ddd;
		    text-align: center;
		}
		.dropdown-menu{
			left: 50% !important;
			right: auto !important;
			  text-align: center !important;
			  transform: translate(-50%, 0) !important;
		}
		#logo{
			display: block;
    margin: 15px auto;
    height: 165px;
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> </script>
</head>
<body>

		<img src="assets/images/uniquindio.png" id="logo">
	<div id="container">



		<h1>Sistema de trazabilidad para derechos de peticion y tutelas UQ</h1>
	    <div>
	    	
	    	<div class="dropdown">
			  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Elige una opcion
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="index.php/tutelas/administracion">Tutelas</a>
			    </li>
			    <li>	    		<a href="index.php/derechopeticion/administracion">Derechos de peticion</a>
			    </li>
			    <li>	    		<a href="index.php/Reportes/administracion">Reportes</a>
			    </li>
			  </ul>
			</div>
	    </div>

	</div>
</body>
</html>