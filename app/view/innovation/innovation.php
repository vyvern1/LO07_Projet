
<!-- ----- début innovation -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeaderInnovation1.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    $i = 0;
    foreach ($results_innovation as $indice => $innovation) {
      $i = $i + 1;
      $label[$i] = $indice;
      $quantite[$i] = $innovation;
    }

    //Aide débeugage
    echo("<pre>");
    print_r($results_innovation);
    echo("</pre>");

    ?>

    <h3>Etat des patients</h3>
    <div>
      <canvas id="Chart"></canvas>
    </div>

    <script>
      const labels = <?php echo '["' . implode('", "', $label) . '"]' ?>;
    
      const data = {
        labels: labels,
        datasets: [{
          label: 'Vaccin par centre',
          data: <?php echo '["' . implode('", "', $quantite) . '"]' ?>,
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(205, 86, 255)'
          ],
          hoverOffset: 5
        }]
      };

      const config = {
        type: 'doughnut',
        data,
        options: {}
      };

      var myChart = new Chart(
        document.getElementById('Chart'),
        config
      );
    </script>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin innovation -->
  
  
  