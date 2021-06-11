<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
 
   // --- Liste des Vaccins
   public static function vaccinReadAll() {
      $results = ModelVaccin::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewAll.php';
      if (DEBUG)
       echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
      require ($vue);
   }


   // Affiche le formulaire de creation d'un Vaccin
   public static function vaccinCreate() {
      $info = "<h3>Création d'un vaccin</h3>";

      $hidden = array(
         array("action", 'vaccinCreated')
      );
      $option = NULL;
      $label = array (
         array("label", "text"),
         array("doses", "number")
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInsert.php';
      require ($vue);
   }

   // Affiche un formulaire pour récupérer les informations d'un nouveau Vaccin.
   // La clé est gérée par le systeme et pas par l'internaute
   public static function vaccinCreated() {
      // ajouter une validation des informations du formulaire
      ModelVaccin::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));

      $info = "<h3>Création d'un vaccin</h3>";

      $results = array (
         array("vaccin", $_GET['label']),
         array("doses", $_GET['doses'])
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInserted.php';
      require ($vue);
   }

   public static function vaccinUpdate() {
      $results_vaccin = ModelVaccin::getAll();

      $info = "<h3>Mise à jour d'un vaccin</h3>";
      
      $hidden = array(
         array("action", 'vaccinUpdated')
      );
      $option = array(
         array("id", $results_vaccin)
      );
      $label = array (
         array("doses", "number")
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInsert.php';
      require ($vue);
   }

   public static function vaccinUpdated() {
      $vaccin = ModelVaccin::getLabelVaccin($_GET['id']);
      ModelVaccin::update(htmlspecialchars($_GET['id']), htmlspecialchars($_GET['doses']));

      $info = "<h3>Mise à jour d'un vaccin</h3>";

      $results = array (
         array("vaccin", $vaccin[0][0]),
         array("doses", $_GET['doses'])
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInserted.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin ControllerVaccin -->


