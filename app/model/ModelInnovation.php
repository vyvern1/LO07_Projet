
<!-- ----- debut Modelinnovation -->

<?php
require_once 'Model.php';

class ModelInnovation {

 public static function innovation_1() {
  try {
    $database = Model::getInstance();

    $query = "select count(id) from patient";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $numberPatient = $tuple['0'];

    $query = "select count(patient_id) from rendezvous where rendezvous.injection = '0'";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $numberPatientNoInjection = $tuple['0'];
    $query = "select count(distinct patient_id) from rendezvous";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $numberPatientNoInjection += $tuple['0'];


    $query = "select count(patient_id) from rendezvous,vaccin where rendezvous.injection = vaccin.doses and rendezvous.vaccin_id = vaccin.id";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $numberPatientFullInjection = $tuple['0'];

    $numberPatientCurrentInjection = $numberPatient - $numberPatientNoInjection - $numberPatientFullInjection;
    $results_innovation = array(
      array('Non vacciné' => $numberPatientNoInjection,'Partiellement vacciné' => $numberPatientCurrentInjection,'Totalement vacciné' =>  $numberPatientFullInjection)
    );
      return $results_innovation;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function innovation_2() {
  try {
    $database = Model::getInstance();

    $query = "SELECT label, COUNT(DISTINCT patient_id) as nombre FROM vaccin,rendezvous WHERE rendezvous.vaccin_id = vaccin.id";
    $statement = $database->query($query);
    $results_innovation = $statement->fetchall();

    return $results_innovation;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function innovation_3() {
  try {
    $database = Model::getInstance();
    $query = "select label, sum(quantite) from centre,stock where stock.centre_id = centre.id group by centre_id";
    $statement = $database->prepare($query);
    $statement->execute();
    $results_innovation = $statement->fetchAll();
    return $results_innovation;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

}
?>
<!-- ----- fin Modelinnovation -->
