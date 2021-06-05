
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
    if ($results == 1) {
      echo ("<h3>Le nouveau $objet a été ajouté </h3>");
    }
    elseif ($results == 2) {
      echo ("<h3>$objet mise a jour</h3>");
    }
    elseif ($results == 3) {
      echo ("<h3>Le patient est déja vacciné</h3>");
    }
    if ($results) {
     echo("<ul>");
     foreach($_GET as $key => $value) {
      echo ("<li>$key = " . $value. "</li>");
     }
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du $objet</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    