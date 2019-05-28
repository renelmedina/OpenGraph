<?php
//$pagina_anterior=$_SERVER['HTTP_REFERER'];
$pagina_anterior="cosas";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Virus Informatico en la actualidad</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
<h1>Virus informático</h1>
<p>
	Un virus es un software que tiene por objetivo de alterar el funcionamiento normal de cualquier tipo de dispositivo informático, sin el permiso o el conocimiento del usuario principalmente para lograr fines maliciosos sobre el dispositivo. Los virus, habitualmente, reemplazan archivos ejecutables por otros infectados con el código de este. Los virus pueden destruir, de manera intencionada, los datos almacenados en una computadora, aunque también existen otros más inofensivos, que solo producen molestias o imprevistos.
</p>
<p>
	Los virus informáticos tienen básicamente la función de propagarse a través de un software, son muy nocivos y algunos contienen además una carga dañina (payload) con distintos objetivos, desde una simple broma hasta realizar daños importantes en los sistemas, o bloquear las redes informáticas generando tráfico inútil. El funcionamiento de un virus informático es conceptualmente simple. Se ejecuta un programa que está infectado, en la mayoría de las ocasiones, por desconocimiento del usuario. El código del virus queda residente (alojado) en la memoria RAM de la computadora, incluso cuando el programa que lo contenía haya terminado de ejecutar. El virus toma entonces el control de los servicios básicos del sistema operativo, infectando, de manera posterior, archivos ejecutables que sean llamados para su ejecución. Finalmente se añade el código del virus al programa infectado y se graba en el disco, con lo cual el proceso de replicado se completa.
</p>
<p>
	El primer virus atacó a una máquina IBM Serie 360 (y reconocido como tal). Fue llamado Creeper, (ENMS) creado en 1972. Este programa emitía periódicamente en la pantalla el mensaje: «I'm the creeper... catch me if you can!» («¡Soy una enredadera... píllame si puedes!»). Para eliminar este problema se creó el primer programa antivirus denominado Reaper (segador).
</p>
<p>
	Sin embargo, el término virus no se adoptaría hasta 1984, pero estos ya existían desde antes. Victor Vyssotsky, Robert Morris Sr. y Doug McIlroy, investigadores de Bell Labs (se cita erróneamente a Dennis Ritchie o Ken Thompson como cuarto coautor) desarrollaron un juego de ordenador llamado Darwin (del que derivará Core Wars) que consiste en eliminar al programa adversario ocupando toda la RAM.1​
</p>
<p>
	Después de 1984, los virus han tenido una gran expansión, desde los que atacan los sectores de arranque de disquetes hasta los que se adjuntan en un correo electrónico.
</p>
<h2>Virus informáticos y sistemas operativos</h2>
<p>Los virus informáticos afectan en mayor o menor medida a casi todos los sistemas más conocidos y usados en la actualidad.

Cabe aclarar que un virus informático mayoritariamente atacará solo el sistema operativo para el que fue desarrollado, aunque ha habido algunos casos de virus multiplataforma.</p>
<h3>MS-Windows y Android</h3>
<p>
	Las mayores incidencias se dan en el sistema operativo Windows y Android debido, entre otras causas:
</p>
<ul>
	<li>
		Su gran popularidad, como sistemas operativos, entre los computadores personales y dispositivos móviles. Se estima que, en 2007, un 90 % de ellos usaba Windows.[cita requerida] Mientras que Android tiene una cuota de mercado de 80 % en 2015. Esta popularidad basada en la facilidad de uso sin conocimiento previo alguno, motiva a los creadores de software malicioso a desarrollar nuevos virus; y así, al atacar sus puntos débiles, aumentar el impacto que generan.
	</li>
	<li>
		Falta de seguridad en Windows plataforma (situación a la que Microsoft está dando en los últimos años mayor prioridad e importancia que en el pasado). Al ser un sistema tradicionalmente muy permisivo con la instalación de programas ajenos a éste, sin requerir ninguna autentificación por parte del usuario o pedirle algún permiso especial para ello en los sistemas más antiguos. A partir de la inclusión del Control de Cuentas de Usuario en Windows Vista y en adelante (y siempre y cuando no se desactive) se ha solucionado este problema, ya que se puede usar la configuración clásica de Linux de tener un usuario administrador protegido, pero a diario usar un Usuario estándar sin permisos se ve desprotegido ante una amenaza de virus.
	</li>
	<li>
		Software como Internet Explorer y Outlook Express, desarrollados por Microsoft e incluidos de forma predeterminada en las versiones anteriores de Windows, son conocidos por ser vulnerables a los virus ya que éstos aprovechan la ventaja de que dichos programas están fuertemente integrados en el sistema operativo dando acceso completo, y prácticamente sin restricciones, a los archivos del sistema. Un ejemplo famoso de este tipo es el virus ILOVEYOU, creado en el año 2000 y propagado a través de Outlook. Hoy en día Internet Explorer ha sido separado de Windows y Outlook Express fue descontinuado.
	</li>
	<li>
		La escasa formación de un número importante de usuarios de estos sistemas, lo que provoca que no se tomen medidas preventivas por parte de estos, ya que estos sistemas están dirigidos de manera mayoritaria a los usuarios no expertos en informática. Esta situación es aprovechada constantemente por los programadores de virus.
	</li>
</ul>
<h3>Unix y derivados</h3>
<?php
if ($pagina_anterior=="cosas") {
	?>
	<a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="1">Obtener Aleatoriamente</a>
	<?php
}else{
	echo "<br>☼☼☼<br>";
}

?>
<p>En otros sistemas operativos como las distribuciones GNU/Linux, BSD, Solaris, Mac OS X iOS y otros basados en Unix las incidencias y ataques son raros. Esto se debe principalmente a:</p>
<ul>
	<li>
		Los usuarios de este tipo de Sistemas Operativos suelen poseer conocimientos mucho mayores a los de los usuarios comunes de sistemas o cuenten con recursos para contratar mantenimiento y protección mayores que en Windows.
	</li>
	<li>
		Tradicionalmente los programadores y usuarios de sistemas basados en Unix han considerado la seguridad como una prioridad por lo que hay mayores medidas frente a virus, tales como la necesidad de autenticación por parte del usuario como administrador o root para poder instalar cualquier programa adicional al sistema. En Windows esta prestación existe desde Windows Vista.
	</li>
	<li>
		Los directorios o carpetas que contienen los archivos vitales del sistema operativo cuentan con permisos especiales de acceso, por lo que no cualquier usuario o programa puede acceder fácilmente a ellos para modificarlos o borrarlos. Existe una jerarquía de permisos y accesos para los usuarios.
	</li>
	<li>
		Relacionado al punto anterior, a diferencia de los usuarios de Windows XP y versiones anteriores de Windows, la mayoría de los usuarios de sistemas basados en Unix no pueden normalmente iniciar sesiones como usuarios "administradores' o por el superusuario root, excepto para instalar o configurar software, dando como resultado que, incluso si un usuario no administrador ejecuta un virus o algún software malicioso, éste no dañaría completamente el sistema operativo ya que Unix limita el entorno de ejecución a un espacio o directorio reservado llamado comúnmente home. Aunque a partir de Windows Vista, se pueden configurar las cuentas de usuario de forma similar.
	</li>
	<li>
		Estos sistemas, a diferencia de Windows, son usados para tareas más complejas como servidores que por lo general están fuertemente protegidos, razón que los hace menos atractivos para un desarrollo de virus o software malicioso.
	</li>
	<li>
		En el caso particular de las distribuciones basadas en GNU/Linux y gracias al modelo colaborativo, las licencias libres y debido a que son más populares que otros sistemas Unix, la comunidad aporta constantemente y en un lapso de tiempo muy corto actualizaciones que resuelven bugs y/o agujeros de seguridad que pudieran ser aprovechados por algún malware.
	</li>
</ul>
<h2>Otros sistemas operativos</h2>
<p>La mayoría de equipos contienen un sistema operativo de disco de la década de 1990 (equipos de 8, 16 y 32 bits) ehan sufrido de las diferentes variantes de virus, principalmente de sector de arranque y de ficheros infectados.2​ La única excepción parecen haber sido las versiones de CP/M, CP/M-86 y DOS Plus, pero no así su descendiente DR-DOS. En los directorios de BBS y la incipiente Internet, siempre está presente un apartado de antivirus. Sin embargo las versiones más actualizadas de estos sistemas operativos solo lo contemplan como algo histórico, al no haber desarrollos específicos para el OS (lo que no elimina, por ej., los ataques a través de navegado web). Esta pujanza se basa sobre todo en videojuegos que necesitan tener el disquete desprotegido de escritura para almacenar puntuaciones o estados del juego, o en determinadas protecciones. Varios están situados en ROM, por lo que no es posible infectar al sistema en sí, pero al necesitar cargar parte desde el disquete, no se realiza comprobación.</p>
<ul>
	<li>
		Commodore Amiga/Amiga OS: Son bastante numerosos, hasta el punto de que lo primero que haces cuando recibes un disco de terceros es escanearlo por si acaso. Se conocen al menos 548 virus.
	</li>
	<li>
		Atari ST/Atari TOS: Tiene el primer caso de virus de plataforma cruzada: los virus Aladinn y Frankie se escriben para el emulador de Apple Macintosh Aladinn.4​ Su compatibilidad con el formato de disco de MS-DOS provoca que se den casos de discos ST infectados por virus de sector de DOS (sin efecto para el equipo), por lo que sus antivirus los contemplan, para dar protección a los emuladores de PC por soft y hard de la plataforma.
	</li>
	<li>
		Acorn Archimedes/RISC OS: Menos conocidos por estar casi restringido al mercado británico, existen al menos 10 antivirus: VProtect, VZap, KillVirus, Hunter, Interferon, IVSearch, Killer, Scanner, VirusKill, VKiller.
	</li>
	<li>
		MS-DOS/DR-DOS: el paraíso del virus en aquellos tiempos, con algunos de los primeros en su clase. De los proveedores de antivirus de entonces sobreviven hoy McAfee y Symantec, el resto entraron en el mercado con Microsoft Windows.
	</li>
	<li>
		Commodore 64: BHP VIRUS, Bula.
	</li>
	<li>
		Apple II: ostenta uno de los primeros virus, el Elk Cloner de 1982.
	</li>
	<li>
		Apple Macintosh/Mac OS Classic: las versiones para procesadores 680x0 y PowerPC son infectados por virus específicos (la emulación del 680x0 en los PowerPC los hace vulnerables a algunos de los viejos virus, pero no a todos) como por virus de macro para MS Office. Los cambios de plataforma actúan de barrera para, por ej., los virus de sector de arranque. La aparición de Mac OS X marca un punto y aparte en los virus para Mac; aunque no supone su desaparición, los reduce notablemente.
	</li>
</ul>
<h2>Características</h2>
<p>
	Dado que una característica de los virus es el consumo de recursos, los virus ocasionan problemas tales como: pérdida de productividad, cortes en los sistemas de información o daños a nivel de datos.

Una de las características es la posibilidad que tienen de diseminarse por medio de réplicas y copias. Las redes en la actualidad ayudan a dicha propagación cuando éstas no tienen la seguridad adecuada.

Otros daños que los virus producen a los sistemas informáticos son la pérdida de información, horas de parada productiva, tiempo de reinstalación, etc.

Hay que tener en cuenta que cada virus plantea una situación diferente.
</p>
<h2>Métodos de propagación</h2>
<p>Los métodos para disminuir o reducir los riesgos asociados a los virus pueden ser los denominados activos o pasivos.</p>




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