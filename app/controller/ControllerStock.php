<!-- ----- debut Controllerstock -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelCentre.php';


class ControllerStock {
 
   // --- Liste des stocks
   public static function stockReadAll() {
      $results = ModelStock::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewAll.php';
      if (DEBUG)
       echo ("ControllerStock : stockReadAll : vue = $vue");
      require ($vue);
   }

   public static function stocktReadDoses() {
      $results = ModelStock::getAllDoses();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewAll.php';
      if (DEBUG)
       echo ("ControllerStock : stockReadAll : vue = $vue");
      require ($vue);
   }

   public static function stockUpdate() {
      $results_vaccin = ModelVaccin::getAll();
      $results_centre = ModelCentre::getAll();

      $info = "<h3>Mise à jour des stocks</h3>";


      $hidden = array(
         array("action", 'stockUpdated')
      );
      $option = array(
         array("centre_id", $results_centre),
         array("vaccin_id", $results_vaccin)
      );
      $label = array (
         array("quantite", "number")
      );

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInsert.php';
      require ($vue);
   }

   public static function stockUpdated() {
      $results = ModelStock::update(htmlspecialchars($_GET['centre_id']), htmlspecialchars($_GET['vaccin_id']), htmlspecialchars($_GET['quantite']));
      $objet = "stock";
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInserted.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin Controllerstock -->


