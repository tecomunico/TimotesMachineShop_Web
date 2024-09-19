<?php
 /*	
  Concepto: Edgar Rafael García
  Fecha:  Jan 2022
  Copyright (c) 2022
*/
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
ob_start();
session_start(['cookie_lifetime' => 86400]);
date_default_timezone_set('America/New_York');
include_once(dirname(__FILE__). '/config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
include_once(DIR_INCLUDES.'inc_funciones.inc');
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>.:TimotesMachineShop:.</title>
		<!-- CSS -->
		<link rel="stylesheet" href="css/fontawesome.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/mdb.css">
		<link rel="stylesheet" href="css/bootstrap-table.css">
		<!-- AutoComplete -->
		<link href="css/easy-autocomplete.css" rel="stylesheet">
		<link rel="stylesheet" href="css/easy-autocomplete.themes.css">
		<link rel="stylesheet" href="css/modules/animations-extended.min.css">
		<link rel="stylesheet" href="premium/icon-sets/icons/line-icons/premium-line-icons.min.css">
		<link rel="stylesheet" href="premium/icon-sets/icons/solid-icons/premium-solid-icons.min.css">
		<link rel="stylesheet" href="css/emojionearea.css">
		<link rel="stylesheet" href="css/custom.css">
		<!-- Select -->
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- Print -->
		<link rel="stylesheet" href="css/print.css">
		<!-- FileUploads -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
		<link rel="stylesheet" href="css/font-fileuploader.css">
		<link rel="stylesheet" href="css/fileuploader.css">
		<link rel="stylesheet" href="css/thumbnails.css">
		<!-- AppenGrid -->
		<link rel="stylesheet" href="css/jquery-ui.css"> 
		<link rel="stylesheet" href="css/jquery.appendGrid-1.7.1.css">
		<!-- SweetAlert -->
		<link rel="stylesheet" href="css/sweetalert2.css">
		<!-- Color Picker -->
		<link rel="stylesheet" href="css/kolorpicker.css">
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
	</head>
	<body class="fixed-sn indigo-skin">
		<?php
		// Grabar 
		include_once(DIR_MODULOS.'savedata.php');
		// Logout
		if($_GET['var_']=="Ult")
		{
			session_unset();$_SESSION["ses_jabezTimotes"]=false;header("location:index.php");
		}
		// Login
		if(!$_SESSION['ses_jabezTimotes']){include_once(DIR_MODULOS.'login.php');}else{include_once(DIR_MODULOS.'menu.php');}
		?>
		<!-- JQuery -->
		<script src="js/jquery.js"></script>
		<!-- FileUploader -->
		<script type="text/javascript" src="js/fileuploader.js"></script>
		<!-- <script type="text/javascript" src="js/custom-image-uploader.js"></script> -->
		<!-- Signature -->
		<script src="js/jq-signature.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="js/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script src="js/bootstrap-select.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="js/mdb.min.js"></script>
		<!-- Boostrap Table -->
		<script type="text/javascript" src="js/bstables.js"></script>
		<!-- Otros -->
		<script type="text/javascript" src="js/config.js"></script>
		<script type="text/javascript" src="js/util.js"></script>
		<!-- AutoComplete -->
		<script src="js/jquery.easy-autocomplete.js"></script>
		<script type="text/javascript" src="js/emojionearea.js"></script>
		<!-- Moment js for full calendar -->
		<script src="js/moment.js"></script>
		<!-- Print -->
		<script src="js/print.js"></script>
		<!-- SweetAlert -->
		<script src="js/sweetalert2.js"></script>
		<!-- Color Picker -->
		<script src="js/kolorpicker.js"></script>
		<!-- Currency/Number -->
		<script src="js/currency.js"></script>
		<script>
			new WOW().init();
			// SideNav Initialization
			$(".button-collapse").sideNav();
			var container = document.querySelector('.custom-scrollbar');
		</script>
		<!-- Grid -->
		<script src="js/jquery-ui.js"></script> <!-- jQuery UI -->
		<script src="js/jquery.appendGrid-1.7.1.js"></script>
	</body>
</html>