<?php
 /*	
	SaveData
	Autor: Edgar Rafael García
	Fecha: Julio 2019
*/
// Test
// echo "<script>alert('".MSG_ALERTA_NO."')</script>";
?>
<?php
date_default_timezone_set('America/New_York');
$var_cualUsuario=$_SESSION["ses_usuario_jabezTimotes"];
// Add Account Data (PW)
if($_POST["btnSaveAccount"]=="Y")
{
	$myquery_1 = "UPDATE ".TABLA_USUARIOS." SET usuario_nombre='$_POST[accountNombre]',usuario_clave='$_POST[accountNewPW]' WHERE ".TABLA_USUARIOS.".id_usuario=$_POST[IDUsuarioPW]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_1);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Update Password',now(),'$var_cualUsuario','Usuario: $_POST[accountNombre]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Add Client
if($_POST["btnAddClient"]=="Y")
{
	// Escape Comillas
	$Quote_ClienteName = str_replace("'", "\'",$_POST['Clients_Who']);
	$Quote_ClienteAddr = str_replace("'", "\'",$_POST['Clients_Address']);
	$Quote_Conpany = str_replace("'", "\'",$_POST['Clients_Company']);
	// Grabar Client
    $myquery_2 = "INSERT INTO ".TABLA_CLIENTES." (clientes_nombre,clientes_phone,clientes_email,clientes_address,clientes_cuando,clientes_empresa) VALUES('$Quote_ClienteName','$_POST[Clients_Phone]','$_POST[Clients_Email]','$Quote_ClienteAddr',now(),'$Quote_Conpany')";
    $mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_2);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Add Client',now(),'$var_cualUsuario','Client: $Quote_ClienteName')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Edit Client
if($_POST["btnEditClient"]=="Y")
{
	// Escape Comillas
	$Quote_EditClienteWho = str_replace("'", "\'",$_POST['ClientEdit_Who']);
	$Quote_EditClienteAddr = str_replace("'", "\'",$_POST['ClientEdit_Address']);
	$Quote_EditConpany = str_replace("'", "\'",$_POST['ClientEdit_Company']);
	// Update Cliente
	$myquery_3 = "UPDATE ".TABLA_CLIENTES." SET clientes_nombre='$Quote_EditClienteWho',clientes_phone='$_POST[ClientEdit_Phone]',clientes_email='$_POST[ClientEdit_Email]',clientes_address='$Quote_EditClienteAddr',clientes_empresa='$Quote_EditConpany' WHERE ".TABLA_CLIENTES.".id_clientes=$_POST[IDClientEdit]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_3);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Edit Client',now(),'$var_cualUsuario','Client: $Quote_EditClienteWho')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();	
}

// Delete Client
if($_POST["btnDeleteClient"]=='Y')
{
	// Client
	$myquery_4 = "DELETE FROM ".TABLA_CLIENTES." WHERE ".TABLA_CLIENTES.".id_clientes=$_POST[idClientDelete]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_4);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Delete Client',now(),'$var_cualUsuario','Client: $_POST[idClientDelete]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();	
}

// Add WorkOrder
if($_POST["btnAddWorkOrder"]=="Y")
{
	// Escape Comillas
	$Quote_Comments = str_replace("'", "\'",$_POST['Services_Note']);
	// Grabar WO
    $myquery_5 = "INSERT INTO ".TABLA_WORKORDERS." (marca_id,modelo_id,id_clientes,id_service,wo_date,wo_year,wo_distro,wo_note,car_cuando,wo_price,wo_motor) VALUES('$_POST[Cars_Selected]','$_POST[CarsModel_Selected]','$_POST[Client_Selected]','$_POST[Services_Selected]','$_POST[WorkOrder_Date_submit]','$_POST[CarsYear_Selected]','$_POST[Services_Distribution]','$Quote_Comments',now(),'$_POST[Client_Amount]','$_POST[CarsTrim_Selected]')";
    $mi_consulta->conectar();
	$mi_consulta->ejecutar_consulta($myquery_5);
	$var_ultimoWO= $mi_consulta->obtener_ultimo();
	// Grabar Detalle
	foreach ($_POST["WorkOrder_Part"] as $clave=>$piezaID)
	{
		$myquery_6 = "INSERT INTO ".TABLA_WODETALLES." (wo_id,pieza_id) VALUES('$var_ultimoWO','$piezaID')";
		$mi_consulta->conectar();
		$mi_consulta->ejecutar_consulta($myquery_6);
	}
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Add WorkOrder',now(),'$var_cualUsuario','Car/Motor: $_POST[CarsTrim_Selected]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Edit WorkOrder
if($_POST["btnEditWorkOrder"]=="Y")
{
	// Escape Comillas
	$Quote_EditComments = str_replace("'", "\'",$_POST['ServicesEdit_Note']);
	//
	if($_POST['WorkOrderEdit_Date_submit']=='')
	{
		$varFechaFormateada =  $_POST['fechaDMY'];
	}else{
		$varFechaFormateada = $_POST['WorkOrderEdit_Date_submit'];
	}
	$myquery_7 = "UPDATE ".TABLA_WORKORDERS." SET id_clientes='$_POST[ClientEdit_Selected]',wo_date='$varFechaFormateada',id_service='$_POST[ServicesEdit_Selected]',marca_id='$_POST[CarsEdit_Selected]',modelo_id='$_POST[CarsModelEdit_Selected]',wo_motor='$_POST[CarsTrimEdit_Selected]',wo_year='$_POST[CarsYearEdit_Selected]',wo_distro='$_POST[ServicesEdit_Distribution]',wo_note='$Quote_EditComments',wo_price='$_POST[ClientEdit_Amount]' WHERE ".TABLA_WORKORDERS.".wo_id=$_POST[IDWorkOrderEdit]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_7);
	// Update WO Detalle
	$myquery_8 = "DELETE FROM ".TABLA_WODETALLES." WHERE ".TABLA_WODETALLES.".wo_id=$_POST[IDWorkOrderEdit]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_8);
	// Grabar Detalle
	foreach ($_POST["WorkOrderEdit_Part"] as $clave=>$piezaID)
	{
		$myquery_9 = "INSERT INTO ".TABLA_WODETALLES." (wo_id,pieza_id) VALUES('$_POST[IDWorkOrderEdit]','$piezaID')";
		$mi_consulta->conectar();
		$mi_consulta->ejecutar_consulta($myquery_9);
	}
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Edit WorkOrder',now(),'$var_cualUsuario','WO: $_POST[IDWorkOrderEdit]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Delivered WorkOrder
if($_POST["btnDeliveredWO"]=="Y")
{
	$myquery_10 = "UPDATE ".TABLA_WORKORDERS." SET wo_delivered='Y',wo_delivered_when='$_POST[WorkOrderDelivered_Date_submit]',wo_delivered_receiver='$_POST[WorkOrderDelivered_Who]' WHERE ".TABLA_WORKORDERS.".wo_id=$_POST[DelivereID]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_10);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Delivered WorkOrder',now(),'$var_cualUsuario','WO: $_POST[DelivereID]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Delete WorkOrder
if($_POST["btnDeleteWO"]=='Y')
{
	$myquery_11 = "DELETE FROM ".TABLA_WORKORDERS." WHERE ".TABLA_WORKORDERS.".wo_id=$_POST[DeleteID]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_11);
	// Delete Work Order Detalles
	$myquery_12 = "DELETE FROM ".TABLA_WODETALLES." WHERE ".TABLA_WODETALLES.".wo_id=$_POST[DeleteID]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_12);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Delete Work Order',now(),'$var_cualUsuario','Work Order: $_POST[DeleteID]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();	
}

// Send Email/WorkOrder
if($_POST["BtnSendEmail"]=='Y')
{
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Send Email',now(),'$var_cualUsuario','Work Order: $_POST[WoEmailID]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
	// Save PDF
	include_once(DIR_MODULOS.'pdf_wosave.php');
	// Path file
	$var_fileadjunto=dirname(__FILE__,2).'/tmp/wo_'.$_POST['WoEmailID'].'.pdf';
	// Enviar email
	$verWorkorder = '<!DOCTYPE html><html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head><title></title><meta charset="utf-8"><meta content="width=device-width,initial-scale=1" name="viewport"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"><!--<![endif]--><style>*{box-sizing:border-box}body{margin:0;padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}@media (max-width:520px){.icons-inner{text-align:center}.icons-inner td{margin:0 auto}.fullMobileWidth,.row-content{width:100%!important}.image_block img.big{width:auto!important}.stack .column{width:100%;display:block}.reverse{display:table;width:100%}.reverse .column.first{display:table-footer-group!important}.reverse .column.last{display:table-header-group!important}.row-3 td.column.first>table{padding-left:5px;padding-right:5px}.row-3 td.column.last>table{padding-left:0;padding-right:0}}</style></head><body style="background-color:#FFF;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none"><table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#FFF" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#00306e" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><a href="www.timotesmachineshop.com" style="outline:0" tabindex="-1" target="_blank"><img src="http://www.timotesmachineshop.com/images/logo-white.png" style="display:block;height:auto;border:0;width:150px;max-width:100%" width="150"></a></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#eef1f3" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:15px;padding-bottom:40px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-top:20px;width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><img alt="2021" class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/workorder.jpg" style="display:block;height:auto;border:0;width:450px;max-width:100%" title="2021" width="450"></div></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px;text-align:center;width:100%"><h1 style="margin:0;color:#f9a826;direction:ltr;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:33px;font-weight:400;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0"><strong>Work Order Processed !!</strong></h1></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px"><div style="font-family:Arial,sans-serif"><div style="font-size:14px;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;mso-line-height-alt:25.2px;color:#39374e;line-height:1.8"><p style="margin:0;font-size:14px;text-align:center"><strong><em>Thanks for visiting Timotes Machine Shop today!, a new Work Order was registred. <span style="color:#ef0c0c">Please see attached file (PDF)</span></em><span style="color:#ef0c0c">).</span></strong></p></div></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f2f2f2" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr class="reverse"><td class="column first" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-left:5px;padding-right:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="50%"><table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center;width:100%"><h1 style="margin:0;color:#f9a826;direction:ltr;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:26px;font-weight:400;letter-spacing:normal;line-height:120%;text-align:left;margin-top:0;margin-bottom:0"><strong>Customer Service!</strong></h1></td></tr></table><table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td><div style="font-family:Arial,sans-serif"><div style="font-size:14px;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;mso-line-height-alt:25.2px;color:#39374e;line-height:1.8"><p style="margin:0;font-size:14px;text-align:left">If you have any questions regarding this Work Order, please do not hesitate to contact us</p></div></div></td></tr></table></td><td class="column last" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0" width="50%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-right:10px;width:100%;padding-left:0;padding-top:5px"><div align="center" style="line-height:10px"><img alt="Donating" class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/contactus.jpg" style="display:block;height:auto;border:0;width:240px;max-width:100%" title="Donating" width="240"></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f60a96" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td><div style="font-family:sans-serif"><div style="font-size:14px;mso-line-height-alt:16.8px;color:#555;line-height:1.2;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif"><p style="margin:0;font-size:14px"><span style="color:#fff">This email was sent from a notification-only email address that cannot accept incoming email. Please do not reply to this message.</span></p></div></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0277bd" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:10px;padding-bottom:10px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center"><div align="center"><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="example.com" style="height:74px;width:278px;v-text-anchor:middle;" arcsize="0%" stroke="false" fillcolor="#f60a96"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Tahoma, Verdana, sans-serif; font-size:16px"><![endif]--><a href="www.timotesmachineshop.com" style="text-decoration:none;display:inline-block;color:#fff;background-color:#f60a96;border-radius:0;width:auto;border-top:0 solid #8a3b8f;border-right:0 solid #8a3b8f;border-bottom:0 solid #8a3b8f;border-left:0 solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all" target="_blank"><span style="padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;letter-spacing:normal"><span style="font-size:16px;line-height:2;word-break:break-word;mso-line-height-alt:32px"><span data-mce-style="font-size: 16px; line-height: 32px;" style="font-size:16px;line-height:32px"><strong>Visit Us !</strong></span></span><span style="font-size:16px;line-height:2;word-break:break-word;mso-line-height-alt:32px"><br><span data-mce-style="font-size: 16px; line-height: 32px;" style="font-size:16px;line-height:32px"><strong>www.timotesmachineshop.com</strong></span></span></span></a><!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:25px;text-align:center"><table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="138px"><tr><td style="padding:0 7px 0 7px"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="http://www.timotesmachineshop.com/admin/img/facebook2x.png" style="display:block;height:auto;border:0" title="Facebook" width="32"></a></td><td style="padding:0 7px 0 7px"><a href="https://www.instagram.com/timotesmachineshop/" target="_blank"><img alt="Instagram" height="32" src="http://www.timotesmachineshop.com/admin/img/instagram2x.png" style="display:block;height:auto;border:0" title="Instagram" width="32"></a></td><td style="padding:0 7px 0 7px"><a href="https://www.youtube.com/" target="_blank"><img alt="YouTube" height="32" src="http://www.timotesmachineshop.com/admin/img/youtube2x.png" style="display:block;height:auto;border:0" title="YouTube" width="32"></a></td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0277bd" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:10px;padding-bottom:10px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><a href="www.jabezsoft.com" style="outline:0" tabindex="-1" target="_blank"><img class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/jabez.png" style="display:block;height:auto;border:0;width:300px;max-width:100%" width="300"></a></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="icons_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center"><table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="text-align:center"><!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]--><!--[if !vml]><!--><table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;display:inline-block;margin-right:-4px;padding-left:0;padding-right:0"><!--<![endif]--></table></td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>';
	include_once(DIR_INCLUDES.'Exception.php');
	include_once(DIR_INCLUDES.'PHPMailer.php');
	include_once(DIR_INCLUDES.'SMTP.php');
	$mail = new PHPMailer\PHPMailer\PHPMailer();                              
	try {
		//Server settings
		$mail->SMTPDebug = 0;                              
		$mail->isSMTP();                                      
		$mail->Host = 'mail.timotesmachineshop.com'; 
		$mail->SMTPAuth = true;                               
		$mail->Username = 'no-reply@timotesmachineshop.com';                 
		$mail->Password = '$Esempynmf14';                           
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587;                                    
		//Recipients
		$mail->setFrom('no-reply@timotesmachineshop.com', 'Timotes MachineShop');
		$mail->addAddress($_POST['WorkOrder_EmailSend']); 
		$mail->addReplyTo('', 'Timotes Machine Shop LLC');
		$mail->addCC($_POST['WorkOrder_EmailCCSend']);
		$mail->addBCC('timotesmachineshop@gmail.com');
		//Attachments
		$mail->addAttachment($var_fileadjunto,'wo_'.$_POST['WoEmailID'].'.pdf');
		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Timotes Machine Shop Work Order # '.$_POST['WoEmailID'];
		$mail->Body    = $verWorkorder; 
		$mail->send();
		header("location:index.php?xpt=002");
	} catch (Exception $e) {
		header("location:index.php?xpt=002");
	}
}

// Setting Company
if($_POST["btnSettingCompany"]=="Y")
{
	$myquery_13 = "UPDATE ".TABLA_PARAMETROS." SET prm_empresa='$_POST[Company_Setting]',prm_direccion='$_POST[Address_Setting]',prm_citymaszip='$_POST[City_Setting]',prm_email='$_POST[Email_Setting]',prm_phone='$_POST[Phone_Setting]' WHERE ".TABLA_PARAMETROS.".id='1'";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_13);
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username) VALUES('Setting Company',now(),'$var_cualUsuario')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
}

// Save Invoice
if($_POST["FacturaSave"]=="Y")
{
	// Insertar Invoice (General)
	$sumarFilas = $_POST['TotalValorSave'];
	$myquery_14 = "INSERT INTO db_invoice_g(id_clientes,invoice_fecha,invoice_due,invoice_amount,invoice_status,invoice_creado,invoice_plazo,invoice_pagado,invoice_formadepago,invoice_fechadepago,invoice_referenciapago,invoice_nota,invoice_taxes_tasa,invoice_taxes,invoice_taxes_total) VALUES('$_POST[Client_Selected]','$_POST[FechaInvoice_submit]','$_POST[FechaDueSave]','$sumarFilas','$_POST[facturaEstatus]',now(),'$_POST[plazoInvoice]','$_POST[AddFacturaPagada]','$_POST[AddFormaDepago]','$_POST[AddDatePago]','$_POST[AddRefDepago]','$_POST[AddNotesDepago]','$_POST[ValorTaxes]','$_POST[Sales_Taxes]','$_POST[TotalValorTaxes]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_14);
	$var_ultimaFacturaSave= $mi_consulta->obtener_ultimo();
	// Insertar Invoice (Detalle)
	for ($j = 1; $j <= $_POST['FacturacuantasFilaSon']; $j++) 
	{
		$var_item     = $_POST['Invoice_Item'][$j-1];
		$var_job     = $_POST['Invoice_Description'][$j-1];
		$var_price    = $_POST['Invoice_Price'][$j-1];
		$var_qty     = $_POST['Invoice_Qty'][$j-1];
		$myquery_15 = "INSERT INTO db_invoice_d (invoice_id,invoice_item,invoice_job,invoice_qty,invoice_precio) VALUES('$var_ultimaFacturaSave','$var_item','$var_job','$var_qty','$var_price')";
		$mi_consulta->conectar();	
		$mi_consulta->ejecutar_consulta($myquery_15);
	}
	$mi_consulta->cerrar_conexion();
}

// Delete Invoice
if($_POST["btnDeleteInvoice"]=="Y")
{
	// Invoice General
	$myquery_16 = "DELETE FROM db_invoice_g WHERE db_invoice_g.invoice_id=$_POST[idInvoiceErase]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_16);
	// Invoice Detalle
	$myquery_17 = "DELETE FROM db_invoice_d WHERE db_invoice_d.invoice_id=$_POST[idInvoiceErase]";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myquery_17);
	$mi_consulta->cerrar_conexion();
}

// Updated Invoice
if($_POST["FacturaUpdate"]=="Y")
{
	$varTotalEditado = str_replace(',','', $_POST['TotalValorUpdated']);
	$IDIDinvoice = $_POST['FacturaIDID'];
	$PagoValidado = $_POST['PaymentEditado'];
	if($PagoValidado <> "Y")
	{
		$myquery_17 = "UPDATE db_invoice_g SET id_clientes='$_POST[ClientEdit_Selected]',invoice_fecha='$_POST[Date_Edit_Edit]',invoice_due='$_POST[FechaDueSaveEdit]',invoice_plazo='$_POST[plazoEditInvoice]',invoice_amount='$varTotalEditado' WHERE db_invoice_g.invoice_id=$IDIDinvoice";
	}else{
		$myquery_17 = "UPDATE db_invoice_g SET id_clientes='$_POST[ClientEdit_Selected]',invoice_fecha='$_POST[Date_Edit_Edit]',invoice_due='$_POST[FechaDueSaveEdit]',invoice_plazo='$_POST[plazoEditInvoice]',invoice_amount='$varTotalEditado',invoice_formadepago='$_POST[PaymentEditForma]',invoice_fechadepago='$_POST[PaymentEditFecha]',invoice_referenciapago='$_POST[PaymentEditRef]',invoice_nota='$_POST[PaymentEditNotes]' WHERE db_invoice_g.invoice_id=$IDIDinvoice";
	}
	$mi_consulta->conectar();
	$mi_consulta->ejecutar_consulta($myquery_17);
	$myquery_18 = "DELETE FROM db_invoice_d WHERE db_invoice_d.invoice_id=$IDIDinvoice";
	$mi_consulta->conectar();
	$mi_consulta->ejecutar_consulta($myquery_18);
	$mi_consulta->cerrar_conexion();
	// Add Records
	$tag_array = explode(',', $_POST['tblAppendGridEdit_rowOrder']);
	foreach ($tag_array as $key => $i ) 
	{
		$var_item=$_POST['tblAppendGridEdit_Unit__'.$i];
		// Escape Comillas
		$var_job= str_replace("'", "\'",$_POST['tblAppendGridEdit_Job__'.$i]);
		$var_cantidad=$_POST['tblAppendGridEdit_Qty__'.$i];
		$var_precio=str_replace(',','', $_POST['tblAppendGridEdit_Price__'.$i]);
		$myquery_19 = "INSERT INTO db_invoice_d (invoice_id,invoice_item,invoice_job,invoice_qty,invoice_precio) VALUES('$IDIDinvoice','$var_item','$var_job','$var_cantidad','$var_precio')";
		$mi_consulta->conectar();
		$mi_consulta->ejecutar_consulta($myquery_19);
		$mi_consulta->cerrar_conexion();
	}
}

// Mark Invoice Paid
if($_POST["FacturaMarKPaid"]=="Y")
{
	$myquery_20 = "UPDATE db_invoice_g SET invoice_formadepago='$_POST[MarkFormaDepago]',invoice_fechadepago='$_POST[MarkFechaDePago_submit]',invoice_referenciapago='$_POST[MarkRefDepago]',invoice_nota='$_POST[MarkNotesDepago]',invoice_status='Paid',invoice_pagado='Y' WHERE db_invoice_g.invoice_id=$_POST[FacturaIDPaid]";
	$mi_consulta->conectar();
	$mi_consulta->ejecutar_consulta($myquery_20);
}

// Send Email/Invoice
if($_POST["BtnEnvioEmail"]=='Y')
{
	/** Bitacora **/
	$myqueryBitacora = "INSERT INTO ".TABLA_LOG." (hist_event,hist_datetime,hist_username,hist_detalle) VALUES('Send Email',now(),'$var_cualUsuario','Invoice: $_POST[InvEmailID]')";
	$mi_consulta->conectar();	
	$mi_consulta->ejecutar_consulta($myqueryBitacora);
	$mi_consulta->cerrar_conexion();
	// Save PDF
	include_once(DIR_MODULOS.'pdf_invsave.php');
	// Path file
	$var_fileadjunto=dirname(__FILE__,2).'/tmp/invoice_'.$_POST['InvEmailID'].'.pdf';
	// Enviar email
	$verInvoice= '<!DOCTYPE html><html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml"><head><title></title><meta charset="utf-8"><meta content="width=device-width,initial-scale=1" name="viewport"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]--><!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"><!--<![endif]--><style>*{box-sizing:border-box}body{margin:0;padding:0}a[x-apple-data-detectors]{color:inherit!important;text-decoration:inherit!important}#MessageViewBody a{color:inherit;text-decoration:none}p{line-height:inherit}@media (max-width:520px){.icons-inner{text-align:center}.icons-inner td{margin:0 auto}.fullMobileWidth,.row-content{width:100%!important}.image_block img.big{width:auto!important}.stack .column{width:100%;display:block}.reverse{display:table;width:100%}.reverse .column.first{display:table-footer-group!important}.reverse .column.last{display:table-header-group!important}.row-3 td.column.first>table{padding-left:5px;padding-right:5px}.row-3 td.column.last>table{padding-left:0;padding-right:0}}</style></head><body style="background-color:#FFF;margin:0;padding:0;-webkit-text-size-adjust:none;text-size-adjust:none"><table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#FFF" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#00306e" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><a href="www.timotesmachineshop.com" style="outline:0" tabindex="-1" target="_blank"><img src="http://www.timotesmachineshop.com/images/logo-white.png" style="display:block;height:auto;border:0;width:150px;max-width:100%" width="150"></a></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#eef1f3" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:15px;padding-bottom:40px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-top:20px;width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><img alt="2021" class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/invoicesent.jpg" style="display:block;height:auto;border:0;width:450px;max-width:100%" title="2021" width="450"></div></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:10px;padding-left:15px;padding-right:15px;padding-top:10px;text-align:center;width:100%"><h1 style="margin:0;color:#044AA3;direction:ltr;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:33px;font-weight:400;letter-spacing:normal;line-height:120%;text-align:center;margin-top:0;margin-bottom:0"><strong>Invoice Created !!</strong></h1></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td style="padding-bottom:20px;padding-left:10px;padding-right:10px;padding-top:10px"><div style="font-family:Arial,sans-serif"><div style="font-size:14px;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;mso-line-height-alt:25.2px;color:#39374e;line-height:1.8"><p style="margin:0;font-size:14px;text-align:center"><strong><em>Thanks for visiting Timotes Machine Shop today!, a new Invoice was created. <span style="color:#ef0c0c">Please see attached file (PDF)</span></em><span style="color:#ef0c0c">).</span></strong></p></div></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f2f2f2" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr class="reverse"><td class="column first" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-left:5px;padding-right:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="50%"><table border="0" cellpadding="0" cellspacing="0" class="heading_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center;width:100%"><h1 style="margin:0;color:#044AA3;direction:ltr;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:26px;font-weight:400;letter-spacing:normal;line-height:120%;text-align:left;margin-top:0;margin-bottom:0"><strong>Customer Service!</strong></h1></td></tr></table><table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td><div style="font-family:Arial,sans-serif"><div style="font-size:14px;font-family:Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;mso-line-height-alt:25.2px;color:#39374e;line-height:1.8"><p style="margin:0;font-size:14px;text-align:left">If you have any questions regarding this Invoice, please do not hesitate to contact us</p></div></div></td></tr></table></td><td class="column last" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;border-top:0;border-right:0;border-bottom:0;border-left:0" width="50%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-right:10px;width:100%;padding-left:0;padding-top:5px"><div align="center" style="line-height:10px"><img alt="Donating" class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/contactus.jpg" style="display:block;height:auto;border:0;width:240px;max-width:100%" title="Donating" width="240"></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#f60a96" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="10" cellspacing="0" class="text_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;word-break:break-word" width="100%"><tr><td><div style="font-family:sans-serif"><div style="font-size:14px;mso-line-height-alt:16.8px;color:#555;line-height:1.2;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif"><p style="margin:0;font-size:14px"><span style="color:#fff">This email was sent from a notification-only email address that cannot accept incoming email. Please do not reply to this message.</span></p></div></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0277bd" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:10px;padding-bottom:10px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="button_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;text-align:center"><div align="center"><!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="example.com" style="height:74px;width:278px;v-text-anchor:middle;" arcsize="0%" stroke="false" fillcolor="#f60a96"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Tahoma, Verdana, sans-serif; font-size:16px"><![endif]--><a href="www.timotesmachineshop.com" style="text-decoration:none;display:inline-block;color:#fff;background-color:#f60a96;border-radius:0;width:auto;border-top:0 solid #8a3b8f;border-right:0 solid #8a3b8f;border-bottom:0 solid #8a3b8f;border-left:0 solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:Lato,Tahoma,Verdana,Segoe,sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all" target="_blank"><span style="padding-left:30px;padding-right:30px;font-size:16px;display:inline-block;letter-spacing:normal"><span style="font-size:16px;line-height:2;word-break:break-word;mso-line-height-alt:32px"><span data-mce-style="font-size: 16px; line-height: 32px;" style="font-size:16px;line-height:32px"><strong>Visit Us !</strong></span></span><span style="font-size:16px;line-height:2;word-break:break-word;mso-line-height-alt:32px"><br><span data-mce-style="font-size: 16px; line-height: 32px;" style="font-size:16px;line-height:32px"><strong>www.timotesmachineshop.com</strong></span></span></span></a><!--[if mso]></center></v:textbox></v:roundrect><![endif]--></div></td></tr></table><table border="0" cellpadding="0" cellspacing="0" class="social_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="padding-bottom:5px;padding-left:10px;padding-right:10px;padding-top:25px;text-align:center"><table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="138px"><tr><td style="padding:0 7px 0 7px"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="http://www.timotesmachineshop.com/admin/img/facebook2x.png" style="display:block;height:auto;border:0" title="Facebook" width="32"></a></td><td style="padding:0 7px 0 7px"><a href="https://www.instagram.com/timotesmachineshop/" target="_blank"><img alt="Instagram" height="32" src="http://www.timotesmachineshop.com/admin/img/instagram2x.png" style="display:block;height:auto;border:0" title="Instagram" width="32"></a></td><td style="padding:0 7px 0 7px"><a href="https://www.youtube.com/" target="_blank"><img alt="YouTube" height="32" src="http://www.timotesmachineshop.com/admin/img/youtube2x.png" style="display:block;height:auto;border:0" title="YouTube" width="32"></a></td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;background-color:#0277bd" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:10px;padding-bottom:10px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="image_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="width:100%;padding-right:0;padding-left:0"><div align="center" style="line-height:10px"><a href="www.jabezsoft.com" style="outline:0" tabindex="-1" target="_blank"><img class="fullMobileWidth big" src="http://www.timotesmachineshop.com/admin/img/jabez.png" style="display:block;height:auto;border:0;width:300px;max-width:100%" width="300"></a></div></td></tr></table></td></tr></tbody></table></td></tr></tbody></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tbody><tr><td><table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;color:#000;width:500px" width="500"><tbody><tr><td class="column" style="mso-table-lspace:0;mso-table-rspace:0;font-weight:400;text-align:left;vertical-align:top;padding-top:5px;padding-bottom:5px;border-top:0;border-right:0;border-bottom:0;border-left:0" width="100%"><table border="0" cellpadding="0" cellspacing="0" class="icons_block" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="color:#9d9d9d;font-family:inherit;font-size:15px;padding-bottom:5px;padding-top:5px;text-align:center"><table cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0" width="100%"><tr><td style="text-align:center"><!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]--><!--[if !vml]><!--><table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="mso-table-lspace:0;mso-table-rspace:0;display:inline-block;margin-right:-4px;padding-left:0;padding-right:0"><!--<![endif]--></table></td></tr></table></td></tr></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body></html>';
	include_once(DIR_INCLUDES.'Exception.php');
	include_once(DIR_INCLUDES.'PHPMailer.php');
	include_once(DIR_INCLUDES.'SMTP.php');
	$mail = new PHPMailer\PHPMailer\PHPMailer();                              
	try {
		//Server settings
		$mail->SMTPDebug = 0;                              
		$mail->isSMTP();                                      
		$mail->Host = 'mail.timotesmachineshop.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'no-reply@timotesmachineshop.com';                 
		$mail->Password = '$Esempynmf14';                           
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587;                                    
		//Recipients
		$mail->setFrom('no-reply@timotesmachineshop.com', 'Timotes MachineShop');
		$mail->addAddress($_POST['Invoice_EmailSend']); 
		$mail->addReplyTo('', 'Timotes Machine Shop LLC');
		$mail->addCC($_POST['Invoice_EmailCCSend']);
		// $mail->addBCC('timotesmachineshop@gmail.com');
		//Attachments
		$mail->addAttachment($var_fileadjunto,'invoice_'.$_POST['InvEmailID'].'.pdf');
		//Content
		$mail->isHTML(true);
		$mail->Subject = 'Timotes Machine Shop Invoice # '.$_POST['InvEmailID'];
		$mail->Body    = $verInvoice; 
		$mail->send();
		header("location:index.php?xpt=003");
	} catch (Exception $e) {
		header("location:index.php?xpt=003");
	}
}
?>