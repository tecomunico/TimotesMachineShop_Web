<?php
/*
	Funciones
	Autor: Edgar Rafael Garc�a
	Fecha: Noviembre 2016
*/

function espacio_html($x)
{
	for ($i = 1; $i <= $x; $i++) 
	{
		echo "&nbsp;";
	}
}

function usuario_refresh()
{
	$Post = new Bloquear_Post;
	if (!$Post->Post_Bloqueado($_POST['Post_ID'])) 
	{
		?><script>alert('No Puede Refrescar La P�gina')</script><?php
		$_SESSION["usuario_refresh"]=true;
	}else{	
		$_SESSION["usuario_refresh"]=false;
	}
}

function random_code($length=32) 
{
   $string = '';
   // You can define your own characters here.
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
   for ($p = 0; $p < $length; $p++) {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }
   return $string;
}

// ONESIGNAL Enviar a Seleccionados.
function sendMessage($header,$mensaje,$usuario,$forwhen)
{
	$heading = array("en" => $header);
 	$content = array("en" => $mensaje);
	$fields = array(
		'app_id' => "52176ce0-d106-4b06-8476-04ff594e3cdc",
		'include_player_ids' => [$usuario],
		'data' => array("foo" => "bar"),
		'headings' => $heading,
		'contents' => $content,
		'send_after' => $forwhen
	);
	$fields = json_encode($fields);
	// print("\nJSON sent:\n");
	// print($fields);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$response = curl_exec($ch);
	curl_close($ch);
	// return $response;
}

// ONESIGNAL Enviar a Todos.
function sendMessageAll($header,$mensaje,$forwhen)
{
	/*
	$heading = array("en" => $header);
 	$content = array("en" => $mensaje);
    $fields = array(
        'app_id' => "52176ce0-d106-4b06-8476-04ff594e3cdc",
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
		'headings' => $heading,
		'contents' => $content,
		'send_after' => $forwhen
    );
    $fields = json_encode($fields);
    // print("\nJSON sent:\n");
    // print($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic Yzg2OGFlNzMtYjVmNS00Y2ZiLWJiNmMtMDZiNzdhOWY1OGFk'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    curl_close($ch);*/
    //return $response;
}

function hexToRgb($hex) 
{
   $hex      = str_replace('#', '', $hex);
   $length   = strlen($hex);
   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
   return $rgb;
}
?>