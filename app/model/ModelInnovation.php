
<!-- ----- debut Modelinnovation -->

<?php
require_once 'Model.php';

class ModelInnovation {

 public static function innovation_1() {
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
