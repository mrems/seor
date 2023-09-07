<?php
require_once "models/Model.php";

class APIManager extends Model{
    public function getDBOiseaux($idStatut, $idAlimentation){
        $whereClause = "";
        if($idStatut !== -1 || $idAlimentation !== -1) $whereClause .= "WHERE ";
        if($idStatut !== -1) $whereClause .= "s.statut_id = :idStatut";
        if($idStatut !== -1 && $idAlimentation !== -1)  $whereClause .=" AND ";
        if($idAlimentation !== -1) $whereClause .= "o.oiseau_id IN (
            select oiseau_id from oiseau_alimentation where alimentation_id = :idAlimentation
        )";

        $req = "SELECT o.oiseau_id, oiseau_nom, oiseau_description, oiseau_image, s.statut_id, statut, s.description, a.alimentation_id, alimentation
        from oiseau o inner join statut s on s.statut_id = o.statut_id
        left join oiseau_alimentation oa on oa.oiseau_id = o.oiseau_id
        left join alimentation a on a.alimentation_id = oa.alimentation_id ".$whereClause;
        $stmt = $this->getBdd()->prepare($req);
        if($idStatut !== -1) $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
        if($idAlimentation !== -1) $stmt->bindValue(":idAlimentation",$idAlimentation,PDO::PARAM_INT);
        $stmt->execute();
        $oiseaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $oiseaux;
    }

    public function getDBOiseau($idOiseau){
        $req = "SELECT * 
        from oiseau o inner join statut s on s.statut_id = o.statut_id
        inner join oiseau_alimentation oa on oa.oiseau_id = o.oiseau_id
        inner join alimentation a on a.alimentation_id = oa.alimentation_id
        WHERE o.oiseau_id = :idOiseau
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->execute();
        $lignesOiseau = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignesOiseau;
    }

    public function getDBStatuts(){
        $req = "SELECT * 
        from statut
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $statuts;
    }
    public function getDBAlimentations(){
        $req = "SELECT * 
        from alimentation
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $alimentations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $alimentations;
    }
}