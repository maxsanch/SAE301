<?php

require_once "modèle/utilisateurs.php";

function accueil(){
    require "vue/vueIndex.php";
}

function accueil_connecté(){
    require "vue/vueIndexConnecte.php";
}


function connexion(){
    require "vue/vueConnexion.php";
}

function erreur($message){
    require "vue/vueErreur.php";
}

function login($nom, $mdp){
    var_dump('fait');
    $nom_user = new utilisateurs();
    $user = $nom_user->GetUser($nom);

    if(!empty($user)){
        if($mdp == $user[0]['mdp']){
            $_SESSION['acces'] = $nom;

            if(isset($_COOKIE["page"])){
                header('location: index.php'.$_COOKIE["page"]);
            }
            else{
                header('location: index.php');
            }
        }
        else{
            throw new Exception(" Mot de passe incorrecte.");
        } 
    }
    else{
        throw new Exception(" Cet utilisateur n'existe pas.");
    }
}