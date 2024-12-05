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
        $req = 'SELECT * from utilisateurs WHERE Nom = ?';
        $user = $this->execReqPrep($req, $data);
        return $user;
    }
    
    public function inscrire($nom, $mdp){
        $req = "INSERT INTO `inscrits` (`id_inscription`, `Nom`, `mdp`) VALUES (NULL, '".$nom."', '".$mdp."')";
        $this->execReq($req);
    }
    
    public function check(){
        $req = "SELECT * from inscrits";
        $all = $this->execReq($req);
        return $all;
    }
    
}