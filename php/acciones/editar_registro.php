<?php
session_start();
include('conexion.php');

	//$Estado= $_POST['Estado'];
	//$Estado='2';
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
	$estado=$_POST['estado'];

	

if ($estado==2) {$tiposolicitud='Modificacion';}
if ($estado==0) {$tiposolicitud='Baja de calle';}
if ($estado==1) {$tiposolicitud='Alta de calle';}
if ($estado==3) {$tiposolicitud='Analisis';}



	


$result = mysqli_query($con,"INSERT INTO tabla_solicitudes (ID_NAE, PROVINCIA,MUNICIPIO,POBLACION,
	AGRUPACION,TIPO_VIA,CALLE,NUMERO,CODIGO,G12,G17,LATITUD,LONGITUD,BAJA,
	CATASTRO,HOGARES, PROVINCIA_SOLICITUD,MUNICIPIO_SOLICITUD,POBLACION_SOLICITUD,AGRUPACION_SOLICITUD,
 TIPO_VIA_SOLICITUD,CALLE_SOLICITUD,NUMERO_SOLICITUD, CODIGO_SOLICITUD,G12_SOLICITUD,G17_SOLICITUD,LATITUD_SOLICITUD, 
  LONGITUD_SOLICITUD, BAJA_SOLICITUD,
  CATASTRO_SOLICITUD,HOGARES_SOLICITUD ,USUARIO_SOLICITUD, COMENTARIO_SOLICITUD, ESTADO_SOLICITUD,  USUARIO_CIERRE,
  FECHA_CIERRE,COMENTARIO_CIERRE,TIPO_SOLICITUD,ID_INE,ID_INE_SOLICITUD)

SELECT ID_REGISTRO, PROVINCIA,MUNICIPIO,POBLACION,AGRUPACION,TIPO_VIA,CALLE,NUMERO,CODIGO,G12,G17,
LATITUD,LONGITUD,BAJA,REFERENCIA_CATASTRAL,N_HOGARES,

'$provincia','$municipio','$poblacion','0' AS AGRUPACION,'$tipo_via', '$calle','$numero','$codigo','$G12','$G17',
'$latitud','$longitud','$estado',
'$catastro','$hogares',
'$usuario','$Comentario','Cerrado','$usuario',NOW(),'$Comentario','$tiposolicitud',ID_INE,'$ine' from callejero_nae_base_feb2020
WHERE ID_REGISTRO = $id");


//traemos los datos de la consulta

$result = mysqli_query($con, "SELECT * FROM callejero_nae_base_feb2020 where ID_REGISTRO=$id");
$row = mysqli_fetch_array($result);

			if(empty($G12)){$G12=$row['G12'];}
			if(empty($G12)){$G17=$row['G17'];}
			if(empty($tipo_via)){$tipo_via=$row['TIPO_VIA'];}
			if(empty($calle)) {$calle=$row['CALLE'];}
			if(empty($numero)) {$numero=$row['NUMERO'];}
			if(empty($municipio)){$municipio=$row['MUNICIPIO'];}
			if(empty($poblacion)){$poblacion=$row['POBLACION'];}
			if(empty($codigo)){$codigo=$row['CODIGO'];}
			if(empty($provincia)) {$provincia=$row['PROVINCIA'];}
			if(empty($latitud) ){$latitud=$row['LATITUD'];}
			if(empty($longitud)){$longitud=$row['LONGITUD'];}
			if(empty($ine)){$ine=$row['ID_INE'];}
			if(empty($catastro)){$catastro=$row['REFERENCIA_CATASTRAL'];}
			if(empty($hogares)){$hogares=$row['N_HOGARES'];}
			


  


	// Ejecución y resultado de la consulta.
	$result = mysqli_query($con,"UPDATE callejero_nae_base_feb2020 	SET 
		BAJA = '$estado',G12 = '$G12',G17 = '$G17', tipo_via = '$tipo_via', calle = '$calle',NUMERO = '$numero', municipio = '$municipio',
		POBLACION = '$poblacion', CODIGO = '$codigo', PROVINCIA = '$provincia', LATITUD='$latitud', LONGITUD='$longitud' ,
		 ID_INE='$ine',REFERENCIA_CATASTRAL='$catastro',N_HOGARES='$hogares',BAJA='$estado' 
		WHERE ID_REGISTRO = '$id'");




	if (!$result) {

		echo "Error en la consulta: " . mysql_error();

	} else {
		echo "Registro actualizado correctamente (Mysql).";
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