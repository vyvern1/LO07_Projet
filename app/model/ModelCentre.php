
<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelCentre {
 private $id, $label, $adresse;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $adresse = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->adresse = $adresse;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }

 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }

 function getAdresse() {
  return $this->adresse;
 }
 
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results_centre = $statement->fetchAll();
   return $results_centre;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 
 public static function getLabelCentre($centre_id) {
  try {
   $database = Model::getInstance();
   $query = "select label from centre where id = :centre_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id
   ]);
   $results_centre = $statement->fetchAll();
   return $results_centre;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($label, $adresse) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from centre";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into centre value (:id, :label, :adresse)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'adresse' => $adresse
   ]);
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;
  }
 }

 // Liste des centres avec au moins une dose
 public static function getover1(){
  try {
    $database = Model::getInstance();
    $query = "select id, label, adresse from centre,stock where stock.centre_id = centre.id and quantite > 0 group by centre_id";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    return $results;

  }catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return null;
  }
}


// Liste des centres avec au moins une dose
public static function getCentrewithVaccin($vaccin){
  try {
    echo ("$vaccin");
    $database = Model::getInstance();
    $query = "select label, centre.id from centre,stock where stock.centre_id = centre.id and stock.vaccin_id = :vaccin and quantite > 0";
    $statement = $database->prepare($query);
    $statement->execute([
      'vaccin'=> $vaccin
    ]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
    print_r($results);
    return $results;
  }catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return null;
  }
 }



}
?>
<!-- ----- fin ModelCentre -->
