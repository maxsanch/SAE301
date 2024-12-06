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

function inscription($erreur){
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
            $_SESSION['acces'] = $user[0]['Prenom'];
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
function signin($prenom, $nom, $email, $mdp, $mdp2){
    $insc = new utilisateurs();

    if(!empty($prenom) && !empty($nom) && !empty($email) && !empty($mdp) && !empty($mdp2)){
        if($mdp == $mdp2){
            $mdpgood = $mdp;
            $insc->inscrire($prenom, $nom, $email, $mdpgood);
            $user = $insc->GetUser($email);
            $_SESSION['acces'] = $user[0]['Prenom'];
            accueil_connecté();
            
        }
        else{
            $erreur = "<b>Les mots de passe ne correspondent pas.</b>";
            inscription($erreur);
        }
    }
    else{
        $erreur = "<b>Veillez à remplir tout les champs</b>";
        inscription($erreur);
    }
}