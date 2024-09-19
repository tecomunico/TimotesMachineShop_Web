<?php
 /*	
	Json Push
	Autor: Edgar Rafael García
	Fecha: Septiembre 2019
*/
?>
<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
    db_push.push_id,
    db_push.push_title,
    db_push.push_mensaje,
    DATE_FORMAT(db_push.push_datesend,'%a %d, %b %Y %l:%i %p') AS push_datesend,
    db_push.push_cuandofue,
    IF(db_push.push_tipo='St','Standard','Scheduled') AS push_tipo,
    db_push.push_destino,
    CASE db_push.push_grupo
		WHEN 'C' THEN 'Coaches'
		WHEN 'P' THEN 'Parents'
		WHEN 'J' THEN 'Players'
		WHEN '*' THEN 'All Users'
	END AS push_grupo
    FROM
    db_push
    ORDER BY push_id DESC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>