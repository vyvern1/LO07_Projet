
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      if ($info) {
        echo($info);
      }
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <?php
          if ($hidden) {
            foreach($hidden as $value) {
              echo("<input type='hidden' name='".$value[0]."' value='" .$value[1]."'>");
            }
          }
          if ($option) {
            foreach($option as $value) {
              echo("<label for='".$value[0]."'>".$value[0]." : </label><select class='form-control' id='".$value[0]."' name='".$value[0]."' style='width: 400px'>");
              foreach ($value[1] as $donne){
                echo ('<option value="' . $donne[0] . '">' . $donne[1] . ", " . $donne[2] . '</option>');
              }
              echo("</select><br>");
            }
          }
          if ($label) {
            foreach($label as $value) {
              echo("<label for='".$value[2]."'>".$value[0]." : </label><input type='".$value[1]."' name='".$value[3]."' value = '0' size='50'><br>");
            }
          }
        ?>  
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



