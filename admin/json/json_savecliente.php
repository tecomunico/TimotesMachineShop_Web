
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
// Grabar Client
$myquery = "INSERT INTO ".TABLA_CLIENTES." (clientes_nombre,clientes_phone,clientes_email,clientes_address,clientes_cuando,clientes_empresa) VALUES('$_POST[cliente]','$_POST[phone]','$_POST[email]','$_POST[address]',now(),'$_POST[company]')";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery);
$mi_consulta->cerrar_conexion();
/** Bitacora **/
$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_detalle) VALUES('Add Client',now(),'Client: $_POST[cliente]')";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myqueryBitacora);
$mi_consulta->cerrar_conexion();
?>