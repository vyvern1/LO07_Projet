<!-- ----- debut Controllerpatient -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
 
   // --- Liste des patients
   public static function patientReadAll() {
      $results_patient = ModelPatient::getAll();
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/patient/viewAll.php';
      if (DEBUG)
       echo ("ControllerPatient : patientReadAll : vue = $vue");
      require ($vue);
   }


   // Affiche le formulaire de creation d'un patient
   public static function patientCreate() {
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/patient/viewInsert.php';
      require ($vue);
   }

   // Affiche un formulaire pour récupérer les informations d'un nouveau patient.
   // La clé est gérée par le systeme et pas par l'internaute
   public static function patientCreated() {
      // ajouter une validation des informations du formulaire
      $results_patient = ModelPatient::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/patient/viewInserted.php';
      require ($vue);
   }
 
}
?>
<!-- ----- fin Controllerpatient -->


