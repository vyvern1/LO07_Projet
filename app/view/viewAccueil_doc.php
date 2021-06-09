 
<?php include 'fragment/fragmentCaveHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include 'fragment/fragmentCaveMenu.html';
    include 'fragment/fragmentCaveJumbotron.html';
    if ($valeur) {
      echo($valeur);
    }
    ?>
  </div>   
  
  
  <?php
  include 'fragment/fragmentCaveFooter.html';
  ?>
</body>
</html>