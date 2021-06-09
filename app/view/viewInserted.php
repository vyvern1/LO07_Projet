
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {

      if ($results == 1) {
        echo ("<h3>Le nouveau $objet a été ajouté </h3>");
        echo("<ul>");
        foreach($_GET as $key => $value) {
          if ($key != 'action') {
            echo ("<li>$key = " . $value. "</li>");
          }
        }
        echo("</ul>");
      }

      elseif ($results == 2) {
        echo ("<h3>$objet mise a jour</h3>");
        echo("<ul>");
        foreach($_GET as $key => $value) {
          if ($key != 'action') {
            echo ("<li>$key = " . $value. "</li>");
          }
        }
        echo("</ul>");
      }

      elseif ($results == 3) {
        echo ("<h3>Le patient est déja vacciné</h3>");
        echo("<ul>");
        echo ("<li>vaccin utilisé : " . $vaccin."</li>");
        echo ("<li>nombre de dose reçu : " . $nbinjection."</li>");
        echo("</ul>");
      }

      elseif ($results == 4) {
        echo ("<h3>Le patient a était vacciné</h3>");
        echo("<ul>");
        echo ("<li>vaccin utilisé : " . $vaccin."</li>");
        echo ("<li>nombre de dose reçu : 1</li>");
        echo("</ul>");
      }
      
    } 
    else {
      echo ("<h3>Problème d'insertion du $objet</h3>");
    }
    

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    