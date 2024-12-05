<?php

function accueil(){
    require "vue/vueIndex.php";
}


function connexion(){
    require "vue/vueConnexion.php";
}

function erreur($message){
    require "vue/vueErreur.php";
}