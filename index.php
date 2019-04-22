<?php
require_once("libreria.php");
$cod=coger_dato_externo("l");
//echo "---".$cod;
$description="Crea tarjetas OpenGraph para tu sitio web o links perzonalizados✅, para que tengas un mejor presentacion en la redes sociales. Funciona como los redireccionadores comunes 🥇, solo que con un tarjeta enriquecida. Como la que estas viendo ahora. ¿Te interesa? El servicio en gratis";
$canonical="https://www.recamedi.com/opengraph/";
$ogLocale="es_ES";
$ogType="article";
$ogTitle="▷ Open Graph Facebook y Twitter 【MARZO 2019】🥇";
$ogDescription=$description;
$ogUrl="https://www.recamedi.com/opengraph/";
$ogSite_name="recamedi";
$articlePublisher="https://www.facebook.com/recamedi";
$articleTag="open graph";
$articleSection="Open Graph";
$articlePublished_time="2019-02-27T05:00:07+00:00";
$articleModified_time="2019-02-28T22:36:58+00:00";
$ogUpdated_time="2019-02-28T22:36:58+00:00";
$ogImage="https://www.recamedi.com/opengraph/ImagenesDestacadasOpenGraph235.jpg";
$ogImageSecure_url=$ogImage;
$ogImageWidth="1200";
$ogImageHeight="630";
$twitterCard="summary_large_image";
$twitterDescription=$description;
$twitterTitle=$ogTitle;
$twitterImage=$ogImage;
$applicationLdJson='{"@context":"https://schema.org","@type":"Organization","url":"https://www.recamedi.com/","sameAs":["https://www.facebook.com/recamedi"],"@id":"https://www.recamedi.com/#organization","name":"RECAMEDI","logo":"https://www.recamedi.com/wp-content/uploads/2018/10/recamedi-logo-300x70.png"}';
$urlDestinoFinal=$ogUrl;
$textoboton="Ver Articulo";
if(!empty($cod)){
	$ConexionBDOpenGraph= new ConexionBDOpenGraph();
    $stmtScriptSQL=$ConexionBDOpenGraph->prepare("CALL GenerarOpenGraphXId(:cod)");
    $stmtScriptSQL->execute(array(
      ':cod'=>$cod
    ));
	$num_rows_SQL = $stmtScriptSQL->rowCount();
	if ($num_rows_SQL>0) {
      foreach($stmtScriptSQL as $ListaSQL) {
        $idUsuario=$ListaSQL["idUsuario"];
        $Usuario=$ListaSQL["Usuario"];
        $Contrasena=$ListaSQL["Contrasena"];
        $Nombre=$ListaSQL["Nombre"];
        $Email=$ListaSQL["Email"];
        $idUsuario=$ListaSQL["idUsuario"];
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
		$textoboton=$ListaSQL["textoboton"];
      }

      //redirigir("admin.php");//AlgunaPagina

	}
	$ConexionBDOpenGraph=null;
}
/*switch ($registronro) {
    case "NuevoOpenGraph":
        
        break;
    
	default:
		# code...
		break;
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-103789806-4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-103789806-4');
	</script>
	<meta charset="UTF-8">
	<title><?php echo $ogTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="acciones.js"></script>
	<!-- This site is optimized with the Yoast SEO plugin v9.7 - https://yoast.com/wordpress/plugins/seo/ -->
<meta name="description" content="<?php echo $description; ?>"/>
<link rel="canonical" href="<?php echo $canonical; ?>" />
<meta property="og:locale" content="<?php echo $ogLocale; ?>" />
<meta property="og:type" content="<?php echo $ogType; ?>" />
<meta property="og:title" content="<?php echo $ogTitle; ?>" />
<meta property="og:description" content="<?php echo $ogDescription; ?>" />
<meta property="og:url" content="<?php echo $ogUrl; ?>" />
<meta property="og:site_name" content="<?php echo $ogSite_name; ?>" />
<meta property="article:publisher" content="<?php echo $articlePublisher; ?>" />
<meta property="article:tag" content="<?php echo $articleTag; ?>" />
<meta property="article:section" content="<?php echo $articleSection; ?>" />
<meta property="article:published_time" content="<?php echo $articlePublished_time; ?>" />
<meta property="article:modified_time" content="<?php echo $articleModified_time; ?>" />
<meta property="og:updated_time" content="<?php echo $ogUpdated_time; ?>" />
<meta property="og:image" content="<?php echo $ogImage; ?>" />
<meta property="og:image:secure_url" content="<?php echo $ogImageSecure_url; ?>" />
<meta property="og:image:width" content="<?php echo $ogImageWidth; ?>" />
<meta property="og:image:height" content="<?php echo $ogImageHeight; ?>" />
<meta name="twitter:card" content="<?php echo $twitterCard; ?>" />
<meta name="twitter:description" content="<?php echo $twitterDescription; ?>" />
<meta name="twitter:title" content="<?php echo $twitterTitle; ?>" />
<meta name="twitter:image" content="<?php echo $twitterImage; ?>" />
<script type='application/ld+json'><? echo $applicationLdJson; ?></script>
<!-- / Yoast SEO plugin. -->
</head>
<body>
	
	<div style="width:90%; padding: 20px; margin: 0 auto;z-index: 2;">
	<div class="card mb-3" style="width:100%;max-width: <?php echo $ogImageWidth; ?>px;margin: 0 auto;">
		<div class="row no-gutters">
			<div class="col-md-7">
			  <a href="<?php echo $urlDestinoFinal; ?>"><img src="<?php echo $ogImage; ?>" class="card-img" alt="<?php echo $ogTitle; ?>"></a>
			</div>
			<div class="col-md-5">
				<div class="card-body">
				    <a href="<?php echo $urlDestinoFinal; ?>"><h1 class="card-title" style="font-size: 2em; text-shadow: 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000, 0px 0px 2px #000;"><?php echo $ogTitle; ?></h1></a>
				    <p class="card-text"><?php echo $ogDescription; ?></p>
				    <p class="card-text"><small class="text-muted">Modificado el <?php echo $articleModified_time; ?></small></p>
				</div>
				<p align="center">
				<a href="<?php echo $urlDestinoFinal; ?>" id="EnlaceFinal" class="btn btn-success btn-lg btn-block" target="_blank"><?php echo $textoboton; ?></a></p>
				
				
			</div>
			
		</div>
	</div>
	</div>
	<?php
	//echo $urlDestinoFinal;
	if ($urlDestinoFinal!="https://www.recamedi.com/opengraph/") {
		# code...
		//msg_azul("Espera 5 segundos...");
		//redirigir4($urlDestinoFinal,5);
		?>
		<div style="width:90%; padding: 0 20px; margin: 0 auto;z-index: 2;">
		<h1>Mejora la apariencia de tus paginas con Open Graph</h1>
		<p>Cuando publicas en las redes sociales tu pagina web mediante link, habras notado que algunas veces incluye imagenes y texto, pero otras veces no, porque tu link o pagina web no tiene estas caracteristicas.</p>
		<p>Asi que, esta herramienta te será útil para que puedas compartir tus link de modo que las redes sociales como facebook y twitter, muestren tu link con las imágenes y textos adecuados</p>
		</div>
		<div style="width:90%; padding: 0 20px; margin: 0 auto;z-index: 2;">
			<div class="card mb-3 text-white bg-info" style="width:100%;max-width: 1200px;margin: 0 auto;">
				<div class="row no-gutters">
					<div class="col-md-7" style="text-align: center;">
					  <img src="images/SinOpenGraphFacebook1.jpg">
					</div>
					<div class="col-md-5">
						<div class="card-body">
						    <h2 class="card-title">Sin Open Graph</h2>
						    <p class="card-text">Cuando tu pagina web no tiene la estructura para redes sociales, conocido como open graph, solo se mostrara como un link normal, sin nigun tipo texto o imagen.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div style="width:90%; padding: 0 20px; margin: 0 auto;z-index: 2;">
			<div class="card mb-3 text-white bg-info" style="width:100%;max-width: 1200px;margin: 0 auto;">
				<div class="row no-gutters">
					<div class="col-md-7" style="text-align: center;">
					  <img src="images/OpenGraphFacebook1.jpg">
					</div>
					<div class="col-md-5">
						<div class="card-body">
						    <h2 class="card-title">Con Open Graph en Facebook</h2>
						    <p class="card-text">Si utilizar el formato open graph para facebook, el resultado sera diferente. Tendra mayor realce y mejor apariencia, de esta forma tus enlaces tendran una mayor posibilidad de ser vistos y visitados.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div style="width:90%; padding: 0 20px; margin: 0 auto;z-index: 2;">
			<div class="card mb-3 text-white bg-info" style="width:100%;max-width: 1200px;margin: 0 auto;">
				<div class="row no-gutters">
					<div class="col-md-7" style="text-align: center;">
						<img src="images/OpenGraphTwitter1.jpg">
					</div>
					<div class="col-md-5">
						<div class="card-body">
						    <h2 class="card-title">Con Open Graph en Twitter</h2>
						    <p class="card-text">Otro ejemplo claro es en la red social twitter, donde puedes comentar y poner el link de referencia, poniendo la imagen y texto en la red social. Recuerda, mientras mas llamativo sea el enlace, mejor para ti.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div align="center">
			<a href="https://www.recamedi.com/opengraph/login.php"><button type="button" class="btn btn-success">Iniciar Session</button></a>
			<a href="https://www.recamedi.com/opengraph/crearcuenta.php"><button type="button" class="btn btn-warning">Crear Cuenta GRATIS</button></a>
		</div>
	

		<?php
	}else{
		include 'login.php';
	}
	//include 'http://bit.ly/2BVLgMw';
	?>
<script type="text/javascript">
	$(document).ready(function(){
	  //$("#enale1").trigger("click");
	  $("#EnlaceFinal").click(function(event) {
	  	/* Act on the event */
	  	//window.location='https://www.recamedi.com';
	  });
	});
	//document.getElementById("enale1").click();
</script>
</body>
</html>