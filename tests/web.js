var i = 0, c = 1;
var minuteur = window.setInterval("couleur()",500);
function couleur() {
if (c == 1) {
c = 2; }
else {
document.backgroundColor="aqua";
c = 1; }
i++;
if(i >= 10)
window.clearInterval(minuteur);
document.backgroundColor="yellow";
}