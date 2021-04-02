<?php
foreach($_GET as $key => $value)
    $body .= "\$_GET['$key'] = $value<br>";

$page = file_get_contents("template.html");
if ($page != null)
{
    $page = str_replace("(TITLE)", "GET", $page);
    $page = str_replace("(BODY)", $body, $page);
    echo $page;
}