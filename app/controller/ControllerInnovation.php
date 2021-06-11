<!-- ----- debut Controllerinnovation -->
<?php
require_once '../model/ModelInnovation.php';

class ControllerInnovation {
 
   // --- innovation1
   public static function innovation($args) {
      $target = $args['target'];
      $results = ModelInnovation::innovation($target);
      if ($target == 1) {
         $type = 'doughnut';
         $titre = 'Etat de vaccination';
      }
      elseif ($target == 2) {
         $type = 'pie';
         $titre = 'Nombre de personne vacciné ou partiellement vacciné par vaccin';
      }
      elseif ($target == 3) {
         $type = 'bar';
         $titre = 'Nombre de vaccin en stock';
      }
      else {
         $titre = 'Erreur';
      }

      include 'config.php';
      $vue = $root . '/app/view/innovation.php';
      if (DEBUG)
      echo ("ControllerInnovation : innovation : vue = $vue");
      require ($vue);
   }
}
?>
<!-- ----- fin ControllerInnovation -->


