<table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">numéro</th>
          <th scope = "col">type d'amélioration</th>
          <th scope = "col">Partie impacté</th>
          <th scope = "col">proposition</th>
          <th scope = "col">solution</th>
        </tr>
      </thead>
      <tbody>
          <?php
          $numero = 0;
          $type = "Idée géniale";
          $partie = "Documentation";
          $proposition = "Accéder facilement aux propositions pouvoir les trier etc";
          $solution = "Créer un base de donné avec les propositions";
          printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $numero, $partie, $proposition, $type, $solution);

          $numero++;
          $type = "Idée géniale";
          $partie = "Vin";
          $proposition = "Choisir les vins par plusieur paramètre pas seulement l'Id";
          $solution = "Créer d'autre méthode par exemple : vinReadCru, vinReadAnnee et vinReadDegre";
          printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $numero, $partie, $proposition, $type, $solution);
          ?>
      </tbody>
    </table>