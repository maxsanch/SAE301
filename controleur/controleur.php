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


function connexion($erreur){
    require "vue/vueConnexion.php";
}

function inscription(){
    require "vue/vueInscription.php";
}

function erreur($message){
    echo $message;
}


function quitter(){
    
    session_destroy();
    setcookie(session_name(), '', time()-1, "/");
    accueil();
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
            $erreur = '<b>mot de passe incorrecte.</b>';
            connexion($erreur);
        } 
    }
    else{
        $erreur = '<b>Identifiant invalide</b>';
        connexion($erreur);
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