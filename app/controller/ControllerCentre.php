<!-- ----- debut ControllerCentre -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {
 
   // --- Liste des Centres
   public static function centreReadAll() {
      $results = ModelCentre::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewAll.php';
      if (DEBUG)
       echo ("ControllerCentre : centreReadAll : vue = $vue");
      require ($vue);
   }


   // Affiche le formulaire de creation d'un Centre
   public static function centreCreate() {
      $info = "<h3>Création d'un centre</h3>";
      $option = NULL;
      $hidden = array(
         array("action", 'centreCreated')
      );
      $label = array (
         array("label", "text"),
         array("adresse", "text")
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInsert.php';
      require ($vue);
   }

   // Affiche un formulaire pour récupérer les informations d'un nouveau Centre.
   // La clé est gérée par le systeme et pas par l'internaute
   public static function centreCreated() {
      // ajouter une validation des informations du formulaire
      $results = ModelCentre::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse']));
      $objet = "centre";      
      
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInserted.php';
      require ($vue);
   }

}
?>
<!-- ----- fin ControllerCentre -->


