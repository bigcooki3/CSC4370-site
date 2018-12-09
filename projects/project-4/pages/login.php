<?php
  // Create table if not exists
  $sql = "SELECT ID FROM USERS";
  $result = mysqli_query($conn, $sql);
  if(empty($result)) {
    $sql = "CREATE TABLE USERS (
        ID int(11) AUTO_INCREMENT,
        USERNAME varchar(50) NOT NULL UNIQUE,
        PASSWORD varchar(50) NOT NULL,
        PRIMARY KEY (ID)
    )";
    if (!mysqli_query($conn, $sql)) {
      $error = "Failed to create table";
    }
  }

  unset($_SESSION['user']);
  if(isset($_POST['login']) && !empty($_POST['username'])) {
    $sql = "SELECT USERNAME, PASSWORD FROM USERS 
    WHERE USERNAME='".$_POST["username"]."'
    AND PASSWORD='".$_POST["password"]."'";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
      $error = "Incorrect username or password";
    }
    else {
      $_SESSION["user"]=$_POST["username"];
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'index.php';
      header("Location: http://$host$uri/$extra");
      exit;
    }
  }
?>

<div class="text-center">
  <form 
        class="form-signin" 
        action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?p=login"); 
            ?>" 
        method = "post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <?php echo $error ?>
    <label for="inputEmail" class="sr-only">Username</label>
    <input 
           type="text" 
           name="username"
           class="form-control" 
           placeholder="Username" 
           required autofocus
     />
    <label for="inputPassword" class="sr-only">Password</label>
    <input 
           type="password" 
           name="password"
           class="form-control" 
           placeholder="Password" 
           required
     />
    <button 
            class="btn btn-lg btn-primary btn-block" 
            type="submit" 
            name="login"
    >
      Sign in
    </button>
  </form>
  No account? <a href="?p=register">Register here</a>
</div>
