<?php 
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/front/API.controller.php";
require_once "controllers/back/admin.controller.php";
require_once "controllers/back/statut.controller.php";
require_once "controllers/back/oiseaux.controller.php";
$apiController = new APIController();
$adminController = new AdminController();
$statutsController = new statutsController();
$oiseauxController = new OiseauxController();

try{
    if(empty($_GET['page'])){
        throw new Exception("La page n'existe pas");
    } else {
        $url = explode("/",filter_var($_GET['page'],FILTER_SANITIZE_URL));
        if(empty($url[0]) || empty($url[1])) throw new Exception ("La page n'existe pas");
        switch($url[0]){
            case "front" : 
                switch($url[1]){
                    case "oiseaux": 
                        if(!isset($url[2]) || !isset($url[3])){
                            $apiController -> getOiseaux(-1,-1);
                        } else {
                            $apiController -> getOiseaux((int)$url[2],(int)$url[3]);
                        }
                    break;
                    case "oiseau": 
                        if(empty($url[2])) throw new Exception ("L'identifiant de l'oiseau est manquant");
                        $apiController -> getOiseau($url[2]);
                    break;
                    case "alimentation": $apiController -> getAlimentation();
                    break;
                    case "statut": $apiController -> getStatut();
                    break;
                    case "sendMessage" : $apiController -> sendMessage();
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            case "back" : 
                switch($url[1]){
                    case "login" : $adminController->getPageLogin();
                    break;
                    case "connexion" : $adminController->connexion();
                    break;
                    case "admin" : $adminController->getAccueilAdmin();
                    break;
                    case "deconnexion" : $adminController->deconnexion();
                    break;
                    case "statuts" :
                        if(!isset($url[2])){throw new Exception ("La page n'existe pas");}
                        switch($url[2]){
                            case "visualisation" : $statutsController->visualisation();
                            break;
                            case "validationSuppression" : $statutsController->suppression();
                            break;
                            case "validationModification" : $statutsController->modification($url[3]);
                            break;
                            case "creation" : $statutsController->creationTemplate();
                            break;
                            case "creationValidation" : $statutsController->creationValidation();
                            break;
                            default : throw new Exception ("La page n'existe pas");
                        }
                    break;
                    case "oiseaux" :
                        if(!isset($url[2])){throw new Exception ("La page n'existe pas");}
                        switch($url[2]){
                            case "visualisation" : $oiseauxController->visualisation();
                            break;
                            case "validationSuppression" : $oiseauxController->suppression();
                            break;
                            case "creation" : $oiseauxController->creation();
                            break;
                            case "creationValidation" : $oiseauxController->creationValidation();
                            break;
                            case "modification" : $oiseauxController->modification($url[3]);
                            break;
                            case "modificationValidation" : $oiseauxController->modificationValidation();
                            break;
                            default : throw new Exception ("La page n'existe pas");
                        }
                    break;
                    default : throw new Exception ("La page n'existe pas");
                }
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
} catch (Exception $e){
    $msg = $e->getMessage();
    echo $msg;
    echo "<a href='".URL."back/login'>login</a>";
}
