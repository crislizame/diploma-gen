<?php
ini_set('display_errors', 0);
$namarch = urldecode($_GET['nombrear']);
session_start();
require_once '../../Classes/PHPExcel.php';
require_once('../../Classes/PHPExcel/Reader/Excel2007.php');
$archivo = $namarch;

$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load('../../upload/'.$namarch);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
$arrayall = array();
$fila = 0;
for ($row = 2; $row <= $highestRow; $row++){
    $nombre = $sheet->getCell("A".$row);
    $nota = $sheet->getCell("B".$row);
    $date = $sheet->getCell("C2");
    $motivo = $sheet->getCell("D2");
    $doc1 = $sheet->getCell("E2");
    $doc2 = $sheet->getCell("F2");
    $tipo = $sheet->getCell("G2");
    $arrayall["nombre"][$fila] =$nombre;
    $arrayall['nota'][$fila] = $nota;
    $arrayall['date'] = $date;
    $arrayall['motivo'] =$motivo;
    $arrayall['doc1'] = $doc1;
    $arrayall['doc2'] = $doc2;
    $arrayall['tipo'] = $tipo;

    $fila = $fila + 1;
}
$session_id= session_id();
$arrayexcel=$arrayall;
$conadorall=count($arrayexcel['nombre']);

$fontnormal=30;
$fletmax=strlen($arrayexcel['nombre'][0]);
$fontactual=($fletmax-$fontnormal)-$fontnormal;
require_once(dirname(__FILE__).'/../html2pdf.class.php');
// get the HTML
ob_start();
include(dirname(__FILE__).'/res/ver_factura_html.php');
$content = ob_get_clean();

try
{
    // init HTML2PDF
    $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8',array(0,0,0,0));
    // display the full page
    $html2pdf->pdf->SetDisplayMode('fullpage');
    // convert
    // convert
    $html2pdf->writeHTML($content, 0);
    // send the PDF

    //  $html2pdf->Output('../../upload/Factura.pdf','F');
    $html2pdf->Output('Factura.pdf');

}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
unlink('../../upload/'.$namarch);