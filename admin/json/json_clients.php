<?php
 /*	
	Json Coaches
	Autor: Edgar Rafael García
	Fecha: Julio 2019
*/
?>
<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
    db_clientes.id_clientes, 
    db_clientes.clientes_nombre, 
    db_clientes.clientes_phone, 
    db_clientes.clientes_email, 
    db_clientes.clientes_address,
    db_clientes.clientes_empresa
    FROM
    db_clientes
    ORDER BY db_clientes.clientes_nombre ASC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>