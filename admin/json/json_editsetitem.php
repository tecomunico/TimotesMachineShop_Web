<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
include_once(dirname(__FILE__,2). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
// Escape Comillas
$Quote_EditItem = str_replace("'", "\'",$_POST['item']);
// Update
$myquery = "UPDATE ".TABLA_ITEMS." SET items_job='$Quote_EditItem' WHERE ".TABLA_ITEMS.".id_items='$_POST[id]'";
$mi_consulta->conectar();	
$mi_consulta->ejecutar_consulta($myquery);
$mi_consulta->cerrar_conexion();
?>