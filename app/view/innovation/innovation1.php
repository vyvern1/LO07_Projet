
<!-- ----- début innovation1 -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeaderInnovation1.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    $i = 0;
    foreach ($results_innovation as $innovation) {
      $i = $i + 1;
      $label[$i] = $innovation[0];
      $quantite[$i] = $innovation[1];
    }
    ?>
    <h3>Nombre de vaccins par centre</h3>
    <div>
      <canvas id="myChart"></canvas>
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
        document.getElementById('myChart'),
        config
      );
    </script>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin innovation1 -->
  
  
  