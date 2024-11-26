<?php

//lien vers le conttrolleur


require "controleur/controleur.php";

// appel de la fonction accueil dans le controlleur qui permet d'afficher (normalement) l'index


accueil();

if($_GET['page'] == 'connexion'){
    connexion();
}