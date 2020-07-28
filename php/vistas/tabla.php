
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


<font  face="Arial, Helvetica, Helv" size="15"><b><i >CONSULTA</i></b></font>
 

  </head>

  <body> 



     <main role="main">



        <div class="container text-center mt-5">
          <div class="row mt-3">

            <div class="col-md-12">

                  <header>
                    Buscar por:
                    <form action="tabla.php" method="post">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      
                  

                    
               
                <input type="text" value="" name="provincia" placeholder="Provincia"> 
                <input type="text" value="" name="municipio" placeholder="Municipio">
                <input type="text" value="" name="poblacion" placeholder="Poblacion"><br>
             
                <input type="text" value="" name="tipo" placeholder="Tipo via">
                <input type="text" value="" name="calle" placeholder="Nombre via">
                <input type="text" value="" name="cp" placeholder="Codigo Postal"><br>

                <input type="text" value="" name="ine" placeholder="Numero INE">
                <input type="text" value="" name="catastro" placeholder="Referencia catastral"><br>                

               
                </div>
                    </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                
 
                
                  <input type="text" value="" name="gescal" placeholder="Gescal (digitos 1 a 12)">
    
                  <?php if($_SESSION['tipo_usuario']==1||$_SESSION['tipo_usuario']==3){echo "<select style='width : 150px; height:26px' id='estado' name='estado'><option value=''>Estado calle</option><option value='1'>ALTA</option><option value='0'>BAJA</option><option value='2'>MODIFICADO</option><option value='3'>PE.ANALISIS</option></select>";} ?>
                
                </div>
                    </div>

                 <input id="" type="submit" value="Buscar" name="search">
                 <button onclick="location.href='tabla.php'">Borrar</button>
                </form>
                <br>


                </header>


              


              <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
<?php 

include('..\acciones\conexion.php');

  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $idnae = '';
  $G12 = '';
  $estado = '';
  $estado2 = '';

 
  $provincia = '';
  $poblacion = '';
  $municipio = '';
  $tipo = '';
  $calle = '';
  $CP = '';
  $ine = '';
  $catastro = '';

// aplicamos busqueda
if(isset($_POST['search'])) {
   
   $G12 = $_POST['gescal'];
   $CP = $_POST['cp'];
   $tipo = $_POST['tipo'];
   $calle = $_POST['calle'];
   $municipio = $_POST['municipio'];
   $provincia = $_POST['provincia'];
   $poblacion = $_POST['poblacion'];
   $ine = $_POST['ine'];
   $catastro = $_POST['catastro'];

   if($_SESSION['tipo_usuario']==2){$estado = 1;$estado2 = 2;} else
   {$estado = $_POST['estado'];
   $estado2 = $_POST['estado'];}
   
   
   $result = mysqli_query($con, "SELECT G12,TIPO_VIA,CALLE,MUNICIPIO,PROVINCIA,POBLACION,CODIGO,ID_REGISTRO as id FROM callejero_nae_base_feb2020 
    WHERE ID_REGISTRO LIKE '%$idnae%' and G12 LIKE '$G12%' and CODIGO LIKE '%$CP%' and PROVINCIA LIKE '%$provincia%' and POBLACION LIKE '%$poblacion%' and
    TIPO_VIA LIKE '%$tipo%'and CALLE LIKE '%$calle%' and MUNICIPIO LIKE '%$municipio%' and ID_INE LIKE '%$ine%' and REFERENCIA_CATASTRAL LIKE '%$catastro%' and 
    (BAJA LIKE '%$estado%' or BAJA LIKE '%$estado2%') limit 4000");

 }else{

  $result = mysqli_query($con, "SELECT G12,TIPO_VIA,CALLE,MUNICIPIO,PROVINCIA,POBLACION,CODIGO,ID_REGISTRO as id FROM callejero_nae_base_feb2020 where POBLACION='NAE'");
      }


  // Creamos una tabla para listar los datos 
  echo "<i> 4000 direcciones maximas por busqueda.</i><h2 class='h2s'>".mysqli_num_rows($result)." Calles encontradas,


<a title='Descargar CSV' href='..\acciones\csv.php?variable2="
 . $G12 . "&variable3=" . $CP . "&variable4=" . $tipo . "&variable5=" . $calle . "&variable6=" . $municipio . "&
 variable7=" . $provincia . "&variable8=" . $estado . "&variable9=" . $estado2 . "&variable10=" . $poblacion . "&variable11=" . $ine . "&variable12=" . $catastro ."'' >
<img src='..\..\img\csv.png'></a></h2>



   
      <br><br>

  <div class='table-responsive'>";

  echo "<table class='table'>
          <thead class='thead-dark'>
            <tr>
              <th scope='col'>G12</th>
              <th scope='col'>TIPO VIA</th>
              <th scope='col'>NOMBRE VIA</th>
              <th scope='col'>CP</th>
              <th scope='col'>MUNICIPIO</th>
              <th scope='col'>POBLACION</th>
              <th scope='col'>PROVINCIA</th>
              <th scope='col'>Acción</th>
            </tr>
            </thead>
            <tbody>";


  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td scope='col'>" . $row['G12'] . "</td>";
      echo "<td scope='col'>" . $row['TIPO_VIA'] . "</td>";
      echo "<td scope='col'>" . $row['CALLE'] . "</td>";
      echo "<td scope='col'>" . $row['CODIGO'] . "</td>";     
      echo "<td scope='col'>" . $row['MUNICIPIO'] . "</td>";
      echo "<td scope='col'>" . $row['POBLACION'] . "</td>";
      echo "<td scope='col'>" . $row['PROVINCIA'] . "</td>";

      
      echo "<td scope='col'><a href='consulta.php?variable1=" . $row['id'] . "'>Detalle</a></td>";
     


 
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
