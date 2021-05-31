
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">quantite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des stocks est dans une variable $results_stock             
          foreach ($results_stock as $element) {
           printf("<tr><td>%s</td><td>%d</td></tr>", $element[0], 
             $element[1]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  