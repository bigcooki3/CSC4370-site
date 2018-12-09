<?php

  if(isset($_POST["register"]) && !empty($_POST["username"])) {
    $sql = "INSERT INTO USERS (username, password) 
      VALUES ('".$_POST["username"]."', '".$_POST["password"]."')";
    if ($conn->query($sql) === TRUE) {
      $register = "Successfully created user, go log in";
    }
    else {
      $register = "Failed to make user, try another username";
    }
  }
?>

<div class="text-center">
  <form 
        class="form-signin" 
        action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?p=register"); 
            ?>" 
        method = "post">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <?php echo $register ?>
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
            name="register"
    >
      Register
    </button>
  </form>
  Already have an account? <a href="?p=login">Log in here</a>
</div>
