<?php
/*
  Concepto: Edgar Rafael García
  Fecha:  Diciembre 2021
*/
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
//  Definición de Constantes Usadas Por el Sistema
//
// Configuración BASE
define('DIR_SERVIDOR', $_SERVER['DOCUMENT_ROOT']);
// define(DIR_WEB, DIR_SERVIDOR . '/timotesmachineshop/');
define('DIR_WEB', DIR_SERVIDOR . '/');
define('DIR_MODULOS', DIR_WEB.'modulos/');
?>