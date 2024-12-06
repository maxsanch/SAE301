<?php

session_start();

//lien vers le controleur

require 'config/config.php';
require "controleur/controleur.php";

// appel de la fonction accueil dans le controlleur qui permet d'afficher (normalement) l'index




try{
    if(isset($_SESSION['acces'])){  
        if(isset($_GET['page'])){
            if($_GET['page'] == "Ruches"){
                ruches();
            }
            else if($_GET['page'] == 'Notes'){
                notes();
            }
            else if($_GET['page'] == 'Gestion'){
                gestion_ruches();
            }
        }
     else{
        accueil_connecté();
        }
    }
    else{
        if(isset($_GET['page'])){
            if($_GET['page'] == 'Connexion'){
                connexion();
            }  
            else if($_GET['page'] == 'Inscription'){
                inscription();
            } 
            else if($_GET['page'] == 'login'){
                login($_POST['email'], $_POST['MDP']);
            }
            else{
                accueil();
            }
        }
        else{
            accueil();
        }
    }

}
catch(Exception $e){
    erreur($e->getMessage());
}