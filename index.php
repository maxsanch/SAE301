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
                $erreur = '';
                gestion_ruches($erreur);
            } else if ($_GET['page'] == 'modif') {
                if (isset($_GET['ruche'])) {
                    $erreur = '';
                    modification_ruches($erreur);
                } else {
                    $erreur = "";
                    gestion_ruches($erreur);
                }
            } else if ($_GET['page'] == 'quitter') {
                quitter();
            } else if ($_GET['page'] == 'ajoutRuche') {
                ajout($_POST['nomruche'], $_POST['id_ruche']);
            } else if ($_GET['page'] == 'modifier') {

                change($_POST['nomruche'], $_POST['id_ruche'], $_GET['ruche']);

            } else if ($_GET['page'] == 'suppression') {
                supprimer($_GET['ruche']);
            } else if ($_GET['page'] == 'Utilisateurs') {
                $message = '';
                utilisateurs($message);
            } else if ($_GET['page'] == 'Refuser') {
                refuser($_GET['idDemande']);
            } else if ($_GET['page'] == 'accepter') {
                accepter($_GET['IdRuche'], $_GET['IdUtilisateur'], $_GET['NomRuche'], $_GET['idDemande']);
            } else {
                $user = checkstatut();
                if ($user[0]['Statut'] == 'admin') {
                    accueil_admin();
                } else {
                    accueil_connecté();
                }
            }
        } else {
            $user = checkstatut();
            if ($user[0]['Statut'] == 'admin') {
                accueil_admin();
            } else {
                accueil_connecté();
            }
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
            } else if ($_GET['page'] == 'signin') {
                signin($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['MDP'], $_POST['MDP2']);
            } else {
                accueil();
            }
        } else {
            accueil();
        }
    }

} catch (Exception $e) {
    erreur($e->getMessage());
}