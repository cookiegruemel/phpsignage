<?php
$slot = $_GET["i"];

if (istesttime()) {
    if ($slot == 1) {
        include "content/site3.php";

    if ($slot > 1) {
        streak_end();}
    }
} elseif (isbefore0815()) {
    if ($slot == 1) {
        include "content/site2.php";
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
    trigger_error("Keine gültiges Programm in inc/content_matrix.php definiert");
}
