// Nombre de lignes.
var line_number = 10;

// *********************************************************************
// Initialisation de la feuille de calcul.
// *********************************************************************
function init()
{
	// RÃ©cupÃ¨re tous les champs textuels de type "number".
	var inputs = document.querySelectorAll("input[type='number']");
	
	// On ajoute Ã  un Ã©vÃ©nement onChange Ã  tous les champs textuels de typs "number".
	// Quand la valeur d'un de ces champs change, la fonction calculeTotal() est appelÃ©e.
	for (var i = 0; i < inputs.length; i++)
		inputs[i].addEventListener("change", calculeTotal, false);

	// Lance le calcul du total.
	// (Les sommes seront positinnÃ©es Ã  zÃ©ro.)
	calculeTotal();
}

// *********************************************************************
// Effectue le calcul du prix pour chaque ligne ainsi que le total.
// L'affichage de tous les champs est mis Ã  jour.
// *********************************************************************
function calculeTotal()
{
	// DÃ©clare une variable qui contiendra le total de la somme.
	var total_value = 0;
	
	// Calcul le prix et met Ã  jour l'affichage pour toutes les lignes.
	// Le prix d'une ligne est ajoutÃ© au total.
	for (var i = 0; i < line_number; i++)
		total_value += calculePrix(i);
	
	// Mise Ã  jour de l'affichage du total.
	total.value = total_value;
}

// *********************************************************************
// Effectue le calcul du prix pour une ligne.
// L'affichage du prix de la ligne est mis Ã  jour.
// ---------------------------------------------------------------------
// EntrÃ©e : NumÃ©ro de la ligne Ã  mettre Ã  jour.
// Sortie : Renvoie le prix de la ligne.
// *********************************************************************
function calculePrix(ligne)
{
	// RÃ©cupÃ¨re les identifiants des champs pour le prix unitaire et la quantitÃ©.
	var unitaire = "unitaire_" + ligne;
	var quantite = "quantite_" + ligne;

	// RÃ©cupÃ¨re la valeur entiÃ¨re contenue dans ces champs.
	unitaire_value = parseInt(document.getElementById(unitaire).value, 10);
	quantite_value = parseInt(document.getElementById(quantite).value, 10);

	// Si les valeurs n'ont pas pu Ãªtre converties correctement, on les met Ã  zÃ©ro.
	if (isNaN(unitaire_value))
		unitaire_value = 0;
	if (isNaN(quantite_value))
		quantite_value = 0;
	
	// Calcul du prix.
	var prix = unitaire_value * quantite_value;
	
	// Mise Ã  jour de l'affichage du prix.
	document.getElementById("prix_" + ligne).value = prix;
	
	// Renvoie le prix.
	return prix;
}

// *********************************************************************
// Ajoute une ligne au tableau.
// *********************************************************************
function ajouteLigne()
{
	// CrÃ©ation d'un nouvel Ã©lÃ©ment <tr>.
	var tr = document.createElement("tr");
	
	// Ajoute Ã  l'Ã©lÃ©ment <tr> tous les Ã©lÃ©ments <td>.
	// Le nombre de ligne total est Ã©galement incrÃ©mentÃ©.
	tr.innerHTML = getTd(line_number++);

	// RÃ©cupÃ¨re le dernier Ã©lÃ©ment <tr> du tableau.
	// (Il s'agit de la ligne affichant le total.)
	var tr_lignes = document.getElementsByTagName("tr");
	var last_tr = tr_lignes[tr_lignes.length - 1];
	
	// InsÃ¨re la nouvelle ligne juste avant le total.
	last_tr.parentNode.insertBefore(tr, last_tr);

	// Actualise l'affichage des prix et du total.
	calculeTotal();
}

// *********************************************************************
// GÃ©nÃ¨re les balises <td> d'une ligne Ã  ajouter.
// ---------------------------------------------------------------------
// EntrÃ©e : NumÃ©ro de la ligne Ã  ajouter.
// Sortie : Renvoie les balises <td> de la ligne.
// *********************************************************************
function getTd(ligne)
{
	var td;
	
	td  = '<td><input type="text" name="article_' + ligne + '" id="article_' + ligne + '"></td>';
	td += '<td><input onChange="calculeTotal();" type="number" name="unitaire_' + ligne + '" id="unitaire_' + ligne + '"></td>';
	td += '<td><input onChange="calculeTotal();" type="number" name="quantite_' + ligne + '" id="quantite_' + ligne + '"></td>';
	td += '<td><input type="text" name="prix_' + ligne + '" id="prix_' + ligne + '" readonly></td>';
	
	return td;
}