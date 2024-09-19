<?php
switch ($_GET['xpt'])
{
    case '001': // Clients
        include_once(DIR_MODULOS.'main_clients.php');
    break;

    case '002': // WorkOrders
        include_once(DIR_MODULOS.'main_workorders.php');
    break;

    case '003': // Invoices
        include_once(DIR_MODULOS.'main_invoices.php');
    break;

    case '004': // CarData
        // include_once(DIR_MODULOS.'main_CarData.php');
    break;

    case '051': // Report/Clients
        include_once(DIR_MODULOS.'pdf_clients.php');
    break;

    case '052': // Report/Work Orders
        include_once(DIR_MODULOS.'pdf_workorders.php');
    break;

    case '010': // Push/Notification
        include_once(DIR_MODULOS.'main_push.php');
    break;

    case '011': // Settings
        // include_once(DIR_MODULOS.'main_settings.php');
    break;

    case '100': // Users
        include_once(DIR_MODULOS.'main_users.php');
    break;

    case '101': // Logs
        include_once(DIR_MODULOS.'main_logs.php');
    break;

    default:
       include_once(DIR_MODULOS.'default.php');
    break;
}
?>