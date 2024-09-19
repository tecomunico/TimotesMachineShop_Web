<?php
 /*	
	Json Users
	Autor: Edgar Rafael García
	Fecha: Febrero 2020
*/
?>
<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
    db_users.id_usuario, 
    db_users.usuario_login, 
    db_users.usuario_clave, 
    db_users.usuario_nombre, 
    IF(db_users.usuario_tipo='W','WebMaster','Basic') AS tipoDeUsuario
    FROM
    db_users
    ORDER BY db_users.usuario_nombre";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>