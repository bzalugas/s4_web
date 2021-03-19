
function message()
{
    alert("Cette fonction se trouve dans un fichier externe.");
}
function surface(longueur, largeur)
{
    return (longueur * largeur);
}
function onSurface()
{
    var longueur = prompt("Longueur : ");
    var largeur = prompt("Largeur : ");
    alert("La surface est : " + surface(longueur, largeur));
}
function onValidation()
{
    var c = confirm("Voulez-vous valider ?");
    if (c == true)
        document.write("Vous avez validé.");
    else
        document.write("Vous n'avez pas validé.");
}

function table(num)
{
    var result;
    result = '<table border="1">';
    result += '<tr><th colspan="2">Table des ' + num + '</th></tr>';
    for (var i = 1; i <= 10; i++)
    {
        result += '<tr><td>' + i + ' x ' + num + '</td><td>' + i*num +'</td></tr>\n';
    }
    result += '</table>';
    return (result);
}
function onTable()
{
    var number = prompt("Quelle table afficher ?");
    var res = table(number);
    document.write(res);
}