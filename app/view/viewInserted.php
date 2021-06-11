
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

      echo($info);

      echo("<ul>");
      foreach($results as $value) {
        echo ("<li>" . $value[0] . " = " . $value[1]. "</li>");
      }
      echo("</ul>");
    }
    else{
      echo("<h3>Problème d'insertion</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    