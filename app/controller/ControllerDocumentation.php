
<!-- ----- debut ControllerDocumentation -->
<?php

class ControllerDocumentation {
 public static function docInovation($args) {
    $target = $args['target'];
    if (is_numeric($target)) {
        if ($target == 1) {
            $valeur = "<h3>Proposition 1 :</h3><br><p>Notre première innovation présente le nombre de personne non vacciné, partiellement vacciné et totalement vacciné. Ce statut de chaque patient est établi en fonction du nombre de dose que le patient a reçu par rapport au nombre de dose maximal du vaccin concerné.
            Cette proposition est originale car nous n’avons jamais fait ce type d’analyse de donnée ni dans les tps, ni dans le reste du projet. Par ailleurs, cette information est utile car elle permet d’avoir un point de vue globale sur la situation vaccinale. Elle permet de se rendre compte du taux de vaccination effectué et du nombre de patient qu’il reste à vacciner pour atteindre l’immunité collective.
            Nous avons décidé de présenter les résultats sous forme de graphs en important une bibliothèque javascript.</p>";
        }
        elseif ($target == 2) {
            $valeur = "<h3>Proposition 2 :</h3><br><p>Notre seconde innovation permet de savoir combien de patient ont été vacciné (au moins une dose) par type de vaccin. Elle est originale car elle permet d’avoir un aperçu de la situation vaccinale dans le pays et de comparer l’utilisation qui est faite des vaccins avec leur stock. De ce fait, en comparant les proportions des vaccins stockés dans l’innovation 2 et celle des vaccins utilisés dans l’innovation 3, on peut savoir si un vaccin est « boudé » par la population et adapté ainsi les commandes.
            </p>";
        }
        elseif ($target == 3) {
            $valeur = "<h3>Proposition 3 :</h3><br><p>Notre troisième innovation permet de se rendre compte du nombre total de vaccin en stock par type de vaccin. En effet, nous avons jusque là affiché le nombre total de vaccin en stock dans chaque centre et le nombre de vaccin dans chaque centre par type de vaccin. Ces informations ne permettaient de se rendre compte du stock global de chaque vaccin.
            Cette proposition est originale car elle apporte une nouvelle approche concernant les stocks de vaccin. Elle permet de voir quel vaccin a été le plus commandé par le gouvernement, et donc de voir avec quel vaccin nous avons le plus de chance d’être vacciné. En fonction du nombre de doses nécessaire par vaccin, on peut savoir combien de personne on peut vacciner avec chaque vaccin. </p>";
        }
        else {
            $valeur = 'Erreur';
        }
    }
    elseif (is_string($target)) {
        if ($target == 'pdv') {
            $valeur = "<h3>Point de vue sur le projet</h3><br><p>Globalement, nous avons trouvé ce projet bien construit et très intéressant. Il nous a permis de mettre en application les notions vues en tp et de confirmer les compétences que nous avons acquise durant le semestre. Par ailleurs, nous avons également pu au travers de la diversité des actions demander apprendre a concevoir nous même les requêtes SQL et comprendre leur fonctionnement.
            Ce projet a donc été très instructif pour nous !</p>
            <p>Si nous devions apporter un regard constructif sur ce projet, il nous paraitrait intéressant de pouvoir supprimer des vaccins, des patients ou des centres. En effet, lorsque nous créons différents vaccins ou patient pour les tests, nous sommes obligé de nous rendre sur PHPmyadmin pour enlever le tuple concerné, ce qui n’est pas très pratique.
            </p>";
        }
        elseif ($target == 'pdvTechnique') {
            $valeur = "<h3>Information technique</h3><br><p>Nous avons essayer de bien séparé chaque partie (patient,centre,vaccins,...) avec un controleur et un model pour suivre le modèle MVC. <br>Concernant les view nous nous somme rendue compte de nous pouvions drastiquement les réduire en réalisant :</p>
            <ul><li>Une view pour afficher un tableau : viewAll</li><li>Une view pour afficher un formulaire : viewInsert</li><li>Une view pour afficher le résultat d'un formulaire : viewInserted</li><li>Un view généraliste pour afficher la page d'acceuil et la doccumentation : viewAcceuil_doc</li><li>Un view qui contient les innovations : innovation</li></ul>
            <p>Concernant la parie innovation, nous avons utilisé la bibliotèque javascript Chart.js pour réaliser les graphiques</p>
            <p>Expliquation plus approfondie : Pour la viewInsert on utilise 4 variales (présent dans le contrôler) : </p>
            <ul><li>info (string) : pour ajouter des info (souvent un titre)</li><li>hidden (tableaux) : pour toute les valeurs caché (exemple la valeur action)</li><li>option (tableaux) : pour les valeurs déroulante (choix de vaccins, de patients, de centre)</li><li>label (tableaux) : Pour les valeurs à saisir (saisir le nombre de dose, saisir le nom d'un nouveaux patient,...)</li></ul>
            <p>Les variables changent avec les fonctions utilisé. Nous avons globalement utilisé la même méthode pour les autre pages</p>";
        }
        else {
            $valeur = 'Erreur';
        }
    }
    else {
        $valeur = 'Erreur';
    }

    include 'config.php';
    $vue = $root . '/app/view/viewAccueil_doc.php';
    if (DEBUG)
     echo ("ControllerDocumentation : docInovation : vue = $vue");
    require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerDocumentation -->


