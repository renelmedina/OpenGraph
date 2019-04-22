<?php
require_once("libreria.php");
session_start();
//$_SESSION["idUsuario"]=$idUsuario;
//$_SESSION["Usuario"]=$Usuario;
//$_SESSION["Nombre"]=$Nombre;
//$_SESSION["Email"]=$Email;
$registronro=coger_dato_externo("registronro");
//echo "---".$registronro;
switch ($registronro) {
    case "NuevoOpenGraph":
        //echo "dentro de NuevoOpenGraph ";
        //extract($_POST);
        $txturldestino=(coger_dato_externo("txturldestino")==null?'':coger_dato_externo("txturldestino"));
        $cboBotonValor=(coger_dato_externo("cboBotonValor")==null?'':coger_dato_externo("cboBotonValor"));

        $txttitulo=(coger_dato_externo("txttitulo")==null?'':coger_dato_externo("txttitulo"));
        $txtdescripcion=(coger_dato_externo("txtdescripcion")==null?'':coger_dato_externo("txtdescripcion"));
        $txtnombresitio=(coger_dato_externo("txtnombresitio")==null?'':coger_dato_externo("txtnombresitio"));
        $cboTipoEnlace=(coger_dato_externo("cboTipoEnlace")==null?'':coger_dato_externo("cboTipoEnlace"));

        $txtLinkMonetizado=(coger_dato_externo("txtLinkMonetizado")==null?'':coger_dato_externo("txtLinkMonetizado"));

        if (empty($_FILES['fileimagen']['name'])) {
            msg_rojo("Debes de seleccionar un archivo");
            return;
        }
        if (empty($txturldestino) || empty($cboBotonValor) || empty($txttitulo) || empty($txtdescripcion) || empty($txtnombresitio)) {
            msg_rojo("Debe proporcionar informacion en los campos obligatorios (*)");
            return;
        }
        $FechaFotoSubido=date("Y-m-d");//Para guardar en la Base de Datos
        $FechaHoraFotoSubido=date("Y-m-d_hh_mm_ss");//Para Dar nombre al Archivo
        $NombreFinalArchivo=$_SESSION["idUsuario"]."_".$FechaFotoSubido."_".$FechaHoraFotoSubido;
        $SubirArchivo=fnSubirImagenes("fileimagen","images",3072000,$NombreFinalArchivo,"SinImagen.jpg");
        $NombreArchivoEnBD="";//debe estar en vacio para hacer las comprobaciones
        if ($SubirArchivo=="SinImagen.jpg") {
            msg_rojo("Archivo Incorrecto o no se pudo subir, intentelo de nuevo.");
            return;
        }else{
            $NombreArchivoEnBD="https://www.recamedi.com/opengraph/".$SubirArchivo;
        }
        $Mensaje="";
        $ConexionBDOpenGraph= new ConexionBDOpenGraph();
        $FechaFotoSubidoOpenGraph=date("Y-m-d")."T".date("H:i:s")."+00:00";//Para guardar en la Base de Datos para el opengraph
        $jsonLd='{"@context":"https://schema.org","@type":"Organization","url":"https://www.recamedi.com/","sameAs":["https://www.facebook.com/recamedi"],"@id":"https://www.recamedi.com/#organization","name":"RECAMEDI","logo":"https://www.recamedi.com/wp-content/uploads/2018/10/recamedi-logo-300x70.png"}';
        $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL CrearOpenGraph(
            :varIdUsuario,
            :varDescription,
            :varCanonical,
            :varOgLocale,
            :varOgType,
            :varOgTitle,
            :varOgDescription,
            :varOgUrl,
            :varOgSite_name,
            :varArticlePublisher,
            :varArticleTag,
            :varArticleSection,
            :varArticlePublished_time,
            :varArticleModified_time,
            :varOgUpdated_time,
            :varOgImage,
            :varOgImageSecure_url,
            :varOgImageWidth,
            :varOgImageHeight,
            :varTwitterCard,
            :varTwitterDescription,
            :varTwitterTitle,
            :varTwitterImage,
            :varApplicationLdJson,
            :varUrlDestinoFinal,
            :vartextoboton,
            :varTipoLink,
            :varValorLinkMenetizado)"
            );
        $stmtScriptSQL->execute(array(
            ':varIdUsuario'=>$_SESSION["idUsuario"],
            ':varDescription'=>$txtdescripcion,
            ':varCanonical'=>$txturldestino,
            ':varOgLocale'=>'es_ES',
            ':varOgType'=>'article',
            ':varOgTitle'=>$txttitulo,
            ':varOgDescription'=>$txtdescripcion,
            ':varOgUrl'=>$txturldestino,
            ':varOgSite_name'=>$txtnombresitio,
            ':varArticlePublisher'=>'https://www.facebook.com/recamedi',
            ':varArticleTag'=>$txttitulo,
            ':varArticleSection'=>$txttitulo,
            ':varArticlePublished_time'=>$FechaFotoSubidoOpenGraph,
            ':varArticleModified_time'=>$FechaFotoSubidoOpenGraph,
            ':varOgUpdated_time'=>$FechaFotoSubidoOpenGraph,
            ':varOgImage'=>$NombreArchivoEnBD,
            ':varOgImageSecure_url'=>$NombreArchivoEnBD,
            ':varOgImageWidth'=>'1200',
            ':varOgImageHeight'=>'630',
            ':varTwitterCard'=>'summary_large_image',
            ':varTwitterDescription'=>$txtdescripcion,
            ':varTwitterTitle'=>$txttitulo,
            ':varTwitterImage'=>$NombreArchivoEnBD,
            ':varApplicationLdJson'=>$jsonLd,
            ':varUrlDestinoFinal'=>$txturldestino,
            ':vartextoboton'=>$cboBotonValor,
            ':varTipoLink'=>$cboTipoEnlace,
            ':varValorLinkMenetizado'=>$txtLinkMonetizado
        ));
        
        $num_rows_SQL = $stmtScriptSQL->rowCount();
        
        if ($num_rows_SQL>0) {
            $ConexionBDOpenGraph=null;
            $ConexionBDOpenGraph= new ConexionBDOpenGraph();
            $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL UltimoIdInsertado();");
            $stmtScriptSQL->execute();
            $num_rows_SQL = $stmtScriptSQL->rowCount();
            $UltimoIdInsertado=0;
            if ($num_rows_SQL>0) {
                foreach($stmtScriptSQL as $ListaSQL) {
                    $UltimoIdInsertado=$ListaSQL["UltimoIdInsertado"];
                }
            }
            $ConexionBDOpenGraph=null;
            //echo "- Ultimo ID creado $UltimoIdInsertado";
            $GenerarCodigoInterno=generarRandomString(11,$UltimoIdInsertado);
            $ConexionBDOpenGraph= new ConexionBDOpenGraph();
            $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL ActualizaUrlOPenGraph(:varIdOpenGraph,:varCanonical,:varOgUrl,:varUrlDestinoRecamedi,:varCodInterno)");
            $stmtScriptSQL->execute(array(
                ':varIdOpenGraph'=>$UltimoIdInsertado,
                ':varCanonical'=>$txturldestino,
                ':varOgUrl'=>'https://www.recamedi.com/opengraph/?l='.$GenerarCodigoInterno,
                ':varUrlDestinoRecamedi'=>'https://www.recamedi.com/opengraph/?l='.$GenerarCodigoInterno,
                ':varCodInterno'=>$GenerarCodigoInterno));
            //echo $txturldestino;
            $num_rows_SQL = $stmtScriptSQL->rowCount();
            if ($num_rows_SQL>0) {
              $Mensaje.="- Url Creada, correctamente<br>";
              $ConexionBDOpenGraph=null;
              redirigir("admin.php");//AlgunaPagina
            }else{
                $Mensaje.="- La URL no pudo ser creada<br>";
            }
            $ConexionBDOpenGraph=null;
            $Mensaje.="- Url Creada, correctamente<br>";

        }else{
            $Mensaje.="- No se pudo registrar. Intentelo de nuevo<br>";
            $ConexionBDOpenGraph=null;
        }
        ///echo $Mensaje;
        msg_azulNoX($Mensaje);
        break;
    case "ActualizarOpenGraph":
        //echo "dentro de NuevoOpenGraph ";
        //extract($_POST);
        $txtIdOpenGraph=(coger_dato_externo("txtIdOpenGraph")==null?'':coger_dato_externo("txtIdOpenGraph"));
        $cboBotonValor=(coger_dato_externo("cboBotonValor")==null?'':coger_dato_externo("cboBotonValor"));
        $txtUrlRecamediDestino=(coger_dato_externo("txtUrlRecamediDestino")==null?'':coger_dato_externo("txtUrlRecamediDestino"));
        $txtRutaImagen=(coger_dato_externo("txtRutaImagen")==null?'':coger_dato_externo("txtRutaImagen"));

        $txturldestino=(coger_dato_externo("txturldestino")==null?'':coger_dato_externo("txturldestino"));
        $txttitulo=(coger_dato_externo("txttitulo")==null?'':coger_dato_externo("txttitulo"));
        $txtdescripcion=(coger_dato_externo("txtdescripcion")==null?'':coger_dato_externo("txtdescripcion"));
        $txtnombresitio=(coger_dato_externo("txtnombresitio")==null?'':coger_dato_externo("txtnombresitio"));
        $cboTipoEnlace=(coger_dato_externo("cboTipoEnlace")==null?'':coger_dato_externo("cboTipoEnlace"));

        $txtLinkMonetizado=(coger_dato_externo("txtLinkMonetizado")==null?'':coger_dato_externo("txtLinkMonetizado"));
        if (empty($_FILES['fileimagen']['name'])) {
            //echo "Debes de seleccionar un archivo";
            //return;
        }
        $FechaFotoSubido=date("Y-m-d");//Para guardar en la Base de Datos
        $FechaHoraFotoSubido=date("Y-m-d_hh_mm_ss");//Para Dar nombre al Archivo
        $NombreFinalArchivo=$_SESSION["idUsuario"]."_".$FechaFotoSubido."_".$FechaHoraFotoSubido;
        $SubirArchivo=fnSubirImagenes("fileimagen","images",3072000,$NombreFinalArchivo,"SinImagen.jpg");
        $NombreArchivoEnBD="";//debe estar en vacio para hacer las comprobaciones
        if ($SubirArchivo=="SinImagen.jpg") {
            echo "Se conservara la imagen. No se subio ninguna imagen";
            $NombreArchivoEnBD=$txtRutaImagen;
            //return;
        }else{
            $NombreArchivoEnBD="https://www.recamedi.com/opengraph/".$SubirArchivo;
        }
        $Mensaje="";
        $ConexionBDOpenGraph= new ConexionBDOpenGraph();
        $FechaFotoSubidoOpenGraph=date("Y-m-d")."T".date("H:i:s")."+00:00";//Para guardar en la Base de Datos para el opengraph
        $jsonLd='{"@context":"https://schema.org","@type":"Organization","url":"https://www.recamedi.com/","sameAs":["https://www.facebook.com/recamedi"],"@id":"https://www.recamedi.com/#organization","name":"RECAMEDI","logo":"https://www.recamedi.com/wp-content/uploads/2018/10/recamedi-logo-300x70.png"}';
        $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL ActualizaOpenGraphXId(
            :varIdOpenGraph,
            :varDescription,
            :varCanonical,
            :varOgLocale,
            :varOgType,
            :varOgTitle,
            :varOgDescription,
            :varOgUrl,
            :varOgSite_name,
            :varArticlePublisher,
            :varArticleTag,
            :varArticleSection,
            :varArticlePublished_time,
            :varArticleModified_time,
            :varOgUpdated_time,
            :varOgImage,
            :varOgImageSecure_url,
            :varOgImageWidth,
            :varOgImageHeight,
            :varTwitterCard,
            :varTwitterDescription,
            :varTwitterTitle,
            :varTwitterImage,
            :varApplicationLdJson,
            :varUrlDestinoFinal,
            :varUrlDestinoRecamedi,
            :vartextoboton,
            :varTipoLink,
            :varValorLinkMenetizado)"
        );
        $stmtScriptSQL->execute(array(
            ':varIdOpenGraph'=>$txtIdOpenGraph,
            ':varDescription'=>$txtdescripcion,
            ':varCanonical'=>$txtUrlRecamediDestino,
            ':varOgLocale'=>'es_ES',
            ':varOgType'=>'article',
            ':varOgTitle'=>$txttitulo,
            ':varOgDescription'=>$txtdescripcion,
            ':varOgUrl'=>$txtUrlRecamediDestino,
            ':varOgSite_name'=>$txtnombresitio,
            ':varArticlePublisher'=>'https://www.facebook.com/recamedi',
            ':varArticleTag'=>$txttitulo,
            ':varArticleSection'=>$txttitulo,
            ':varArticlePublished_time'=>$FechaFotoSubidoOpenGraph,
            ':varArticleModified_time'=>$FechaFotoSubidoOpenGraph,
            ':varOgUpdated_time'=>$FechaFotoSubidoOpenGraph,
            ':varOgImage'=>$NombreArchivoEnBD,
            ':varOgImageSecure_url'=>$NombreArchivoEnBD,
            ':varOgImageWidth'=>'1200',
            ':varOgImageHeight'=>'630',
            ':varTwitterCard'=>'summary_large_image',
            ':varTwitterDescription'=>$txtdescripcion,
            ':varTwitterTitle'=>$txttitulo,
            ':varTwitterImage'=>$NombreArchivoEnBD,
            ':varApplicationLdJson'=>$jsonLd,
            ':varUrlDestinoFinal'=>$txturldestino,
            ':varUrlDestinoRecamedi'=>$txtUrlRecamediDestino,
            ':vartextoboton'=>$cboBotonValor,
            ':varTipoLink'=>$cboTipoEnlace,
            ':varValorLinkMenetizado'=>$txtLinkMonetizado
        ));
        $num_rows_SQL = $stmtScriptSQL->rowCount();
        if ($num_rows_SQL>0) {
            $Mensaje.="¡Cambios guardados! de tu Open Graph. Compartelo en tus redes sociales";
        }else{
            $Mensaje.="- No se pudo registrar. Intentelo de nuevo";
        }
        $ConexionBDOpenGraph=null;
        //echo $Mensaje;
        msg_verdeNoX("<div align='center'>".$Mensaje."</div>");
        break;
    case 'EliminarOpenGraph':
        $CodigoELiminar=coger_dato_externo("CodigoIdEliminar");
        $ModalCerrar=coger_dato_externo("ModalEliminar");
        //echo "Eliminando a $CodigoELiminar";
        
        if (empty($CodigoELiminar)) {
            msg_rojo("No existe elemento a elimnar");
            return;
        }
        $ConexionBDOpenGraph= new ConexionBDOpenGraph();
        $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL EliminarOpenGraph(:varIdOpenGraph)"
        );
        $stmtScriptSQL->execute(array(
            ':varIdOpenGraph'=>$CodigoELiminar
        ));
        $num_rows_SQL = $stmtScriptSQL->rowCount();
        if ($num_rows_SQL>0) {
            msg_verdeNoX("<div align='center'>Se elimino ell registro</div>");
            //$Mensaje.="¡Cambios guardados! de tu Open Graph. Compartelo en tus redes sociales";
            echo"<script>
          window.location.assign('admin.php');
          </script>";
        }else{
            msg_rojo("No se pudo eliminar");
        }
        $ConexionBDOpenGraph=null;
        //echo $Mensaje;
        
        break;
	default:
		# code...
		break;
}
?>