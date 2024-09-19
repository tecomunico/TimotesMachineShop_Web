<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
$myquery = "UPDATE ".TABLA_PARAMETROS." SET prm_termsdias='$_POST[terminos]', prm_invoice_color='$_POST[colorcual]' WHERE ".TABLA_PARAMETROS.".id='1'";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery);
/** Bitacora **/
$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime) VALUES('Setting Invoice',now())";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myqueryBitacora);
$mi_consulta->cerrar_conexion();
?>