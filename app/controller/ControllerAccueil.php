
<!-- ----- debut ControllerAccueil -->
<?php

class ControllerAccueil {
 // --- page d'acceuil
 public static function Accueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewAccueil.php';
  if (DEBUG)
   echo ("ControllerAccueil : Accueil : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerAccueil -->


