<?php

session_start();

//lien vers le controleur

require 'config/config.php';
require "controleur/controleur.php";

// appel de la fonction accueil dans le controlleur qui permet d'afficher (normalement) l'index

try {
    if (isset($_SESSION['acces'])) {
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "Ruches") {
                ruches();
            } else if ($_GET['page'] == 'Notes') {
                notes();
            } else if ($_GET['page'] == 'Gestion') {
                gestion_ruches();
            }
            else if($_GET['page'] == 'quitter'){
                quitter();
            }
            else {
                accueil_connecté();
            }
        } else {
            accueil_connecté();

        }
    } else {
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'Connexion') {
                $erreur = '';
                connexion($erreur);
            } else if ($_GET['page'] == 'Inscription') {
                $erreur = '';
                inscription($erreur);
            } else if ($_GET['page'] == 'login') {
                login($_POST['email'], $_POST['MDP']);
            } else if($_GET['page'] == 'signin'){
                signin($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['MDP'], $_POST['MDP2']);
            }
            else {
                accueil();
            }
        } else {
            accueil();
        }
    }

} catch (Exception $e) {
    erreur($e->getMessage());
}