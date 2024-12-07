<?php

// json decode
// file_get_contents
//password_hash
//password verify

require_once "modèle/utilisateurs.php";
require_once "modèle/ruche.php";

function accueil(){
    require "vue/vueIndex.php";
}

function accueil_connecté(){
    require "vue/vueIndexConnecte.php";
}
function accueil_admin(){
    require "vue/vueIndexConnecteAdmin.php";
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
        if(password_verify($mdp, $user[0]['MotDePasse'])){
            $_SESSION['acces'] = $user[0]['Prenom'];
            if($user[0]['Statut'] == 'admin'){
                accueil_admin();
            }
            else{
                accueil_connecté();
            }
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
            $mdpgood = password_hash($mdp, PASSWORD_DEFAULT);
            echo $mdpgood;
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

function ruches(){
    require "vue/vueInfoRuches.php";
}

function gestion_ruches(){
    require "vue/vueGestionRuches.php";
}

function notes(){
    require "vue/vueNotes.php";
}

function ajout($nom, $id){
    $insc = new ruches();

    if(!empty($prenom) && !empty($nom) && !empty($email) && !empty($mdp) && !empty($mdp2)){
        if($mdp == $mdp2){
            $mdpgood = password_hash($mdp, PASSWORD_DEFAULT);
            echo $mdpgood;
            $insc->ajouter($nom, $id);
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