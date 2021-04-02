<?php
$sort = isset($_GET["sort"]) ? $_GET["sort"] : "country";
$order = isset($_GET["order"]) ? $_GET["order"] : "normal";

$urlPays = $_SERVER["PHP_SELF"];
$urlPays .= "?"."sort="."country";
$urlPays .= "&"."order=".($sort == "country" ? ($order == "normal" ? "inverse" : "normal") : "normal");

$urlCapitale = $_SERVER["PHP_SELF"];
$urlCapitale .= "?"."sort="."city";
$urlCapitale .= "&"."order=".($sort == "city" ? ($order == "normal" ? "inverse" : "normal") : "normal");

$sensTriangle = $order == "normal" ? '&blacktriangle;' : '&blacktriangledown;';

$afficherTrianglePays = $sort == "country" ? true : false;
$afficherTriangleCapitale = $sort == "city" ? true : false;

$trianglePays = $afficherTrianglePays ? $sensTriangle : '';
$triangleCapitale = $afficherTriangleCapitale ? $sensTriangle : '';

$tab = array(
    "Algérie" => "Alger",
    "Pays-Bas" => "Amsterdam",
    "Irak" => "Bagdad",
    "Mali" => "Bamako",
    "Thaïlande" => "Bangkok",
    "Serbie" => "Belgrade",
    "Allemagne" => "Berlin",
    "Liban" => "Beyrouth",
    "Colombie" => "Bogota",
    "Brésil" => "Brasilia",
    "Slovaquie" => "Bratislava",
    "Belgique" => "Bruxelles",
    "Roumanie" => "Bucarest",
    "Hongrie" => "Budapest",
    "Argentine" => "Buenos Aires",
    "Danemark" => "Copenhague",
    "Sénégal" => "Dakar",
    "Irlande" => "Dublin",
    "Ukraine" => "Kiev",
    "Pérou" => "Lima",
    "Portugal" => "Lisbonne",
    "Royaume-Uni" => "Londres",
    "Espagne" => "Madrid",
    "Mexique" => "Mexico",
    "Inde" => "New Delhi",
    "Norvège" => "Oslo",
    "France" => "Paris",
    "Italie" => "Rome",
    "Chili" => "Santiago",
    "Libye" => "Tripoli",
    "Tunisie" => "Tunis",
);

if ($sort == "country" && $order == "inverse")
    krsort($tab);
else if ($sort == "city" && $order == "inverse")
    arsort($tab);
else if ($sort == "city")
    asort($tab);
else
    ksort($tab);

$body = "<table>\n";
$body .= "  <tr>\n";
$body .= '      <th><a href="'.$urlPays.'">Pays '.$trianglePays.'</a></th>'."\n";
$body .= '      <th><a href="'.$urlCapitale.'">Capitale '.$triangleCapitale.'</a></th>'."\n";
$body .= '  </tr>'."\n";
foreach($tab as $key => $value)
{
    $body .= "<tr>\n";
    $body .= '   <td>'.$key.'</td>'."\n";
    $body .= '   <td>'.$value.'</td>'."\n";
    $body .= '</tr>'."\n";
}

$page = file_get_contents("pays_capitales.html");
if ($page != null)
{
    $page = str_replace("(TABLE)", $body, $page);
    echo $page;
}