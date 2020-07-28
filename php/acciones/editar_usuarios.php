<?php
include('conexion.php');

	$Estado= $_POST['Estado'];
	$id = $_POST['id'];
	$G12 = $_POST['g12'];
	$tipo_via = $_POST['tipo_via'];
	$calle = $_POST['calle'];
	$municipio = $_POST['municipio'];
	$poblacion = $_POST['poblacion'];
	$codigo = $_POST['codigo'];
	$provincia = $_POST['provincia'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$Comentario = $_POST['comentario'];



	// Ejecución y resultado de la consulta.
	$result = mysqli_query($con,"UPDATE callejero_nae_base_feb2020 	SET 
		BAJA = '$Estado',G12 = '$G12', tipo_via = '$tipo_via', calle = '$calle', municipio = '$municipio',
		POBLACION = '$poblacion', CODIGO = '$codigo', PROVINCIA = '$provincia', LATITUD=$latitud, LONGITUD=$longitud 
		WHERE ID_REGISTRO = '$id'");




	if (!$result) {

		echo "Error en la consulta: " . mysql_error();

	} else {
		echo "Usuario actualizado correctamente (Mysql).";
	}
?>
 
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	</head>
	<body link="#08298A" vlink="#08298A" alink="#08298A">
		<button onclick="location.href='../vistas/tabla.php'">Volver a  callejero</button>
	</body>
</html>