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

function inscription(){
    require "vue/vueInscription.php";
}

function erreur($message){
    require "vue/vueErreur.php";
}

function login($nom, $mdp){
    var_dump($nom, $mdp);
    $nom_user = new utilisateurs();
    $user = $nom_user->GetUser($nom);
    var_dump($user);

    if(!empty($user)){
        if($mdp == $user[0]['MotDePasse']){
            $_SESSION['acces'] = $nom;
            accueil_connecté();
        }
        else{
            var_dump('liar');
            accueil();
        } 
    }
    else{
        accueil();
    }
}
function signin($nom, $mdp){
    $insc = new inscrit();

    if(!empty($nom) && !empty($mdp)){

        $all = $insc->check();
        $insc->inscrire($nom, $mdp);
        foreach($all as $value){
            // if($nom == $value['nom']){
            //     throw new Exception(" Nom d'utilisateur déjà utilisé");
            // }
            var_dump($value);
        }

    }
    else{
        throw new Exception(" Veuillez saisir un nom d'utilisateur valide");
    }


    acces();
}