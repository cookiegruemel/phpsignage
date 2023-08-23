<?php

include("inc/checktime.php");
include("inc/clock.php");
$slot = $_GET["i"];

if (istesttime()) {
    if ($slot == 1) {
        include "content/site3.php";
    }
    if ($slot == 2) {
        include "content/site2.php";
    }
    if ($slot == 3) {
        include "content/site2.php";
    }
    if ($slot == 4) {
        include "content/site2.php";
    }
    if ($slot == 5) {
        include "content/site1.php";
    } elseif ($slot > 5) {
        streak_end();}

} elseif (isbefore0815()) {
    if ($slot == 1) {
        include "content/site3.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} elseif (isfirsthour() or issecondhour() or isthirdhour() or isfourthhour() or isfifthhour() or issixthhour() or isseventhhour() or iseighthour() or isninthhour() or istenthhour()) {
    if ($slot == 1) {
        include "content/site3.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} elseif (isfirstbreak()) {
    if ($slot == 1) {
        include "content/site2.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} elseif (issecondbreak()) {
    if ($slot == 1) {
        include "content/site2.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} elseif (isthirdbreak()) {
    if ($slot == 1) {
        include "content/site3.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} elseif (isafternoon()) {
    if ($slot == 1) {
        include "content/site1.php";
    }
    if ($slot > 1) {
        streak_end();
    }
} else {
    include("content/error.php");
}
