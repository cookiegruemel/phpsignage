<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abfahrtsmonitor</title>
    <link rel="stylesheet" href="content/css/site1.css">
</head>

<body>


<?php

$time = time();

$stopid = "1865faf78128c148830dd77ea9dbd2ac"; // Ringen
$stopid = "193dee8b5524c7554881265258d06ad6"; // Köln
$url = "https://www.vrs.de/index.php?eID=tx_vrsinfo_departuremonitor&i=$stopid";
$data = file_get_contents($url);
$json = json_decode($data, true); ?>


<table id="Abfahrten">
    <thead>
    <tr>
        <th>Linie</th>
        <th>Ziel</th>
        <th>Abfahrt</th>
        <th>Abfahrt in</th>
    </tr>
    </thead>


    <tbody>
    <?php
    $json = json_decode($data, true);
    if ($json && isset($json['events'])) {
        foreach ($json['events'] as $event) {
            $line = $event['line']['number'];
            $lineName = $event['line']['product'];
            $destination = $event['line']['direction'];
            $departureTime = date('H:i', $event['departure']['timestamp']);
            $departure = $event["departure"];
            $departureUTime = $departure["timestamp"];
            $abfahrtSoll = ($event["departure"]["timetable"]);
            $sektodep = ($departureUTime - time());


            if (isset($event["departure"]["delayed"])) { //prüfung ob verspätung existiert und Daten vorhanden sind
                if ($event["departure"]["delayed"] == true) {
                    $istVerspätet = "true";
                } else {
                    $istVerspätet = "false";
                }
            } else {
                $istVerspätet = "false";
            }

            if ($istVerspätet == "true") {
                $abfahrtIst = strtotime($event["departure"]["estimate"]);
                $abfahrtSollUnix = strtotime($abfahrtSoll);
                $verspätungMin = (($abfahrtIst - $abfahrtSollUnix) / 60);
            }


            if (isset($event["timetable"])) {
                $timetabletime = strtotime($event["timetable"]);
            }

            $rhourstodep = floor($sektodep / 3600);
            $rmintodep = floor(($sektodep % 3600) / 60);
            $rsectodep = $sektodep % 60;


            if ($rhourstodep != 0) {
                $huamntimetodep = ($rhourstodep . "" . $rmintodep . " Stunden");
            } else {
                $huamntimetodep = ($rmintodep . " min");
            }

            if (str_contains($huamntimetodep, "-") == true) {
                $huamntimetodep = "Abgefahren";
                $timetodepclass = "timetodep-past";
            } else {
                $timetodepclass = "timetodep-fusture";
            }

            if ($sektodep < 3600) {
                echo "<tr class='vrs-table-inner-item'>"; //Anfang der Zeile

                if ($istVerspätet == "false") {
                    echo "<td ><p class='vrs-table-line-item-intime'>$line</p></td>";
                } //Line Pünklich
                else { //oder
                    echo "<td ><p class='vrs-table-line-item-late'>$line</p></td>";
                } //Linie Verspätet

                echo "<td>$destination</td>"; //Zielanzeige

                if ($istVerspätet == "true") {
                    $verspätungMin = sprintf("%02d", $verspätungMin);
                    echo "<td>$abfahrtSoll <div class=delayplakette>+$verspätungMin</div></td>";
                } else {                                            //Abfahrt Plan + Verspätungs Tag
                    echo "<td>$abfahrtSoll</td>";
                }

                echo "<td class=td-4>$huamntimetodep</td>"; //Abfahrt in

                echo "</tr>"; //Ende der Zeile
            } else {
            }
        }
    } else {
        echo "<tr><td colspan='4'>Keine Daten verfügbar</td></tr>";
    }
    ?>
    </tbody>
</table>

</body>


</html>