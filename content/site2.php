<?php
function getnewsarray()
{
    return json_decode(file_get_contents("https://www.tagesschau.de/api2/homepage/"), true);
}

function getnewspage($site)
{
    return getnewsarray()["news"][$site];
}

?>

<!DOCTYPE html>

<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="content/css/site2.css">
</head>

<body>
<?php



$news = getnewspage($_SESSION["newspage"]);
if (isset($news["ressort"])) {
    $news_ressort = ucfirst($news["ressort"]);
    echo("<div class=news-ressort>");
    echo($news_ressort);
    echo("</div>");
}

if (isset($news["teaserImage"]["imageVariants"]["16x9-1920"])) {
    $news_image_1920 = ($news["teaserImage"]["imageVariants"]["16x9-1920"]);
} else {
    $news_image_1920 = "https://www.meinburgebrach.de/wp-content/uploads/2021/03/eilmeldung-1.png";
}
if (isset($news["teaserImage"]["imageVariants"]["1x1-840"])) {
    $news_image_840 = ($news["teaserImage"]["imageVariants"]["1x1-840"]);
} else {
    $news_image_840 = "https://www.meinburgebrach.de/wp-content/uploads/2021/03/eilmeldung-1.png";
}

echo("<img src=$news_image_1920 class=news-img-xl>");
echo("<img src=$news_image_840 class=news-img-s>");
echo("<img class=news-datails-qr-img src=http://chart.apis.google.com/chart?chs=500x500&cht=qr&chld=L&chl=" . $news["detailsweb"] . "></img>");
echo("<div class=news-content>");
echo("<div class=news-title>");
echo($news["title"]);
echo("</div>");
$news_content = ($news["content"]);
$news_content_part = $news_content[0];
echo("<div class=news-content-part>");


$news_content_part_type = ($news_content_part["type"]);
if ($news_content_part_type == "text") {
    $news_content_part_text = ($news_content_part["value"]);
    echo("<div class=news-content-text-paragraph>");
    echo $news_content_part_text;
    echo("</div>");
    echo("</div>");

}


echo("</div>");

echo("</div>");

?>


<?php

echo("</div>");
$_SESSION["newspage"] = $_SESSION["newspage"] + 1;
if ($_SESSION["newspage"] > 9 or !isset($_SESSION["newspage"])) {
    $_SESSION["newspage"] = 0;
}
?>

</body>

</html>