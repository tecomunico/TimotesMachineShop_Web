<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
$myquery_13 = "UPDATE ".TABLA_PARAMETROS." SET prm_empresa='$_POST[company]',prm_direccion='$_POST[address]',prm_citymaszip='$_POST[city]',prm_email='$_POST[email]',prm_phone='$_POST[phone]' WHERE ".TABLA_PARAMETROS.".id='1'";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery_13);
/** Bitacora **/
$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime) VALUES('Setting Company',now())";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myqueryBitacora);
$mi_consulta->cerrar_conexion();
?>