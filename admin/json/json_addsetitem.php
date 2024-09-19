<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
// Escape Comillas
$Quote_Item = str_replace("'", "\'",$_POST['item']);
// Save
$myquery = "INSERT INTO ".TABLA_ITEMS." (items_job) VALUES('$Quote_Item')";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery);
$mi_consulta->cerrar_conexion();
?>