<?php
require_once "Template.class.php";
$file = "get_letter.html";
session_start();

//si pas de lettre passée:
//cas 1: on a pas encore de mot
//cas 2: on a pas encore saisi de lettre
if (!isset($_POST["letter"]))
{
    //cas 1
    if (!isset($_POST["word"]))
        exit(file_get_contents("get_word.html"));
    //cas 2
    else
    {
        //on vérifie que le mot ne contient que des lettres
        if (!ctype_alpha($_POST["word"]))
            exit(file_get_contents("get_word.html"));
        //on sauvegarde les variables de session
        $_SESSION["word"] = strtoupper($_POST["word"]);
        $_SESSION["letters"] = "";
        $_SESSION["wrong"] = 0;
        //on cree la variable qui contiendra la lettre
        $letter = "";
    }
}
else
    $letter = strtoupper($_POST["letter"]);

$found = false;
$word = $_SESSION["word"];
$letters = $_SESSION["letters"];
$wrong = $_SESSION["wrong"];

if (ctype_alpha($letter))
{
    if (!str_contains($letters, $letter))
    {
        $letters .= $letter;
        if (!str_contains($word, $letter))
            $wrong++;
    }
}

$dashedWord = geneDashedWord(str_split($word, 1), $letters);


function geneDashedWord($word, $letters)
{
    $dashedWord = "";
    foreach($word as $wordLetter)
    {
        if (str_contains($letters, $wordLetter))
            $dashedWord .= $wordLetter;
        else
            $dashedWord .= "-";
    }
    return $dashedWord;
}

if ($word === $dashedWord || $wrong === 9)
    $found = true;
    
$page = new Template($file);
$page->Replace("(COUNT)", $wrong);
$page->Replace("(DASHED_WORD)", $dashedWord);
$page->Replace("(FULL_WORD)", ($found ? $word : ""));
$page->Replace("(LETTERS)", implode(", ", str_split($letters)));
$page->Replace("(DISABLED)", ($found ? "disabled" : ""));
$page->Display();

$_SESSION["letters"] = $letters;
$_SESSION["wrong"] = $wrong;