<?php
include_once(dirname(__FILE__).'/../config.inc');
include_once(DIR_INCLUDES.'clase.conexion.inc');
include_once(DIR_INCLUDES.'inc_tablas.inc');
include_once(DIR_INCLUDES.'inc_parametros.inc');
$MyQuery= "SELECT
	db_workorders.wo_id AS WorkOrder_ID,
	db_carro_marca.marca_id AS WorkOrder_MarcaID,
	db_carro_modelo.modelo_id AS WorkOrder_ModeloID,
	db_carro_marca.marca_nombre AS WorkOrder_Marca,
	db_carro_modelo.modelo_nombre AS WorkOrder_Modelo,
	db_workorders.wo_motor AS WorkOrder_Motor,
	db_workorders.wo_date AS fechaSinFormato,
	db_workorders.id_clientes AS WorkOrder_ClienteID,
	db_clientes.clientes_nombre AS WorkOrder_Cliente,
	db_clientes.clientes_empresa AS WorkOrder_Company,
	db_clientes.clientes_phone AS WorkOrder_Phone,
	db_clientes.clientes_email AS WorkOrder_Email,
	db_clientes.clientes_address AS WorkOrder_Address,
	db_workorders.wo_year AS WorkOrder_Year,
	db_workorders.id_service AS WorkOrder_ServicioID,
	db_services.service_cual AS WorkOrder_Servicio,
	IF(db_workorders.wo_delivered = 'Y', 'Yes', '' ) AS WorkOrder_Delivered,
	db_services.id_service,
	DATE_FORMAT(db_workorders.wo_date, '%a %d, %b %Y' ) AS WorkOrder_Fecha,
	DATE_FORMAT(db_workorders.wo_date, '%a %d, %b %Y' ) AS WorkOrder_FechaDos,
	db_workorders.wo_distro AS WorkOrder_Distro,
	db_workorders.wo_note AS WorkOrder_Note,
	db_workorders.wo_price AS WorkOrder_Amount 
	FROM
	db_workorders
	INNER JOIN db_carro_modelo ON db_workorders.modelo_id = db_carro_modelo.modelo_id
	INNER JOIN db_carro_marca ON db_carro_modelo.marca_id = db_carro_marca.marca_id
	INNER JOIN db_clientes ON db_workorders.id_clientes = db_clientes.id_clientes
	INNER JOIN db_services ON db_workorders.id_service = db_services.id_service 
	ORDER BY db_workorders.wo_id DESC";
$mi_consulta->conectar();
$tabla=$mi_consulta->ejecutar_consulta($MyQuery);
$rows = array();
while ($filas = mysqli_fetch_assoc($tabla))
{
	$rows[]=$filas;
}
echo json_encode($rows);
?>