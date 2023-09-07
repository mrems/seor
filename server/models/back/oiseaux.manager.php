<?php

require_once "models/Model.php";

class OiseauxManager extends Model{
    public function getOiseaux(){
        $req = "SELECT * from oiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $oiseaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $oiseaux;
    }

    public function deleteDBOiseauAlimentation($idOiseau){
        $req ="Delete from oiseau_alimentation where oiseau_id= :idOiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteDBOiseau($idOiseau){
        $req ="Delete from oiseau where oiseau_id= :idOiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateOiseau($idOiseau,$nom,$description,$image,$statut){
        $req ="Update oiseau 
        set oiseau_nom = :nom, oiseau_description = :description, oiseau_image = :image, statut_id = :statut
        where oiseau_id= :idOiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function createOiseaux($nom,$description,$image,$statut){
        $req ="Insert into oiseau (oiseau_nom,oiseau_description,oiseau_image,statut_id)
            values (:libelle,:description,:image,:statut)
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":libelle",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return $this->getBdd()->lastInsertId();
    }

    public function getOiseau($idOiseau){
        $req = "SELECT o.oiseau_id, oiseau_nom, oiseau_description, oiseau_image, o.statut_id, alimentation_id from oiseau o
            inner join statut s on o.statut_id=s.statut_id 
            left join oiseau_alimentation oa on oa.oiseau_id = o.oiseau_id
            WHERE o.oiseau_id = :idOiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->execute();
        $lignesOiseau = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $lignesOiseau;
    }

    public function getImageOiseau($idOiseau){
        $req = "SELECT oiseau_image from oiseau where oiseau_id = :idOiseau";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idOiseau",$idOiseau,PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $image['oiseau_image'];
    }
}