<?php

date_default_timezone_set('Asia/Manila');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ecom-pc-store');

$app_url = 'http://192.168.20.52/pc-ecom-system-webview/';
$app_name = 'RMCT Ecommerce';
$group_name = 'RMCT';
$menu_title = 'RMCT';

try {

    $conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) { 

    die("ERROR: Could not connect. " . $e->getMessage());

}

$stmt = $conn->prepare('SELECT meta_field, meta_value FROM ecom_settings');
$stmt->execute();
$ecomSettings = $stmt->fetchAll();

$settings = [];
foreach ($ecomSettings as $key => $ecomSetting) {
    $settings[$ecomSetting['meta_field']] = $ecomSetting['meta_value'];
}