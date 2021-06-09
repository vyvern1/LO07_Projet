<!-- ----- debut Controllerpatient -->
<?php
require_once '../model/ModelPatient.php';
require_once '../model/ModelRendezvous.php';
require_once '../model/ModelCentre.php';

class ControllerRendezvous {

    // --- Liste des patients
    public static function readAllpatient() {
        $results_patient = ModelPatient::getAll();

        $info = "<h3>Choisir un patient</h3>";

        $hidden = array(
            array("action", 'dossieruptdated')
        );
        $option = array(
           array("id", $results_patient)
        );
        $label = null;
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewInsert.php';
        if (DEBUG)
            echo ("ControllerPatient : patientReadAll : vue = $vue");
        require ($vue);
    }



    // Affiche les possibilités pour chaque patient
    public static function dossieruptdated(){

        $id_patient = $_GET['id'];
        $results = ModelRendezvous::check($id_patient);

       
        if ($results){
            // Patient en cours de vaccination
            if ($results[0][1] < $results[0][2]) {
                $nbinjection = $results[0][1];
                $vaccin_id = $results[0][0];
                $vaccin = $results[0][3];
                $results = ModelRendezvous::getOne($vaccin_id);

                $info = '<h3>Patient partiellement vacciné</h3><ul><li>vaccin utilisé : ' . $vaccin .'</li><li>nombre de dose : ' . $nbinjection. '</li></ul>';
            
                $option = array(
                   array("centre_id", $results)
                );
                $label = null;
                $hidden = array(
                    array("action", 'vaccinated1'),
                    array("patient_id", $id_patient),
                    array("injection", $nbinjection),
                    array("vaccin_id", $vaccin_id)
                );

                include 'config.php';
                $vue = $root . '/app/view/viewInsert.php';
                if (DEBUG)
                    echo ("ControllerPatient : patientReadAll : vue = $vue");
                require ($vue);
            }

            // Patient vacciné
            elseif ($results[0][1] == $results[0][2]) {
                $vaccin = $results[0][3];
                $nbinjection = $results[0][1];
                $results = 3;

                echo($vaccin);

                include 'config.php';
                $vue = $root . '/app/view/viewInserted.php';
                if (DEBUG)
                    echo ("ControllerPatient : patientReadAll : vue = $vue");
                require ($vue);
            }
        // Patient n'a pris encore aucun rendez-vous
        }
        else{
            $results = ModelCentre::getover1();


            $info = "<h3>Le patient n'a pas encore pris de rendez-vous, choisissez un centre</h3>";
            $option = array(
               array("centre_id", $results)
            );
            $label = null;
            $hidden = array(
                array("action", 'vaccinated0'),
                array("patient_id", $id_patient)
            );

            include 'config.php';
            $vue = $root . '/app/view/viewInsert.php';
            if (DEBUG)
                echo ("ControllerPatient : patientReadAll : vue = $vue");
            require ($vue);
        }
    }


    // Effectue les modifications pour le premiers rendez-vous
    public static function vaccinated0(){

        $patient_id = $_GET["patient_id"];
        $centre_id = $_GET["centre_id"];


        //On trouve le vaccin du centre ayant le plus de dose
        $vaccin = ModelStock::getmaxdose($centre_id);

        ModelStock::update($centre_id, $vaccin[0][0], -1);
        $result = ModelRendezvous::insert($centre_id, $patient_id, 1, $vaccin[0][0]);

        $results = 4;
        $vaccin = $vaccin[0][1];
        include 'config.php';
        $vue = $root . '/app/view/viewInserted.php';
        require ($vue);
    }


    // Effectue les modifications pour le premiers rendez-vous
    public static function vaccinated1(){

        $patient_id = $_GET["patient_id"];
        $centre_id = $_GET["centre_id"];
        $vaccin = $_GET["vaccin_id"];
        $injection = $_GET["injection"];

        $injection++;

        // On vaccine le patient avec le vaccin correspondant a celui de la première dose
        ModelStock::update($centre_id, $vaccin, -1);
        $results = ModelRendezvous::insert($centre_id, $patient_id, $injection, $vaccin);

        $objet = "rendez-vous";

        include 'config.php';
        $vue = $root . '/app/view/viewInserted.php';
        require ($vue);
    }

}
?>
<!-- ----- fin Controllerpatient -->