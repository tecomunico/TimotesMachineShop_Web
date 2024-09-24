<?php
ob_end_clean();
// Consulta BD
$myQuery_a= "SELECT
    db_parametros.id, 
    db_parametros.prm_empresa, 
    db_parametros.prm_direccion, 
    db_parametros.prm_citymaszip, 
    db_parametros.prm_email, 
    db_parametros.prm_phone,
    db_parametros.prm_advertisement,
    db_parametros.prm_notes,
    db_parametros.prm_piedepagina
    FROM
    db_parametros
    WHERE db_parametros.id=1";
$mi_consulta->conectar();
$mi_consulta->ejecutar_consulta($myQuery_a);
$records=$mi_consulta->valores_campo();
$parm_empresa = $records['prm_empresa'];
$parm_address = $records['prm_direccion'];
$parm_citymaszip = $records['prm_citymaszip'];
$parm_email = $records['prm_email'];
$parm_phone = $records['prm_phone'];
$parm_propaganda = $records['prm_advertisement'];
$parm_piedepagina = $records['prm_piedepagina'];
$parm_notas = $records['prm_notes'];
$myQuery_b= "SELECT
    db_workorders.wo_id,
    db_workorders.marca_id,
    db_workorders.modelo_id,
    db_carro_marca.marca_nombre,
    db_carro_modelo.modelo_nombre,
    db_workorders.id_clientes,
    db_clientes.clientes_nombre,
    db_clientes.clientes_empresa,
    db_clientes.clientes_phone,
    db_clientes.clientes_email,
    db_clientes.clientes_address,
    db_workorders.wo_motor AS trimMotor,
    db_workorders.wo_year,
    db_workorders.id_service,
    db_services.service_cual,
    IF(db_workorders.wo_delivered='Y','Yes','') wo_delivered,
    DATE_FORMAT(db_workorders.wo_date,'%a %d, %b %Y') AS FechaWO,
    db_workorders.wo_distro,
	db_workorders.wo_note
    FROM
    db_workorders
    INNER JOIN db_carro_marca ON db_workorders.marca_id = db_carro_marca.marca_id
    INNER JOIN db_carro_modelo ON db_workorders.modelo_id = db_carro_modelo.modelo_id
    INNER JOIN db_clientes ON db_workorders.id_clientes = db_clientes.id_clientes
    INNER JOIN db_services ON db_workorders.id_service = db_services.id_service 
    WHERE db_workorders.wo_id='$_POST[WoEmailID]'";
$mi_consulta->conectar();
$mi_consulta->ejecutar_consulta($myQuery_b);
$filas_a=$mi_consulta->valores_campo();
$var_IDID = $filas_a['wo_id'];
$var_cliente = $filas_a['clientes_nombre'];
$var_empresa = $filas_a['clientes_empresa'];
$var_phone = $filas_a['clientes_phone'];
$var_email = $filas_a['clientes_email'];
$var_address = $filas_a['clientes_address'];
$var_fechaFormateada = $filas_a['FechaWO'];
$var_MakeCarro = $filas_a['marca_nombre'];
$var_ModeloCarro = $filas_a['modelo_nombre'];
$var_TrimCarro = $filas_a['trimMotor'];
$var_YearCarro = $filas_a['wo_year'];
$var_ServiceCarro = $filas_a['service_cual'];
$var_DistroCarro = $filas_a['wo_distro'];
$var_NoteCarro = $filas_a['wo_note'];
$myQuery_c= "SELECT
    db_workorders.wo_id,
    db_piezas.pieza_nombre
    FROM
    db_workorders
    INNER JOIN db_wodetalle ON db_workorders.wo_id = db_wodetalle.wo_id
    INNER JOIN db_piezas ON db_wodetalle.pieza_id = db_piezas.pieza_id
    WHERE db_workorders.wo_id='$var_IDID'
    ORDER BY db_workorders.wo_id ASC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($myQuery_c);
// Inicializamos Clase
include_once(DIR_PDF.'tcpdf.php');
include_once(DIR_PDF.'tcpdf_include.php');
//
$pdf = new TCPDF('P', 'mm', 'LETTER', true, 'UTF-8', false);
$pdf->SetAuthor('Timotes Machine Shop');
$pdf->SetTitle('Work Order');
$pdf->SetSubject('Work Order');
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
// Logo
$image_file = DIR_IMAGENES.'logotimotes.png';
// Variables
$borde=0;
$pdf->Image($image_file,15,10,20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
// Posicion
$pdf->SetY(11);
// Company
$pdf->Cell(22, 4, '',$borde,0);
$pdf->SetFont('times', '', 12);
$pdf->Cell(50, 4, $parm_empresa,$borde,1);
$pdf->SetFont('times', '', 10);
$pdf->Cell(22, 4, '',$borde,0);
$pdf->Cell(113, 4, $parm_address,$borde,0);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(36, 8, 'Work Order No',1,0,'C');
$pdf->SetFont('times', '', 14);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(20, 8, $_POST['WoEmailID'],1,1,'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetY(21);
$pdf->SetFont('times', '', 10);
$pdf->Cell(22, 4, '',$borde,0);
$pdf->Cell(50, 4, $parm_citymaszip,$borde,1);
$pdf->Cell(22, 4, '',$borde,0);
$pdf->Cell(110, 4, $parm_email,$borde,1);
$pdf->Cell(22, 4, '',$borde,0);
$pdf->Cell(110, 4, $parm_phone,$borde,1);
$pdf->SetFont('times', 'i', 14);
$pdf->Cell(191, 4, $parm_propaganda,$borde,1,'C');
//
$pdf->Ln(2);
$borde=1;
$pdf->SetFont('times', '', 10);
$borde=1;
$pdf->Cell(135,8, '',0,0);
$pdf->Cell(16, 8, 'Date',1,0,'C');
$pdf->Cell(40, 8, $var_fechaFormateada,1,1,'C');
$pdf->Cell(16, 8, 'Customer',$borde,0,'C');
$pdf->Cell(50, 8, $var_cliente,$borde,0);
$pdf->Cell(16, 8, 'Company',$borde,0,'C');
$pdf->Cell(53, 8, $var_empresa,$borde,0);
$pdf->Cell(16, 8, 'Phone #',$borde,0,'C');
$pdf->Cell(40, 8, $var_phone,$borde,1);
$pdf->Cell(16, 8, 'Address',$borde,0,'C');
$pdf->Cell(66, 8, $var_address,$borde,0);
$pdf->Cell(21, 8, 'E-mail ',$borde,0,'C');
$pdf->Cell(88, 8, $var_email,$borde,1,'L');
$pdf->SetFillColor(0,0,0); // Grey
$pdf->SetTextColor(255,255,255); // Grey
$pdf->Cell(191, 8, 'Vehicle Information',$borde,1,'C',1);
$pdf->SetFillColor(249,249,249);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(16, 8, 'Make',1,0,'C');
$pdf->Cell(36, 8, $var_MakeCarro,1,0);
$pdf->Cell(14, 8, 'Model',1,0,'C');
$pdf->Cell(37, 8, $var_ModeloCarro,1,0);
$pdf->Cell(15, 8, 'Year',1,0,'C');
$pdf->Cell(10, 8, $var_YearCarro,1,0);
$pdf->Cell(23, 8, 'Motor/Trim',1,0,'C');
$pdf->Cell(40, 8, $var_TrimCarro,1,1);
$pdf->Cell(16, 8, 'Service',1,0,'C');
$pdf->Cell(50, 8, $var_ServiceCarro,1,0);
$pdf->Cell(20, 8, 'Distribution',1,0,'C');
$pdf->Cell(17, 8, $var_DistroCarro,1,0,'C');
$pdf->Cell(15, 8, 'Note',1,0,'C');
$pdf->Cell(73, 8, $var_NoteCarro,1,1,'L');
// Body
$pdf->SetFillColor(0,0,0); // Grey
$pdf->SetTextColor(255,255,255); // Grey
$pdf->Cell(191, 8, 'Parts/Description',$borde,1,'C',1);
$pdf->SetFillColor(249,249,249);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25, 8, 'Crankshaft',1,0,'C');
$pdf->Cell(13, 8, '',1,0);
$pdf->Cell(25, 8, 'Engine Block',1,0,'C');
$pdf->Cell(13, 8, '',1,0);
$pdf->Cell(25, 8, 'Cylinder Head',1,0,'C');
$pdf->Cell(13, 8, '',1,0);
$pdf->Cell(25, 8, 'Pistons',1,0,'C');
$pdf->Cell(13, 8, '',1,0);
$pdf->Cell(25, 8, 'Connecting Rod',1,0,'C');
$pdf->Cell(14, 8, '',1,1);
$pdf->SetFont('times', '', 12);
$pdf->SetTextColor(255,0,0);
// Detalle/Servicios
while ($fila = mysqli_fetch_assoc($tabla)) 
{
    $quePieza = $fila['pieza_nombre'];
    switch($quePieza )
    {
        case 'Crankshaft':
            $pdf->SetY(100);
            $pdf->SetX(42);
            $pdf->Cell(10,6,'X',0,1,'C');
        break;

        case 'Engine Block':
            $pdf->SetY(100);
            $pdf->SetX(80);
            $pdf->Cell(10,6,'X',0,1,'C');
        break;

        case 'Cylinder Head':
            $pdf->SetY(100);
            $pdf->SetX(117);
            $pdf->Cell(10,6,'X',0,1,'C');
        break;

        case 'Pistons':
            $pdf->SetY(100);
            $pdf->SetX(155);
            $pdf->Cell(10,6,'X',0,1,'C');
        break;

        case 'Connecting Rod':
            $pdf->SetY(100);
            $pdf->SetX(192);
            $pdf->Cell(10,6,'X',0,1,'C');
        break;
    }
}
// Notas Footer
$pdf->Ln(2);
$pdf->SetFont('times', 'i', 10);
$pdf->Cell(191,6,$parm_notas,0,1,'C');
$pdf->SetTextColor(0,0,0);
$htmlFirma="<p>&nbsp;</p>
<p>------------------------------------</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Signature</p>";
$pdf->writeHTMLCell(50,0,'','',$htmlFirma,0,1,0,true,'',true);
// Directorio
$var_ruta=dirname(__FILE__,2).'/tmp/';
// Generar Archivo
$pdf->Output($var_ruta."wo_".$_POST['WoEmailID'].".pdf",'F',1);
$pdf->Close();
?>