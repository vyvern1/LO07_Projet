<!-- ----- debut Controllerinnovation -->
<?php
require_once '../model/ModelInnovation.php';

class ControllerInnovation {
 
   // --- innovation1
   public static function innovation1() {
      $results = ModelInnovation::innovation_1();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }

   
   // --- innovation2
   public static function innovation2() {
      $results = ModelInnovation::innovation_2();
      //$results_innovation = ;
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation2.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }

   // --- innovation3
   public static function innovation3() {
      $results_innovation = ModelInnovation::innovation_3();
      //$results_innovation = ;
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation/innovation3.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }
 
}
?>
<!-- ----- fin ControllerInnovation -->


