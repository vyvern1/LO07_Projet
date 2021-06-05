<!-- ----- debut Controllerinnovation -->
<?php
require_once '../model/ModelInnovation.php';

class ControllerInnovation {
 
   // --- innovation1
   public static function innovation1() {
      $results = ModelInnovation::innovation_1();
      $type = 'doughnut';
      $titre = 'Etat de vaccination';
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }

   
   // --- innovation2
   public static function innovation2() {
      $results = ModelInnovation::innovation_2();
      $type = 'pie';
      $titre = 'Nombre de personne vacciné par vaccin';
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }

   // --- innovation3
   public static function innovation3() {
      $results = ModelInnovation::innovation_3();
      $type = 'doughnut';
      $titre = 'Nombre de vaccin en stock';
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/innovation.php';
      if (DEBUG)
       echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }
 
}
?>
<!-- ----- fin ControllerInnovation -->


