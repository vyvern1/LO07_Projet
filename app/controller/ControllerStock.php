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
         array("centre_id", $results_centre)
      );

      for ($i=1; $i <= sizeof($results_vaccin); $i++) { 
         $label[$i-1][0] = $results_vaccin[$i-1][1];
         $label[$i-1][1] = 'number';
      }

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInsert.php';
      require ($vue);
   }

   public static function stockUpdated() {
      $centre = ModelCentre::getLabelCentre($_GET['centre_id']);
      $results[0][0] = 'centre';
      $results[0][1] = $centre[0][0];

      $results_vaccin = ModelVaccin::getAll();
      for ($i=1; $i <= sizeof($results_vaccin) ; $i++) {
         ModelStock::update(htmlspecialchars($_GET['centre_id']), $results_vaccin[$i-1][0] , htmlspecialchars($_GET[$results_vaccin[$i-1][1]]));
         $results[$i][0] = $results_vaccin[$i-1][1];
         if ($_GET[$results_vaccin[$i-1][1]] != null) {
            $results[$i][1] = $_GET[$results_vaccin[$i-1][1]];
         }
         else {
            $results[$i][1] = 0;
         }
      }
      
      $info = "<h3>Mise à jour des stock</h3>";

      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInserted.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin Controllerstock -->


