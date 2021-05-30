
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
        <input type="hidden" name='action' value='vaccinUpdated'>
        <label for="id">Vaccin : </label> <select class="form-control" id='id' name='id' style="width: 400px">
            <?php
            foreach ($results_vaccin as $vaccin){
             echo ('<option ' . 'value="' . $vaccin->getId() . '">' . $vaccin->getLabel() . ", " . $vaccin->getDoses() . '</option>');
            }
            ?>
        </select>
        <label for="id">doses : </label><input type="number" name='doses'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



