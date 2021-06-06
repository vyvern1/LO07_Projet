
<!-- ----- debut ModelCentre -->

<?php
require_once 'Model.php';

class ModelRendezvous
{
    private $centre_id, $patient_id, $injection, $vaccin_id;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->setCentreId($centre_id);
            $this->setPatientId($patient_id);
            $this->setInjection($injection);
            $this->setVaccinId($vaccin_id);
        }
    }

    function setCentreId($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    function setPatientId($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    function setInjection($injection)
    {
        $this->injection = $injection;
    }

    function setVaccinId($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }

    function getInjectionId()
    {
        return $this->injection;
    }

    function getCentreId()
    {
        return $this->centre_id;
    }

    function getPatientId()
    {
        return $this->patient_id;
    }

    function getVaccinId()
    {
        return $this->vaccin_id;
    }


    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results_centre = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
            return $results_centre;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function getOne($vaccin_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select id,label,adresse from centre,stock where stock.centre_id = id and stock.vaccin_id = :vaccin_id and quantite > 0";
            $statement = $database->prepare($query);
            $statement->execute(['vaccin_id' => $vaccin_id,]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    // Vérifie la présnece d'un patient dans la relation rendez-vous
    public static function check($patient)
    {
        try {
            $database = Model::getInstance();

            // update d'un nouveau tuple;
            $query = "select vaccin_id, injection, doses, label from rendezvous,vaccin where patient_id  = :patient and vaccin_id = id order by injection DESC";
            $statement = $database->prepare($query);
            $statement->execute([
                'patient' => $patient,
            ]);
            if($statement->rowCount() > 0) {
                $resultat = $statement->fetchAll();
            }
            else {
                $resultat = null;
            }

            return $resultat;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }


        public
        static function insert($centre, $patient, $injection, $vaccin)
        {
            try {
                $database = Model::getInstance();

                // ajout d'un nouveau tuple;
                $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
                $statement = $database->prepare($query);
                $statement->execute([
                    'centre_id' => $centre,
                    'patient_id' => $patient,
                    'injection' => $injection,
                    'vaccin_id' => $vaccin
                ]);

                // Si l'insertion c'est bien passé on tetourne 1
                return 1;
            } catch (PDOException $e) {
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
                // Si problème d'insertion on retourne -1
                return -1;
            }
        }

}
?>
<!-- ----- fin ModelCentre -->
