<?php
  // Create table if not exists
  $sql = "SELECT CAR, STOCK FROM CARS";
  $result = mysqli_query($conn, $sql);
  if(empty($result)) {
    $sql = "CREATE TABLE CARS (
      ID int(11) AUTO_INCREMENT,
      CAR varchar(50) NOT NULL UNIQUE,
      STOCK int(3) NOT NULL,
      PRICE decimal(6,2) NOT NULL,
      PRIMARY KEY (ID)
    )";
    if (!mysqli_query($conn, $sql)) {
      $error = "Failed to create table";
    }
    else {
      $sql = "INSERT INTO CARS (CAR, STOCK, PRICE) VALUES 
        ('SUV', 8, 99.99),
        ('Midsize', 7, 99.99),
        ('Compact', 5, 99.99),
        ('Luxury', 9, 499.99)";
        if (!mysqli_query($conn, $sql)) {
          echo "Failed to insert rows";
        }
    }
  }

  $results = $conn->query("SELECT STOCK, PRICE FROM CARS WHERE CAR='SUV'")->fetch_assoc();
  
  $stock_suv = $results["STOCK"];
  $price_suv = $results['PRICE'];

  $results = $conn->query("SELECT STOCK, PRICE FROM CARS WHERE CAR='Midsize'")->fetch_assoc();
  $stock_mid = $results['STOCK'];
  $price_mid = $results['PRICE'];

  $results = $conn->query("SELECT STOCK, PRICE FROM CARS WHERE CAR='Compact'")->fetch_assoc();
  $stock_comp = $results['STOCK'];
  $price_comp = $results['PRICE'];

  $results = $conn->query("SELECT STOCK, PRICE FROM CARS WHERE CAR='Luxury'")->fetch_assoc();
  $stock_lux = $results['STOCK'];
  $price_lux = $results['PRICE'];

?>

<script type="text/javascript">
  // When the user clicks the button
  function hideAgent() {
    var x = document.getElementById("1");
    x.style.display = "none";
  }
</script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>
        Select a car:
      </h3>
      <div class="agent" id="1">
        Click a car before moving onto the next step.
        <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fman.png?1544239262501" id="assistant">
      </div>
    </div>
  </div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?p=2-select-parking"); ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            SUV
          </div>
          <label for="suv" class="car-grid">
            <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fsuv.png?1544139587248" id="car-img">
            <input type="radio" name="car" id="suv" value="SUV" onclick="hideAgent()" required>
            Quantity: <?php echo $stock_suv ?>
            <br/>
            Price: $<?php echo $price_suv ?>
          </label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
              Midsize
            </div>
          <label for="midsize" class="car-grid">
            <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fmidsize.png?1544139465474" id="car-img">
            <input type="radio" name="car" id="midsize" value="Midsize" onclick="hideAgent()">
            Quantity: <?php echo $stock_mid ?>
            <br/>
            Price: $<?php echo $price_mid ?>
          </label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Compact
          </div>
          <label for="compact" class="car-grid">
            <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fcompact.png?1544139791846" id="car-img">
            <input type="radio" name="car" id="compact" value="Compact" onclick="hideAgent()">
            Quantity: <?php echo $stock_comp ?>
            <br/>
            Price: $<?php echo $price_comp ?>
          </label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Luxury
          </div>
          <label for="luxury" class="car-grid">
            <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fluxury.png?1544139791777" id="car-img">
            <input type="radio" name="car" id="luxury" value="Luxury" onclick="hideAgent()">
            Quantity: <?php echo $stock_lux ?>
            <br>
            Price: $<?php echo $price_lux ?>
          </label>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <button 
          class="btn btn-lg btn-primary btn-block" 
          type="submit" 
          name="carSelect"
        >
          Next
        </button>
      </div>
    </div> 
  </form>
</div>

<style>
  .car-grid {
    min-height: 270px;
    text-align: center;
    padding: 10px;
    display: inline-block;
    float: left;
  }

  #car-img {
    width: 380px;
    max-width: 100%;
    max-height: 200px;
  }
  label {
    border: 2px solid white;
  }
  input[type="radio"]:checked~label {
    border: 2px solid dodgerblue;
  } 
  .card {
    border: 1px solid lightgray;
    border-radius: 15px;
  }
  .card:hover {
    border: 1px solid gray;
    border-radius: 15px;
  }
  #assistant {
    float:right;
  }
  
  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      -webkit-animation-name: fadeIn; /* Fade in the background */
      -webkit-animation-duration: 0.4s;
      animation-name: fadeIn;
      animation-duration: 0.4s
  }

  /* Modal Content */
  .modal-content {
      position: fixed;
      bottom: 0;
      background-color: #fefefe;
      width: 100%;
      -webkit-animation-name: slideIn;
      -webkit-animation-duration: 0.4s;
      animation-name: slideIn;
      animation-duration: 0.4s
  }

  /* The Close Button */
  .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
  }

  .modal-header {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
  }

  .modal-body {padding: 2px 16px;}

  .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
  }
</style>
