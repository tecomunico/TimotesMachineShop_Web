<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
$myquery = "DELETE FROM ".TABLA_SERVICES." WHERE ".TABLA_SERVICES.".id_service='$_POST[id]'";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery);
/** Bitacora **/
$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime) VALUES('Setting Delete/Services',now())";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myqueryBitacora);
$mi_consulta->cerrar_conexion();
?>