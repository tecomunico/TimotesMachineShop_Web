<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
ob_end_clean();
// Consulta BD
$MyQuery= "SELECT
    CONCAT('TMS-',db_invoice_g.invoice_id) AS InvoiceNumber,
    db_clientes.clientes_nombre,
    DATE_FORMAT(db_invoice_g.invoice_fecha, '%a %d, %b %Y') AS Invoice_Fecha,
    db_invoice_g.invoice_status,
    IF(db_invoice_g.invoice_pagado = 'Y','Yes','No') AS fuePagado,
    db_invoice_g.invoice_formadepago,
    db_invoice_g.invoice_referenciapago,
    db_clientes.clientes_phone,
    db_invoice_g.invoice_amount,
    CONCAT('$',FORMAT(db_invoice_g.invoice_amount,2,'en_US')) AS MontoInvoice
    FROM
    db_invoice_g
    INNER JOIN db_clientes ON db_invoice_g.id_clientes = db_clientes.id_clientes
    WHERE (DATE(db_invoice_g.invoice_fecha)>='$_POST[desdeSubmit]' AND DATE(db_invoice_g.invoice_fecha)<='$_POST[cuandoSubmit]')";
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
		$this->Cell(0,10,'Invoices/Report',0,1,'C',0);
        $this->SetX(10);
        $this->Line($this->getX(),$this->getY(),268,$this->getY());
        $this->SetFont('times', 'i', 10);
        $this->SetTextColor(255,0,0);
        $this->SetX(10);
        $this->Cell(10,10,'From: ',0,0,'L',0);
        $this->SetTextColor(0,0,0);
        $this->Cell(50,10,$_POST['desdeCuando'],0,1,'L',0);
        $this->SetTextColor(255,0,0);
        $this->SetY(35);
        $this->SetX(10);
        $this->Cell(10,10,'To: ',0,0,'R',0);
        $this->SetTextColor(0,0,0);
        $this->Cell(50,10,$_POST['hastaCuando'],0,1,'L',0);
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
$pdf->SetX(12);
$pdf->Cell(10,6,"#",1,0,'C',1);
$pdf->Cell(15,6,"Invoice",1,0,'C',1);
$pdf->Cell(82,6,"Client",1,0,'C',1);
$pdf->Cell(25,6,"Phone",1,0,'C',1);
$pdf->Cell(30,6,"Date",1,0,'C',1);
$pdf->Cell(15,6,"Paid",1,0,'C',1);
$pdf->Cell(25,6,"Method/Payment",1,0,'C',1);
$pdf->Cell(30,6,"Reference",1,0,'C',1);
$pdf->Cell(20,6,"Amount",1,1,'C',1);
$pdf->SetFont('times','',8);
$contador=1;
$lineas=$total=0;
while ($fila = mysqli_fetch_assoc($tabla)) 
{
	$pdf->SetX(12);
	$pdf->Cell(10,6,$contador,1,0,'C',0);
	$pdf->Cell(15,6,$fila['InvoiceNumber'],1,0,'C',0);
	$pdf->Cell(82,6,$fila['clientes_nombre'],1,0,'L',0);
	$pdf->Cell(25,6,$fila['clientes_phone'],1,0,'C',0);
	$pdf->Cell(30,6,$fila['Invoice_Fecha'],1,0,'C',0);
	$pdf->Cell(15,6,$fila['fuePagado'],1,0,'C',0);
	$pdf->Cell(25,6,$fila['invoice_formadepago'],1,0,'C',0);
	$pdf->Cell(30,6,$fila['invoice_referenciapago'],1,0,'C',0);
	$pdf->Cell(20,6,$fila['MontoInvoice'],1,1,'R',0);
    $total = $total + $fila['invoice_amount'];
	if(($contador==22) and ($registros>1))
	{
		$pdf->AddPage();
        $pdf->SetFillColor(220,220,220);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetFont('times','B',8);
        $pdf->SetY(46);
        $pdf->SetX(12);
        $pdf->Cell(10,6,"#",1,0,'C',1);
        $pdf->Cell(15,6,"Invoice",1,0,'C',1);
        $pdf->Cell(82,6,"Client",1,0,'C',1);
        $pdf->Cell(25,6,"Phone",1,0,'C',1);
        $pdf->Cell(30,6,"Date",1,0,'C',1);
        $pdf->Cell(15,6,"Paid",1,0,'C',1);
        $pdf->Cell(25,6,"Method/Payment",1,0,'C',1);
        $pdf->Cell(30,6,"Reference",1,0,'C',1);
        $pdf->Cell(20,6,"Amount",1,1,'C',1);
        $pdf->SetFont('times','',8);
        $contador=1;
	}else{	
		$contador++;
		$registros--;
	}
	$lineas ++;
}
$pdf->Ln(4);
$pdf->SetX(12);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('times','B',10);
$pdf->Cell(60,5,"Total Invoices: $".number_format($total,2),0,0,'L',0);
$pdf->Output(DIR_TEMP . 'list_invoices.pdf', 'F');
$pdf->Close();
?>