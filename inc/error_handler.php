<?php
// Dateipfad für das Log
$logFilePath = 'etc/error.log';
ini_set('log_errors', 8191);
ini_set('error_log', $logFilePath);
//error_reporting(E_ALL);
$logFile = fopen($logFilePath, 'a');
$currentDateTime = date('d.m.Y H:i:s', time());
if (isset(error_get_last()['message'])){
$errorInfo = "[$currentDateTime] Fehler/Warnung: " . error_get_last()['message'] . "\n";
fwrite($logFile, $errorInfo);
fclose($logFile);}
if (isset(error_get_last()['message'])){
    slowOnError();
require "content/error.php";}

