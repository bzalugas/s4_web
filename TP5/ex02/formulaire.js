function tester_formulaire()
{
	// Création d'une variable qui contiendra le résultat à afficher.
	var result;
	
	// Stocke le champ "value" de la zone de texte "nom"
	// du formulaire "monFormulaire" dans la variable du résultat.
	result = "Nom : " + monFormulaire.nom.value + "\n";
    result += "Prénom : " + monFormulaire.prenom.value + "\n";
    result += "Civilité : " + monFormulaire.civilite.value + "\n";
    result += "Adresse e-mail : " + monFormulaire.email.value + "\n";
	result += "Mot de passe : " + monFormulaire.mot_de_passe.value + "\n";

	// Création d'une chaîne qui contiendra la compétence.
	var competence = "Competence : ";
    var niveau = "Niveau : " + monFormulaire.niveau.value + "\n";

	if (monFormulaire.comp_c.checked)
		competence += "C, ";
    if (monFormulaire.comp_cpp.checked)
        competence += "C++, ";
    if (monFormulaire.comp_java.checked)
        competence += "Java, ";
    if (monFormulaire.comp_caml.checked)
        competence += "CAML, ";
    if (competence == "Competence : ")
		competence += "Aucune";
	if (competence != "Competence : Aucune")
        competence = competence.substr(0, competence.length - 2);
    competence += "\n\n";
    var autre;
    if (monFormulaire.arrive_site.value)
        autre = "Autre competence : \n" + monFormulaire.arrive_site.value + "\n\n";

    var couleur = "Couleur : " + monFormulaire.couleur.value + "\n";

    var fichier = "Fichier : " + monFormulaire.cv.value + "\n";

    var type = "Type de fichier : " + monFormulaire.file_type.value + "\n";
	result += "\n\n" + competence + autre + couleur + fichier + type;
	
	// Affichage du résultat.
    if (monFormulaire.email2.value == monFormulaire.email.value)
	    alert(result);
    else
        alert("Les deux mails ne correspondent pas.");
}