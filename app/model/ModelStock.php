
<!-- ----- debut Modelstock -->

<?php
require_once 'Model.php';

class ModelStock {
 private $centre_id, $vaccin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id) and !is_null($vaccin_id)) {
   $this->centre_id = $centre_id;
   $this->vaccin_id = $vaccin_id;
   $this->quantite = $quantite;
  }
 }

 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }

 function getCentre_id() {
  return $this->centre_id;
 }

 function getVaccin_id() {
  return $this->vaccin_id;
 }

 function getQuantite() {
  return $this->quantite;
 }
 
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select centre.label, vaccin.label, quantite from centre, vaccin, stock where stock.centre_id = centre.id and stock.vaccin_id = vaccin.id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results_stock = $statement->fetchAll();
   return $results_stock;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAllDoses() {
  try {
   $database = Model::getInstance();
   $query = "select label, sum(quantite) from centre,stock where stock.centre_id = centre.id group by centre_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results_stock = $statement->fetchAll();
   return $results_stock;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }



 public static function update($centre_id, $vaccin_id, $quantite) {
  try {
    // On regarde si le tuple existe
    $database = Model::getInstance();
    $query = "select quantite from stock where centre_id=:centre_id and vaccin_id=:vaccin_id";
    $statement = $database->prepare($query);
    $statement->execute([
        'centre_id' => $centre_id,
        'vaccin_id' => $vaccin_id
    ]);
    if($statement->rowCount() > 0) {
      $tuple = $statement->fetchAll();
      $quantite_initiale = $tuple['0'];
      $quantite = $quantite + $quantite_initiale;

      $query = "update stock set quantite=:quantite where centre_id=:centre_id and vaccin_id=:vaccin_id";
      $statement = $database->prepare($query);
      $statement->execute([
          'quantite' => $quantite,
          'centre_id' => $centre_id,
          'vaccin_id' => $vaccin_id
      ]);
    }
    else {
      $query = "insert into stock value (:centre_id, :vaccin_id, :quantite)";
      $statement = $database->prepare($query);
      $statement->execute([
        'quantite' => $quantite,
        'centre_id' => $centre_id,
        'vaccin_id' => $vaccin_id
      ]);
    }

    $results_stock = $statement->fetchAll();
    return $results_stock;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return null;
   }
  }


}
?>
<!-- ----- fin Modelvaccin -->
