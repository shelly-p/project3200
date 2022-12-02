<?php
  require_once 'header.php';
  if ($loggedin) {
    header("Location: dashboard.php");
}
  
  $error = $email = $pass = "";

  if (isset($_POST['email']))
  {
    $email = sanitizeString($_POST['email']);
    $pass = sanitizeString($_POST['pass']);

    if ($email == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT email, pass FROM users
        WHERE email='$email' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Email/Password invalid</span><br><br>";
      }
      else
      {
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        $result2 = queryMySQL("SELECT role FROM users
        WHERE email='$email' AND pass='$pass'");
        $row = $result2->fetch_assoc();
        $role = $row["role"];

        header("Location: dashboard.php?role=$role");
      }
    }
  }
 
?>

<div class='big-box'>
  <div class='box'>
    <h3 class='form-title'>Please enter your details to log in</h3>
    <form class='form' method='post' action='login.php'><?php $error; ?>
      <div class="form-input-group">
        <span class='fieldname'>Email:</span>
        <input class='form-input' id='username' type='text' name='email' value='<?php $email; ?>'>
        <br>
      </div>
      <div class="form-input-group">
        <span class='fieldname'>Password:</span>
        <input class='form-input' type='password' name='pass' value='<?php $pass; ?>'>
      </div>
      <span class='fieldname'>&nbsp;</span>
      <input class='form-button' type='submit' value='Login'>
      <br>
      <br>
      <a href="signup.php">Don't have an account? Sign up.</a>
      <br>
    </form>
  </div>
</div>
<br>
</body>
</html>