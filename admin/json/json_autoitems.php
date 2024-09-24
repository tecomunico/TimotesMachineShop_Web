<?php
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$term = $_GET["term"];
$MyQuery= "SELECT
    db_items.id_items, 
    db_items.items_job AS servicio_nombre
    FROM
    db_items
    WHERE db_items.items_job LIKE '%$term%'
    ORDER BY db_items.items_job ASC";
$mi_consulta->conectar();		
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$a_json = array();
$a_json_row = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
    $a_json_row["value"] = $filas['servicio_nombre'];
    $a_json_row["label"] = $filas['servicio_nombre'];
    array_push($a_json, $a_json_row);
}
echo json_encode($a_json);
?>