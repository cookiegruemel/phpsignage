<?php


function getweatherarray($apikey, $lat, $lon)
{
    return json_decode(file_get_contents("https://api.pirateweather.net/forecast/$apikey/$lat,$lon?units=si"), true);
}

function extractminutelydatafromweatherarray($apikey, $lat, $lon)
{
    foreach (getweatherarray($apikey, $lat, $lon)["minutely"] as $ob) {
        $array[] = $ob;
    }
    return $array;
}

function extracthourlydatafromweatherarray($apikey, $lat, $lon)
{
    foreach (getweatherarray($apikey, $lat, $lon)["hourly"] as $ob) {
        $array[] = $ob;
    }
    return $array;
}

function extractdailydatafromweatherarray($apikey, $lat, $lon)
{
    foreach (getweatherarray($apikey, $lat, $lon)["daily"] as $ob) {
        $array[] = $ob;
    }
    return $array;
}
function DEVgetjsonfile($array){
    file_put_contents("test/testjson.json",json_encode($array));
}
function interpretUvIndex($uvindex){
    if ($uvindex <= 2.49){
        return "Niedrig";
    } elseif ($uvindex > 2.49 && $uvindex <= 5.49){
        return "Mittel";
    } elseif ($uvindex > 5.49 && $uvindex <= 7.49){
        return "Hoch";
    } elseif ($uvindex > 7.49 && $uvindex <= 10.49){
        return "Sehr Hoch";
    } elseif ($uvindex > 10.49) {
        return "Extrem";
    }
}

function interpretWindBearing($bearing){
    $direction = array(
        'Norden',
        'Nordosten',
        'Osten',
        'Südosten',
        'Süden',
        'Südwesten',
        'Westen',
        'Nordwesten',
        'Norden'
    );

    $bearing += 22.5; // Verschiebung um die Hälfte des Intervalls
    if ($bearing >= 360) {
        $bearing -= 360;
    }

    $index = floor($bearing / 45);
    return $direction[$index];
}
