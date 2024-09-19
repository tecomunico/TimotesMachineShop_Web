<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$var_ID=$_GET['op'];
$MyQuery= "SELECT
    db_wodetalle.wo_id,
    db_wodetalle.pieza_id,
    db_piezas.pieza_nombre 
    FROM
    db_wodetalle
    INNER JOIN db_workorders ON db_wodetalle.wo_id = db_workorders.wo_id
    INNER JOIN db_piezas ON db_wodetalle.pieza_id = db_piezas.pieza_id
    WHERE db_wodetalle.wo_id = '$var_ID'";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>