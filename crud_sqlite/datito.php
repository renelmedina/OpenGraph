<?php
require_once("libreria.php");
include_once __DIR__ . "/base_de_datos.php";
$op=coger_dato_externo("op");


//echo "datito.php";
switch ($op) {
	case 'MostrarRandom':
		$version=$_POST["cboVersion"];
		$Id="";
		$cantidad="";
		if (isset($_POST["cboVersion"])) {
			$resultado1 = $baseDeDatos->query("SELECT *, count(Id) as totalreg FROM serialesnod32 where Identificador=$version and NoFunciona < 100 ORDER BY RANDOM() limit 1;");
			$videojuegos = $resultado1->fetchAll(PDO::FETCH_OBJ);

			foreach($videojuegos as $videojuego){ /*Notar la llave que dejamos abierta*/
				$Id=$videojuego->Id;
				$totalreg=$videojuego->totalreg;
				if ($totalreg>0) {
					?>
					<script type="text/javascript">
						$("#btnobteneraleatorimente").attr({
							disabled: 'disabled'
						});
					</script>
					<?php
				}else{
					return;
				}
				echo "<p align='center'> cantidad: $totalreg";
				//echo $videojuego->Identificador. "&nbsp; &nbsp;";
				?>
				<span id='usuario' onclick="copyToClipboard(this.id)" style="border:solid 1px grey; padding-left: 1em; padding-right: 1em;">serial <?php echo $videojuego->Usuario; ?></span>
				<span id='serial' onclick="copyToClipboard(this.id)" style="border:solid 1px grey; padding-left: 1em; padding-right: 1em;">serial <?php echo $videojuego->Seriales; ?></span>
				<?php

				//echo "<span id='usu' onclick=\'copyToClipboard('#usu')\' style='border:solid 1px red'>".$videojuego->Usuario."</span>";
				//echo "<span id='ser' onclick='copyToClipboard(\'#ser\')' style='border:solid 1px red'>".$videojuego->Seriales."</span>";
				//echo $videojuego->Usuario. "&nbsp; &nbsp;";
				//echo $videojuego->Seriales. "&nbsp; &nbsp;";
				echo "<b>FV:</b>". $videojuego->FecVen. "&nbsp; &nbsp;";
				echo "<b>OK:</b>".$videojuego->Funciona. "&nbsp; &nbsp;";
				$cantidad=$videojuego->Funciona;
				echo "<b>Fail:</b>".$videojuego->NoFunciona. "&nbsp; &nbsp;";
				echo "<p>";
				$cantidad2=$videojuego->NoFunciona;
					
			} /*Cerrar llave, fin de foreach*/
			?>
			
			<p align="center">
			<a href="#" onclick="fnMeFunciono(<? echo $version; ?>,'<? echo $Id; ?>','<? echo $cantidad; ?>')"><button type="button" class="btn btn-success btn-sm">Me funciono</button></a> | 
			<a href="#" onclick="fnNoMeFunciono(<? echo $version; ?>,'<? echo $Id; ?>','<? echo $cantidad2; ?>')"><button type="button" class="btn btn-danger btn-sm">NO Me funciono</button></a>
			</p>
			<?php
		}else{
			echo "Selecciona una version";
		}
		break;
	case 'Funciona':
		if (isset($_GET["cboVersion3"])) {
			$Id=$_GET["id"];
			$cantidad=(int)$_GET["cantidad"]+1;
			//echo "Existe".$_GET["cboVersion"];
			$sentencia = $baseDeDatos->prepare("UPDATE serialesnod32 
			SET Funciona = :Funciona
			WHERE Id = :id");
			#Pasar los datos...
			$sentencia->bindParam(":id", $Id);#Aquí pasamos el ID
			$sentencia->bindParam(":Funciona", $cantidad);#Aquí pasamos el ID
			$resultado = $sentencia->execute();
			if($resultado === true){
				echo "<div class='alert alert-success' role='alert'>Gracias por colaborar $Id $cantidad</div> ";
				//echo '<br><a href="3_tabla_dinamica.php">Ver los videojuegos</a>';
			}else{
				echo "Lo siento, ocurrió un error";
			}
		}
		break;
	case 'NoFunciona':
		$cantidad2="";
		if (isset($_GET["cboVersion2"])) {
			$Id=$_GET["id"];
			$cantidad2=(int)$_GET["cantidad2"]+1;
			//echo "Existe".$_GET["cboVersion"];
			$sentencia = $baseDeDatos->prepare("UPDATE serialesnod32 
			SET NoFunciona = :NoFunciona
			WHERE Id = :id");
			#Pasar los datos...
			$sentencia->bindParam(":id", $Id);#Aquí pasamos el ID
			$sentencia->bindParam(":NoFunciona", $cantidad2);#Aquí pasamos el ID
			$resultado = $sentencia->execute();
			if($resultado === true){
				echo "<div class='alert alert-danger' role='alert'>Intenta con otra amigo(a) $Id $cantidad2 <a href='#' target='_top'>Quiero Intentar una vez mas</a></div>";
				//echo '<br><a href="3_tabla_dinamica.php">Ver los videojuegos</a>';
			}else{
				echo "Lo siento, ocurrió un error";
			}
		}
		break;
	default:
		# code...
		break;
}




?>
<div id="pegartexto">texto aqui</div>

<script type="text/javascript">
	function fnMeFunciono(dato,id,cantidad) {
		$.ajax({
			url: "datito.php?op=Funciona&cboVersion3="+dato+"&id="+id+"&cantidad="+cantidad,
			beforeSend: function( xhr ) {
			xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			}
		}).done(function( data ) {
			if ( console && console.log ) {
			  //console.log( "Sample of data:", data.slice( 0, 100 ) );
			  $("#sere").html(data);
			}
		});
	}
	function fnNoMeFunciono(dato,id,cantidad) {
		$.ajax({
			url: "datito.php?op=NoFunciona&cboVersion2="+dato+"&id="+id+"&cantidad2="+cantidad,
			beforeSend: function( xhr ) {
			xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
			}
		}).done(function( data ) {
			if ( console && console.log ) {
			  //console.log( "Sample of data:", data.slice( 0, 100 ) );
			  $("#sere").html(data);
			}
		});
	}
	function copyToClipboard(elemento) {
		// Crea un campo de texto "oculto"
		var aux = document.createElement("input");

		// Asigna el contenido del elemento especificado al valor del campo
		aux.setAttribute("value", document.getElementById(elemento).innerHTML);
		aux.setAttribute("type", "text");

		// Añade el campo a la página
		document.getElementById("pegartexto").appendChild(aux);

		// Selecciona el contenido del campo
		aux.select();

		// Copia el texto seleccionado
		document.execCommand("copy");

		// Elimina el campo de la página
		document.getElementById("pegartexto").removeChild(aux);

		console.log("texto copiado")
	}
</script>