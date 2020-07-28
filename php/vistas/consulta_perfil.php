<?php
 
  session_start();
 header('P3P: CP=»CAO PSA OUR');
header('Cache-control: private'); // IE 6 Fix.
  
  if(isset($_SESSION["id_usuario"])){


  ?>
<!DOCTYPE html>
<html lang="es">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>

      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href='..\..\index.php'><span class="glyphicon glyphicon-home"></span></a></li >

        <li ><a href="tabla.php">Consultar callejero</a></li>
        
      
      <?php if($_SESSION['tipo_usuario']==1||$_SESSION['tipo_usuario']==3){echo "<li><a href='consulta_solicitud.php'>Consular solicitudes</a></li>";} ?>


      <?php if($_SESSION['tipo_usuario']==3){echo "<li><a href='Administrar_usuarios.php'>Administrar usuarios</a></li>";} ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil <?php echo $_SESSION["perfil"]; ?> <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">
            <li><a href=""><?php echo $_SESSION["nombre"]; ?></a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="..\acciones\logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
          </ul>
        </li>

      <a class="navbar-brand" href="https://nae.global/">NAE,</a>
    </div>
  </div>
</nav>

<font  face="Arial, Helvetica, Helv" size="15"><b><i >Detalle usuario,</i></b></font>
  <br>



<?php
include('..\acciones\conexion.php');


        $id = $_GET['variable1'];

  
     
        
         // Conexión a base de datos.
        
        // Creación y/o formación de la consulta.
 
        // Ejecución y resultado de la consulta.
$result = mysqli_query($con, "SELECT * FROM usuarios where Id=$id");

  
        if (!$result) {
          DIE("Error en la consulta: " . mysql_error());
        } else {
          $row = mysqli_fetch_array($result);

  
            if($row['id_tipo']==1){$tipo_usu='Administrador'; $nuevo_tipo_usu='Consultor';$NUEVO_id_usu=2;}

            else{$tipo_usu='Consultor';$nuevo_tipo_usu='Administrador';$NUEVO_id_usu=1;}

            if($row['BAJA']==0){$ESTADO='Alta'; $ESTADO_NUEVO='Baja';$NUEVO_VALOR=1;}

            else{$ESTADO='Baja';$ESTADO_NUEVO='Alta';$NUEVO_VALOR=0;}
    
                    
          echo "




          <div style='text-align: center;border: 3px solid black';>      

                <form action='..\acciones\Editar_perfil.php' method='post' >
              <table align='center';>

                <tr>
                  <td>ID_USUARIO:</td>
                  <td><input type='text' id='id' name='id' value='".$row['id']."' readonly/></td>
                </tr>
                <tr>
                   <td>ESTADO USUARIO:</td>
                      <td><select style='width : 158px; height:26px' name='Estado'> <option value='".$row['BAJA']."'>".$ESTADO."</option> <option value='".$NUEVO_VALOR."'>".$ESTADO_NUEVO."</option> </select></td>
               </tr>
                <tr>
                  <td>USUARIO:</td>
                  <td><input type='text' id='usuario' name='usuario' value='".$row['usuario']."' readonly/></td>
                </tr>
                <tr>
                  <td>PASSWORD:</td>
                  <td><input type='text' id='password' name='password' value='".$row['password']."'/></td>
                </tr>
                <tr>
                  <td>TIPO USUARIO:</td>

                      <td><select style='width : 158px; height:26px' name='id_tipo'> <option value='".$row['id_tipo']."'>".$tipo_usu."</option> <option value='".$NUEVO_id_usu."'>".$nuevo_tipo_usu."</option> </select></td>
                </tr>
                <tr>
                  <td>NOMBRE:</td>
                  <td><input type='text' id='nombre' name='nombre' value='".$row['Nombre']."'/></td>
                </tr>
                <tr>
                  <td>APELLIDOS:</td>
                  <td><input type='text' id='apellidos' name='apellidos' value='".$row['Apellidos']."'/></td>
                </tr>
                <tr>
                  <td>EMAIL:</td>
                  <td><input type='text' id='email' name='email' value='".$row['Email']."'/></td>
                </tr>
                <tr>
                  <td>TELEFONO:</td>
                  <td><input type='text' id='telefono' name='telefono' value='".$row['telefono']."'/></td>
                </tr>
                <tr>
                  <td>CODIDO PROYECTO:</td>
                  <td><input type='text' id='cod_pro' name='cod_pro' value='".$row['Codigo_proyecto_Nae']."'/></td>
                </tr>
                  <tr>
                  <td>NOMBRE PROYECTO:</td>
                  <td><input type='text' id='nom_pro' name='nom_pro' value='".$row['Nombre_proyecto_Nae']."'/></td>
                </tr><br>
 
              </table>
              <br><br>
              <tr align='center'>
                  <td colspan='2'><input type='submit' value='Guardar cambios'/></td>
              </tr><br><br>
            </form>";
            
        }
      
    ?>






<input type="siguiente" onclick="history.back()" class="btn-default btn  btn-md" value="Regresar a usuarios">

<br>

</body>



 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqKNTA72e78Rcd2ucHZ_YamoEeF6e-fJE&callback=initMap"></script>

</html>
<?php
}else{header("location: login.php");}

?>