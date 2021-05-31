<!-- ----- debut Controllerstock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {
 
   // --- Liste des stocks
   public static function stockReadAll() {
      $results_stock = ModelStock::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/stock/viewAll.php';
      if (DEBUG)
       echo ("ControllerStock : stockReadAll : vue = $vue");
      require ($vue);
   }

   public static function stocktReadDoses() {
      $results_stock = ModelStock::getAllDoses();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/stock/viewAllDoses.php';
      if (DEBUG)
       echo ("ControllerStock : stockReadAll : vue = $vue");
      require ($vue);
   }

   public static function stockUpdate() {
      $results_vaccin = ModelVaccin::getAll();
      $results_centre = ModelCentre::getAll();

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/stock/viewUpdate.php';
      require ($vue);
   }

   public static function stockUpdated() {
      $results_stock = ModelStock::update(htmlspecialchars($_GET['centre_id']), htmlspecialchars($_GET['vaccin_id']), htmlspecialchars($_GET['quantite']));
   
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/stock/viewUpdated.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin Controllerstock -->


