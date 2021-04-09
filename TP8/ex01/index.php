<?php

require_once "Template.class.php";

$title = "Bonjour";
$body = "<p>Ceci est un test</p>";

$page = new Template("template.html");
$page->Replace("(TITLE)", $title);
$page->Replace("(BODY)", $body);
$page->Display();