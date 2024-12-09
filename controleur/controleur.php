<?php

// json decode
// file_get_contents
//password_hash
//password verify

require_once "modèle/utilisateurs.php";
require_once "modèle/ruches.php";

function accueil()
{
    require "vue/vueIndex.php";
}

function accueil_connecté()
{
    require "vue/vueIndexConnecte.php";
}
function accueil_admin()
{
    require "vue/vueIndexConnecteAdmin.php";
}

function connexion($erreur)
{
    require "vue/vueConnexion.php";
}

function inscription($erreur)
{
    require "vue/vueInscription.php";
}

function erreur($message)
{
    echo $message;
}


function quitter()
{
    session_destroy();
    setcookie(session_name(), '', time() - 1, "/");
    accueil();
}
function login($nom, $mdp)
{
    $nom_user = new utilisateurs();
    $user = $nom_user->GetUser($nom);
    if (!empty($user)) {
        if (password_verify($mdp, $user[0]['MotDePasse'])) {
            $_SESSION['acces'] = $user[0]['Mail'];
            if ($user[0]['Statut'] == 'admin') {
                accueil_admin();
            } else {
                accueil_connecté();
            }
        } else {
            $erreur = '<b>mot de passe incorrecte.</b>';
            connexion($erreur);
        }
    } else {
        $erreur = '<b>Identifiant invalide</b>';
        connexion($erreur);
    }
}
function signin($prenom, $nom, $email, $mdp, $mdp2)
{
    $insc = new utilisateurs();

    if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($mdp) && !empty($mdp2)) {
        if ($mdp == $mdp2) {
            $mdpgood = password_hash($mdp, PASSWORD_DEFAULT);
            echo $mdpgood;
            $insc->inscrire($prenom, $nom, $email, $mdpgood);
            $user = $insc->GetUser($email);
            $_SESSION['acces'] = $user[0]['Mail'];
            accueil_connecté();

        } else {
            $erreur = "<b>Les mots de passe ne correspondent pas.</b>";
            inscription($erreur);
        }
    } else {
        $erreur = "<b>Veillez à remplir tout les champs</b>";
        inscription($erreur);
    }
}

function ruches()
{
    $getuser = new utilisateurs();
    $utilisateur = $getuser->GetUser($_SESSION['acces']);
    $ruche = new ruches();
    $getruche = $ruche->getruches($utilisateur[0]['Id_utilisateur']);

    $fichier = file_get_contents("js/data_ruche.json");
    $ruches = json_decode($fichier);

    //$i="000001";




    require "vue/vueInfoRuches.php";
}

function gestion_ruches($erreur)
{

    $ruches = new ruches();
    $checkuser = new utilisateurs();
    $user = $checkuser->GetUser($_SESSION['acces']);

    $mesruches = $ruches->getruches($user[0]['Id_utilisateur']);

    require "vue/vueGestionRuches.php";
}

function modification_ruches($erreur)
{
    $ruches = new ruches();
    $checkuser = new utilisateurs();
    $user = $checkuser->GetUser($_SESSION['acces']);
    $mesruches = $ruches->getruches($user[0]['Id_utilisateur']);
    require "vue/modificationRuche.php";
}


function notes()
{
    require "vue/vueNotes.php";
}

function ajout($nom, $id)
{
    var_dump($id);
    $checkuser = new utilisateurs();
    $addruche = new ruches();
    $user = $checkuser->GetUser($_SESSION['acces']);

    if (!empty($user)) {


        if (!empty($nom) && !empty($id)) {

            $verif = $addruche->checkruche($id);

            if (!empty($verif)) {
                $verifuser = $addruche->checkgerer($user[0]['Id_utilisateur'], $id);

                if (!empty($verifuser)) {
                    $erreur = 'Vous êtes déjà administrateur de cette ruche.';
                    gestion_ruches($erreur);
                } else {

                    $addruche->gerant($user[0]['Id_utilisateur'], $id);
                    $erreur = 'Ruche déjà enregistrée, vous êtes maintenant administrateur de la ruche.';
                    gestion_ruches($erreur);
                }
            } else {
                $erreur = 'inscription réussie';
                $addruche->ajouter($nom, $id);
                $addruche->gerant($user[0]['Id_utilisateur'], $id);
                gestion_ruches($erreur);
            }

        } else {
            $erreur = 'veuillez remplir les champs obligatoires';
            gestion_ruches($erreur);
        }
    } else {
        $erreur = 'inscription échouée';
        gestion_ruches($erreur);
    }
}

function change($nom, $id, $idancien)
{

    $checkuser = new utilisateurs();
    $addruche = new ruches();
    $user = $checkuser->GetUser($_SESSION['acces']);


    if (!empty($user)) {
        if ($id == $idancien) {

            if (!empty($nom) && !empty($id)) {
                $addruche->update($nom, $id, $idancien);
                $addruche->updategerant($idancien, $id, $user[0]['Id_utilisateur']);
                $erreur = 'La ruche à bien été modifiée.';
                modification_ruches($erreur);
            } else {
                $erreur = 'veuillez remplir les champs obligatoires';
                modification_ruches($erreur);
            }
        } else {
            $verif = $addruche->checkruche($id);
            var_dump($verif);
            if (!empty($verif)) {
                var_dump('test');
                $erreur = 'Cet ID est déjà utilisé pour une autre ruche.';
                modification_ruches($erreur);
            } else {
                if (!empty($nom) && !empty($id)) {
                    $addruche->update($nom, $id, $idancien);
                    $addruche->updategerant($idancien, $id, $user[0]['Id_utilisateur']);
                    $erreur = 'La ruche à bien été modifiée.';
                    modification_ruches($erreur);
                } else {
                    $erreur = 'veuillez remplir les champs obligatoires';
                    modification_ruches($erreur);
                }
            }
        }

    } else {
        $erreur = 'inscription échouée';
        modification_ruches($erreur);
    }
}

function supprimer($id)
{

    $spr = new ruches();
    $spr->supprimer($id);
    $spr->deletuser($id);
    $erreur = "La ruche à bien été supprimée.";
    gestion_ruches($erreur);
}