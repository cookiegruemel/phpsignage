<?php
ob_start();



session_start();
include("inc/clock.php");
include("inc/content_matrix.php");
include("inc/config.php");
include("inc/error_handler.php");

clock($clock);