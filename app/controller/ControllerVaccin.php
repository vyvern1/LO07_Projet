<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
 
   // --- Liste des Vaccins
   public static function vaccinReadAll() {
      $results_vaccin = ModelVaccin::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/vaccin/viewAll.php';
      if (DEBUG)
       echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
      require ($vue);
   }


   // Affiche le formulaire de creation d'un Vaccin
   public static function vaccinCreate() {
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/vaccin/viewInsert.php';
      require ($vue);
   }

   // Affiche un formulaire pour récupérer les informations d'un nouveau Vaccin.
   // La clé est gérée par le systeme et pas par l'internaute
   public static function vaccinCreated() {
      // ajouter une validation des informations du formulaire
      $results_vaccin = ModelVaccin::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/vaccin/viewInserted.php';
      require ($vue);
   }

   public static function vaccinUpdate() {
      $results_vaccin = ModelVaccin::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/vaccin/viewUpdate.php';
      require ($vue);
   }

   public static function vaccinUpdated() {
      $results_vaccin = ModelVaccin::update(htmlspecialchars($_GET['id']), htmlspecialchars($_GET['doses']));
   
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/vaccin/viewUpdated.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin ControllerVaccin -->


