<?php
  if(isset($_POST['lotSelect']) && !empty($_POST['lot'])) {
    $_SESSION["lot"] = $_POST["lot"];
  }
?>

<script type="text/javascript">
  // When the user clicks the button
  function checkCard() {
    let y = document.getElementById("card").value;
    let z = document.getElementById("cardtype");
    let a = document.getElementById("hid");
    switch (true) {
      case y.startsWith("34"):
      case y.startsWith("37"):
        a.value = z.innerHTML = "Amex";
        break;
      case y.startsWith("4"):
        a.value = z.innerHTML = "Visa";
        break;
      case y.startsWith("51"):
      case y.startsWith("52"):
      case y.startsWith("53"):
      case y.startsWith("54"):
      case y.startsWith("55"):
        a.value = z.innerHTML = "MasterCard";
        break;
    }
  }
</script>

<div class="container">  
  <form class="checkout" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?p=4-invoice") ?>" method="post">
    <input type="hidden" id="hid" name="hcard" value="" />
    <div class="row mb-3">
      <div class="col-md-8">
        <div>
          <h4>Billing Address</h4>
        </div>
        <div class="row">
         <div class="col-md-6">
          <label for="firstName">First Name</label>
          <input type="text" 
             name="firstName"
             class="form-control" 
             placeholder="First Name" 
             required autofocus
           />
          </div>   
          <div class="col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" 
               name="lastName"
               class="form-control" 
               placeholder="Last Name" 
               required autofocus
             />
          </div>
        </div>
        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text"
                 name="address"
                 class="form-control"
                 placeholder="2468 Elm St"
                 required autofocus
          />
          <div class="invalid-feedback">
            Please enter proper address
          </div>
        </div>
        <div class="mb-3">
          <label for="address2">Address 2</label>
          <span>(Optional)</span>
          <input type="text"
                 name="address2"
                 class="form-control"
                 placeholder="Apartment Number"
          />
        </div>
        <div class="row mb-3">
          <div class="col-md-3">
            <label for="city">City</label>
            <input type="text"
                   name="city"
                   class="form-control"
                   placeholder="Atlanta"
            />
          </div>
          <div class="col-md-3">
            <label for="state">State</label>
            <select id="state" class="custom-select" name="state" required>
              <option value>Select</option>
              <option>Georgia</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid.
            </div>
          </div>
          <div class="col-md-3">
            <label for="country">Country</label>
            <select id="country" class="custom-select" name="country" required>
              <option value>Select</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid.
            </div>
          </div>
          <div class="col-md-3">
            <label for="zipCode">Zip Code</label>
            <input type="text"
                   name="zipCode"
                   class="form-control"
                   placeholder="00000"
            />
          </div>
          <div class="invalid-feedback">
            Please provide a valid.
          </div>
        </div>
        <div>
          <h4>Payment</h4>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <label for="nameFull">Name on card</label>
            <input type="text"
               id="cc-num"
               name="Name"
               class="form-control" 
               placeholder="John Johnson" 
               required autofocus
             />
          </div>
          <div class="col-md-6">
            <label for="card">Credit Card #</label>
            <input type="text" 
              name="card"
              id="card"
              class="form-control"
              placeholder="0000000000000000"
              oninput="checkCard()"
              required autofocus
            />
            <span id="cardtype"></span>
          </div>
          <div class="col">
            <script>
              
            </script>
          </div>
        </div>  
        <div class="row mb-5">
          <div class="col-md-3">
            <label for="expiration">Expiration</label>
            <input type="text" 
               name="expiration"
               class="form-control" 
               placeholder="06/20" 
               required autofocus
             />
          </div>

          <div class="col-md-3">
            <label for="cvv">CVV</label>
            <input type="text" 
               name="cvv"
               class="form-control"
               placeholder="000"
               required autofocus
             />
          </div>
        </div> 
        <div class="row">
          <div class="col-md-4">
            <a 
              class="btn btn-block btn-primary"
              href="?p=2-select-parking"
            >
              Previous
            </a>
          </div>          
          <div class="col-md-8">
            <button 
              class="btn btn-block btn-primary" 
              type="submit" 
              name="checkOut"
            >
              Checkout
            </button>
              <div class="agent" id="1">
              Click "Checkout" once you fill in all the information!
                <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fman.png?1544239262501" id="assistant">
            </div>  
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h4>Your Cart</h4>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between">
            <h6>
              Car: <?php echo $_SESSION["car"] ?>
            </h6>
            <span>$
              <?php 
                switch ($_SESSION["car"]) {
                  case "Luxury":
                    $price1 = "499.99";
                    echo $price1;
                    break;
                  default:
                    $price1 = "99.99";
                    echo $price1;
                    break;
                }
              ?>
            </span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <h6>
              Lot: <?php echo $_SESSION["lot"] ?>
            </h6>
            <span>$
              <?php 
                switch ($_SESSION["lot"]) {
                  case "MVP":
                    $price2 = "149.99";
                    echo $price2;
                    break;
                  default:
                    $price2 = "49.99";
                    echo $price2;
                    break;
                }
              ?>
            </span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <h6>
              Total: 
            </h6>
            <span>$
              <?php echo $price1 + $price2 ?>
            </span>
          </li>
        </ul>
    </div>
  </form>
</div>
  
<style>
  #myBtn {
   margin-top: 20px; 
  }
  .agent {
    top: 50px;
  }
</style>