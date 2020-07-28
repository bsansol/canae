<?php
include('conexion.php');
	if(isset($_POST['Estado'])) {$Estado= $_POST['Estado'];}else{$Estado= 0;}
	$id = $_POST['id'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$id_tipo= $_POST['id_tipo'];
	$nombre = $_POST['nombre'];
	$apellidos= $_POST['apellidos'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$cod_pro = $_POST['cod_pro'];
	$nom_pro = $_POST['nom_pro'];




	


	
	// Ejecución y resultado de la consulta.
	$result = mysqli_query($con,"UPDATE usuarios 	SET 
		BAJA = '$Estado',usuario = '$usuario', password = '$password', id_tipo = '$id_tipo', Nombre = '$nombre',
		Apellidos = '$apellidos', Email = '$email', telefono= '$telefono', Codigo_proyecto_Nae='$cod_pro', Nombre_proyecto_Nae='$nom_pro'
		WHERE id = '$id'");




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
		<input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">
	</body>
</html>