<?php
ob_start();
try {
    session_start();
    ini_set('log_errors', 8191);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
//include("inc/clock.php");
    include("inc/content_matrix.php");
    include("inc/config.php");
    include("inc/clock.php");
} catch (Exception $e) {
    include("content/error.php");
}

