<?php 

require_once "modèle/database.php";


class ruches extends database {
    /*******************************************************
    Retourne la liste des articles
    Entrée :
    Retour :
    [array] : Tableau associatif contenant la liste des articles
    *******************************************************/
    public function checkruche($idruche)
    {
        
        $data = array($idruche);

        $req = 'SELECT * from ruches WHERE ID_Ruches = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }
    public function checkgerer($iduser, $idruche)
    {
        $req = 'SELECT * FROM `gérer` WHERE Id_utilisateur = '.$iduser.' AND ID_Ruches = '.$idruche.';';

        $user = $this->execReq($req);

        return $user;
    }
    public function ajouter($nom, $id){
        $req = "INSERT INTO `ruches` (`ID_Ruches`, `nom`) VALUES ('".$id."', '".$nom."');";
        $this->execReq($req);
    }

    public function gerant($gerant, $ruche){
        $req = "INSERT INTO `gérer` (`Id_utilisateur`, `ID_Ruches`, `gérer`) VALUES ('".$gerant."', '".$ruche."', NULL);";
        $this->execReq($req);
    }

    public function update($nom, $newidruche, $ancienid){
        $req = "UPDATE `ruches` SET `ID_Ruches` = '".$newidruche."', `nom` = '".$nom."' WHERE `ruches`.`ID_Ruches` = ".$ancienid.";";
        $this->execReq($req);
    }
    public function updategerant($idancien, $newid, $user){
        var_dump($idancien);
        $req = "UPDATE `gérer` SET `ID_Ruches` = '".$newid."' WHERE `gérer`.`Id_utilisateur` = ".$user." AND `gérer`.`ID_Ruches` = ".$idancien.";";
        $this->execReq($req);
    }


    public function getruches($user){
        $data = array($user);

        $req = 'SELECT * FROM ruches INNER JOIN gérer ON gérer.ID_Ruches=ruches.ID_Ruches WHERE Id_utilisateur = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }

    public function supprimer($id){
        $data = array($id);

        $req = 'DELETE FROM ruches WHERE `ruches`.`ID_Ruches` = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }

    public function deletuser($id){
        $data = array($id);

        $req = 'DELETE FROM gérer WHERE `gérer`.`ID_Ruches` = ?';

        $user = $this->execReqPrep($req, $data);

        return $user;
    }
}