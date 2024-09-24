<?php
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$var_opcion=$_GET['car'];
$MyQuery= "SELECT
	db_carro_modelo.modelo_id, 
	db_carro_modelo.modelo_nombre, 
	db_carro_modelo.marca_id
    FROM
	db_carro_modelo
    WHERE db_carro_modelo.marca_id = '$var_opcion'
    ORDER BY db_carro_modelo.modelo_nombre";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>