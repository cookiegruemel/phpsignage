<?php


include("inc/config.php");

if (!isset($_GET["i"])) {
    header("location: index.php?i=1");
}

function streak_end()
{
    echo "Test";
    return header("location: index.php?i=1");
    exit;
}

function clock($sleepsec)
{
    return $sleepsec;
}

function CounterI($i)
{
    $i = isset($i) ? intval($i) : 0; // Initialize $i as 0 if not set
    $i++;
    return $i;
}

$refreshURL = "index.php?i=" . CounterI($_GET["i"]);
header("Refresh: " . clock($sleepsec) . "; " . $refreshURL);