<?php
include("inc/checktime.php");

if(!isset($_GET["i"])){
    header("location: index.php?i=1");
}
function streak_end()
{
    header("location: index.php?i=1");
    echo "Test";
}

function clock($sleepsec)
{
    if (!isset($_GET["i"])) {
        $i = 0;
    } else {
        $i = $_GET["i"];
    }
    $i = $i + 1;

    if (slowOnError()){
        $sleepsec = 120;
    } else {
        $sleepsec = $sleepsec;
    }
    header("Refresh: $sleepsec; index.php?i=" . ($i));
}

function slowOnError(){
    return true;
}
