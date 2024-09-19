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
	db_clientes.id_clientes,
	db_clientes.clientes_nombre, 
	db_clientes.clientes_phone, 
	db_clientes.clientes_email, 
	db_clientes.clientes_address,
	db_clientes.clientes_empresa
	FROM
	db_clientes";
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
		$this->Cell(0,10,'Clients List',0,1,'C',0);
		$this->Line($this->getX(),$this->getY(),260,$this->getY());
    }
	public function Footer() 
	{
        $this->SetY(-15);
		$this->SetFont('helvetica', 'I', 8);
		$this->Line($this->getX(),$this->getY(),260,$this->getY());
		$this->SetTextColor(255,0,0);
		$this->Cell(100,10,date('l jS \of F Y'),0,0,'L',0);
        $this->Cell(0,10,'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),0,1,'R',0);
    }
}
$pdf = new MYPDF('L','mm','LETTER', true, 'UTF-8', false);
$pdf->SetAuthor('.:JabezSoftware:.');
$pdf->SetTitle("Clients List");
$pdf->SetSubject("Clients List");
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
$pdf->SetY(34);
$pdf->SetX(10);
$pdf->Cell(10,6,"ID",1,0,'C',1);
$pdf->Cell(50,6,"Client Name",1,0,'C',1);
$pdf->Cell(50,6,"Company",1,0,'C',1);
$pdf->Cell(30,6,"Phone",1,0,'C',1);
$pdf->Cell(55,6,"Email",1,0,'C',1);
$pdf->Cell(55,6,"Address",1,1,'C',1);
$pdf->SetFont('times','',8);
$contador=1;
$lineas=0;
while ($fila = mysqli_fetch_assoc($tabla)) 
{
	$pdf->SetX(10);
	$pdf->Cell(10,6,$fila['id_clientes'],1,0,'C',0);
	$pdf->Cell(50,6,$fila['clientes_nombre'],1,0,'L',0);
	$pdf->Cell(50,6,$fila['clientes_empresa'],1,0,'L',0);
	$pdf->Cell(30,6,$fila['clientes_phone'],1,0,'L',0);
	$pdf->Cell(55,6,$fila['clientes_email'],1,0,'L',0);
	$pdf->Cell(55,6,$fila['clientes_address'],1,1,'L',0);
	if(($contador==18) and ($registros>1))
	{
		$pdf->AddPage();
		$pdf->SetFillColor(220,220,220);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(0,0,0);
		$pdf->SetFont('times','B',8);
		$pdf->SetY(34);
		$pdf->SetX(10);
		$pdf->Cell(10,6,"ID",1,0,'C',1);
		$pdf->Cell(50,6,"Client Name",1,0,'C',1);
		$pdf->Cell(50,6,"Company",1,0,'C',1);
		$pdf->Cell(30,6,"Phone",1,0,'C',1);
		$pdf->Cell(55,6,"Email",1,0,'C',1);
		$pdf->Cell(55,6,"Address",1,1,'C',1);
		$pdf->SetFont('times','',8);
	}else{	
		$contador++;
		$registros--;
	}
	$lineas ++;
}
$pdf->Ln(1);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('times','B',10);
$pdf->Cell(60,5,'Total Clients: '.$lineas,0,0,'L',0);
// $pdf->IncludeJS($js);
$pdf->Output(DIR_TEMP . 'list_clients.pdf', 'F');
$pdf->Close();
?>