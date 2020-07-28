<?php
	require('..\acciones\conexion.php');
	
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		header("Location: tabla.php");
	}
	
	if(isset($_POST['login']))
	{
		$usuario =$_POST['usuario'];
		$password = $_POST['password'];
		$error = '';
		
		//$sha1_pass = sha1($password);
		
		$result = mysqli_query($con, "SELECT id, id_tipo,usuario,Nombre FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");
		
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_usuario'] = $row['id'];
			$_SESSION['tipo_usuario'] = $row['id_tipo'];
			if($row['id_tipo']==1){$_SESSION['perfil']="Administrador";}else{if($row['id_tipo']==3){$_SESSION['perfil']="Webmaster";} else{$_SESSION['perfil']="Consultor";}}
			$_SESSION['usuario'] = $row['usuario'];
			$_SESSION['nombre'] = $row['Nombre'];
			
			header("location: tabla.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>
	

<!DOCTYPE html>
<html lang="es">
    <head>



    	<style>

			header, footer { width: 100%; height: 100px; background: #ccc; font-size: 2em; text-align: center; clear: both; }

			section { position: relative; }

			#izquierda { position: relative; width: 64%; top: 0; left: 0; background: #FFF; float: left; height: 870px; }

			#derecha { position: relative; width: 36%; top: 0; right: 0; background: #FFF; float: right;height: 870px;  }

			.esqinfder { position: absolute; bottom: 5px; right: 5px; background: #ff0; }

		</style>
        
        <meta charset="utf-8" />
     </head>
    <body>

    <section>

		<div id="izquierda">	

<iframe src='http://localhost:4848/single/?appid=C%3A%5CUsers%5Cbsans%5CDocuments%5CQlik%5CSense%5CApps%5CCallejero.qvf&obj=wUJqm&opt=ctxmenu,currsel' style='border:none;width:100%;height:100%;'></iframe>

		
		</div>

		<div id='derecha' ALIGN=CENTER>


 
<iframe src="http://localhost:4848/single/?appid=
C%3A%5CUsers%5Cbsans%5CDocuments%5CQlik%5CSense%5CApps%5CCallejero.qvf&obj=jPGLmZb&opt=ctxmenu,currsel" 
style="border:none;width:100%;height:50%;"></iframe>

<br>
<br>
<a href='index.php' style='color: black'><font  
	face="Arial, Helvetica, Helv" size="15"><b><i >CALLEJERO</i><BR><i>     NAE,</i></b></font></a>

<br>







<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Usuario:</label><input id="usuario" name="usuario" type="text" ></div>
			<br />
			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />
			<div><input name="login" type="submit" value="login"></div> 
		</form> 












		</div>

	</section>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Datos  callejero"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    </body>

</html>