<?php
session_start();
include('conexion.php');

	
	
	//$Estado_solicitud= $_POST['estado_solicitud'];
	$id_solicitud= $_GET['variable2'];
	$Comentario_cierre= $_POST['comentario_cierre'];
	$usuario=$_SESSION['usuario'];



$result = mysqli_query($con,"SELECT  * from tabla_solicitudes
		WHERE ID_SOLICITUD = '$id_solicitud'");
$row = mysqli_fetch_array($result);

if($row['TIPO_SOLICITUD']=='Incidencia'){

}
else{



	//$Estado= $_POST['Estado'];
	$Estado= "solicitado";
	$ine = $_POST['ine'];
	$G12 = $_POST['g12'];
	$G17 = $_POST['g17'];
	$CATASTRO = $_POST['catastro'];
	$tipo_via = $_POST['tipo_via'];
	$calle = $_POST['calle'];
	$numero = $_POST['numero'];
	$hogares = $_POST['hogares'];
	$municipio = $_POST['municipio'];
	$poblacion = $_POST['poblacion'];
	$codigo = $_POST['cp'];
	$provincia = $_POST['provincia'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$id = $_GET['variable1'];
	$estado = $_POST['estado'];



	//traemos los datos de la consulta

$result = mysqli_query($con, "SELECT G12,G17,TIPO_VIA,CALLE,N_HOGARES,NUMERO,MUNICIPIO,PROVINCIA,POBLACION,CODIGO,REFERENCIA_CATASTRAL,ID_INE,ID_REGISTRO as id,LATITUD,LONGITUD,BAJA FROM callejero_nae_base_feb2020 where ID_REGISTRO=$id");
$row = mysqli_fetch_array($result);

			if(empty($G12)){$G12=$row['G12'];}
			if(empty($G17)){$G12=$row['G17'];}
			if(empty($CATASTRO)){$CATASTRO=$row['REFERENCIA_CATASTRAL'];}
			if(empty($tipo_via)){$tipo_via=$row['TIPO_VIA'];}
			if(empty($calle)) {$calle=$row['CALLE'];}
			if(empty($numero)) {$numero=$row['NUMERO'];}
			if(empty($hogares)) {$numero=$row['N_HOGARES'];}
			if(empty($municipio)){$municipio=$row['MUNICIPIO'];}
			if(empty($poblacion)){$poblacion=$row['POBLACION'];}
			if(empty($codigo)){$codigo=$row['CODIGO'];}
			if(empty($provincia)) {$provincia=$row['PROVINCIA'];}
			if(empty($latitud) ){$latitud=$row['LATITUD'];}
			if(empty($longitud)){$longitud=$row['LONGITUD'];}
			if(empty($ine)){$ine=$row['ID_INE'];}
			


	// Ejecución y resultado de la consulta.
	$result = mysqli_query($con,"UPDATE callejero_nae_base_feb2020 	SET 
		BAJA = '$Estado',G12 = '$G12',G17 = '$G17', tipo_via = '$tipo_via', calle = '$calle',
		 NUMERO = '$numero',N_HOGARES = '$hogares', municipio = '$municipio',
		POBLACION = '$poblacion', CODIGO = '$codigo', PROVINCIA = '$provincia', LATITUD='$latitud', 
		LONGITUD='$longitud',ID_INE='$ine',REFERENCIA_CATASTRAL='$CATASTRO',BAJA='$estado' 
		WHERE ID_REGISTRO = '$id'");




	if (!$result) {

		echo "Error en la consulta: " . mysql_error();

	} else {
		//echo "Usuario actualizado correctamente (Mysql).";
	}

if ($estado==2) {$tiposolicutid='Modificacion'}
if ($estado==0) {$tiposolicutid='Baja de calle'}
if ($estado==1) {$tiposolicutid='Alta de calle'}
if ($estado==3) {$tiposolicitud='Analisis';}

	$result = mysqli_query($con,"UPDATE tabla_solicitudes	
		SET  USUARIO_CIERRE='$usuario',COMENTARIO_CIERRE='$Comentario_cierre',
		FECHA_CIERRE =NOW(),ESTADO_SOLICITUD='Cerrado',TIPO_SOLICITUD='$tiposolicutid'

			WHERE ID_SOLICITUD = '$id_solicitud'");

}




	if (!$result) {

		echo "Error en la consulta: " . mysql_error();

	} else {
		echo "Solicitud cerrada correctamente (Mysql).";
	}
?>
 
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	</head>
	<body link="#08298A" vlink="#08298A" alink="#08298A">
		<input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
	</body>
</html>