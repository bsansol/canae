
<?php
 
  session_start();
 header('P3P: CP=»CAO PSA OUR');
header('Cache-control: private'); // IE 6 Fix.
  
  if(isset($_SESSION["id_usuario"])){


  ?>



<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    
    <meta name="description" content="">
    <meta name="author" content="">
 

    <meta name="theme-color" content="#000000" />


    <title>Callejero NAE </title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


    
    <style type="text/css">
      #mapa {
            height: 50vh;
      }
      .h2s {
        font-size: 3vh;
      }
    </style>  
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


<font  face="Arial, Helvetica, Helv" size="15"><b><i >Solicitudes Modificacion,</i></b></font>
  <br>

  </head>

  <body> 



     <main role="main">



        <div class="container text-center mt-5">
          <div class="row mt-3">

            <div class="col-md-12">

                  <header>
                  <div class="panel panel-default">
                    <div class="panel-body">
                      Buscar por:
                  <form action="Consulta_solicitud.php" method="post">

                    
                 

                <input type="text" value="" name="usuario_solicita" placeholder="usuario solicita">
                <input type="text" value="" name="usuario_cierra" placeholder="usuario cierra">
                <input type="text" value="" name="tipo_solicitud" placeholder="tipo_solicitud"> 
                <input type="text" value="" name="estado" placeholder="estado"> 
                <input id="" type="submit" value="Buscar" name="search">
                 <button onclick="location.href='Consulta_solicitud.php'">Borrar resultados</button>
                </div>
                </div>
                </form>
                <br>

                </header>

              <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
              <?php 

              include('..\acciones\conexion.php');

  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $idsolicitud = '';
  $G12 = '';
  $municipio = '';
  $usuario_solicita = '';
  $usuario_cierra = '';
  $tipo_solicitud = '';
  $estado = '';

  if($_SESSION['id_usuario']==1){$usuario = '';}else{$usuario=$_SESSION['usuario'];} 
  

// aplicamos busqueda
if(isset($_POST['search'])) {
   
   $usuario_solicita = $_POST['usuario_solicita'];
   $usuario_cierra = $_POST['usuario_cierra'];
   $tipo_solicitud = $_POST['tipo_solicitud'];
   $estado = $_POST['estado'];


   $result = mysqli_query($con, "SELECT ID_SOLICITUD,G12,MUNICIPIO,USUARIO_SOLICITUD,USUARIO_CIERRE,TIPO_SOLICITUD,ESTADO_SOLICITUD  FROM tabla_solicitudes
    WHERE ID_SOLICITUD LIKE '%$idsolicitud%'  and ESTADO_SOLICITUD LIKE '%$estado%' and USUARIO_SOLICITUD  like '%$usuario_solicita%' and Tipo_SoLICITUD like '%$tipo_solicitud%' and USUARIO_CIERRE  like '%$usuario_cierra%' limit 4000");

 }else{

  $result = mysqli_query($con, "SELECT ID_SOLICITUD,G12,MUNICIPIO,USUARIO_SOLICITUD,USUARIO_CIERRE,TIPO_SOLICITUD,ESTADO_SOLICITUD  FROM tabla_solicitudes where USUARIO_CIERRE='NAE'");
      }


  // Creamos una tabla para listar los datos 
  echo "<h2 class='h2s'>".mysqli_num_rows($result)." direcciónes disponibles en Callejero NAE,</h2><br><br>


  <div class='table-responsive'>";

  echo "<table class='table'>
          <thead class='thead-dark'>
            <tr>
              <th scope='col'>G12</th>
              <th scope='col'>MUNICIPIO</th>
              <th scope='col'>USUARIO SOLICITA</th>
              <th scope='col'>USUARIO CIERRA</th>
              <th scope='col'>TIPO SOLICITUD</th>
              <th scope='col'>ESTADO</th>

              <th scope='col'>Acción</th>
            </tr>
            </thead>
            <tbody>";

  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td scope='col'>" . $row['G12'] . "</td>";
      echo "<td scope='col'>" . $row['MUNICIPIO'] . "</td>";
      echo "<td scope='col'>" . $row['USUARIO_SOLICITUD'] . "</td>";
      echo "<td scope='col'>" . $row['USUARIO_CIERRE'] . "</td>";     
      echo "<td scope='col'>" . $row['TIPO_SOLICITUD'] . "</td>";
      echo "<td scope='col'>" . $row['ESTADO_SOLICITUD'] . "</td>";
      
      echo "<td scope='col'><a href='ver_solicitud.php?variable1=" . $row['ID_SOLICITUD'] . "'>Detalle</a></td>";
      echo "</tr>";
  }
  echo "</tbody></table>";
  echo "</div>";
  

  mysqli_close($con); ?> 
              
            </div>
            
          </div>  


          <hr>

          <div class="row">

            <div class="col-md-12">

              

            </div>

          </div>

          <div class="row">

             

          </div>           
          
          
        </div>

    </main>


    <footer class="text-muted mt-3 mb-3">
        <div align="center"><IMG src="..\..\img\nae.png" width=100 height=90></div>
    </footer>    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqKNTA72e78Rcd2ucHZ_YamoEeF6e-fJE&callback=initMap"></script>


    
  </body>
</html>
<?php
}else{header("location: login.php");}

?>
