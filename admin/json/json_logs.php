<?php
 /*	
	Json Logs
	Autor: Edgar Rafael García
	Fecha: Febrero 2020
*/
?>
<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
    db_log.id,
    db_log.hist_event,
    DATE_FORMAT( db_log.hist_datetime, '%a %d, %b %Y %l:%i %p' ) AS cuandoSeHizo,
    db_log.hist_username,
    db_log.hist_detalle 
    FROM
    db_log 
    ORDER BY
    db_log.id DESC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>