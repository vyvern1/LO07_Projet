<!-- ----- debut Controllerpatient -->
<?php
require_once '../model/ModelPatient.php';
require_once '../model/ModelRendezvous.php';
require_once '../model/ModelCentre.php';

class ControllerRendezvous {

    // --- Liste des patients
    public static function readAllpatient() {
        $results_patient = ModelPatient::getAll();

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
            if ($results[0][1] < $results[0][2]) {
                $nbinjection = $results[0][1];
                $vaccin_id = $results[0][0];
                $results = ModelRendezvous::getOne($vaccin_id);
            
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
            elseif ($results[0][1] == $results[0][2]) {
                $results = 3;

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
        $vaccin_id = ModelStock::getmaxdose($centre_id);

        ModelStock::update($centre_id, $vaccin_id[0][0], -1);
        $results = ModelRendezvous::insert($centre_id, $patient_id, 1, $vaccin_id[0][0]);

        $objet = "rendez-vous";

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