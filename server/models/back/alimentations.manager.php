<?php

require_once "models/Model.php";

class AlimentationsManager extends Model{
    public function getAlimentations(){
        $req = "SELECT * from alimentation";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $oiseaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $oiseaux;
    }

    public function addAlimentationOiseau($idOiseau,$idAlimentation){
        $req ="Insert into oiseau_alimentation (oiseau_id,alimentation_id)
        values (:idOiseau,:idAlimentation)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->bindValue(":idAlimentation",$idAlimentation,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteDBAlimentationOiseau($idOiseau,$idAlimentation){
        $req = "Delete from oiseau_alimentation 
        where oiseau_id = :idOiseau and alimentation_id = :idAlimentation";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->bindValue(":idAlimentation",$idAlimentation,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function verificationExisteOiseauAlimentation($idOiseau,$idAlimentation){
        $req = "Select count(*) as 'nb'
        from oiseau_alimentation oa
        where oa.oiseau_id = :idOiseau and oa.alimentation_id = :idAlimentation";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->bindValue(":idAlimentation",$idAlimentation,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if($resultat['nb'] >=1) return true;
        return false;
    }
}