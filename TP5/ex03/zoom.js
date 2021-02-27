var taille = 30;
function zoom_plus()
{
    toZoom.style.fontSize = ++taille + "px";
}
function zoom_moins()
{
    if (taille - 1 >= 1)
        toZoom.style.fontSize = --taille + "px";
    else
        alert("Taille minimale atteinte.");
}