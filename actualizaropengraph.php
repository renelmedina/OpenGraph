<?php
require_once("libreria.php");
session_start();
$varIdOpenGraph=(coger_dato_externo("varIdOpenGraph")==null?'':coger_dato_externo("varIdOpenGraph"));
if (empty($varIdOpenGraph)) {
	msg_rojo("No ha seleccionado ninguna URL para modificar");
	return;
}
$ConexionBDOpenGraph= new ConexionBDOpenGraph();
$stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL ListarOpenGraphXId(:varIdOpenGraph)");
$stmtScriptSQL->execute(array(
  ':varIdOpenGraph'=>$varIdOpenGraph
));
$num_rows_SQL = $stmtScriptSQL->rowCount();
$ListaOpenGraphCreados=array();
if ($num_rows_SQL>0) {
	foreach($stmtScriptSQL as $stmtListaOpenGraphCreadoss) {
	  $ListaOpenGraphCreados[]=$stmtListaOpenGraphCreadoss;
	}
}
$ConexionBDOpenGraph=null;
if (!($num_rows_SQL>0)) {
	msg_rojo("Ningun Open Graph seleccionado. Selecciona una para hacer los cambios");
}else{
	$description="";
	$canonical="";
	$ogLocale="";
	$ogType="";
	$ogTitle="";
	$ogDescription="";
	$ogUrl="";
	$ogSite_name="";
	$articlePublisher="";
	$articleTag="";
	$articleSection="";
	$articlePublished_time="";
	$articleModified_time="";
	$ogUpdated_time="";
	$ogImage="";
	$ogImageSecure_url="";
	$ogImageWidth="";
	$ogImageHeight="";
	$twitterCard="";
	$twitterDescription="";
	$twitterTitle="";
	$twitterImage="";
	$applicationLdJson="";
	$urlDestinoFinal="";
	$urlDestinoRecamedi="";
	$textoboton="Ver Articulo";
	$tipoLink="0";
	$valorLinkMonetizado="";
	$num=0;
	foreach($ListaOpenGraphCreados as $ListaSQL) {
		$num+=1;
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
		$textoboton=$ListaSQL["textoboton"];
		$tipoLink=$ListaSQL["tipoLink"];
		$valorLinkMonetizado=$ListaSQL["valorLinkMonetizado"];
	}
}
?>
	<form action="" id="frmNuevoOpen" name="frmNuevoOpen" onsubmit="envio_general_forms('#frmNuevoOpen','registro.php','#divPrincipal','#divMensajero','Registrando...');return false;">
		<table class="table table-bordered table-sm">
			<tr>
				<td colspan="2" style="background-color: #7E2B87;">
					<div style="color:#fff; text-align: center; font-size: 1em; text-shadow: 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000;">
						Actualizar Open Graph
					</div>
				</td>
			</tr>

			<tr>
				<th>Url Destino*:<br>
				<input type="text"  name="txturldestino" class="form-control" value="<?php echo $urlDestinoFinal; ?>"></th>
			</tr>
			<tr>
				<th>Nombre de Sitio*:<input type="text"  name="txtnombresitio" class="form-control" value="<?php echo $ogSite_name; ?>"></th>
			</tr>
			<tr>
				<th colspan="2"><img src="<?php echo $ogImage; ?>" width="100%"></th>
			</tr>
			<tr>
				<th colspan="2">Imagen*:<br><input type="file"  name="fileimagen" class="form-control"></th>
			</tr>
			<th colspan="2">🤖💼✓✍▷◁	✅✨😂🔥✔	✆⛳✌️👌🙌❤️⚠️⚡🚀	➕⌛⛔☝⌚⭐
				</th>
			<tr>
				<th colspan="2">Titulo*:<br><input type="text"  name="txttitulo" class="form-control" value="<?php echo $ogTitle; ?>"></th>
			</tr>
			<tr>
				<th colspan="2">Descripcion*:<br><textarea name="txtdescripcion" id="" cols="50" rows="5" class="form-control"><?php echo $description; ?></textarea></th>
			</tr>
			<tr>
				
				<th>
					Tipo Boton:
					<select name="cboBotonValor" class="form-control">
						<option value="<?php echo $textoboton; ?>" selected="selected"><?php echo $textoboton; ?></option>
						<option value="Descargar">Descargar</option>
						<option value="Descargar Archivo">Descargar Archivo</option>
						<option value="Descargar Programa">Descargar Programa</option>
						<option value="Descargar Video">Descargar Video</option>
						<option value="Leer Articulo">Leer Articulo</option>
						<option value="Obtener Enlace">Obtener Enlace</option>
						<option value="Ver Articulo">Ver Articulo</option>
						<option value="Ver Pelicula">Ver Pelicula</option>
						<option value="Ver Video">Ver Video</option>
					</select>
				</th>
			</tr>
			<tr>
				
				<th>Tipo link:
					<select name="cboTipoEnlace" id="cboTipoEnlace" class="form-control">
						<option value="0" <? if ($tipoLink=="0") {echo "selected";}?>>Normal</option>
						<option value="1" <? if ($tipoLink=="1") {echo "selected";}?>>Monetizado con recamedi.com</option>
						<option value="2" <? if ($tipoLink=="2") {echo "selected";}?>>Monetizado con cutwin.com</option>
					</select>
				</th>
			</tr>
			<tr>
				<th><span id="tdNombreCampoTipoEnlace">Enlace:</span><span id="spTexto"><? if ($tipoLink=="2") {echo substr($valorLinkMonetizado,0,18);}else{echo "Solo aceptamos trafico de facebook.com";} ?></span><input type="text" name="txtValorLink" id="txtValorLink" value="<? if ($tipoLink=="2") {echo substr($valorLinkMonetizado,18,100);} ?>"></th>
			</tr>
			<tr>
				<input type="hidden" name="txtLinkMonetizado" id="txtLinkMonetizado" value="">
				<input type="hidden" name="registronro" value="ActualizarOpenGraph">
				<input type="hidden" name="txtIdOpenGraph" value="<?php echo $varIdOpenGraph; ?>">
				<input type="hidden" name="txtUrlRecamediDestino" value="<?php echo $urlDestinoRecamedi; ?>">
				<input type="hidden" name="txtRutaImagen" value="<?php echo $ogImage; ?>">
				<th colspan="2"><input type="submit"  name="btnRegistrar" value="Guardar Cambios" class="btn btn-success"></th>
			</tr>
		</table>
	</form>
	<div id="divPrincipal"></div>
	<div id="divMensajero"></div>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#tdNombreCampoTipoEnlace").show('fast');
			$("#spTexto").show('fast');
			$("#txtValorLink").show('fast');
			//$("#txtValorLink").val("");
			<?
			if ($tipoLink=="1" || $tipoLink=="0"){
					echo "$('#txtValorLink').hide('fast');";
			}
			if ($tipoLink=="0") {
					echo "$('#spTexto').hide('fast');";
					echo "$('#tdNombreCampoTipoEnlace').hide('fast');";			
			}
			?>
		});
		$('#frmNuevoOpen').submit(function(event) {
			event.preventDefault(); //this will prevent the default submit
			// your code here (But not asynchronous code such as Ajax because it does not wait for response and move to next line.)
			$("#txtLinkMonetizado").val("");
			
			if ($("#cboTipoEnlace").val()=="2") {
				//alert($("#spTexto").html()+$("#txtValorLink").val());
				$("#txtLinkMonetizado").val($("#spTexto").html()+$("#txtValorLink").val());
			}
			alert($("#txtLinkMonetizado").val());
			$(this).unbind('submit').submit(); // continue the submit unbind preventDefault
		});
		$("#cboTipoEnlace").change(function(event) {
			/* Act on the event */
			if($(this).val()=="1"){
				$("#tdNombreCampoTipoEnlace").hide('fast');
				$("#spTexto").show('fast');
				$("#spTexto").html("Recuerda que sólo aceptaremos trafico de facebook.com");
				$("#txtValorLink").hide('fast');
				$("#txtValorLink").val("");
			}else if ($(this).val()=="2") {
				$("#tdNombreCampoTipoEnlace").show('fast');
				$("#txtValorLink").show('fast');
				$("#spTexto").show('fast');
				$("#tdNombreCampoTipoEnlace").html("Link(id) de cutwin.com:");
				$("#spTexto").html("http://cutwin.com/");
				$("#txtValorLink").val("");
			}else{
				$("#tdNombreCampoTipoEnlace").hide('fast');
				$("#spTexto").hide('fast');
				$("#txtValorLink").hide('fast');
				$("#txtValorLink").val("");
			}
		});

		
	</script>