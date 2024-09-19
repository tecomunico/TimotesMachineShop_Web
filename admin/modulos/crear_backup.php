<?php
require '/home/jabezsoftware/public_html/timotesmachineshop.com/admin/includes/spaties/vendor/autoload.php';
require '/home/jabezsoftware/public_html/timotesmachineshop.com/admin/includes/chumper/vendor/autoload.php';
require '/home/jabezsoftware/public_html/timotesmachineshop.com/admin/includes/backblaze/vendor/autoload.php';

use Spatie\DbDumper\Databases\MySql;
use Chumper\Zipper\Zipper;
use BackblazeB2\Client;

error_reporting(E_ALL);
ini_set('display_errors', 'Off');
date_default_timezone_set('America/New_York');

$backupDir = '/home/jabezsoftware/public_html/timotesmachineshop.com/admin/backblaze/';
$backupFile = $backupDir . 'backup_' . date('Y-m-d_H-i-s') . '.sql';
$zipFile = $backupDir . 'backup_' . date('Y-m-d_H-i-s') . '.zip';

try {
    // Realizar el backup de la base de datos
    MySql::create()
        ->setDbName('jabezsoftware_timotes')
        ->setUserName('jabezsoftware_timotes_user')
        ->setPassword('$Timotes@DB1412machine!')
        ->dumpToFile($backupFile);

    // Comprimir el archivo SQL en un archivo ZIP usando Chumper/Zipper
    $zipper = new Zipper();
    $zipper->make($zipFile)->add($backupFile)->close();

    // Eliminar el archivo SQL después de comprimirlo
    unlink($backupFile);

    echo "Backup realizado y comprimido exitosamente: {$zipFile}\n";
    file_put_contents('/home/jabezsoftware/public_html/timotesmachineshop.com/admin/backblaze/edgar.log', date('Y-m-d H:i:s') . " - Backup realizado y comprimido exitosamente: {$zipFile}\n", FILE_APPEND);

    // Subir el archivo comprimido a BackBlaze B2
    $accountId      = 'f75cb88460d1';
    $applicationKey = '005a8365f64817b85dd611d7ad8330278e45d1f342'; // MasterKey
    $client = new Client($accountId, $applicationKey);

    $fileName = basename($zipFile);
    $file = fopen($zipFile, 'r');

    $response = $client->upload([
        'BucketName' => 'Timotes',
        'FileName' => $fileName,
        'Body' => $file
    ]);
} catch (Exception $e) {
    echo "Error al realizar el backup: " . $e->getMessage() . "\n";
    file_put_contents('/home/jabezsoftware/public_html/timotesmachineshop.com/admin/backblaze/edgar.log', date('Y-m-d H:i:s') . " - Error al realizar el backup: " . $e->getMessage() . "\n", FILE_APPEND);
}
?>