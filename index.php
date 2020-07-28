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
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<a href="php\vistas\login.php" class="btn btn-success">   CONSULTA   </a>











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