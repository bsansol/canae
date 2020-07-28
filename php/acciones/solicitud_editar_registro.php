<?php
session_start();
include('conexion.php');

	//$Estado= $_POST['Estado'];
	$Estado='2';
	$id = $_GET['variable1'];
	$G12 = $_POST['g12'];
	$G17 = $_POST['g17'];
	$tipo_via = $_POST['tipo_via'];
	$calle = $_POST['calle'];
	$municipio = $_POST['municipio'];
	$poblacion = $_POST['poblacion'];
	$codigo = $_POST['cp'];
	$provincia = $_POST['provincia'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$Comentario = $_POST['comentario'];
	$usuario=$_SESSION['usuario'];
	$ine=$_POST['ine'];
	$hogares=$_POST['hogares'];
	$numero=$_POST['numero'];
	$catastro=$_POST['catastro'];
	

$result = mysqli_query($con,"INSERT INTO tabla_solicitudes (ID_NAE, PROVINCIA,MUNICIPIO,POBLACION,
	AGRUPACION,TIPO_VIA,CALLE,NUMERO,CODIGO,G12,G17,LATITUD,LONGITUD,BAJA,
	CATASTRO,HOGARES,
 PROVINCIA_SOLICITUD,MUNICIPIO_SOLICITUD,POBLACION_SOLICITUD,AGRUPACION_SOLICITUD,
 TIPO_VIA_SOLICITUD,CALLE_SOLICITUD,NUMERO_SOLICITUD, CODIGO_SOLICITUD,G12_SOLICITUD,G17_SOLICITUD,LATITUD_SOLICITUD, 
  LONGITUD_SOLICITUD, BAJA_SOLICITUD,CATASTRO_SOLICITUD,HOGARES_SOLICITUD ,USUARIO_SOLICITUD, COMENTARIO_SOLICITUD,
 ESTADO_SOLICITUD,  USUARIO_CIERRE,
  FECHA_CIERRE,COMENTARIO_CIERRE,TIPO_SOLICITUD,ID_INE,ID_INE_SOLICITUD)
SELECT ID_REGISTRO, PROVINCIA,MUNICIPIO,POBLACION,AGRUPACION,TIPO_VIA,CALLE,NUMERO,CODIGO,G12,G17,LATITUD,LONGITUD,BAJA,
REFERENCIA_CATASTRAL,N_HOGARES,

'$provincia','$municipio','$poblacion','0' AS AGRUPACION,'$tipo_via', '$calle','$numero','$codigo','$G12','$G17',
'$latitud','$longitud','$Estado','$catastro','$hogares',
'$usuario','$Comentario','Modificar','$usuario',NOW(),'$Comentario','Modificacion',ID_INE,'$ine' from callejero_nae_base_feb2020
WHERE ID_REGISTRO = $id");




	if (!$result) {

		echo "Error en la consulta: " . mysql_error();

	} else {
		echo "Solicitud procesada correctamente (Mysql).";
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