<?php
require_once "models/front/API.manager.php";
require_once "models/Model.php";

class APIController {
    private $apiManager;

    public function __construct(){
        $this->apiManager = new APIManager();
    }

    public function getOiseaux($idStatut,$idAlimentation){
        $oiseaux = $this->apiManager->getDBOiseaux($idStatut,$idAlimentation);
        $tabResultat = $this->formatDataLignesOiseaux($oiseaux);
        // echo "<pre>";
        // print_r($tabResultat);
        // echo "</pre>";
        Model::sendJSON($tabResultat);
    }

    public function getOiseau($idOiseau){
        $lignesOiseau = $this->apiManager->getDBOiseau($idOiseau);
        $tabResultat = $this->formatDataLignesOiseaux($lignesOiseau);
        // echo "<pre>";
        // print_r($tabResultat);
        // echo "</pre>";
        Model::sendJSON($tabResultat);
    }

    private function formatDataLignesOiseaux($lignes){
        $tab = [];
        
        foreach($lignes as $ligne){
            if(!array_key_exists($ligne['oiseau_id'],$tab)){
                $tab[$ligne['oiseau_id']] = [
                    "id" => $ligne['oiseau_id'],
                    "nom" => $ligne['oiseau_nom'],
                    "description" => $ligne['oiseau_description'],
                    "image" => URL."public/images/".$ligne['oiseau_image'],
                    "statut" => [
                        "idStatut" => $ligne['statut_id'],
                        "statut" => $ligne['statut'],
                        "descriptionStatut" => $ligne['description']
                    ]
                ];
            }
           
            $tab[$ligne['oiseau_id']]['alimentations'][] = [
                "idAlimentation" => $ligne['alimentation_id'],
                "alimentation" => $ligne['alimentation']
            ];
        }

        return $tab;
    }

    public function getAlimentation(){
        $alimentations = $this->apiManager->getDBAlimentations();
        Model::sendJSON($alimentations);
    }

    public function getStatut(){
        $statuts = $this->apiManager->getDBStatuts();
        Model::sendJSON($statuts);
    }

    public function sendMessage(){
      
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        $obj = json_decode(file_get_contents('php://input'));
        
        // $to = "mat_mail@ymail.com";
        // $subject = "Message du site SEOR : ".$obj->nom;
        // $message = $obj->contenu;
        // $headers = "From : ".$obj->email;
        // mail($to, $subject, $message, $headers);

        $messageRetour = [
            'from' => $obj->email,
            'to' => "mat_mail@ymail.com"
        ];

        echo json_encode($messageRetour);
    }
}