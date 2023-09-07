<?php
require_once "./controllers/back/Securite.class.php";
require_once "./models/back/statuts.manager.php";

class StatutsController{
    private $statutsManager;

    public function __construct(){
        $this->statutsManager = new StatutsManager();
    }

    public function visualisation(){
        if(Securite::verifAccessSession()){
            $statuts = $this->statutsManager->getStatuts();
            require_once "views/statutsVisualisation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function suppression(){
        if(Securite::verifAccessSession()){
            $idStatut = (int)Securite::secureHTML($_POST['statut_id']);
            
            if($this->statutsManager->compterOiseaux($idStatut) > 0){
                $_SESSION['alert'] = [
                    "message" => "Le statut n'a pas été supprimé",
                    "type" => "alert-danger"
                ];
            } else {
                $this->statutsManager->deleteDBstatut($idStatut);
                $_SESSION['alert'] = [
                    "message" => "Le statut est supprimé",
                    "type" => "alert-success"
                ];
            }
           
            header('Location: '.URL.'back/statuts/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modification(){
        if(Securite::verifAccessSession()){
            $idStatut = (int)Securite::secureHTML($_POST['statut_id']);
            $statut = Securite::secureHTML($_POST['statut']);
            $description = Securite::secureHTML($_POST['description']);
            $this->statutsManager->updateStatut($idStatut,$statut,$description);

            $_SESSION['alert'] = [
                "message" => "Le statut a bien été modifiée",
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/statuts/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationTemplate(){
        if(Securite::verifAccessSession()){
            require_once "views/statutCreation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $statut = Securite::secureHTML($_POST['statut']);
            $description = Securite::secureHTML($_POST['description']);
            $idStatut = $this->statutsManager->createStatut($statut,$description);

            $_SESSION['alert'] = [
                "message" => "Le statut a bien été créée avec l'identifiant : ".$idStatut,
                "type" => "alert-success"
            ];

            header('Location: '.URL.'back/statuts/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
}