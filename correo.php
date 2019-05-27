<?php
$para = 'renelmedina@accsac.com';
$titulo = 'Enviando email desde PHP';
 
$mensaje = '<div class="fondo" style="background: #001F46;
		width: 100%;
		height: 100%;
		position: absolute;
		margin: 0;
		padding: 0;">
	<div class="cuadroblanco" style="margin-top: 2.5%;
		margin-left: 2.5%;
		background-color: #fff;
		position: absolute;
		width: 90%;
		height: 90%;
		border-radius: 1em;">
		<p class="pTitulo" style="text-align: center;
		font-size: 1.5em;
		font-weight: bold;
		font-family: tahoma;">Hola amiguito</p>

	</div>
</div>';

$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: Mi Nombre<yo@recamedi.com>';
$enviado = mail($para, $titulo, $mensaje, $cabeceras);
 
if ($enviado)
  echo 'Email enviado correctamente';
else
  echo 'Error en el envío del email';
?>