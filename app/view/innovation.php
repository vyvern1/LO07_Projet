
<!-- ----- début innovation -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    $i = 0;
    
    foreach ($results as $innovation) {
      $label[$i] = $innovation[0];
      $quantite[$i] = $innovation[1];
      $i = $i + 1;
    }
    ?>

    <h3><?php echo($titre) ?></h3>
    <div style="max-height: 720px; max-width: 720px; margin: auto;">
      <canvas id="Chart"></canvas>
    </div>

    <script>
      const labels = <?php echo '["' . implode('", "', $label) . '"]' ?>;
    
      const data = {
        labels: labels,
        datasets: [{
          label: '<?php echo($titre) ?>',
          data: <?php echo '["' . implode('", "', $quantite) . '"]' ?>,
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(205, 86, 255)',
            'rgb(86, 255, 205)',
            'rgb(205, 255, 86)'
          ],
          hoverOffset: 5
        }]
      };

      const config = {
        type: '<?php echo($type) ?>',
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
  
  
  