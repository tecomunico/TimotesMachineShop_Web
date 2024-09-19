<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$var_modelo=$_GET['model'];
$MyQuery= "SELECT
    db_car.car_id,
    db_carro_modelo.modelo_id,
    db_car.trim 
    FROM
    db_carro_modelo
    INNER JOIN db_car ON db_carro_modelo.modelo_id = db_car.modelo_id
    WHERE db_carro_modelo.modelo_id= '$var_modelo'";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>