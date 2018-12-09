<?php
  if(isset($_POST['carSelect']) && !empty($_POST['car'])) {
    $_SESSION["car"] = $_POST["car"];
  }

  $sql = "SELECT LOT, STOCK, PRICE FROM LOTS";
  $result = mysqli_query($conn, $sql);
  if(empty($result)) {
    $sql = "CREATE TABLE LOTS (
        ID int(11) AUTO_INCREMENT,
        LOT varchar(50) NOT NULL UNIQUE,
        STOCK int(3) NOT NULL,
        PRIMARY KEY (ID)
    )";
    if (!mysqli_query($conn, $sql)) {
      $error = "Failed to create table";
    }
    else {
      $sql = "INSERT INTO LOTS (LOT, STOCK) VALUES 
        ('A', 40),
        ('B', 39),
        ('C', 36),
        ('MVP', 40)";
      mysqli_query($conn, $sql);
    }
  }
  $num_a = $conn->query("SELECT STOCK FROM LOTS WHERE LOT='A'")->fetch_object()->STOCK;
  $num_b = $conn->query("SELECT STOCK FROM LOTS WHERE LOT='B'")->fetch_object()->STOCK;
  $num_c = $conn->query("SELECT STOCK FROM LOTS WHERE LOT='C'")->fetch_object()->STOCK;
  $num_m = $conn->query("SELECT STOCK FROM LOTS WHERE LOT='MVP'")->fetch_object()->STOCK;
?>

<script type="text/javascript">

  // When the user clicks the button
  function hideAgent() {
    var x = document.getElementById("2");
    x.style.display = "none";
  }
</script>

<div class="container"> 
  <div class="row">
    <div class="col-md-12"> 
      <h3>
        Select a parking deck:
      </h3>
      <div class="agent" id="2">
          Click a deck before moving onto the next step.
          <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fman.png?1544239262501" id="assistant">
      </div>
    </div>
  </div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?p=3-checkout") ?>" method="post">
    <div class="card-deck text-center">
      <div class="card">
        <label for="lota">
          <div class="card-header">
              A Deck
          </div>
          <div class="card-body">
            <img src="" id="car-img">
            <input type="radio" name="lot" id="lota" value="A" onclick="hideAgent()" required>
            Spots Left: <?php echo $num_a ?>
            <br/>
            Price: $49.99
          </div>
        </label>
      </div>
      <div class="card">
        <label for="lotb">
          <div class="card-header">
              B Deck
          </div>
          <div class="card-body">
            <img src="" id="car-img">
            <input type="radio" name="lot" id="lotb" value="B" onclick="hideAgent()">
            Spots Left: <?php echo $num_b ?>
            <br/>
            Price: $49.99
          </div>
        </label>
      </div>
      <div class="card">
        <label for="lotc">
          <div class="card-header">
              C Deck
          </div>
          <div class="card-body">
            <img src="" id="car-img">
            <input type="radio" name="lot" id="lotc" value="C" onclick="hideAgent()">
            Spots Left: <?php echo $num_c ?>
            <br/>
            Price: $49.99
          </div>
        </label>
      </div>
      <div class="card">
        <label for="lotm">
          <div class="card-header">
              MVP Deck
          </div>
          <div class="card-body">
            <img src="" id="car-img">
            <input type="radio" name="lot" id="lotm" value="MVP" onclick="hideAgent()">
            Spots Left: <?php echo $num_m ?>
            <br/>
            Price: $149.99
          </div>
        </label>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a 
          class="btn btn-lg btn-primary btn-block"
          href="?p=1-car-select"
        >
          Previous
        </a>
      </div>
      <div class="col-md-4">      
        <button 
          class="btn btn-lg btn-primary btn-block"
          type="submit" 
          name="lotSelect"
        >
          Go to check out
        </button>
      </div>
    </div>
  </form> 
  <div id="basket">
      <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fbasket.png?1544206019244" onclick="openCart()" alt="Shopping basket" height="75">
  </div>
  <div id="cart" class="cartBar">
    <div id="cartContent">
      <h4>Shopping cart</h4>
      <hr>
       Car chosen: <?php echo $_SESSION["car"] ?>
    </div>
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
  </div>
</div>

<script>
  function openCart() {
      document.getElementById("cart").style.width = "250px";
  }

  function closeCart() {
      document.getElementById("cart").style.width = "0";
  }
</script>

<style>
  .col {
    border: 1px solid black;
    text-align: center;
  }
   .card {
    border: 1px solid lightgray;
    border-radius: 15px;
  }
  .card:hover {
    border: 1px solid gray;
    border-radius: 15px;
  }
  input[type="radio"]:checked~label {
    border: 2px solid dodgerblue;
  } 
  #basket {
    position: absolute;
    bottom: 0;
    right: 0;
    padding: 0 20px 10px 0;
  }
  .cartBar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 500px;
    right: 0;
    background-color: #353A40;
    overflow-x: hidden;
    transition: 0.5s;
    padding: 70px 0 0 0;
  }
  .cartBar a{
    text-decoration: none;
    color: #FFFFFF;
  }
  .cartBar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
  }
  #cartContent{
    padding-left: 30px;
    color: #FFFFFF;
    width: 80%;
  }
  #cartContent hr{
    border-top: 1px solid lightgray;
  }
  #assistant {
    float:right;
  }
  .agent {
    top: -35px;
  }
  
  @media screen and (max-height: 450px) {
    .cartBar {padding-top: 15px;}
    .cartBar a {font-size: 18px;}
  
</style>

