
<!-- ----- début innovation -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeaderInnovation1.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    //Aide débeugage
    echo("<pre>");
    print_r($results);
    echo("</pre>");

    $i = 0;
    foreach ($results[0] as $key => $value) {
      if (!is_int($key)) {
        $label[$i] = $key;
        $i++;
      }
    }

    $i = 0;
    foreach ($results as $innovation) {
      foreach ($innovation as $key => $value) {
        if (!is_int($key)) {
          $quantite[$i] = $value;
          $i++;
        }
      }
    }
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
  
  
  