<navbar class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="./">Home</a>
  <!--<ul class="navbar-nav flex-row">
    <li class="nav-item">
      <a class="nav-link" href="?p=1-car-select">Step 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?p=2-select-parking">Step 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?p=3-checkout">Step 3</a>
    </li>
        <li class="nav-item">
      <a class="nav-link" href="?p=4-invoice">Step 4</a>
    </li>
  </ul>-->
  <a class="nav-link ml-auto" href="?p=login">
    <?php
      if (empty($_SESSION["user"])) {
        echo "Login";
      }
      else {
        echo "Logged in as ".$_SESSION["user"];
      }
    ?>
  </a>
</navbar>
