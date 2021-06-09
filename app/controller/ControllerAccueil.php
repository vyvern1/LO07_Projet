
<!-- ----- debut ControllerAccueil -->
<?php

class ControllerAccueil {
 // --- page d'acceuil
 public static function Accueil() {
  $valeur = null;
  include 'config.php';
  $vue = $root . '/app/view/viewAccueil_doc.php';
  if (DEBUG)
   echo ("ControllerAccueil : Accueil : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerAccueil -->


