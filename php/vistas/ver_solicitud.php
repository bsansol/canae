
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

#izquierda { position: relative; width: 50%; top: 0; left: 0; background: #ccc; float: left; height: 660px; }

#derecha { position: relative; width: 50%; top: 0; right: 0; background: #ccc; float: right; height: 660px; }

.esqinfder { position: absolute; bottom: 5px; right: 5px; background: #ff0; }

</style>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>

<body>

<header>


<font  face="Arial, Helvetica, Helv" size="15"><b><i >Datos modificacion,</i></b></font>
  <br>
<br>

</header>

<section>




<?php
include('..\acciones\conexion.php');


  
     
        $id = $_GET['variable1'];
         // Conexión a base de datos.
        
        // Creación y/o formación de la consulta.
 
        // Ejecución y resultado de la consulta.
$result = mysqli_query($con, "SELECT * FROM tabla_solicitudes where ID_SOLICITUD=$id");

  
        if (!$result) {
          DIE("Error en la consulta: " . mysql_error());
        } else {
          $row = mysqli_fetch_array($result);

          if($row['BAJA']==0){$ESTADO='BAJA';}else {
            if($row['BAJA']==1){$ESTADO='ALTA';}else{
              if($row['BAJA']==2){$ESTADO='MODIFICADO';}else{$ESTADO='PE.ANALISIS';}
            }}
          
          
          if($row['TIPO_SOLICITUD']=='Incidencia'){
          
         }

          else{
            

echo "
<div id='izquierda'><br>
  <div style='text-align: center;border: 2px solid black';>


      <div class='panel panel-default'>
               <div class='panel-body'>
 
             <td>DATOS ORIGINALES:</td><br><br>
                  <tr>
                  <td>PROVINCIA:</td>
                  <td><input type='text' id='' name='' value='".$row['PROVINCIA']."'readonly/></td>
                 
                  <td>MUNICIPIO:</td>
                  <td><input type='text' size='15' id='' name='' value='".$row['MUNICIPIO']."'readonly/></td>                                    
                  <td>POBLACION:</td>
                  <td><input type='text' id='' name='' value='".$row['POBLACION']."'readonly/></td>



                    <br>
                  <br>

                </tr>

                <tr>
                  
                  <td>TIPO_VIA:</td>
                  <td><input type='text' id='' name='' value='".$row['TIPO_VIA']."'readonly/></td>

                  <td>VIA:</td>
                  <td><input type='text' id='' name='' value='".$row['CALLE']."'readonly/></td>
                  <td>Nº:</td>
                  <td><input type='text' id='' name='' value='".$row['NUMERO']."'readonly/></td>
                  </tr><br><br>
                  
                   <tr>                  
                  <td>CP:</td>
                  <td><input type='text' id='' name='' value='".$row['CODIGO']."'readonly/></td>
                  
                        <td>LATITUD:</td>
                  <td><input type='text' id='' name='' value='".$row['LATITUD']."'readonly/></td>

                <td>LONGITUD:</td>
                  <td><input type='text' id='' name='' value='".$row['LONGITUD']."'readonly/></td>

                   <br>
                  <br>
                  <TR>
                  <td>Nº_INE:</td>
                  <td><input type='text' id='' name='' value='".$row['ID_INE']."' readonly/></td>
                  <td>REFERENCIA_CATASTRAL:</td>
                  <td><input type='text' id='' name='' value='".$row['CATASTRO']."' readonly/></td>
                  

                  </tr></div></div><br>

                  <div class='panel panel-default'>
               <div class='panel-body'>

                
              <tr>
              
                  
                  <td>GESCAL12:</td>
                  <td><input type='text' id='' name='' value='".$row['G12']."'readonly/></td>

                  <td>GESCAL17:</td>
                  <td><input type='text' id='' name='' value='".$row['G17']."'readonly/></td>
                  <br>
                  <br>
                  <td>ESTADO CALLE:</td>
                  <select name=''> <option value=''>".$ESTADO."</option>  </select>
                  <td>Nº HOGARES:</td>
                  <td><input type='text' id='' name='' value='".$row['HOGARES']."'readonly/></td>
                  </tr></div></div>



               
                <tr>
                <td>USUARIO SOLICITUD:</td>
                  <td><input type='text' id='' name='' value='".$row['USUARIO_SOLICITUD']."'readonly/></td>
                <td>TIPO SOLICITUD:</td>
                  <td><input type='text' id='' name='' value='".$row['TIPO_SOLICITUD']."'readonly/></td>

                </tr><BR><BR>
                <tr>
                <td>COMENTARIO DEL USUARIO SOLICITUD:</td>
                <textarea name='comentario' rows='5' cols='80' readonly>".$row['COMENTARIO_SOLICITUD']."</textarea>
                </tr><br>

               
                    

    </div>
</div>

<div id='derecha'><br>

  <div style='text-align: center;border: 2px solid black';>
    <form action='..\acciones\cerrar_solicitud.php?variable1=".$row['ID_NAE']."&variable2=".$id."' method='post' >


      <div class='panel panel-default'>
               <div class='panel-body'>
 
             <td>DATOS SOLICITUD:</td><br><br>
                  <tr>
                  <td>PROVINCIA:</td>
                  <td><input type='text' id='provincia' name='provincia' value='".$row['PROVINCIA_SOLICITUD']."'readonly/></td>
                 
                  <td>MUNICIPIO:</td>
                  <td><input type='text' size='15' id='municipio' name='municipio' value='".$row['MUNICIPIO_SOLICITUD']."'readonly/></td>                                    
                  <td>POBLACION:</td>
                  <td><input type='text' id='poblacion' name='poblacion' value='".$row['POBLACION_SOLICITUD']."'readonly/></td>



                    <br>
                  <br>

                </tr>

                <tr>
                  
                  <td>TIPO_VIA:</td>
                  <td><input type='text' id='tipo_via' name='tipo_via' value='".$row['TIPO_VIA_SOLICITUD']."'readonly/></td>

                  <td>VIA:</td>
                  <td><input type='text' id='calle' name='calle' value='".$row['CALLE_SOLICITUD']."'readonly/></td>
                  <td>Nº:</td>
                  <td><input type='text' id='numero' name='numero' value='".$row['NUMERO_SOLICITUD']."'readonly/></td>
                  </tr><br><br>
                  
                   <tr>                  
                  <td>CP:</td>
                  <td><input type='text' id='cp' name='cp' value='".$row['CODIGO_SOLICITUD']."'readonly/></td>
                  
                        <td>LATITUD:</td>
                  <td><input type='text' id='latitud' name='latitud' value='".$row['LATITUD_SOLICITUD']."'readonly/></td>

                <td>LONGITUD:</td>
                  <td><input type='text' id='longitud' name='longitud' value='".$row['LONGITUD_SOLICITUD']."'readonly/></td>

                   <br>
                  <br>
                  <TR>
                  <td>Nº_INE:</td>
                  <td><input type='text' id='ine' name='ine' value='".$row['ID_INE_SOLICITUD']."' readonly/></td>
                  <td>REFERENCIA_CATASTRAL:</td>
                  <td><input type='text' id='catastro' name='catastro' value='".$row['CATASTRO_SOLICITUD']."' readonly/></td>
                  

                  </tr></div></div><br>

                  <div class='panel panel-default'>
               <div class='panel-body'>

                
              <tr>
              
                  
                  <td>GESCAL12:</td>
                  <td><input type='text' id='g12' name='g12' value='".$row['G12_SOLICITUD']."'readonly/></td>

                  <td>GESCAL17:</td>
                  <td><input type='text' id='g17' name='g17' value='".$row['G17_SOLICITUD']."'readonly/></td>
                  <br>
                  <br>";
  if($_SESSION['tipo_usuario']==1||$_SESSION['tipo_usuario']==3){echo "<select style='width : 150px; height:26px' id='estado' name='estado'><option value=''>Estado calle</option><option value='1'>ALTA</option><option value='0'>BAJA</option><option value='3'>PE.ANALISIS</option></select>";} 
 echo "      <td>Nº HOGARES:</td>
                  <td><input type='text' id='hogares' name='hogares' value='".$row['HOGARES_SOLICITUD']."'readonly/></td>
                  </tr></div></div>



               
                
                <tr>
                <td>COMENTARIO DEL USUARIO CIERRE:</td>
                <textarea name='comentario_cierre' rows='5' cols='80' required></textarea>
                </tr><br>";

                if($row['ESTADO_SOLICITUD']<>'Cerrado'){
               echo "
                <tr align='center'>
                <td colspan='2'><input type='submit' value='Guardar cambios'/></td>
                ";}else{echo "<BR>";}
                echo "

                    
                 </tr>
 </form>
                  <br> 

               
                    

    </div>


</div>";
        }}
      
    ?></section>

<footer>

<input type="siguiente" onclick="history.back()" class="btn-default btn  btn-md" value="Regresar a solicitudes ">

   
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
