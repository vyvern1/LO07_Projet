
<!-- ----- début viewupdated -->
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
    if ($results_stock) {
     echo ("<h3>Le stock a était mise a jour</h3>");
     echo("<ul>");
     echo ("<li>centre_id = " . $_GET['centre_id'] . "</li>");
     echo ("<li>vaccin_id = " . $_GET['vaccin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");

     echo("</ul>");
    } else {
     echo ("<h3>Problème de mise a jour du stock</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewupdated -->