<!-- ----- debut Controllerinnovation -->
<?php
require_once '../model/ModelInnovation.php';

class ControllerInnovation {
 
   // --- innovation1
   public static function innovation1() {
      $results_innovation = ModelInnovation::innovation_1();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation1.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation1 : vue = $vue");
      require ($vue);
   }

   
   // --- innovation2
   public static function innovation2() {
      //$results_innovation = ;
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation2.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation2 : vue = $vue");
      require ($vue);
   }

   // --- innovation3
   public static function innovation3() {
      //$results_innovation = ;
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation3.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation3 : vue = $vue");
      require ($vue);
   }
 
}
?>
<!-- ----- fin ControllerInnovation -->


