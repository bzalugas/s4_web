<?php

require_once "Template.class.php";

$dirName = "csv_file";

$fileName = randomFileNameGeneration();

function randomFileNameGeneration(){
    $name = "feuile_calcul_";
    $id = mt_rand();
    $name .= $id . ".csv";
    return $name;
}

//on verifie que le dossier est present
if (!file_exists($dirName)){
    mkdir($dirName, 0777);
}

//on efface les anciens fichiers csv
$files = scandir($dirName);
foreach($files as $file){
    $path = $dirName . "/" . $file;
    if (is_file($path) && ((time() - filemtime($path)) >= 60)){
        unlink($path);
    }
}



//on forme la string du fichier csv
$csv = "Article;Prix Unitaire;Quantité;Prix\n";
$line = 0;
while(isset($_POST['article_' . $line])){
    $csv .= $_POST['article_'.$line].";";
    $csv .= $_POST['unitaire_'.$line].";";
    $csv .= $_POST['quantite_'.$line].";";
    $csv .= $_POST['prix_'.$line]."\n";
    $line++;
}
$csv .= ";;Total;" . $_POST['total'];

while (file_exists($fileName)){
    $fileName = randomFileNameGeneration();
}
file_put_contents($dirName . "/" . $fileName, $csv);

$page = new Template("template.html");
$page->Replace("(FILE_PATH)", "./".$fileName);
$page->Replace("(FILE_NAME)", $fileName);
$page->Display();