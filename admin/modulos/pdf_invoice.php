<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');

// Verificar si hay un buffer de salida activo antes de limpiarlo
if (ob_get_length()) {
    ob_end_clean();
}

// Consulta BD
$myQuery_b= "SELECT
    db_parametros.id, 
    db_parametros.prm_invoicefooter, 
    db_parametros.prm_invoiceterms,
    db_parametros.prm_invoice_color
    FROM
    db_parametros
    WHERE db_parametros.id=1";
$mi_consulta->conectar();
$mi_consulta->ejecutar_consulta($myQuery_b);
$records=$mi_consulta->valores_campo();
$parm_footer = $records['prm_invoicefooter'];
$parm_terms = $records['prm_invoiceterms'];
// $parm_color = hexToRgb($records['prm_invoice_color']);

// Ejecutar la consulta principal
$myQuery= "SELECT
    db_invoice_d.invoice_item AS invoiceItem,
    db_invoice_d.invoice_job AS invoiceJob,
    db_invoice_d.invoice_qty AS invoiceCantidad,
    db_invoice_d.invoice_precio AS invoicePrecio,
    db_invoice_g.invoice_taxes AS invoiceTaxesYes,
    db_invoice_g.invoice_taxes_tasa AS invoiceTaxTasa,
    db_invoice_g.invoice_taxes_total AS invoiceTaxTotal,
    db_invoice_g.invoice_amount AS invoiceTotal
    FROM 
    db_invoice_d 
    INNER JOIN db_invoice_g ON db_invoice_d.invoice_id = db_invoice_g.invoice_id 
    WHERE 
    db_invoice_d.invoice_id='$_GET[xmy]'
    ORDER BY db_invoice_d.idid";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($myQuery);
$registros=$mi_consulta->total_registros();

// Inicializamos Clase TCPDF
include_once(DIR_PDF.'tcpdf.php');
class MYPDF extends TCPDF 
{
    public function Header()
    {
        // Logo
        $image_file = DIR_IMAGENES.'logotimotes.png';
        // Variables
        $borde = 0;
        if($this->varConHeader)
        {
            $this->Image($image_file, 15, 10, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('times', 'B', 12);
            // Posicion
            $this->SetY(8);
            // Company
            $this->Cell(22, 4, '', $borde, 0);
            $this->Cell(50, 4, "Timotes Machine Shop Llc.", $borde, 1);
            $this->SetFont('times', '', 10);
            $this->Cell(22, 4, '', $borde, 0);
            $this->Cell(110, 4, "478 W. Landstreet rd", $borde, 0);
            $this->SetFont('times', 'B', 14);
            $this->Cell(39, 8, 'Invoice No', $borde, 0, 'R');
            $this->SetFont('times', '', 14);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(24, 8, $_POST['iCliente__NumeroDeFactura'], $borde, 1, 'R');
            $this->SetTextColor(0, 0, 0);
            $this->SetY(18);
            $this->SetFont('times', '', 10);
            $this->Cell(22, 4, '', $borde, 0);
            $this->Cell(50, 4, 'Orlando, FL 32824', $borde, 1);
            $this->Cell(22, 4, '', $borde, 0);
            $this->Cell(108, 4, '(407) 722-0438', $borde, 0);
            $this->Cell(31, 4, 'Date:', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__FechaDeFactura'], $borde, 1, 'R');
            $this->Cell(22, 4, '', $borde, 0);
            $this->Cell(108, 4, 'timotesmachineshop@gmail.com', $borde, 0);
            $this->Cell(31, 4, 'Terms:', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__PlazoDeFactura'], $borde, 1, 'R');
            $this->Cell(22, 4, ':', $borde, 0);
            $this->Cell(22, 4, 'Registration:', $borde, 0);
            $this->SetTextColor(255, 0, 0);
            $this->Cell(86, 4, 'MV108423', $borde, 0);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(31, 4, 'Due Date:', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__VenceDeFactura'], $borde, 1, 'R');
            // Linea
            $this->Line(5, 42, 210, 42);
            $this->SetY(45);
            $this->SetFont('times', 'B', 10);
            $this->Cell(18, 4, 'Customer:', $borde, 0);
            $this->SetFont('times', '', 10);
            $this->Cell(112, 4, $_POST['iCliente__Empresa'], $borde, 0);
            $this->Cell(31, 4, 'Date of Payment: ', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__InvoicePaidDMY'], $borde, 1, 'L');
            $this->Cell(18, 4, '', $borde, 0);
            $this->Cell(112, 4, $_POST['iCliente__Nombre'], $borde, 0);
            $this->Cell(31, 4, 'Payment Method: ', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__InvoicePaidForma'], $borde, 1, 'L');
            $this->Cell(18, 4, '', 0, 0);
            $this->Cell(112, 4, $_POST['iCliente__Address'], $borde, 0);
            $this->Cell(31, 4, '# Reference: ', $borde, 0, 'R');
            $this->Cell(34, 4, $_POST['iCliente__InvoicePaidRefer'], $borde, 1, 'L');
            $this->Cell(18, 4, '', 0, 0);
            $this->Cell(60, 4, $_POST['iCliente__Phone'], $borde, 1);
            $this->Cell(18, 4, '', $borde, 0);
            $this->Cell(60, 4, $_POST['iCliente__Email'], $borde, 1);
        }
    }

    public $isLastPage = false;
    
    // Page footer
    public function Footer() 
    {
        $borde = 0;
        if ($this->varConFooter) {
            $this->SetY(-75);
            $this->SetX(8);
            $this->SetAlpha(0.7);
            // Set font
            $this->SetFont('helvetica', 'B', 8);
            // Notes
            $this->Cell(50, 4, 'Notes', $borde, 1);
            $this->SetX(8);
            $this->SetFont('helvetica', 'I', 8);
            $this->writeHTMLCell(0, 0, '', '', $this->varParametroFooter, 0, 0, false, false, 'J', false);
            $this->Ln(8);
            $this->SetX(2);
            $this->SetFont('helvetica', 'B', 8);
            $this->Ln(1);
            $this->SetX(8);
            $this->SetFont('helvetica', 'I', 8);
            $this->writeHTMLCell(0, 0, '', '', $this->varParametroTerms, 0, 0, false, false, 'J', false);
            $this->SetAlpha(1);
        }
        // Page number
        $this->SetY(-15);
        $this->Cell(0, 10, $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function lastPage($resetmargins = false) 
    {
        $this->setPage($this->getNumPages(), $resetmargins);
        $this->isLastPage = true;
    }
}

// Inicializar PDF
$pdf = new MYPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);
$pdf->SetAuthor('JabezSoftware');
$pdf->SetTitle('JabezSoftware');
$pdf->SetSubject('JabezSoftware');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', "10"));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Variables
$pdf->varConFooter = true;
$pdf->varConHeader = true;
$pdf->varParametroFooter = $parm_footer;
$pdf->varParametroTerms = $parm_terms;

// Definir bordes
$bordes_head = array('TB' => array('width' => 0.50, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$bordes_body = array('B' => array('width' => 0.05, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'color' => array(234, 234, 234)));

// Agregar página
$pdf->AddPage();

// Marca de pago si la factura está pagada
if ($_POST['iCliente__InvoicePaid'] == "Y") {
    $img_paid = DIR_IMAGENES . 'paid.png';
    $pdf->SetAlpha(0.7);
    $pdf->Image($img_paid, 90, 12, 51, 31, 'PNG', '', '', false, 200, '', false, false, 0);
    $pdf->SetAlpha(1);
}

// Definir fuente y posición
$pdf->SetFont('times', '', 11);
$pdf->SetY(70);
$pdf->Ln(5);
$pdf->SetX(4);

// Encabezados de la tabla
$pdf->MultiCell(1, 8, "", $bordes_head, 'C', 0, 0);
$pdf->MultiCell(24, 8, "# Item", $bordes_head, 'C', 0, 0);
$pdf->MultiCell(120, 8, 'Job Description', $bordes_head, 'L', 0, 0);
$pdf->MultiCell(20, 8, 'Qty.', $bordes_head, 'C', 0, 0);
$pdf->MultiCell(20, 8, 'Amount', $bordes_head, 'C', 0, 0);
$pdf->MultiCell(20, 8, 'SubTotal', $bordes_head, 'C', 0, 1);

// Rellenar los registros de la tabla
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('times', '', 10);

$contador = 0;
$total = 0;
$taxSi = $TaxTasa = $TaxTotal = $TotalTotal = "";
while ($fila = mysqli_fetch_assoc($tabla)) {
    $pdf->SetX(4);
    $taxSi = $fila['invoiceTaxesYes'];
    $TaxTasa = "Taxes (" . (float)$fila['invoiceTaxTasa'] . "%)";
    $TaxTotal = (float)$fila['invoiceTaxTotal'];
    $TotalTotal = (float)$fila['invoiceTotal'];

    $cantidad = (float)$fila['invoiceCantidad'];
    $precio = (float)$fila['invoicePrecio'];
    $totalAmount = $cantidad * $precio;

    // Imprimir los valores de cada columna
    $pdf->MultiCell(25, 8, $fila['invoiceItem'], $bordes_body, 'C', 0, 0);
    $pdf->MultiCell(120, 8, $fila['invoiceJob'], $bordes_body, 'L', 0, 0);
    $pdf->MultiCell(20, 8, $cantidad > 0 ? $cantidad : "", $bordes_body, 'C', 0, 0);
    $pdf->MultiCell(20, 8, $precio > 0 ? "$" . number_format($precio, 2) : "", $bordes_body, 'R', 0, 0);
    $pdf->MultiCell(18, 8, $cantidad > 0 || $precio > 0 ? "$" . number_format($totalAmount, 2) : "", $bordes_body, 'R', 0, 1);

    $total += $totalAmount;
    $pdf->Ln(0.5);

    // Comprobar si es necesario añadir una nueva página
    if (($contador == 13) && ($registros > 1)) {
        $pdf->AddPage();
        if ($_POST['iCliente__InvoicePaid'] == "Y") {
            $img_paid = DIR_IMAGENES . 'paid.png';
            $pdf->SetAlpha(0.7);
            $pdf->Image($img_paid, 90, 12, 51, 31, 'PNG', '', '', false, 200, '', false, false, 0);
            $pdf->SetAlpha(1);
        }
        $pdf->SetFont('times', '', 11);
        $pdf->SetY(70);
        $pdf->Ln(5);
        $pdf->SetX(4);
        $pdf->MultiCell(1, 8, "", $bordes_head, 'C', 0, 0);
        $pdf->MultiCell(24, 8, "# Item",  $bordes_head, 'C', 0, 0);
        $pdf->MultiCell(120, 8, 'Job Description',  $bordes_head, 'L', 0, 0);
        $pdf->MultiCell(20, 8, 'Qty.',  $bordes_head, 'C', 0, 0);
        $pdf->MultiCell(20, 8, 'Amount',  $bordes_head, 'C', 0, 0);
        $pdf->MultiCell(20, 8, 'SubTotal',  $bordes_head, 'C', 0, 1);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('times', '', 10);
        $contador = 0;
        $pdf->SetFont('times', '', 8);
    } else {
        $contador++;
        $registros--;
    }
}

// Mostrar totales
if ($taxSi == "Y") {
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetX(4);
    $pdf->Cell(185, 8, 'Sub-Total', 0, 0, 'R', 1);
    $pdf->Cell(18, 8, number_format($total, 2), 0, 0, 'R', 1);
    $pdf->Cell(2, 8, '', 0, 1, 'C', 1);
    $pdf->SetX(4);
    $pdf->Cell(185, 8, $TaxTasa, 0, 0, 'R', 1);
    $pdf->Cell(18, 8, number_format($TaxTotal, 2), 0, 0, 'R', 1);
    $pdf->Cell(2, 8, '', 0, 1, 'C', 1);
}

$pdf->SetX(4);
$pdf->SetFont('times', 'B', 14);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(150, 8, "", '', 'R', 0, 0);
$pdf->MultiCell(30, 8, "Total", $bordes_head, 'C', 0, 0);
$pdf->MultiCell(25, 8, number_format($TotalTotal, 2), $bordes_head, 'C', 0, 0);

// Generar PDF
$pdf->Output(DIR_TEMP . "invoice_" . $_GET['xmy'] . ".pdf", 'F', 1);
$pdf->Close();
?>