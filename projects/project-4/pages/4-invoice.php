<?php 
  $sql = "UPDATE LOTS 
  SET STOCK = STOCK - 1 
  WHERE LOT = '%s'";
  $conn->query(sprintf($sql, $_SESSION["lot"]));

  $sql = "UPDATE CARS 
  SET STOCK = STOCK - 1 
  WHERE CAR = '%s'";
  $conn->query(sprintf($sql, $_SESSION["car"]));
?>

<script type="text/javascript">
  // When the user clicks the button
  function modalFunction() {
      alert("Click the \"Restart\" if you want to make another order.");
  }
</script>

<div class="container">
  <div class="row">  
    <div class="col-md-12">
    		<div class="invoice-title">
    			<h2>Lot Lizards -- Invoice</h2>
          <h3 class="pull-right">  
            Order #<?php echo rand(10000,99999) ?>
          </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-md-10">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $_POST["firstName"]." ".$_POST["lastName"] ?>
              <br/>
    					<?php echo $_POST["address"] ?><br>
    					<?php echo $_POST["address2"] ?><br>
    					<?php echo $_POST["city"].", ".$_POST["state"]." ".$_POST["zipCode"] ?><br>
              <?php echo $_POST["country"] ?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-3">
    				<address>
    					<strong>Payment Method:</strong><br>
    					<?php echo $_POST["hcard"]." ending in ****".substr($_POST["card"], -4) ?><br>
    				</address>
    			</div>
    			<div class="col-md-9 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo date("F j, Y") ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?php echo $_SESSION["car"] ?> Car</td>
    								<td class="text-center">
                      $<?php 
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
                    </td>
    								<td class="text-center">1</td>
    								<td class="text-right">
                      $<?php 
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
                    </td>
    							</tr>
                  <tr>
        						<td>Lot <?php echo $_SESSION["lot"] ?></td>
    								<td class="text-center">
                      $<?php 
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
                    </td>
    								<td class="text-center">1</td>
    								<td class="text-right">
                       $<?php 
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
                    </td>
    							</tr>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Total</strong></td>
    								<td class="thick-line text-right">$<?php echo $price1 + $price2 ?></td>
    							</tr>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
  <div class="row justify-content-end">
    <div class="col-md-4">
      <a 
        class="btn btn-lg btn-primary btn-block"
        href="?p=1-car-select"
      >
        Restart
      </a>
      <div class="agent" id="1">
        Click restart to place a new order!
        <img src="https://cdn.glitch.com/ce8f74c5-76ce-4083-9d87-cf4feb04ce21%2Fman.png?1544239262501" id="assistant">
      </div>  
    </div>
  </div>
</div>
<style>
  .pull-right {
    float: right;
  }
  .invoice-title h2, .invoice-title h3 {
    display: inline-block;
  }
  .table > tbody > tr > .no-line {
    border-top: none;
  }
  .table > thead > tr > .no-line {
    border-bottom: none;
  }
  .table > tbody > ttop: 2px solid;
  }
  .h10{
    font-size: 100px
  }
  .agent {
    top: 50px;
  }
</style>
