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
        var_dump(date('Y-m-d'));
        $req = "INSERT INTO `utilisateurs` (`Id_utilisateur`, `Nom`, `Prenom`, `MotDePasse`, `Mail`, `Statut`, `connexion`) VALUES (NULL, '".$prenom."', '".$nom."', '".$mdpgood."', '".$email."', 'utilisateur', '".date('Y-m-d')."');)";
        $this->execReq($req);
    }
    
    public function check(){
        $req = "SELECT * from utilisateurs";
        $all = $this->execReq($req);
        return $all;
    }

    public function GetUserAdmin(){
        $req = "SELECT Prenom, Id_utilisateur, DATE_FORMAT(connexion, '%d / %m / %Y') as connexion from utilisateurs";
        $users = $this->execReq($req);
        return $users;
    }

    public function updatedate($id){
        $req = "UPDATE `utilisateurs` SET `connexion` = '".date('Y-m-d')."' WHERE `utilisateurs`.`Id_utilisateur` = ".$id.";";
        $this->execReq($req);
    }
    
}