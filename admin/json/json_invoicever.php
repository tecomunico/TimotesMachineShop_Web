<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$var_codigo = $_GET['Inv'];
$MyQuery= "SELECT
    CONCAT('TMS-',db_invoice_g.invoice_id) AS InvoiceNumber,
    db_invoice_g.invoice_id AS InvoiceNumero,
    db_clientes.clientes_nombre AS InvoiceCliente,
    db_clientes.clientes_phone AS InvoiceClienteTlf,
    db_invoice_g.invoice_fecha AS InvoiceFecha,
    db_invoice_g.invoice_due AS InvoiceDue,
    db_invoice_g.invoice_amount AS InvoiceMonto,
    db_invoice_g.invoice_status AS InvoiceStatus
    FROM
    db_invoice_g
    INNER JOIN db_clientes ON db_invoice_g.id_clientes = db_clientes.id_clientes
    WHERE db_invoice_g.invoice_id=$var_codigo";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>