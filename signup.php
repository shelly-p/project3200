<?php
  require_once 'header.php';
  if ($loggedin) {
    header("Location: dashboard.php");
}
    
      $error = $email = $pass = "";
      if (isset($_SESSION['email'])) destroySession();
    
      if (isset($_POST['email']))
      {
        $email = sanitizeString($_POST['email']);
        $password = sanitizeString($_POST['password']);
        $firstname = sanitizeString($_POST['firstname']);
        $lastname = sanitizeString($_POST['lastname']);
        $role = sanitizeString($_POST['role']);

    
        if ($email == "" || $password == "" || $firstname == "" || $lastname == "" || $role == "")
          $error = "Not all fields were entered<br><br>";
        else
        {
          $result = queryMysql("SELECT * FROM users WHERE email='$email'");
    
          if ($result->num_rows)
            $error = "That username already exists<br><br>";
          else
          {
            queryMysql("INSERT INTO users VALUES('$email', '$firstname', '$lastname',  '$password', '$role')");
            die("<h4>Account created</h4>Please Log in.<br><br>");
        }
    }
  } 
?> 
<script>
  function checkUser(email) {
    if (email.value == '') {
      O('info').innerHTML = ''
      return
    }
    params = "email=" + email.value
    request = new ajaxRequest()
    request.open("POST", "checkuser.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")
    request.onreadystatechange = function() {
      if (this.readyState == 4)
        if (this.status == 200)
          if (this.responseText != null) O('info').innerHTML = this.responseText
    }
    request.send(params)
  }

  function ajaxRequest() {
    try {
      var request = new XMLHttpRequest()
    } catch (e1) {
      try {
        request = new ActiveXObject("Msxml2.XMLHTTP")
      } catch (e2) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP")
        } catch (e3) {
          request = false
        }
      }
    }
    return request
  }
</script>
<div class='big-box'>
<div class='box'>
  <h3 class='form-title'>Create Account</h3>
  <form method='post' action='signup.php'> <?php $error; ?>
    <div class = 'form-input-group'>
      <label for='email'>Email:</label><br>
      <input class='form-input' type='email' name='email' value='<?php $email ?>' autofocus onBlur='checkUser(this)'>
      <span id='info'></span>
    </div>
    <div class = 'form-input-group'>
      <label for='password'>Password:</label><br>
      <input class='form-input' type='password' maxlength='16' name='password' value='<?php $password ?>'>
    </div>
    <div class = 'form-input-group'>
      <label for='firstname'>First name:</label><br>
      <input class='form-input' id='firstname' type='text' name='firstname' value='<?php $firstname ?>'>
      <span id='info'></span>
    </div>
    <div class = 'form-input-group'>
      <label for='lastname'>Last name:</label><br>
      <input class='form-input' type='text' name='lastname' value='<?php $lastname ?>'>
      <span id='info'></span>
    </div>
    
    <label for='role'>Role:</label><br>
    
    <input id='student' type='radio' name='role' value='Student'>
    <label for='student'>Student</label><br>
    
    <input id='teacher' type='radio' name='role' value='Teacher'>
    <label for='teacher'>Teacher</label><br>
    
    <span class='fieldname'>&nbsp;</span>
    <input class='form-button' type='submit' value='Sign up'><br><br>
    <a href="login.php">Already have an account? Sign in.</a>
  </form>
</div>
</div>
<br>
</body>
</html>