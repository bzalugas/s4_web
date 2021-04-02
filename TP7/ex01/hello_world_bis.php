<?php
$filename = "./template.html";
$page = file_get_contents ($filename);
if ($page != false)
{
    $page = str_replace("(TITLE)", "Hello World", $page);
    $page = str_replace("(BODY)", "Hello World", $page);
    echo $page;
}