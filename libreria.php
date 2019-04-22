<?php
class ConexionBDOpenGraph extends PDO {
  private $tipo_de_base = 'mysql';
  private $host = 'localhost';
  private $nombre_de_base = 'recamedi_opengraph';
  private $usuario = 'recamedi_opengra';
  private $contrasena = 'U8m3nMGaEj9s';
  public function __construct() {
     //Sobreescribo el método constructor de la clase PDO.
     try{
        parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
     }catch(PDOException $e){
        echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
        exit;
     }
  }
}
class ConexionSealDBGeneralidades extends PDO {
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'accsac_seal_gen';
   private $usuario = 'accsac_root';
   private $contrasena = '20197454068';
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   }
}
class ConexionSealDBComunicacionDispersa extends PDO {
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'accsac_seal_comdis';
   private $usuario = 'accsac_root';
   private $contrasena = '20197454068';
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   }
}
class PaginaPrincipal{
  private $direccionPagina;
  private $rutaImagenes;
  private $rutaJavaScript;
  private $rutaCss;
  //private $rutaFuentes;
  //private $rutaBootstrapComun;
  function __construct(){
    //$this->direccionPagina="http://localhost/clientes/accsac.com/Aplicaciones/seal/comunicaciondispersa";
    
    $this->direccionPagina="http://accsac.com/sistemas/seal/comunicaciondispersa";

    $this->rutaImagenes=$this->direccionPagina."/images/";
    $this->rutaJavaScript=$this->direccionPagina."/js/";
    $this->rutaCss=$this->direccionPagina."/css/";
    //$this->rutaFuentes=$this->direccionPagina."/fuentes/css/";
    //$this->rutaBootstrapComun=$this->direccionPagina."/bootstrap-3.3.4/";
  }
  public function favicon(){
    echo "<head><link rel='shortcut icon' type='image/x-icon' href='".$this->rutaImagenes."favicon.ico'></head>";
  }
  public function FrameworkModernos(){
   ?>
   <head>
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
   </head>
   <body>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   </body>
   <?php
  }
  public function FrameworkComunes(){
   echo "<head>";
   echo "<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.1.js'></script>";
   echo "<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>";
   echo "<link rel=stylesheet href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css' media='screen'>";
   echo "</head>";
  }
  public function ArchivosEsenciales(){
    echo "<head>";
   //echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>";
    echo "<script type='text/javascript' src='".$this->rutaJavaScript."acciones.js'></script>";
    echo "<link rel=stylesheet href='".$this->rutaCss."estilo.css' type='text/css'>";
    echo '<link rel="stylesheet" href="'.$this->rutaCss.'iconos.css">';
    //echo "<link rel=stylesheet href='".$this->rutaCss."animate.css' type='text/css'>";
    echo "<meta charset='UTF-8'>";
    echo "</head>";
  }
  public function CabeceraPagina(){
    ?>
      <div id="minimenu" width="800">
        <a href="#" onclick="crearfondodiv();crearpopupdiv('http://accsac.com/climatizacion/climatizacion.php?dato=chat')">
          <img src="http://accsac.com/images/chat-accsac.png" alt="" height="80" align="left" valing="middle">
        </a>
      <h3>Ll&aacute;manos +00-051-054-203689</h3>
      </div>
    <?php
  }
}
/*Variables generales(constantes)*/
define("LogoAcc150x80", "http://localhost/clientes/accsac.com/Aplicaciones/seal/comunicaciondispersa/images/accsac.jpg");
/*Mostrar mensajes usando la libreria de bootdtrap*/
function msg_verde($mensajehtml){
   echo "<div class='alert alert-success' role='alert'>$mensajehtml<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
//mensaje verde que no llevara la "X" de cerrar el mensaje emergente
function msg_verdeNoX($mensajehtml){
   echo "<div class='alert alert-success' role='alert'>$mensajehtml</div>";
}
function msg_azul($mensajehtml){
   echo "<div class='alert alert-info' role='alert'>$mensajehtml<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
function msg_azulNoX($mensajehtml){
   echo "<div class='alert alert-info' role='alert'>$mensajehtml</div>";
}
function msg_amarillo($mensajehtml){
   echo "<div class='alert alert-warning' role='alert'>$mensajehtml<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
function msg_rojo($mensajehtml){
   echo "<div class='alert alert-danger' role='alert'>$mensajehtml<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
/*funcion para obtener datos por post y get*/
function coger_dato_externo($nomvariable){
   if(isset($_GET[$nomvariable])){
      $variable_imprimir=$_GET[$nomvariable];
   }else{
      if (isset($_POST[$nomvariable])){
         $variable_imprimir=$_POST[$nomvariable];
      }else{
         $variable_imprimir=null;
      }
   }
   return $variable_imprimir;
}
/*Funcion que permite escribir en la consola de javascript*/
function fnConsoleLog($textoplano){
   echo "<script>console.log('".$textoplano."');</script>";
}
function fnCargaSimple($pagina,$mensajehtml,$divprincipal,$divmensajero){
   echo "<script>fnCargaSimple('".$pagina."','".$mensajehtml."','".$divprincipal."','".$divmensajero."');</script>";
}
function GenerarPassword($texto){
  $TamañoTexto=strlen($texto);
  //fnLog("\$TamañoTexto: $TamañoTexto");
  $RotandoTexto=str_rot13($texto);//La codificación ROT13 simplemente desplaza cada letra en 13 posiciones en el alfabeto, mientras que deja todos los caracteres no-alfabéticos intactos
  //fnLog("\$RotandoTexto: $RotandoTexto");
  $Md5TamañoTexto=md5($TamañoTexto);
  //fnLog("\$Md5TamañoTexto: $Md5TamañoTexto");
  $Md5RotandoTexto=md5($RotandoTexto);
  //fnLog("\$Md5RotandoTexto: $Md5RotandoTexto");
  $ClavePrimaria="Desarrollado-por:Renel-_-Medina-_-Ancalle-_-";
  //fnLog("\$ClavePrimaria: $ClavePrimaria");
  $CryptClavePrimaria=crypt($ClavePrimaria,"10461437449");
  //fnLog("\$CryptClavePrimaria: $CryptClavePrimaria");
  $PasswordGenerado1=md5($Md5TamañoTexto.$Md5RotandoTexto.$CryptClavePrimaria);
  //fnLog("\$PasswordGenerado1: $PasswordGenerado1");
  $ClaveSecundaria=crypt($PasswordGenerado1."Renel",$ClavePrimaria);
  //fnLog("\$ClaveSecundaria: $ClaveSecundaria");
  $ClaveTerciaria=crypt($ClaveSecundaria."Medina",$ClavePrimaria);
  //fnLog("\$ClaveTerciaria: $ClaveTerciaria");
  $PasswordGenerado=md5($PasswordGenerado1.$ClaveSecundaria.$ClaveTerciaria);
  //fnLog("\$PasswordGenerado: $PasswordGenerado");
  return $PasswordGenerado;
}
function redirigir($urlpagina){
  echo "<script type='text/javascript'>";
  echo "window.location='$urlpagina';";
  echo "</script>";
}
function redirigir2($urlpagina){
  echo "<meta http-equiv='refresh' content='0;URL=".$urlpagina."'>";
}
function redirigir3($urlpagina,$tiempo){
  echo "<meta http-equiv='refresh' content='".$tiempo."';URL='".$urlpagina."'>";
}
function redirigir4($urlpagina,$tiempo){
  echo "<script type='text/javascript'>";
  echo "setTimeout(\"location.href='$urlpagina'\", $tiempo*1000);";
  echo "</script>";
}
function verificarsession($mensajesss){
  session_start();
  if(empty($_SESSION["AccesoSistemaID"])){
    echo "no hay session";
    ?>
      <script type="text/javascript">
      window.location="../index.php?mensajito=<?php echo $mensajesss;?>";
      </script>
    <?php
    return;
  }
}
function verificar_administrador(){
  if(isset($_SESSION["TipoAcceso"])){
      if($_SESSION["TipoAcceso"]<>"1"){
          $Mensaje= "<b>Ud. no es un administrador... no tiene los permisos para acceder a este módulo</b>";
          $Mensaje.="<p>No intente ingresar inadecuadamente, ya que puede se le puede bloquear la maquina y/o insertar un virus en su computadora, si necesita ayuda consulte con un administrador del sistema</p>";
          cerrarsession();
          redirigir("../index.php?mensajito=$Mensaje");
          return;
      }
  }else{
      $Mensaje="<b>Ud. no ha iniciado session...</b>";
      $Mensaje.="<p>No intente ingresar inadecuadamente, ya que puede se le puede bloquear la maquina y/o insertar un virus en su computadora, si necesita ayuda consulte con un administrador del sistema</p>";
      cerrarsession();
      redirigir("../index.php?mensajito=$Mensaje");
      return;
  }
}
function cerrarsession(){
  session_unset();
  session_destroy();
}
/*proceso de subida de 1 archivo*/
function fnSubirImagenes($ArchivoSubir,$CarpetaDestino,$TamañoMaxPermitido,$NombreFinalArchivo,$NombreDefaultoError){
  if (!empty($_FILES[$ArchivoSubir]['name'])) {
    $ruta=$CarpetaDestino;//"../ClienteContrato/";//ruta carpeta donde queremos copiar las imágenes
    $uploadfile_temporal=$_FILES[$ArchivoSubir]['tmp_name'];
    $nombre_original=$_FILES[$ArchivoSubir]['name'];
    $uploadfile_nombre=$ruta.$_FILES[$ArchivoSubir]['name'];
    $filesize = $_FILES[$ArchivoSubir]['size'];
    $filetipo = $_FILES[$ArchivoSubir]['type'];
    if (((strpos($filetipo, "gif")) || (strpos($filetipo, "png")) || (strpos($filetipo, "pjpeg")) || (strpos($filetipo, "jpg")) || (strpos($filetipo, "jpeg"))) && ($filesize < $TamañoMaxPermitido)){
      if (is_uploaded_file($uploadfile_temporal)){
        if (move_uploaded_file($uploadfile_temporal,$uploadfile_nombre)){
          $info = pathinfo($nombre_original);
          $extension = $info['extension'];
          $NombreFinal=$CarpetaDestino."/".$NombreFinalArchivo.".".$extension;
          rename($uploadfile_nombre,$NombreFinal);
        }
      }else{
        ?>
        <script type="text/javascript">
          mensaje_emergente("La Imagen No se subio por problemas de conexion con el servidor, verifique conexion a internet.Intentalo de Nuevo","Imagen Sin Subir");
        </script>
        <?php
        $NombreFinal=$NombreDefaultoError;//En caso de no subir ninguna imagen se asigna una por defecto
      }
    }else{
      $mensaje="Tipo de Archivo incompatible, solo se acepta los siguientes: *.jpg,*.gif,*.png y Menores a ($TamañoMaxPermitido/1024000)MB.";
      $mensaje+="<br>No se Guardo la imagen.";
      $mensaje+="<br><b>Nombre Doc:</b> $nombre_original";
      $mensaje+="<br><b>Tipo Doc:</b> $filetipo";
      $mensaje+="<br><b>Tamaño Doc:</b> ".number_format(($filesize/1024000),2) ."MB<br>";
      echo $mensaje;
      $NombreFinal=$NombreDefaultoError;//En caso de no subir ninguna imagen se asigna una por defecto
    }
  }else {
    $NombreFinal=$NombreDefaultoError;//En caso de no subir ninguna imagen se asigna una por defecto
  }
  return $NombreFinal;
}
function generarRandomString($length = 11,$texto) {
  $TextoGenerado=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ").$texto, -$length);
    return $TextoGenerado;
}
?>