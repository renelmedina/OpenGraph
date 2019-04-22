<?php
require_once("libreria.php");
session_start();
//$_SESSION["idUsuario"]=$idUsuario;
//$_SESSION["Usuario"]=$Usuario;
//$_SESSION["Nombre"]=$Nombre;
//$_SESSION["Email"]=$Email;
if (empty($_SESSION["idUsuario"])) {
	cerrarsession();
	redirigir("login.php");
}
$ConexionBDOpenGraph= new ConexionBDOpenGraph();
$stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL ListarOpenGraph(:varIdUsuario)");
$stmtScriptSQL->execute(array(
  ':varIdUsuario'=>$_SESSION["idUsuario"]
));
$num_rows_SQL = $stmtScriptSQL->rowCount();
$ListaOpenGraphCreados=array();
if ($num_rows_SQL>0) {
	foreach($stmtScriptSQL as $stmtListaOpenGraphCreadoss) {
	  $ListaOpenGraphCreados[]=$stmtListaOpenGraphCreadoss;
	}
}
$ConexionBDOpenGraph=null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Open Graph</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="acciones.js"></script>

</head>
<body>
	<script>
		function cargarNuevo() {
			fnCargaSimple("nuevopengraph.php","Cargando...","#divnuevo","#divestado");
		}
		function ActulizarOpenGraph(IdOpenGraph) {
			// body...
			fnCargaSimple("actualizaropengraph.php?varIdOpenGraph="+IdOpenGraph,"Cargando...","#divnuevo","#divestado");

		}
	</script>
	<div id="divestado" style="float: left;"></div>
	<div align="right"><a href="javascript:cargarNuevo();">Nuevo OpenGraph</a> | Hola <? echo $_SESSION["Nombre"]; ?></div>
	
	<div id="divnuevo" style="position: relative; float: left; width: 30%; border-right:solid 1px #7E2B87;">
		<a href="javascript:cargarNuevo();"><button class="btn btn-success">Crear Nuevo Link</button></a>
	</div>
	<div>
	<table class="table table-bordered table-sm tablaprincipal" style="width: 70%; font-size: 0.8em;">
		<tr>
			<th class="Titulo1">Num</th>
			<th class="Titulo1">Titulo</th>
			<th class="Titulo1">Url OpenGraph</th>
			<th class="Titulo1">Url Destino</th>
			<th class="Titulo1">Acciones</th>
		</tr>
		
		<?php 
		if (!($num_rows_SQL>0)) {
			echo "<tr><td colspan='4'>No has creado ningun OpenGraph, todavia</td></tr>";
		}else{
			$num=0;
			foreach($ListaOpenGraphCreados as $ListaSQL) {
				$num+=1;
				$idOpenGraph=$ListaSQL["idOpenGraph"];
				$description=$ListaSQL["description"];
				$canonical=$ListaSQL["canonical"];
				$ogLocale=$ListaSQL["ogLocale"];
				$ogType=$ListaSQL["ogType"];
				$ogTitle=$ListaSQL["ogTitle"];
				$ogDescription=$ListaSQL["ogDescription"];
				$ogUrl=$ListaSQL["ogUrl"];
				$ogSite_name=$ListaSQL["ogSite_name"];
				$articlePublisher=$ListaSQL["articlePublisher"];
				$articleTag=$ListaSQL["articleTag"];
				$articleSection=$ListaSQL["articleSection"];
				$articlePublished_time=$ListaSQL["articlePublished_time"];
				$articleModified_time=$ListaSQL["articleModified_time"];
				$ogUpdated_time=$ListaSQL["ogUpdated_time"];
				$ogImage=$ListaSQL["ogImage"];
				$ogImageSecure_url=$ListaSQL["ogImageSecure_url"];
				$ogImageWidth=$ListaSQL["ogImageWidth"];
				$ogImageHeight=$ListaSQL["ogImageHeight"];
				$twitterCard=$ListaSQL["twitterCard"];
				$twitterDescription=$ListaSQL["twitterDescription"];
				$twitterTitle=$ListaSQL["twitterTitle"];
				$twitterImage=$ListaSQL["twitterImage"];
				$applicationLdJson=$ListaSQL["applicationLdJson"];
				$urlDestinoFinal=$ListaSQL["urlDestinoFinal"];
				$urlDestinoRecamedi=$ListaSQL["urlDestinoRecamedi"];
				echo "<tr>";
				echo "<td>$num</td>";
				echo "<td>$ogTitle</td>";
				echo "<td>$urlDestinoRecamedi</a></td>";
				echo "<td>$urlDestinoFinal</td>";
				$NombreBotonEliminar="IdBoton".rand(5, 15)."_".$idOpenGraph;
				echo "<td><a href='javascript:ActulizarOpenGraph(".$idOpenGraph.");'><button class='btn btn-success btn-sm'>Modificar</button></a><button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#popEliminarModal' data-codigoeliminar='$idOpenGraph' onclick='fnCargarPopSiNo(\"Eliminar link\",\"¿Realmente desea eliminar el link?\",this.id)' id='$NombreBotonEliminar'>Eliminar</button></td>";
				echo "</tr>";
			}
		}
		?>
		
	</table>
	</div>

	<div class="modal fade" id="popEliminarModal" tabindex="-1" role="dialog" aria-labelledby="popEliminarModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="popEliminarModalLabel">Eliminar Elemento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="frmEliminarElemento" id="frmEliminarElemento">
				  <div class="form-group CuerpoMensajePopUp">
				    ¿Desea eliminar este link acortado? No habra marcha atraz.
				  </div>
				  <input type="hidden" name="CodigoIdEliminar" id="CodigoIdEliminar">
				  
				</form>
			</div>
			<div class="modal-footer">
				<div id="divEstadoEliminar"></div>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-sm btn-danger btnSiEliminar" onclick="envio_general_forms2('#frmEliminarElemento','registro.php?registronro=EliminarOpenGraph','#divEstadoEliminar')">Si, Eliminar</button>
			</div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		function fnCargarPopSiNo(Titulo,Mensaje,BotonSi) {
			$('#popEliminarModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var IdEliminar = button.data('codigoeliminar') // Extract info from data-* attributes
				
				var modal = $(this)
				modal.find('.modal-title').text(Titulo)
				//modal.find('.modal-body input').val(IdEliminar)
				modal.find('.CuerpoMensajePopUp').html(Mensaje)
				$('#CodigoIdEliminar').val(IdEliminar)
			})
		}

	</script>
</body>
</html>