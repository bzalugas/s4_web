<?php
class Template {
    var $template;

    function __construct($fichier) {
        $this->template = file_get_contents($fichier);
        if ($this->template == false)
            exit("Echec chargement du template.");
    }

    function Replace($label, $value) {
        $this->template = str_replace($label, $value, $this->template);
    }

    function Display(){
        echo $this->template;
    }
}