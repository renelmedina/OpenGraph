<?php
/*
	CRUD con SQLite3, PDO y PHP
	parzibyte.me
*/
/*if (empty($_POST["Identificador"])) {
	//exit("Faltan uno o más datos"); #Terminar el script definitivamente
}
if (empty($_POST["Seriales"])) {
	//exit("Falta Seriales esta vacio"); #Terminar el script definitivamente
}*/
#Si llegamos hasta aquí es porque los datos al menos están definidos
include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos
//require_once("../libreria.php");
require 'vendor/autoload.php';

    use vendor\PhpOffice\PhpSpreadsheet\Spreadsheet;
    use vendor\PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    //use vendor\PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//$cabecera=new PaginaPrincipal;
//echo $cabecera->FrameworkModernos();
//echo $cabecera->ArchivosEsenciales();

$ArchivoImportado=$_FILES['excel']['name'];
//cargamos el archivo al servidor con el mismo nombre
$errores = 0;
//solo le agregue el sufijo bak_ 
$archivo = $_FILES['excel']['name'];
$tipo = $_FILES['excel']['type'];
//echo $tipo;
//(strpos($filetipo, "gif")
//return;
try {
    $destino = "bak_" . $archivo;
    if (copy($_FILES['excel']['tmp_name'], $destino)){
        //echo "Archivo Cargado Con Éxito";
        echo "Archivo Cargado Con Éxito";
    }else{
        echo "Error Al Cargar el Archivo";
    }
    if (file_exists("bak_" . $archivo)) {
        //Acciones a realizar con el archivo importado
        //$reader;
        //$reader;
        if (strpos($tipo, "ms-excel")) {//*.xls
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else if(strpos($tipo, "openxmlformats")){//*.xlsx
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }else{
            echo "Debes subir solo archivos excel";
            return;
        }
        //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("bak_" . $archivo);


        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
        //echo '<table>' . "\n";
        //for ($row = 1; $row <= $highestRow; ++$row) {
        for ($row = 2; $row <= $highestRow; ++$row) {

            //echo '<tr>' . PHP_EOL;
            /*for ($col = 1; $col <= 4; ++$col) {
                $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                //echo '<td>' . $value . '</td>' . PHP_EOL;

            }*/
            //(float)$worksheet->getCellByColumnAndRow(2, $row)->getValue()
            //(float)$worksheet->getCellByColumnAndRow(3, $row)->getValue()
            $Identificador=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $Usuario=$worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $Serial=$worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $FechaVencimiento=$worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $Funciona=$worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $NoFunciona=$worksheet->getCellByColumnAndRow(6, $row)->getValue();

            $BuscarDuplicado = $baseDeDatos->query("SELECT count(*) as duplicados FROM serialesnod32 where Seriales = '$Serial';");
			$videojuegos = $BuscarDuplicado->fetchAll(PDO::FETCH_OBJ);
			$duplicados=0;
			foreach($videojuegos as $videojuego){ /*Notar la llave que dejamos 	abierta*/
				$duplicados=$videojuego->duplicados;
				echo "<b>$duplicados</b><br>";
				/*if (!empty($duplicados)) {
					$registrosencontrados+=1;
				}*/
					
			}
			if ($duplicados<=0) {//Si no hay serial duplicado
				$sentencia = $baseDeDatos->prepare("INSERT INTO serialesnod32(Identificador, Usuario, Seriales, FecVen, Funciona,NoFunciona)VALUES(:Identificador, :Usuario, :Seriales,:FecVen,:Funciona,:NoFunciona);");
				# Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
				# debido a que la llamada es por referencia
				$Variable=1;

				$sentencia->bindParam(":Identificador", $Identificador);
				$sentencia->bindParam(":Usuario", $Usuario);
				$sentencia->bindParam(":Seriales", $Serial);
				$sentencia->bindParam(":FecVen", $FechaVencimiento);
				$sentencia->bindParam(":Funciona", $Funciona);
				$sentencia->bindParam(":NoFunciona", $NoFunciona);


				$resultado = $sentencia->execute();
				if($resultado === true){
					echo "Serial($Identificador -> $Serial) registrado correctamente";
				}else{
					echo "Lo siento, ocurrió un error";
				}
			}else{
				echo "- Duplicado $Serial <br>";
			}
        } 
    }
    unlink($destino);
} catch (Exception $e) {
    echo 'Parece que estas subiendo un archivo corrupto(',  $e->getMessage(), ")\n";
    return;
}










#Si llegamos hasta aquí es porque los datos al menos están definidos
//include_once __DIR__ . "/base_de_datos.php"; #Al incluir este script, podemos usar $baseDeDatos

# creamos una variable que tendrá la sentencia
/*$sentencia = $baseDeDatos->prepare("INSERT INTO serialesnod32(Identificador, Usuario, Seriales, FecVen, Funciona,NoFunciona)
	VALUES(:Identificador, :Usuario, :Seriales,:FecVen,:Funciona,:NoFunciona);");*/
/*$sentencia = $baseDeDatos->prepare("INSERT INTO serialesnod32(Identificador, Usuario, Seriales, FecVen, Funciona,NoFunciona)
	VALUES(:Identificador, :Usuario, :Seriales,:FecVen,:Funciona,:NoFunciona);");
# Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
# debido a que la llamada es por referencia
$Variable=1;

$sentencia->bindParam(":Identificador", $_POST["Identificador"]);
$sentencia->bindParam(":Usuario", $_POST["Usuario"]);
$sentencia->bindParam(":Seriales", $_POST["Seriales"]);
$sentencia->bindParam(":FecVen", $_POST["FecVen"]);
$sentencia->bindParam(":Funciona", $_POST["Funciona"]);
$sentencia->bindParam(":NoFunciona", $_POST["NoFunciona"]);


$resultado = $sentencia->execute();
if($resultado === true){
	echo "Serial registrado correctamente";
}else{
	echo "Lo siento, ocurrió un error";
}*/
?>