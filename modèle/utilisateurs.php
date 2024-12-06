<?php 

require_once "modèle/database.php";


class utilisateurs extends database {
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
    
    public function inscrire($prenom, $nom, $email, $mdpgood){
        $req = "INSERT INTO `utilisateurs` (`Id_utilisateur`, `Nom`, `Prenom`, `MotDePasse`, `Mail`, `Statut`) VALUES (NULL, '".$prenom."', '".$nom."', '".$mdpgood."', '".$email."', 'utilisateur');)";
        $this->execReq($req);
    }
    
    public function check(){
        $req = "SELECT * from utilisateurs";
        $all = $this->execReq($req);
        return $all;
    }
    
}