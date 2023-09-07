<?php

require_once "models/Model.php";

class StatutsManager extends Model{
    public function getStatuts(){
        $req = "SELECT * from statut";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $statuts;
    }

    public function deleteDBstatut($idStatut){
        $req ="Delete from statut where statut_id= :idStatut";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function compterOiseaux($idStatut){
        $req ="Select count(*) as 'nb'
        from statut s inner join oiseau o on o.statut_id = s.statut_id
        where s.statut_id = :idStatut";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['nb'];
    }

    public function updateStatut($idStatut,$statut,$description){
        $req ="Update statut set statut = :statut, description = :description
        where statut_id= :idStatut";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
        $stmt->bindValue(":statut",$statut,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createStatut($statut,$description){
        $req ="Insert into statut (statut,description)
            values (:statut,:description)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":statut",$statut,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }
}