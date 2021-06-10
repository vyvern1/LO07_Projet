
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
          <?php
          if (is_array($results)) {
            foreach ($results[0] as $key => $value) {
              if (!is_int($key)) {
                echo('<th scope = "col">' . $key . '</th>');
              }
            }
          }
          ?>
        </tr>
      </thead>
      <tbody>
          <?php
          if (is_array($results)) {
            foreach ($results as $Recolte) {
              echo "<tr>";
              foreach ($Recolte as $key => $value) {
                if (!is_int($key)) {
                  echo('<td>' . $value . '</td>');
                }
              }
              echo "</tr>";
            }
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  