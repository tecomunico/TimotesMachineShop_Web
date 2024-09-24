<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
    CONCAT('TMS-',db_invoice_g.invoice_id) AS InvoiceNumber,
    db_invoice_g.invoice_id AS InvoiceNumero,
    db_clientes.id_clientes AS InvoiceClienteID,
    db_clientes.clientes_nombre AS InvoiceCliente,
    db_clientes.clientes_phone AS InvoiceClienteTlf,
    db_clientes.clientes_address AS InvoiceClienteAddress,
    db_clientes.clientes_empresa AS InvoiceEmpresa,
    db_clientes.clientes_email AS InvoiceClienteCorreo,
    DATE_FORMAT(db_invoice_g.invoice_fecha,'%M, %D %Y') AS InvoiceFecha,
    DATE_FORMAT(db_invoice_g.invoice_due,'%M, %D %Y') AS InvoiceDue,
    db_invoice_g.invoice_fecha AS InvoiceFechaSin,
    FORMAT(db_invoice_g.invoice_amount,2) AS InvoiceMonto, 
    db_invoice_g.invoice_status AS InvoiceStatus,
    db_invoice_g.invoice_plazo AS InvoiceFechaPlazo,
    db_invoice_g.invoice_formadepago AS InvoiceFormadePago,
    db_invoice_g.invoice_referenciapago AS InvoiceReferenciaPago,
    db_invoice_g.invoice_nota AS InvoiceNotaPago,
    db_invoice_g.invoice_pagado AS InvoiceFuePagado,
    db_invoice_g.invoice_fechadepago AS InvoicePaidFechaSin,
    db_invoice_g.invoice_taxes_total AS InvoiceTaxes,
    DATE_FORMAT(db_invoice_g.invoice_fechadepago, '%a %d, %b %Y' ) AS InvoiceFechadePago
    FROM
    db_invoice_g
    INNER JOIN db_clientes ON db_invoice_g.id_clientes = db_clientes.id_clientes
    ORDER BY db_invoice_g.invoice_id DESC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>