<?php
require_once "./controllers/back/Securite.class.php";
require_once "./models/back/oiseaux.manager.php";
require_once "./models/back/statuts.manager.php";
require_once "./models/back/alimentations.manager.php";
require_once "./controllers/back/utile.php";

class OiseauxController{
    private $oiseauxManager;

    public function __construct(){
        $this->oiseauxManager = new OiseauxManager();
    }

    public function visualisation(){
        if(Securite::verifAccessSession()){
            $oiseaux = $this->oiseauxManager->getOiseaux();
            require_once "views/oiseauxVisualisation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function suppression(){
        if(Securite::verifAccessSession()){
            $idOiseau = (int)Securite::secureHTML($_POST['oiseau_id']);
            $image = $this->oiseauxManager->getImageOiseau($idOiseau);
            if(!empty($image))unlink("public/images/".$image);
            
            $this->oiseauxManager->deleteDBOiseauAlimentation($idOiseau);
            $this->oiseauxManager->deleteDBOiseau($idOiseau);
            $_SESSION['alert'] = [
                "message" => "L'oiseau est supprimé",
                "type" => "alert-success"
            ];
           
            header('Location: '.URL.'back/oiseaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creation(){
        if(Securite::verifAccessSession()){
            $statutManager = new StatutsManager();
            $statuts = $statutManager->getStatuts();
            $alimentationsManager = new AlimentationsManager();
            $alimentations = $alimentationsManager->getAlimentations();
            require_once "views/oiseauCreation.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function creationValidation(){
        if(Securite::verifAccessSession()){
            $nom = Securite::secureHTML($_POST['oiseau_nom']);
            $description = Securite::secureHTML($_POST['oiseau_description']);
            $image="";
            if($_FILES['image']['size'] > 0){
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['image'],$repertoire);
            }
            
            $statut = (int) Securite::secureHTML($_POST['statut_id']);

            $idOiseau = $this->oiseauxManager->createOiseaux($nom,$description,$image,$statut);

            $alimentationsManager = new AlimentationsManager();
            if(!empty($_POST['alimentation-1']))
                $alimentationsManager->addAlimentationOiseau($idOiseau,1);
            if(!empty($_POST['alimentation-2']))
                $alimentationsManager->addAlimentationOiseau($idOiseau,2);
            if(!empty($_POST['alimentation-3']))
                $alimentationsManager->addAlimentationOiseau($idOiseau,3);
            if(!empty($_POST['alimentation-4']))
                $alimentationsManager->addAlimentationOiseau($idOiseau,4);
            if(!empty($_POST['alimentation-5']))
                $alimentationsManager->addAlimentationOiseau($idOiseau,5);

            $_SESSION['alert'] = [
                "message" => "L'oiseau ".$nom." est créé !",
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/oiseaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modification($idOiseau){
        if(Securite::verifAccessSession()){
            $statutManager = new StatutsManager();
            $statuts = $statutManager->getStatuts();
            $alimentationsManager = new AlimentationsManager();
            $alimentations = $alimentationsManager->getAlimentations();

            $lignesOiseau = $this->oiseauxManager->getOiseau((int)Securite::secureHTML($idOiseau));
            $tabAlimentations = [];
            foreach($lignesOiseau as $alimentation){
                $tabAlimentations[] = $alimentation['alimentation_id'];
            }
            $oiseau = array_slice($lignesOiseau[0],0,5);

            require_once "views/oiseauModification.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }

    public function modificationValidation(){
        if(Securite::verifAccessSession()){
            $idOiseau = Securite::secureHTML($_POST['oiseau_id']);
            $nom = Securite::secureHTML($_POST['oiseau_nom']);
            $description = Securite::secureHTML($_POST['oiseau_description']);
            $image= $this->oiseauxManager->getImageOiseau($idOiseau);
            if($_FILES['image']['size'] > 0){
                unlink("public/images/".$image);
                $repertoire = "public/images/";
                $image = ajoutImage($_FILES['image'],$repertoire);
            }
            
            $statut = (int) Securite::secureHTML($_POST['statut_id']);

            $this->oiseauxManager->updateOiseau($idOiseau,$nom,$description,$image,$statut);
            
            $alimentations = [
                1 => !empty($_POST['alimentation-1']),
                2 => !empty($_POST['alimentation-2']),
                3 => !empty($_POST['alimentation-3']),
                4 => !empty($_POST['alimentation-4']),
                5 => !empty($_POST['alimentation-5']),
            ];

            $alimentationsManager = new AlimentationsManager;

            foreach ($alimentations as $key => $alimentation) {
                //alimentation coché et non présent en BD
                if($alimentations[$key] && !$alimentationsManager->verificationExisteOiseauAlimentation($idOiseau,$key)){
                    $alimentationsManager->addAlimentationOiseau($idOiseau,$key);
                }

                //alimentation non coché et présent en BD
                if(!$alimentations[$key] && $alimentationsManager->verificationExisteOiseauAlimentation($idOiseau,$key)){
                    $alimentationsManager->deleteDBAlimentationOiseau($idOiseau,$key);
                }
            }

            $_SESSION['alert'] = [
                "message" => "L'oiseau a bien été modifié",
                "type" => "alert-success"
            ];
            header('Location: '.URL.'back/oiseaux/visualisation');
        } else {
            throw new Exception("Vous n'avez pas le droit d'être là ! ");
        }
    }
}