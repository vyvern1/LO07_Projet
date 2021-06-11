
<!-- ----- debut ModelPatient -->

<?php
require_once 'Model.php';

class ModelPatient {
 private $id, $nom, $prenom, $adresse;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }

 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }

 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }

 function getPrenom() {
  return $this->prenom;
 }

 function getAdresse() {
  return $this->adresse;
 }
 
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from patient";
   $statement = $database->prepare($query);
   $statement->execute();
   $results_patient = $statement->fetchAll();
   return $results_patient;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getNomPremon($patient_id) {
  try {
   $database = Model::getInstance();
   $query = "select prenom, nom from patient where id = :patient_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'patient_id' => $patient_id
   ]);
   $results_patient = $statement->fetchAll();
   return $results_patient;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($nom, $prenom, $adresse) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from patient";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into patient value (:id, :nom, :prenom, :adresse)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'adresse' => $adresse,
   ]);
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return null;
  }
 }

}
?>
<!-- ----- fin ModelPatient -->
