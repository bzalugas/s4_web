<?php
$days = array("dimanche","lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");

$months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

$date = $days[date('w')].' '.date('d').' '.$months[date('n')].' '.date('Y');
$page = file_get_contents("date.html");
if ($page != null)
{
    $page = str_replace("(DATE)", $date, $page);
    echo $page;
}