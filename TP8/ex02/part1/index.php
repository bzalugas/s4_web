<?php

require_once "Template.class.php";

if (!isset($_POST['civilite']))
    DisplayForm();
else
    DisplayValidation();

function DisplayForm(){
    $page = new Template("form.html");
    $page->Display();
}

function DisplayValidation(){
    $page = new Template("validation.html");
    $page->Replace("(CIVILITE)", $_POST['civilite']);
    $page->Replace("(PRENOM)", $_POST['prenom']);
    $page->Replace("(NOM)", $_POST['nom']);
    $page->Replace("(EMAIL)", $_POST['email']);
    $page->Replace("(NIVEAU)", $_POST['niveau']);
    $page->Replace("(COMPETENCE)", implode(", ", $_POST['competence']));
    $page->Replace("(AUTRE_COMPETENCE)", nl2br(htmlspecialchars($_POST['autre_competence'])));
    $page->Display();
}