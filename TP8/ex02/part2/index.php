<?php

require_once "Template.class.php";

if (isset($_GET['valid']))
    DisplayConfirmation();
else if (isset($_POST['civilite']))
    DisplayValidation();    
else
    DisplayForm();

function DisplayForm(){
    $page = new Template("form.html");
    $page->Display();
}

function DisplayValidation(){
    session_start();

    $_SESSION["civilite"] = $_POST["civilite"];
	$_SESSION["prenom"] = $_POST["prenom"];
	$_SESSION["nom"] = $_POST["nom"];
	$_SESSION["email"] = $_POST["email"];
	$_SESSION["niveau"] = $_POST["niveau"];
	$_SESSION["competence"] = implode(", ", $_POST["competence"]);
	$_SESSION["autre_competence"] = $_POST["autre_competence"];
    
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

function DisplayConfirmation(){
    session_start();

    $save = "Civilité : " .$_SESSION['civilite']."\n";
    $save .= "Prénom : " .$_SESSION['prenom']."\n";
    $save .= "Nom : ".$_SESSION["nom"]."\n";
	$save .= "E-mail : ".$_SESSION["email"]."\n";
	$save .= "Niveau : ".$_SESSION["niveau"]."\n";
	$save .= "Compétence : ".$_SESSION["competence"]."\n";
	$save .= "Autres compétences :\n".$_SESSION["autre_competence"];
    session_destroy();

    if (!file_put_contents("data.txt", $save))
        $message = "Données non sauvegardées sur le serveur";
    else
        $message = "Vos données sont enregistrées sur le serveur.";

    $page = new Template("confirmation.html");
    $page->Replace("(MESSAGE)", $message);
    $page->Display();
}