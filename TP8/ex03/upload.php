<?php

require_once "Template.class.php";
define ("MAXFILESIZE", 1048576); //definition taille max du fichier en octets

if (!empty($_FILES['fichier']['name']))
{
    $file = $FILES['fichier'];

    if($file['error'] != UPLOAD_ERR_OK)
        $message = "Erreur lors du téléchargement : " . $file['error'];
    else if (!sizeIsGood())
        $message = "Fichier trop volumineux.";
    else if (($file['type'] === "application/pdf") || ((strpos($file['type'], "image") === 0)) === false)
        $message = "Type de fichier incorrect.";
    else if (move_uploaded_file($file['tmp_name'], 'upload/'.$file['name']) === false)
        $message = "Le fichier n'a pas pu etre copié sur le serveur.";
    else
        $message = "Fichier correctement téléchargé.";
}
else
{
    $message = "Aucun fichier passé en paramètre.";
    $file['name'] = "----";
    $file['size'] = "----";
    $file['type'] = "----";
}

function sizeIsGood()
{
    return ($_FILES['fichier']['size'] < MAXFILESIZE);
}

$page = new Template("template.html");
$page->Replace("(MESSAGE)", $message);
$page->Replace("(NAME)", $file['name']);
$page->Replace("(SIZE)", $file['size']);
$page->Replace("(TYPE)", $file['type']);
$page->Display();