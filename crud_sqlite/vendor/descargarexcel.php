<?php

require_once("../libreria.php");
$ConexionSealDBComunicacionDispersa= new ConexionSealDBComunicacionDispersa();

/*Requerimiento para excel*/
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

$varCodDocumentoTrabajo=(coger_dato_externo("txtCodDocumentoTrabajo")==null?0:coger_dato_externo("txtCodDocumentoTrabajo"));
$varPaginasMostrar=300;//cantidad de registros a mostrar
#Variables recogidas
$varDocumentosTrabajoID=(coger_dato_externo("varDocumentosTrabajoID")==null?0:coger_dato_externo("varDocumentosTrabajoID"));
$varNotificadorID=(coger_dato_externo("varNotificadorID")==null?0:coger_dato_externo("varNotificadorID"));
$varFechaInicial=(coger_dato_externo("varFechaInicial")==null?'':coger_dato_externo("varFechaInicial"));
$varFechaFinal=(coger_dato_externo("varFechaFinal")==null?'':coger_dato_externo("varFechaFinal"));
$varEstadoSeal=(coger_dato_externo("varEstadoSeal")==null?'0':coger_dato_externo("varEstadoSeal"));
$varDatoBuscar=(coger_dato_externo("varDatoBuscar")==null?'':coger_dato_externo("varDatoBuscar"));
$sqlListarContratos="call VisitasCampo_Buscar_ListarTodo($varDocumentosTrabajoID,'$varNotificadorID','$varFechaInicial','$varFechaFinal','$varEstadoSeal','$varDatoBuscar','$varBuscarEn',$pagina_actual2,$varPaginasMostrar)";
# Consultando todos los datos.
$stmt=$ConexionSealDBComunicacionDispersa->prepare($sqlListarContratos);
set_time_limit(60);
$stmt->execute();
$ListaDocumentosTrabajoBusqueda=array();
foreach($stmt as $stmtListaDocumentosTrabajoBusquedas) {
  $ListaDocumentosTrabajoBusqueda[]=$stmtListaDocumentosTrabajoBusquedas;
}
$ConexionSealDBComunicacionDispersa=null;//cerramos la conexion
?>
<table>
          <tr>
            <th>Nro</th>
            <th>Suministro</th>
            <th>Nro Doc</th>
            <th>Tipo</th>
            <th>Notificador</th>

            <th>FechaAsignado</th>
            <th>Fecha Ejecutado</th>
            <th>Codigo Seal</th>
            <th>DNI Recepcion</th>
            <th>Parentesco</th><!--Tipo de contrato-->
            <th>Lectura Medidor</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Fotos</th>
            <th>Observaciones</th>
          </tr>
        <?php
        foreach($ListaDocumentosTrabajoBusqueda as $ResultadoDocumentosTrabajo) {
          $idVisitasCampo=$ResultadoDocumentosTrabajo["idVisitasCampo"];
      		$DocumentosTrabajoID=$ResultadoDocumentosTrabajo["DocumentosTrabajoID"];
          $ContratoID=$ResultadoDocumentosTrabajo["ContratoID"];
          $NroSuministro2=$ResultadoDocumentosTrabajo["NroSuministro"];
          $Tipo=$ResultadoDocumentosTrabajo["Tipo"];
          $NroDocumento=$ResultadoDocumentosTrabajo["NroDocumento"];
      		$IdNotificador=$ResultadoDocumentosTrabajo["IdNotificador"];
          $NotificadorNombre=$ResultadoDocumentosTrabajo["NotificadorNombre"];
      		$FechaAsignado=$ResultadoDocumentosTrabajo["FechaAsignado"];
      		$FechaEjecutado=$ResultadoDocumentosTrabajo["FechaEjecutado"];
      		$Estado=$ResultadoDocumentosTrabajo["Estado"];
      		$EstadoSeal=$ResultadoDocumentosTrabajo["EstadoSeal"];
      		$NombreRecepcionador=$ResultadoDocumentosTrabajo["NombreRecepcionador"];
      		$DNIRecepcionador=$ResultadoDocumentosTrabajo["DNIRecepcionador"];
      		$Parentesco=$ResultadoDocumentosTrabajo["Parentesco"];
      		$LecturaMedidor=$ResultadoDocumentosTrabajo["LecturaMedidor"];
      		$LatitudVisita=$ResultadoDocumentosTrabajo["LatitudVisita"];
      		$LongitudVisita=$ResultadoDocumentosTrabajo["LongitudVisita"];
      		$Observaciones=$ResultadoDocumentosTrabajo["Observaciones"];
      		
          echo "<tr>";
          echo "<td>$idVisitasCampo</td>";
          if (empty($ContratoID)) {
            echo "<td>$NroSuministro2</td>";
          }else{
            echo "<td>$ContratoID</td>";
          }
          echo "<td>$NroDocumento</td>";
          echo "<td>$Tipo</td>";

          echo "<td>$NotificadorNombre</td>";
          echo "<td>$FechaAsignado</td>";
          echo "<td>$FechaEjecutado</td>";
          echo "<td>$EstadoSeal</td>";
          echo "<td>$DNIRecepcionador</td>";
          echo "<td>$Parentesco</td>";
          echo "<td>$LecturaMedidor</td>";
          echo "<td>$LatitudVisita</td>";
          echo "<td>$LongitudVisita</td>";

          echo "<td>";
            
            
          echo "</td>";
          echo "<td>$Observaciones</td>";
          
          //para enviar lso
          /*echo "<td>
                  <button type='button' class='btn btn-outline-info btn-sm' data-toggle='modal' data-target='#popDocumentosModal' data-documentotrabajoid='$idDocumentosTrabajo' data-tdddetalleid='$IdTDD_Detalle' data-documentonro='$NroDocumento' data-suministronro='$NroContrato' data-fechaemision='$FechaEmisionDoc' data-fechalimite='$FechaLimiteCargo' data-tipo2='$Tipo' data-zonanombre='$Zona' data-personalid='$IdNotificador'>M</button>
                  <button type='button' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#popEliminarDocumentos' data-documentotrabajoid_e='$idDocumentosTrabajo' data-documentonro_e='$NroDocumento' data-suministronro_e='$NroContrato' data-tipo2_a='$Tipo'>E</button>
          </td>";*/
          echo "</tr>";
          
        }

        ?>
        </table>

        <?php


$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('plantillappto.xlsx');

$worksheet = $spreadsheet->getActiveSheet();
//Datos del encabezado
$worksheet->getCell('E2')->setValue('John');
$worksheet->getCell('E3')->setValue('Smith');
$worksheet->getCell('E4')->setValue('John');
$worksheet->getCell('E5')->setValue('Smith');
$worksheet->getCell('E6')->setValue('John');
$worksheet->getCell('E7')->setValue('Smith');
$worksheet->getCell('E8')->setValue('John');
$worksheet->getCell('E9')->setValue('Smith');
$worksheet->getCell('E10')->setValue('John');



//Encabezado del PPTO
$txtidppto=$_POST["txtidppto"];
$txtclientenombre=$_POST["txtclientenombre"];
$txtobra=$_POST["txtobra"];
$txtdes_cliente=$_POST["txtdes_cliente"];
$txtubicacion=$_POST["txtubicacion"];
$txtfecha=$_POST["txtfecha"];
$txtmonto=$_POST["txtmonto"];
$txtencargado_nombre=$_POST["txtencargado_nombre"];
$txtestado=$_POST["txtestado"];
$txtMontoTotal=$_POST["txtMontoTotal"];
$txtCondicionComercial=$_POST["txtCondicionComercial"];

//Datos del PPTO
$txtnum=$_POST["txtnum"];
$txtdescripcion=$_POST["txtdescripcion"];
$txtunimed=$_POST["txtunimed"];
$txtcantidad=$_POST["txtcantidad"];
$txtPunitario=$_POST["txtPunitario"];
$txtPparcial=$_POST["txtPparcial"];

$Letrainicial=12;


$worksheet->getCell('E2')->setValue($txtidppto);
$worksheet->getCell('E3')->setValue($txtclientenombre);
$worksheet->getCell('E4')->setValue($txtobra);
$worksheet->getCell('E5')->setValue($txtdes_cliente);
$worksheet->getCell('E6')->setValue($txtubicacion);
$worksheet->getCell('E7')->setValue($txtfecha);
$worksheet->getCell('E8')->setValue($txtmonto);
$worksheet->getCell('E9')->setValue($txtencargado_nombre);
$worksheet->getCell('E10')->setValue($txtestado);





for ($i=0;$i<count($txtdescripcion);$i++){
	if (!empty($txtdescripcion[$i])) {

	$worksheet->getCell('B'.$Letrainicial)->setValue(''.$txtnum[$i]);
	$worksheet->getCell('C'.$Letrainicial)->setValue(''.$txtdescripcion[$i]);
	$worksheet->getCell('D'.$Letrainicial)->setValue(''.$txtunimed[$i]);
	$worksheet->getCell('E'.$Letrainicial)->setValue(''.$txtcantidad[$i]);
	$worksheet->getCell('F'.$Letrainicial)->setValue(''.$txtPunitario[$i]);
	$worksheet->getCell('G'.$Letrainicial)->setValue(''.$txtPparcial[$i]);
	$spreadsheet->getActiveSheet()->insertNewRowBefore($Letrainicial+1, 1);

	}
	//$spreadsheet->getActiveSheet()->removeRow($Letrainicial+1, 1);

	$Letrainicial+=1;

}
$spreadsheet->getActiveSheet()->removeRow($Letrainicial, 2);

$worksheet->getCell('B'.$Letrainicial)->setValue($txtMontoTotal);
$worksheet->getCell('B'.($Letrainicial+2))->setValue(($txtCondicionComercial));

$styleArray = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
            'color' => ['argb' => '006699'],
        ],
    ],
];

$worksheet->getStyle('B'.$Letrainicial.':G'.$Letrainicial)->applyFromArray($styleArray);

//$worksheet->getCell('G12')->setValue('John');

//$spreadsheet->getActiveSheet()->insertNewRowBefore(13, 2);


/*$worksheet->getCell('A2')->setValue('Smith');
$worksheet->getCell('A1')->setValue('John');
$worksheet->getCell('A2')->setValue('Smith');
$worksheet->getCell('A1')->setValue('John');
$worksheet->getCell('A2')->setValue('Smith');*/


// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PPTO-'.$txtidppto.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
/*$writer->setImagesRoot('http://www.example.com');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');*/
?>