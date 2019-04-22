<?php
require_once("libreria.php");
session_start();
?>
<form action="" id="frmNuevoOpen" name="frmNuevoOpen" onsubmit="envio_general_forms('#frmNuevoOpen','registro.php','#divPrincipal','#divMensajero','Registrando...');return false;">
	<table class="table table-bordered table-sm" style="border:solid 1px #7E2B87; width: 100%;">
		<tr>
			<td colspan="2" style="background-color: #7E2B87;">
				<div style="color:#fff; text-align: center; font-size: 1em; text-shadow: 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000;">
					Nuevo OpenGraph
				</div>
			</td>
		</tr>
		<tr>
			<td>🤖💼✓✍▷◁	✅✨😂🔥✔	✆⛳✌️👌🙌❤️⚠️⚡🚀	➕⌛⛔☝⌚⭐
			</td>
		</tr>
		<tr>
			<td><input type="text"  name="txttitulo" class="form-control" placeholder="Titulo"></td>
		</tr>
		<tr>
			<td><input type="text"  name="txturldestino" class="form-control" placeholder="Url Destino" ></td>
		</tr>
		<tr>
			<td>
				<textarea name="txtdescripcion" id="" cols="50" rows="5" class="form-control" placeholder="Descripcion"></textarea>
				<!--<input type="text"  name="txtdescripcion" class="form-control"></td>-->
		</tr>
		<tr>
			<td><input type="text"  name="txtnombresitio" class="form-control" placeholder="Nombre Sitio"></td>
		</tr>
		<tr>
			<td>
				Texto Boton:*<br>
				<select name="cboBotonValor" class="form-control">
					<option value="Descargar">Descargar</option>
					<option value="Descargar Archivo">Descargar Archivo</option>
					<option value="Descargar Programa">Descargar Programa</option>
					<option value="Descargar Video">Descargar Video</option>
					<option value="Leer Articulo">Leer Articulo</option>
					<option value="Obtener Enlace">Obtener Enlace</option>
					<option value="Ver Articulo" selected="selected">Ver Articulo</option>
					<option value="Ver Pelicula">Ver Pelicula</option>
					<option value="Ver Video">Ver Video</option>
				</select>
			</td>
		</tr>
		<tr>
			
			<td>Imagen:*<br><input type="file"  name="fileimagen" class="form-control"></td>
		</tr>
		<tr>
			<td>
				Tipo link:*<br>
				<select name="cboTipoEnlace" id="cboTipoEnlace" class="form-control">
					<option value="0">Normal</option>
					<option value="1">Monetizado con recamedi.com</option>
					<option value="2">Monetizado con cutwin.com</option>
				</select>
			</td>
		</tr>
		<tr>
			<td ><span id="tdNombreCampoTipoEnlace">Enlace:</span>
			<br><span id="spTexto"></span><input type="text" name="txtValorLink" id="txtValorLink">
			</td>
			
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit"  name="btnRegistrar" value="Guardar Datos" class="btn btn-success"></td>
		</tr>
		
		<input type="hidden" name="registronro" value="NuevoOpenGraph">
		<input type="hidden" name="txtLinkMonetizado" id="txtLinkMonetizado" value="">

	</table>
</form>
<div id="divPrincipal"></div>
<div id="divMensajero"></div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#tdNombreCampoTipoEnlace").hide('fast');
		$("#spTexto").hide('fast');
		$("#txtValorLink").hide('fast');
		$("#txtValorLink").val("");
	});
	$('#frmNuevoOpen').submit(function(event) {
		event.preventDefault(); //this will prevent the default submit
		// your code here (But not asynchronous code such as Ajax because it does not wait for response and move to next line.)
		$("#txtLinkMonetizado").val("");
		
		if ($("#cboTipoEnlace").val()=="2") {
			//alert($("#spTexto").html()+$("#txtValorLink").val());
			$("#txtLinkMonetizado").val($("#spTexto").html()+$("#txtValorLink").val());
		}
		//alert($("#txtLinkMonetizado").val());
		//$(this).unbind('submit').submit(); // continue the submit unbind preventDefault
	});
	$("#cboTipoEnlace").change(function(event) {
		/* Act on the event */
		if($(this).val()=="1"){
			$("#tdNombreCampoTipoEnlace").show('fast');
			$("#tdNombreCampoTipoEnlace").html("Recuerda que sólo aceptaremos trafico de facebook.com");
			$("#spTexto").hide('fast');
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