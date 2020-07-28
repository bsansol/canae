
<?php
 
  session_start();
  
  if(isset($_SESSION["id_usuario"])){

  ?>
<!DOCTYPE html>

<html>


<head>

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
<style>

footer { width: 100%; height: 60px; background: #ccc; font-size: 2em; text-align: center; clear: both; }

section { position: relative; }

#izquierda { position: relative; width: 50%; top: 0; left: 0; background: #ccc; float: left; height: 460px; }

#derecha { position: relative; width: 50%; top: 0; right: 0; background: #ccc; float: right; height: 460px; }

.esqinfder { position: absolute; bottom: 5px; right: 5px; background: #ff0; }

</style>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

<header>


<font  face="Arial, Helvetica, Helv" size="15"><b><i >Detalle,</i></b></font>
  <br>
<br>

</header>

<section>


<div id="izquierda">

<?php
include('..\acciones\conexion.php');


  
     
        $id = $_GET['variable1'];
         // Conexión a base de datos.
        
        // Creación y/o formación de la consulta.
 
        // Ejecución y resultado de la consulta.
$result = mysqli_query($con, "SELECT G12,G17,TIPO_VIA,CALLE,NUMERO,N_HOGARES,MUNICIPIO,PROVINCIA,POBLACION,CODIGO,ID_INE,REFERENCIA_CATASTRAL,ID_REGISTRO as id,LATITUD,LONGITUD,BAJA FROM callejero_nae_base_feb2020 where ID_REGISTRO=$id");

  
        if (!$result) {
          DIE("Error en la consulta: " . mysql_error());
        } else {
          $row = mysqli_fetch_array($result);
          if($row['LATITUD']=="SIN_INFO")
          {
            $latitud=40.417155;
            $longitud=-3.703440;

          }else{
            $latitud=$row['LATITUD'];
            $longitud=$row['LONGITUD'];}
          
          if($row['BAJA']==0){$ESTADO='BAJA';}else {
            if($row['BAJA']==1){$ESTADO='ALTA';}else{
              if($row['BAJA']==2){$ESTADO='MODIFICADO';}else{$ESTADO='PE.ANALISIS';}
            }}

          
          
          echo "

          <div style='text-align: center;border: 2px solid black';> 

                <form action='solicitar_modificacion.php?variable1=" . $row['id'] ."' method='post' 
              
              <br><br>
              <div class='panel panel-default'>
                <div class='panel-body'>
              
                
                  <tr>
                  <td>PROVINCIA:</td>
                  <td><input type='text' id='provincia' name='provincia' value='".$row['PROVINCIA']."'readonly/></td>
                  <td>MUNICIPIO:</td>
                  <td><input type='text' size='15' id='municipio' name='municipio' value='".$row['MUNICIPIO']."'readonly/></td>                                    
                  <td>POBLACION:</td>
                  <td><input type='text' id='poblacion' name='poblacion' value='".$row['POBLACION']."'readonly/></td>
                  </tr><br><br>


                  
                  <td>TIPO_VIA:</td>
                  <td><input type='text' id='tipo_via' name='tipo_via' value='".$row['TIPO_VIA']."'readonly/></td>

                  <td>VIA:</td>
                  <td><input type='text' id='calle' name='calle' value='".$row['CALLE']."'readonly/></td>
                  <td>Nº:</td>
                  <td><input type='text' id='numero' name='numero' value='".$row['NUMERO']."'readonly/></td>
                  </tr>
                  
                  <br>
                  <br>
                <tr>
                <td>CP:</td>
                  <td><input type='text' id='codigo' name='codigo' value='".$row['CODIGO']."'readonly/></td>
                  
                <td>LATITUD:</td>
                  <td><input type='text' id='latitud' name='latitud' value='".$row['LATITUD']."'readonly/></td>

                <td>LONGITUD:</td>
                  <td><input type='text' id='longitud' name='longitud' value='".$row['LONGITUD']."'readonly/></td>
                  <br><br>
                  
                  <td>Nº_INE:</td>
                  <td><input type='text' id='id' name='id' value='".$row['ID_INE']."' readonly/></td>
                  <td>REFERENCIA_CATASTRAL:</td>
                  <td><input type='text' id='catastro' name='caastro' value='".$row['REFERENCIA_CATASTRAL']."' readonly/></td>
 
                   
                  <br></div></div><br><tr>
               <div class='panel panel-default'>
                <div class='panel-body'>
                  <td>GESCAL12:</td>
                  <td><input type='text' id='g12' name='g12' value='".$row['G12']."'readonly/></td>
                  
                  <td>GESCAL17:</td>
                  <td><input type='text' id='g17' name='g17' value='".$row['G17']."'readonly/></td>
                  </tr><tr><br><br>

                  <td>ESTADO GESCAL:</td>
                  <td><input type='text' id='Estado' name='Estado' value='".$ESTADO."' readonly/></td>
                  
                  <td>Nº HOGARES:</td>
                  <td><input type='text' id='n_hogares' name='n_hogares' value='".$row['N_HOGARES']."'readonly/></td>
                  
                  <br>

                </tr>


                  <br></div></div>

                </tr>
 
                
               
                <tr align='center'>

                "; if($_SESSION['tipo_usuario']==1||$_SESSION['tipo_usuario']==3){echo "
                <td colspan='2'><input type='submit' value='Realizar cambios'/></td>";}else{echo "
                <td colspan='2'><input type='submit' value='Solicitar cambios'/></td>";} echo "

                

                    
                 </tr>           


               
            </form>
                  <br>
          </div>";
            
        }
      
    ?>


</div>

<div id='derecha'>
<?php
	echo "<iframe width='749' height='454' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
src='https://www.openstreetmap.org/export/embed.html?bbox=".$longitud."%2C".$latitud."%2C".$longitud."
%2C".$latitud."&amp;layer=mapnik&amp;marker=".$latitud."%2C".$longitud."' style='border: 2px solid black'></iframe>

    <div class='esqinfder'>

<small><a href='https://www.openstreetmap.org/?mlat=".$latitud."&amp;mlon=".$longitud."#map=17/".$latitud."/".$longitud."'>Ir a mapa</a></small>
    	
      </div>";
            
        
      
    ?>

</div>

</section>

<footer>

<input type="siguiente" onclick="history.back()" class="btn-default btn  btn-md" value="Regresar al Callejero">




   
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
