<?php
 /*	
	Json_Facturas
	Autor: Edgar Rafael García
	Fecha: Marzo 2018
*/
?>
<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$var_codigo = $_GET['Inv'];
$MyQuery= "SELECT
    db_invoice_d.idid,
    db_invoice_d.invoice_id,
    db_invoice_d.invoice_item AS Unit_,
    db_invoice_d.invoice_job AS Job_,
    db_invoice_d.invoice_qty AS Qty_,
    db_invoice_d.invoice_precio AS Price_,
    FORMAT(db_invoice_d.invoice_qty*db_invoice_d.invoice_precio,2) AS Total_,
    FORMAT(db_invoice_d.invoice_qty*db_invoice_d.invoice_precio,2) AS Total_2
    FROM
    db_invoice_d
    INNER JOIN db_invoice_g ON db_invoice_d.invoice_id = db_invoice_g.invoice_id
    WHERE db_invoice_d.invoice_id=$var_codigo";
$mi_consulta->conectar();		
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>