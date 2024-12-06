<?php

// json decode
// file_get_contents
//password_hash
//password verify

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
    var_dump($message);
}


function quitter(){
    
    session_destroy();
    setcookie(session_name(), '', time()-1, "/");
    //accueil();
    echo 'accueil';
}
function login($nom, $mdp){
    $nom_user = new utilisateurs();
    $user = $nom_user->GetUser($nom);

    if(!empty($user)){
        if($mdp == $user[0]['MotDePasse']){
            $_SESSION['acces'] = $user[0]['Nom'];
            accueil_connecté();
        }
        else{
            accueil();
        } 
    }
    else{

        throw new Exception("Identifiant ou nom d'utilisateur incorrecte");
        connexion();
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