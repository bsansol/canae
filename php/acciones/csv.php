<?php
//cabeceras para descarga
session_start();

   //$idnae = $_GET['variable1'];
   $G12 = $_GET['variable2'];
   $CP = $_GET['variable3'];
   $tipo = $_GET['variable4'];
   $calle = $_GET['variable5'];
   $municipio = $_GET['variable6'];
   $provincia = $_GET['variable7'];
   $estado = $_GET['variable8'];
   $estado2 = $_GET['variable9'];
   $poblacion = $_GET['variable10'];
   $ine = $_GET['variable11'];
   $catastro = $_GET['variable12'];
   
   

   
   if($_SESSION['tipo_usuario']==2){$estado2 = $_GET['variable8'];}


include('..\acciones\conexion.php');
$query = mysqli_query($con, "SELECT G17,G12,TIPO_VIA,CALLE,NUMERO,N_HOGARES,MUNICIPIO,PROVINCIA,POBLACION,AGRUPACION,CODIGO as CP,ID_INE,REFERENCIA_CATASTRAL,LATITUD,LONGITUD FROM callejero_nae_base_feb2020 
    WHERE  G12 LIKE '$G12%' and CODIGO LIKE '%$CP%' and PROVINCIA LIKE '%$provincia%' and POBLACION LIKE '%$poblacion%' and
    TIPO_VIA LIKE '%$tipo%'and CALLE LIKE '%$calle%' and MUNICIPIO LIKE '%$municipio%' and ID_INE LIKE '%$ine%' and REFERENCIA_CATASTRAL LIKE '%$catastro%' and 
    (BAJA LIKE '%$estado%' or BAJA LIKE '%$estado2%')");
 

 
if($query->num_rows > 0){
    $delimiter = ";";
    $filename = "Salida_consulta_callejero" . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('G17','G12','PROVINCIA','MUNICIPIO','POBLACION','AGRUPACION','TIPO_VIA',
	'CALLE','NUMERO','N_HOGARES','CP','CODIGO INE','REFERENCIA_CATASTRAL','LATITUD','LONGITUD');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        
        $lineData = array($row['G17'],$row['G12'],$row['PROVINCIA'],$row['MUNICIPIO'],$row['POBLACION'],$row['AGRUPACION'],$row['TIPO_VIA'],$row['CALLE']
          ,$row['NUMERO'],$row['N_HOGARES'],$row['CP'],$row['ID_INE'],$row['REFERENCIA_CATASTRAL'],$row['LATITUD'],$row['LONGITUD']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>