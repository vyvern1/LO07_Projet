
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='stockUpdated'>
        <label for="centre_id">Centre : </label>
        <select class="form-control" id='centre_id' name='centre_id' style="width: 400px">
            <?php
            foreach ($results_centre as $centre){
             echo ('<option value="' . $centre->getId() . '">' . $centre->getLabel() . ", " . $centre->getAdresse() . '</option>');
            }
            ?>
        </select>
        <label for="vaccin_id">Vaccin : </label>
        <select class="form-control" id='vaccin_id' name='vaccin_id' style="width: 400px">
            <?php
            foreach ($results_vaccin as $vaccin){
             echo ('<option value="' . $vaccin->getId() . '">' . $vaccin->getLabel() . ", " . $vaccin->getDoses() . '</option>');
            }
            ?>
        </select>
        <label for="quantite">quantite : </label><input type="number" name='quantite'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



