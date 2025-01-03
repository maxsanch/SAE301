<?php

require_once "modèle/database.php";


class utilisateurs extends database
{
    /*******************************************************
    Retourne la liste des articles
    Entrée :
    Retour :
    [array] : Tableau associatif contenant la liste des articles
    *******************************************************/

    public function GetUser($iduser)
    {
        $data = array($iduser);

        $req = 'SELECT * from utilisateurs WHERE mail = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }
    public function GetUserbyID($iduser)
    {
        $data = array($iduser);

        $req = 'SELECT Nom, Prenom, Mail, MotDePasse, Statut, Id_utilisateur, DATE_FORMAT(connexion, "%d / %m / %Y") as connexion, DATE_FORMAT(inscription, "%d / %m / %Y") as inscription from utilisateurs WHERE Id_utilisateur = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }

    public function inscrire($prenom, $nom, $email, $mdpgood)
    {
        var_dump(date('Y-m-d'));
        $req = "INSERT INTO `utilisateurs` (`Id_utilisateur`, `Nom`, `Prenom`, `MotDePasse`, `Mail`, `Statut`, `connexion`, `inscription`) VALUES (NULL, '" . $nom . "', '" . $prenom . "', '" . $mdpgood . "', '" . $email . "', 'utilisateur', '" . date('Y-m-d') . "', '" . date('Y-m-d') . "');)";
        $this->execReq($req);
    }

    public function check()
    {
        $req = "SELECT * from utilisateurs";
        $all = $this->execReq($req);
        return $all;
    }

    public function GetUserAdmin()
    {
        $req = "SELECT Prenom, Id_utilisateur, DATE_FORMAT(connexion, '%d / %m / %Y') as connexion from utilisateurs";
        $users = $this->execReq($req);
        return $users;
    }

    public function updatedate($id)
    {
        $req = "UPDATE `utilisateurs` SET `connexion` = '" . date('Y-m-d') . "' WHERE `utilisateurs`.`Id_utilisateur` = " . $id . ";";
        $this->execReq($req);
    }
    public function updateUserPhoto($idArt)
    {
        if (isset($_FILES['photoUser'])) {
            if ($_FILES['photoUser']["error"] == 0) {
                if ($_FILES['photoUser']["size"] <= 20000000) {
                    $infosfichier = new SplFileInfo($_FILES['photoUser']['name']);
                    $extension_upload = $infosfichier->getExtension();
                    $extensions_autorisees = array('jpg', 'png');
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        if (is_dir('img/imported')) {
                            // Stockage définitif du fichier photo dans le dossier "uploads"
                            move_uploaded_file(
                                $_FILES['photoUser']['tmp_name'],
                                'img/imported/' . $idArt . "." . $extension_upload
                            );
                            echo "Transfert du fichier <b>" . $_FILES['photoUser']['name'] . "</b> effectué !";
                        } else {
                            mkdir('img/imported');
                            // Stockage définitif du fichier photo dans le dossier "uploads"
                            move_uploaded_file(
                                $_FILES['photoUser']['tmp_name'],
                                'img/imported/' . $idArt . "." . $extension_upload
                            );
                            echo "Transfert du fichier <b>" . $_FILES['photoUser']['name'] . "</b> effectué !";
                        }

                    } else {
                        $erreur2 = "extension incompatible";
                        $erreur3 = '';
                        $erreur1 = '';
                        gestion_ruches($erreur1, $erreur2, $erreur3);
                    }
                } else {
                    $erreur2 = "fichier trop volumineux";
                    $erreur3 = '';
                    $erreur1 = '';
                    gestion_ruches($erreur1, $erreur2, $erreur3);
                }
            } else {
                $erreur2 = "Une erreur est survenue";
                $erreur3 = '';
                $erreur1 = '';
                gestion_ruches($erreur1, $erreur2, $erreur3);
            }
        }
    }

    public function edituserwithpdw($nom, $prenom, $mdpgood, $iduser)
    {
        $req = "UPDATE `utilisateurs` SET `Prenom` = '" . $prenom . "', `Nom` = '" . $nom . "', `MotDePasse` = '" . $mdpgood . "' WHERE `utilisateurs`.`Id_utilisateur` = " . $iduser . ";";
        $this->execReq($req);
    }
    public function editusernopdw($nom, $prenom, $iduser)
    {
        $req = "UPDATE `utilisateurs` SET `Prenom` = '" . $prenom . "', `Nom` = '" . $nom . "' WHERE `utilisateurs`.`Id_utilisateur` = " . $iduser . ";";
        $this->execReq($req);
    }

    public function changepasswordadmin($id, $mdp1){
        $req = "UPDATE `utilisateurs` SET `MotDePasse` = '$mdp1' WHERE `utilisateurs`.`Id_utilisateur` = $id;";
        $this->execReq($req);
    }
}