<?php
include("inc/getweather.php");
include("inc/config.php");
include("inc/error_handler.php");
$weatherdays = extractdailydatafromweatherarray($apikey, $lat, $lon)[2];
DEVgetjsonfile(extractdailydatafromweatherarray($apikey, $lat, $lon));

?>

<link rel="stylesheet" href="content/css/site3.css">

<div class="container-flex">
<table id="Wetterdaten">
    <thead>
    <tr>
        <th>Tag</th>
        <th>Temperatur/Gefühlt</th>
        <th>Regen</th>
        <th>UV Index</th>
        <th>Wolken</th>

        <th>Wind</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($weatherdays as $weatherday){
        echo ("<tr>");
        echo "<th>".date("d.m", $weatherday["time"]);
        echo "</th><th>" . round($weatherday["temperatureLow"]) . "°/" . round($weatherday["temperatureHigh"]);
        echo ("</th><th>" . ($weatherday["precipProbability"] * 100) . "%");
        echo ("</th><th>" . interpretUvIndex($weatherday["uvIndex"]));
        echo ("</th><th>" . ($weatherday["cloudCover"] * 100) . "%");
      //echo ("</th><th>" . ($weatherday["visibility"]) . "km");
        echo ("</th><th>" . round(($weatherday["windSpeed"]) * 3.6) . "km/h " . interpretWindBearing($weatherday["windBearing"]));
        echo ("</tr>");

    }
    ?>
    </tbody>
</table>
            </div>
