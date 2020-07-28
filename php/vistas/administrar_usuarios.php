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

<font  face="Arial, Helvetica, Helv" size="15"><b><i >Administrar usuarios,</i></b></font>
  <br>



 <main role="main">



        <div class="container text-center mt-5">
          <div class="row mt-3">

            <div class="col-md-12">

                  <header>
                <div class="panel panel-default">
                  <div class="panel-body">
                    Buscar por:

                  <form action="administrar_usuarios.php" method="post">
                   
    <select style='width : 150px; height:26px' id='estado' name='estado'><option value=''>Estado usuarios</option><option value='0'>ALTA</option><option value='1'>BAJA</option></select>

                <input type="text" value="" name="id" placeholder="ID_USUARIO">
                <input type="text" value="" name="usuario" placeholder="Nick usuario">
                <input type="text" value="" name="nombre" placeholder="NOMBRE"><br>
                <input type="text" value="" name="apellido" placeholder="APELLIDO">
                <input type="text" value="" name="cod_proye" placeholder="CODIGO PROYECTO">
                <input type="text" value="" name="nom_proye" placeholder="NOMBRE_PROYECTO"> 
                <input id="" type="submit" value="Buscar" name="search">
                 <button onclick="location.href='administrar_usuarios.php'">Borrar resultados</button>
                
                </form>
                </div>
                </div>
               


                </header>


                <div class="panel panel-default">
                  <div class="panel-body">
                    Añadir usuario

                    <form action="administrar_usuarios.php" method="post">
                <input type="text" value="" name="usuario" placeholder="Nick usuario">
                <input type="text" value="" name="password" placeholder="Password usuario">
                <input type="text" value="" name="nombre" placeholder="NOMBRE">
                <input type="text" value="" name="apellido" placeholder="APELLIDO">
                <input id="" type="submit" value="Añadir" name="añadir">
                 <button onclick="location.href='administrar_usuarios.php'">Borrar resultados</button>
                
                </form>


                  </div>
                </div>
                <br>




              <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
              <?php 

              include('..\acciones\conexion.php');

  // Listamos 
  $id = '';
  $usuario = '';
  $nombre = '';
  $apellido = '';
  $cod_proye = '';
  $nom_proye = '';
  $estado = '';


  //añadimos usuarios

  if(isset($_POST['añadir'])) {
   $usuario = $_POST['usuario'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $password = $_POST['password'];
  
  


echo "INSERT INTO usuarios (usuario, password, nombre,apellidos)

VALUES ('$usuario', '$password', '$nombre','$apellido');";

   $result = mysqli_query($con, "INSERT INTO usuarios (usuario, password, nombre,apellidos)

VALUES ('$usuario', '$password', '$nombre','$apellido')");


 }
  

// aplicamos busqueda
if(isset($_POST['search'])) {
   $id = $_POST['id'];
   $usuario = $_POST['usuario'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $cod_proye = $_POST['cod_proye'];
   $nom_proye = $_POST['nom_proye'];
   $estado = $_POST['estado'];
  




   $result = mysqli_query($con, "SELECT * FROM usuarios
    WHERE 

    id LIKE '%$id%' and usuario LIKE '%$usuario%' and nombre LIKE '%$nombre%' and apellidos LIKE '%$apellido%' and
    Codigo_proyecto_Nae LIKE '%$cod_proye%'and Nombre_proyecto_Nae LIKE '%$nom_proye%' and BAJA LIKE '%$estado%' limit 2000");

 }else{

  $result = mysqli_query($con, "SELECT * FROM usuarios where id='NAE'");
      }


  // Creamos una tabla para listar los datos 
  echo "<h2 class='h2s'>".mysqli_num_rows($result)." usuarios presentes en Callejero NAE,</h2><br><br>
  <div class='table-responsive'>";

  echo "<table class='table'>
          <thead class='thead-dark'>
            <tr>
              <th scope='col'>ID</th>
              <th scope='col'>USUARIO</th>
              <th scope='col'>NOMBRE</th>
              <th scope='col'>APELLIDOS</th>
              <th scope='col'>CODIGO PROYECTO</th>
              <th scope='col'>NOMBRE PROYECTO</th>
              <th scope='col'>Acción</th>
            </tr>
            </thead>
            <tbody>";


  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td scope='col'>" . $row['id'] . "</td>";
      echo "<td scope='col'>" . $row['usuario'] . "</td>";
      echo "<td scope='col'>" . $row['Nombre'] . "</td>";
      echo "<td scope='col'>" . $row['Apellidos'] . "</td>";     
      echo "<td scope='col'>" . $row['Codigo_proyecto_Nae'] . "</td>";
      echo "<td scope='col'>" . $row['Nombre_proyecto_Nae'] . "</td>";
       
      echo "<td scope='col'><a href='consulta_perfil.php?variable1=" . $row['id'] . "'>Detalle</a>";
     


 
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

       



</body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqKNTA72e78Rcd2ucHZ_YamoEeF6e-fJE&callback=initMap"></script>

</html>
<?php
}else{header("location: login.php");}

?>