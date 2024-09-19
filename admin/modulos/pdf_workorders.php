<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
ob_end_clean();
// Consulta BD
switch ($_POST['WO_Delivered'])
{
    case 'Yes':
        $filtro=" WHERE db_workorders.wo_delivered='Y' AND (DATE(db_workorders.wo_date)>='$_POST[WorkOrderPrint_Desde_submit]' AND DATE(db_workorders.wo_date)<='$_POST[WorkOrderPrint_Hasta_submit]')";
    break;

    case 'No':
        $filtro=" WHERE (db_workorders.wo_delivered='' OR db_workorders.wo_delivered=null) AND (DATE(db_workorders.wo_date)>='$_POST[WorkOrderPrint_Desde_submit]' AND DATE(db_workorders.wo_date)<='$_POST[WorkOrderPrint_Hasta_submit]')";
    break;

    default:
        $filtro=" WHERE (DATE(db_workorders.wo_date)>='$_POST[WorkOrderPrint_Desde_submit]' AND DATE(db_workorders.wo_date)<='$_POST[WorkOrderPrint_Hasta_submit]')";
    break;
}
$MyQuery= "SELECT
    db_workorders.wo_id,
    db_workorders.marca_id,
    db_workorders.modelo_id,
    db_carro_marca.marca_nombre,
    db_carro_modelo.modelo_nombre,
    db_workorders.id_clientes,
    db_clientes.clientes_nombre,
    db_workorders.wo_motor AS trimMotor,
    db_workorders.wo_date,
    db_workorders.wo_year,
    db_workorders.id_service,
    db_services.service_cual,
    IF(db_workorders.wo_delivered='Y','Yes','') wo_delivered
    FROM
    db_workorders
    INNER JOIN db_carro_marca ON db_workorders.marca_id = db_carro_marca.marca_id
    INNER JOIN db_carro_modelo ON db_workorders.modelo_id = db_carro_modelo.modelo_id
    INNER JOIN db_clientes ON db_workorders.id_clientes = db_clientes.id_clientes
    INNER JOIN db_services ON db_workorders.id_service = db_services.id_service 
    $filtro";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$registros=$mi_consulta->total_registros();
// Inicializamos Clase
include_once(DIR_PDF.'tcpdf.php');
include_once(DIR_PDF.'tcpdf_include.php');
class MYPDF extends TCPDF 
{
	public function Header() 
	{
		$image_file = DIR_IMAGENES.'logo.jpg';
		$this->Image($image_file,15,10,40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->SetY(8);
		$this->SetFont('helvetica', 'B', 12);
		$this->ln(12);
        $this->SetTextColor(255,0,0);
		$this->Cell(0,10,'Workorders List',0,1,'C',0);
        $this->SetX(10);
        $this->Line($this->getX(),$this->getY(),268,$this->getY());
        $this->SetFont('times', 'i', 10);
        $this->SetTextColor(255,0,0);
        $this->SetX(10);
        $this->Cell(10,10,'From: ',0,0,'L',0);
        $this->SetTextColor(0,0,0);
        $this->Cell(50,10,$_POST['WorkOrderPrint_Desde'],0,1,'L',0);
        $this->SetTextColor(255,0,0);
        $this->SetY(35);
        $this->SetX(10);
        $this->Cell(10,10,'To: ',0,0,'R',0);
        $this->SetTextColor(0,0,0);
        $this->Cell(50,10,$_POST['WorkOrderPrint_Hasta'],0,1,'L',0);
    }
	public function Footer() 
	{
        $this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Line($this->getX(),$this->getY(),265,$this->getY());
		$this->SetTextColor(255,0,0);
		$this->Cell(100,10,date('l jS \of F Y'),0,0,'L',0);
        $this->Cell(0,10,'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),0,1,'R',0);
    }
}
$pdf = new MYPDF('L','mm','LETTER', true, 'UTF-8', false);
$pdf->SetAuthor('.:JabezSoftware:.');
$pdf->SetTitle("Workorders List");
$pdf->SetSubject("Workorders List");
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', "14"));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
$pdf->setLanguageArray($l); 
$pdf->AddPage();
$pdf->SetFillColor(220,220,220);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('times','B',8);
$pdf->SetY(46);
$pdf->SetX(10);
$pdf->Cell(10,6,"ID",1,0,'C',1);
$pdf->Cell(50,6,"Client",1,0,'C',1);
$pdf->Cell(30,6,"Make",1,0,'C',1);
$pdf->Cell(30,6,"Model",1,0,'C',1);
$pdf->Cell(20,6,"Trim",1,0,'C',1);
$pdf->Cell(20,6,"Year",1,0,'C',1);
$pdf->Cell(60,6,"Service",1,0,'C',1);
$pdf->Cell(20,6,"Date",1,0,'C',1);
$pdf->Cell(20,6,"Delivered",1,1,'C',1);
$pdf->SetFont('times','',8);
$contador=1;
$lineas=0;
while ($fila = mysqli_fetch_assoc($tabla)) 
{
	$pdf->SetX(10);
	$pdf->Cell(10,6,$fila['wo_id'],1,0,'C',0);
	$pdf->Cell(50,6,$fila['clientes_nombre'],1,0,'L',0);
	$pdf->Cell(30,6,$fila['marca_nombre'],1,0,'C',0);
	$pdf->Cell(30,6,$fila['modelo_nombre'],1,0,'C',0);
	$pdf->Cell(20,6,$fila['trimMotor'],1,0,'C',0);
	$pdf->Cell(20,6,$fila['wo_year'],1,0,'C',0);
	$pdf->Cell(60,6,$fila['service_cual'],1,0,'C',0);
	$pdf->Cell(20,6,$fila['wo_date'],1,0,'C',0);
    $pdf->SetTextColor(255,0,0);
	$pdf->Cell(20,6,$fila['wo_delivered'],1,1,'C',0);
    $pdf->SetTextColor(0,0,0);
	if(($contador==20) and ($registros>1))
	{
		$pdf->AddPage();
        $pdf->SetFillColor(220,220,220);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetFont('times','B',8);
        $pdf->SetY(46);
        $pdf->SetX(10);
        $pdf->Cell(10,6,"ID",1,0,'C',1);
        $pdf->Cell(50,6,"Client",1,0,'C',1);
        $pdf->Cell(30,6,"Make",1,0,'C',1);
        $pdf->Cell(30,6,"Model",1,0,'C',1);
        $pdf->Cell(20,6,"Trim",1,0,'C',1);
        $pdf->Cell(20,6,"Year",1,0,'C',1);
        $pdf->Cell(60,6,"Service",1,0,'C',1);
        $pdf->Cell(20,6,"Date",1,0,'C',1);
        $pdf->Cell(20,6,"Delivered",1,1,'C',1);
        $pdf->SetFont('times','',8);
        $contador=1;
	}else{	
		$contador++;
		$registros--;
	}
	$lineas ++;
}
$pdf->Ln(4);
$pdf->SetX(10);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('times','B',10);
$pdf->Cell(60,5,'Total Work Orders: '.$lineas,0,0,'L',0);
$pdf->Output(DIR_TEMP . 'list_workorders.pdf', 'F');
$pdf->Close();
?>