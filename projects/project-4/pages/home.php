<?php
  if (empty($_SESSION["user"])) {
    $start = "<a class=\"btn btn-primary\" href=\"?p=login\">Log in to get started!</a>";
  }
  else {
    $start = "<a class=\"btn btn-primary\" href=\"?p=1-car-select\">Get started!</a>";
  }
?>

<div class="container">
  <center>
    <div class="row">
     <div class="col-md-12">
       <h1>
          Welcome to Lot Lizards!
       </h1>
       <h5 class="text-left">
         Here you can select a car to drive around campus and reserve a special lot to park your sweet ride!
       </h5>
       <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fwelcome.png?1544134581422" alt="Lizard Man" height="400">
     </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php echo $start ?>
      </div>
    </div>
  </center>
</div>