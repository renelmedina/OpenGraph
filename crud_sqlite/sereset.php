<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos
$pagina_anterior=$_SERVER['HTTP_REFERER'];
echo "Pagina Anterior: ".$pagina_anterior;

$resultado = $baseDeDatos->query("SELECT * FROM serialesnod32;");
$videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla Dinamica</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="1">Obtener Aleatoriamente</a>




<form name="frmImportarContratos" id="frmImportarContratos" method="post" enctype="multipart/form-data" onsubmit="return false;" >
  <div class="card-header bg-info">Actualizar Seriales Eset en bloque</div>
  	<div class="card-body">
	    <div class="row">
	      <div class="col">
	        <div class="input-group">
	          <input type="file" name="excel" class="form-control"/>
	          <input type="hidden" class="btn btn-primary" value="upload" name="action" />
	          <input type="hidden" name="registronro" value="ImportarContratos">
	          <span class="input-group-btn">
	            <button class="btn btn-info" type="button" onclick="envio_general_forms('#frmImportarContratos','insertar.php','#divCuerpo','#divPieCard','Importando...');">Importar</button>
	          </span>
	        </div>
	      </div>
	    </div>
	</div>
</form>
<div id="divCuerpo"></div>
<div id="divPieCard"></div>
	<table>
		<thead>
			<tr>
				<th>Identificador</th>
				<th>Usuario</th>
				<th>Seriales</th>
				<th>FecVen</th>
				<th>Funciona</th>
				<th>NoFunciona</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<!-- Notar que siempre se repite lo que hay entre <tr> y </tr> -->
			<!-- Así que lo hacemos en un ciclo foreach -->

			<?php //foreach($videojuegos as $videojuego){ /*Notar la llave que dejamos abierta*/ ?>
				<tr>
					<td><?php //echo $videojuego->Id."->".$videojuego->Identificador ?></td>
					<td><?php //echo $videojuego->Usuario ?></td>
					<td><?php //echo $videojuego->Seriales ?></td>
					<td><?php //echo $videojuego->FecVen ?></td>
					<td><?php //echo $videojuego->Funciona ?></td>
					<td><?php //echo $videojuego->NoFunciona ?></td>
					<td>
						<a href="editar.php?id=<?php //echo $videojuego->id ?>">Editar</a>
					</td>
					<td>
						<a href="eliminar.php?id=<?php //echo $videojuego->id ?>">Eliminar</a>
					</td>
				</tr>
			<?php //} /*Cerrar llave, fin de foreach*/ ?>

		</tbody>
	</table>
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecciona tu version de NOD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="versionod">
        	<select name="cboVersion">
        		<option value="1">ESS 4-8</option>
        		<option value="2">EAV 4-8</option>
        		<option value="3">ESS 9-12</option>
        		<option value="4">EAV 9-12</option>
        		<option value="5">EIS 10-12</option>
        		<option value="6">SSP 10-12</option>
        	</select>
        	<button type="button" class="btn btn-primary btn-sm" onclick="envio_general_forms2('#versionod','datito.php?op=MostrarRandom','#sere')" id="btnobteneraleatorimente">Obtener Aleatoriamente</button>
		    <div id="sere"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary">Seleccionar tu version NOD</button>-->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (event) {
		//var button = $(event.relatedTarget) // Button that triggered the modal
		//var recipient = button.data('whatever') // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		//var modal = $(this)
		//modal.find('.modal-title').text('New message to ' + recipient)
		//modal.find('.modal-body input').val(recipient)
	})
	function fobtener(argument) {
		// body...
	}
	function envio_general_forms2(formularioid,procesadorphp,capaeventosid){
		var str = new FormData($(formularioid)[0]);
		$.ajax({
			url: procesadorphp,
			type: 'POST',
			data: $(formularioid).serialize()
		}).done(function(theResponse) {
			$(capaeventosid).html(theResponse);
		}).fail(function() {
			console.log("error");
		}).always(function() {
			console.log("complete");
		});
	}
	function envio_general_forms(formularioid,procesadorphp,capaeventosid,divmensajero,mensajeHTML){
  var varHora='0';
  var varMinuto='0';
  var varSegundos='0';
  var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };
  tiempo_corriendo = setInterval(function(){
  // Segundos
  tiempo.segundo++;
  if(tiempo.segundo >= 60)
  {
      tiempo.segundo = 0;
      tiempo.minuto++;
  }      

  // Minutos
  if(tiempo.minuto >= 60)
  {
      tiempo.minuto = 0;
      tiempo.hora++;
  }

  varHora=tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora;
  varMinuto=tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
  varSegundos=tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;
  $(divmensajero).html(mensajeHTML+"("+varHora+":"+varMinuto+":"+varSegundos+")");
}, 1000);
  var str = new FormData($(formularioid)[0]);
  $.ajax({
    type: "POST",
    url: procesadorphp,
    data: str,
    cache: false,
    contentType: false,
    processData: false,
    //mientras enviamos el archivo
    beforeSend: function(){
        //$(divmensajero).html(mensajeHTML);
        //$(divmensajero).html(mensajeHTML+"("+varHora+":"+varMinuto+":"+varSegundos+")");
    },
    //una vez finalizado correctamente
    success: function(theResponse) {
        //tiempo_corriendo=null;
        clearInterval(tiempo_corriendo);
        $(divmensajero).html("Cargado Exitosa!");
        $(capaeventosid).html(theResponse);
        console.log("Tiempo OK: "+"("+varHora+":"+varMinuto+":"+varSegundos+")")
    },
      //si ha ocurrido un error
    error: function(){
      $(capaeventosid).html("<strong>Error: </strong> Error de envio de datos, vuelve a intentarlo, si el problema persiste comunica al webmaster. este error es de comunicaion de datos con el servidor mediante tecnologia Ajax y Jquery");
      console.log("Ocurrio un error al momento de procesar el formulario");
      console.log("Tiempo Error: "+"("+varHora+":"+varMinuto+":"+varSegundos+")")
    }
  });
}
</script>
</body>
</html>