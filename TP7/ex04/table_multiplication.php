<?php
define("MAX_TABLE", 20);
if (isset($_GET['table']))
{
    $table = $_GET['table'];
    $body = '<table border="1">';
    $body .= '<tr><th colspan="2">Table des '."$table".'</th></tr>';
    for($i = 1; $i <= 10; $i++)
    {
        $body .= '<tr>';
        $body .= "<td>$i x $table</td><td>".($i*$table)."</td>";
    }
    $body .= '</table>';
}
else
{
    for($i = 1; $i <= MAX_TABLE; $i++)
    {
        $address = $_SERVER["PHP_SELF"]."?table=".$i;
        $body .= "<a href=\"".$address."\">Table des ".$i."</a><br>";
    }
    $body .= "</div>";
}

$page = file_get_contents("template.html");
if ($page != null)
{
    $page = str_replace("(TITLE)", "Tables multiplication", $page);
    $page = str_replace("(BODY)", $body, $page);
    echo $page;
}