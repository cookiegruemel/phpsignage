<?php

function timetoseconds($hours, $minutes, $seconds)
{
    $hsec = $hours * 3600;
    $msec = $minutes * 60;
    return ($hsec + $msec + $seconds);
}

function get_day_time()
{
    $time = time();
    $time_struct = localtime($time, true);
    $seconds_since_start_of_day = $time_struct['tm_hour'] * 3600 + $time_struct['tm_min'] * 60 + $time_struct['tm_sec'];
    return $seconds_since_start_of_day;
}

function isbefore0815()
{
    if (get_day_time() <= timetoseconds(8, 15, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Erste Pause
function isfirstbreak()
{
    if (get_day_time() > timetoseconds(9, 35, 0) && get_day_time() <= timetoseconds(9, 50, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Zweite Pause
function issecondbreak()
{
    if (get_day_time() > timetoseconds(11, 10, 0) && get_day_time() <= timetoseconds(11, 25, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Nachmittags Pause
function isthirdbreak()
{
    if (get_day_time() > timetoseconds(14, 10, 0) && get_day_time() <= timetoseconds(14, 25, 0)) {
        return (true);
    } else {
        return (false);
    }
}

function istesttime()
{
    if (get_day_time() > timetoseconds(20, 0, 0) && get_day_time() <= timetoseconds(23, 45, 0)) {
        return (true);
    } else {
        return (false);
    }
}

#Erste Stunde
function isfirsthour()
{
    if (get_day_time() > timetoseconds(8, 15, 0) && get_day_time() <= timetoseconds(8, 55, 0)) {
        return (true);
    } else {
        return (false);
    }
}

#Zweite Stunde
function issecondhour()
{
    if (get_day_time() > timetoseconds(8, 55, 0) && get_day_time() <= timetoseconds(9, 35, 0)) {
        return (true);
    } else {
        return (false);
    }
}

#Fünfte Stunde
function isthirdhour()
{
    if (get_day_time() > timetoseconds(9, 50, 0) && get_day_time() <= timetoseconds(10, 30, 0)) {
        return true;
    } else {
        return false;
    }
}

# Vierte Stunde
function isfourthhour()
{
    if (get_day_time() > timetoseconds(10, 30, 0) && get_day_time() <= timetoseconds(11, 10, 0)) {
        return true;
    } else {
        return false;
    }
}

# Fünfte Stunde
function isfifthhour()
{
    if (get_day_time() > timetoseconds(11, 25, 0) && get_day_time() <= timetoseconds(12, 05, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Sechste Stunde
function issixthhour()
{
    if (get_day_time() > timetoseconds(12, 05, 0) && get_day_time() <= timetoseconds(12, 45, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Siebte Stunde
function isseventhhour()
{
    if (get_day_time() > timetoseconds(12, 50, 0) && get_day_time() <= timetoseconds(13, 30, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Achte Stunde
function iseighthour()
{
    if (get_day_time() > timetoseconds(13, 30, 0) && get_day_time() <= timetoseconds(14, 10, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Neunte Stunde
function isninthhour()
{
    if (get_day_time() > timetoseconds(14, 25, 0) && get_day_time() <= timetoseconds(15, 05, 0)) {
        return (true);
    } else {
        return (false);
    }
}

# Zehnte Stunde
function istenthhour()
{
    if (get_day_time() > timetoseconds(15, 05, 0) && get_day_time() <= timetoseconds(15, 45, 0)) {
        return (true);
    } else {
        return (false);
    }
}

function isafternoon()
{
    if (get_day_time() > timetoseconds(15, 45, 0) && get_day_time() <= timetoseconds(16, 10, 0)) {
        return (true);
    } else {
        return (false);
    }
}




