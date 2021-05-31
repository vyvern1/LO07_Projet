
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerAccueil.php');


// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//Modification du routeur pour prendre en compte l'ensemble des parametres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinCreate" :
 case "vaccinCreated" :
 case "vaccinUpdate" :
 case "vaccinUpdated" :
  ControllerVaccin::$action($args);
  break;

 case "centreReadAll" :
 case "centreCreate" :
 case "centreCreated" :
  ControllerCentre::$action($args);
  break;

 case "patientReadAll" :
 case "patientCreate" :
 case "patientCreated" :
  ControllerPatient::$action($args);
  break;

  case "stockReadAll" :
  case "stocktReadDoses" :
  case "StockUpdate" :
  case "StockUpdated" :
    ControllerStock::$action($args);
    break;

 // Tache par défaut
 default:
  $action = "Accueil";
  ControllerAccueil::$action();
}
?>
<!-- ----- Fin Router -->

