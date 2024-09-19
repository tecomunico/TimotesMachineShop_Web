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
    WHERE db_workorders.wo_id='$_POST[labelWoID]'";
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
// Clase TCPDF
include_once(DIR_PDF.'tcpdf.php');
include_once(DIR_PDF.'tcpdf_include.php');
// Logo
$image_file = DIR_IMAGENES.'logotimotes.png';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Timotes Machine Shop');
$pdf->SetTitle('Label');
$pdf->SetSubject('Label');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage('L','A6');
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('helvetica', '', 11);
$pdf->Image($image_file,10,10,30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
// Variables
$borde = 0;
$pdf->SetFont('times', '', 12);
$pdf->Cell(44, 4, $parm_empresa,$borde,1);
$pdf->SetFont('times', '', 10);
$pdf->Cell(30, 4, '',$borde,0);
$pdf->Cell(45, 4, $parm_address,$borde,0);
$pdf->SetFont('times', 'B', 14);
$pdf->Cell(36, 8, 'Work Order No',1,0,'C');
$pdf->SetFont('times', '', 14);
$pdf->Cell(20, 8, $_POST['labelWoID'],1,1,'C');
$pdf->SetY(20);
$pdf->SetFont('times', '', 10);
$pdf->Cell(30, 4, '',$borde,0);
$pdf->Cell(45, 4, $parm_citymaszip,$borde,1);
$pdf->Cell(30, 4, '',$borde,0);
$pdf->Cell(80, 4, $parm_email,$borde,1);
$pdf->Cell(30, 4, '',$borde,0);
$pdf->Cell(80, 4, $parm_phone,$borde,1);
$pdf->Ln(2);
$borde=1;
$pdf->SetFont('times', '', 10);
$pdf->Cell(85,8, '',0,0);
$pdf->Cell(16, 8, 'Date',1,0,'C');
$pdf->Cell(30, 8, $var_fechaFormateada,1,1,'C');
$pdf->Cell(16, 8, 'Customer',$borde,0,'C');
$pdf->Cell(69, 8, $var_cliente,$borde,0);
$pdf->Cell(16, 8, 'Phone #',$borde,0,'C');
$pdf->Cell(30, 8, $var_phone,$borde,1,'C');
$pdf->Cell(16, 8, 'Address',$borde,0,'C');
$pdf->Cell(69, 8, $var_address,$borde,0);
$pdf->Cell(46, 8, $var_email,$borde,1,'L');
$pdf->Cell(16, 8, 'Make',1,0,'C');
$pdf->Cell(36, 8, $var_MakeCarro,1,0);
$pdf->Cell(14, 8, 'Model',1,0,'C');
$pdf->Cell(40, 8, $var_ModeloCarro,1,0);
$pdf->Cell(15, 8, 'Year',1,0,'C');
$pdf->Cell(10, 8, $var_YearCarro,1,1);
$pdf->Ln(8);
$pdf->SetX(13);
// define barcode style
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => false,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->write1DBarcode($var_IDID, 'C39E+', '10', '75', '131', 18, 0.4, $style, 'N');
// Generar Archivo
$pdf->Output("Label_".$_POST['labelWoID'].".pdf", 'D',1);
$pdf->Close();
?>