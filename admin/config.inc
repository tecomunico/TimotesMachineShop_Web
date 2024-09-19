<?php
/*
  Concepto: Edgar Rafael García
  Fecha:  Jan 2022
  Copyright (c) 2022
*/
// BASE
define('DIR_SERVIDOR',$_SERVER['DOCUMENT_ROOT']);
define('DIR_WEB', 		DIR_SERVIDOR . '/timotesmachineshop/admin/');
define('DIR_IMAGENES',DIR_WEB.'img/');
define('DIR_MODULOS', DIR_WEB.'modulos/');
define('DIR_INCLUDES',DIR_WEB.'includes/');
define('DIR_JSON',  	'json/');
define('DIR_PDF',			DIR_WEB.'tcpdf/');
define('DIR_CSS',			DIR_WEB.'css/');
define('DIR_TEMP',		DIR_WEB.'tmp/');
// BD
define('BDD_SERVIDOR', 'localhost'); 
define('BDD_USUARIO', 'root');
define('BDD_CLAVE', 'rootroot');
define('BDD_BASEDATO', 'timotes');
// OTROS
setlocale(LC_MONETARY,'en_US');
date_default_timezone_set('America/New_York');
?>