
<!-- ----- debut Modelinnovation -->

<?php
require_once 'Model.php';

class ModelInnovation {

 public static function innovation($target) {
  try {
    $database = Model::getInstance();

    if ($target == 1) {
      $query = "select count(id) from patient";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $numberPatient = $tuple['0'];


      $query = "select count(distinct patient_id) from rendezvous where rendezvous.injection != '0'";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $numberPatientInjection = $tuple['0'];


      $query = "select count(distinct patient_id) from rendezvous,vaccin where rendezvous.injection = vaccin.doses and rendezvous.vaccin_id = vaccin.id";
      $statement = $database->query($query);
      $tuple = $statement->fetch();
      $numberPatientFullInjection = $tuple['0'];

      $numberPatientCurrentInjection = $numberPatientInjection - $numberPatientFullInjection;
      $numberPatientNoInjection = $numberPatient - $numberPatientInjection;

      $results_innovation = array(
        array('Non vacciné', $numberPatientNoInjection),
        array('Partiellement vacciné', $numberPatientCurrentInjection),
        array('Totalement vacciné',  $numberPatientFullInjection)
      );

    }

    elseif ($target == 2) {
      $query = "SELECT label, COUNT(DISTINCT patient_id) FROM vaccin,rendezvous WHERE rendezvous.vaccin_id = vaccin.id GROUP BY label";
      $statement = $database->query($query);
      $results_innovation = $statement->fetchall();

    }

    elseif ($target == 3) {
      $database = Model::getInstance();
      $query = "SELECT label, SUM(quantite) FROM vaccin,stock WHERE stock.vaccin_id = vaccin.id GROUP BY label ORDER BY SUM(quantite)";
      $statement = $database->query($query);
      $results_innovation = $statement->fetchAll();
      
    }

    else {
      $results_innovation = 'Erreur';
    }

    return $results_innovation;
    
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin Modelinnovation -->
