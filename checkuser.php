<?php
  require_once 'functions.php';

  if (isset($_POST['email']))
  {
    $email   = sanitizeString($_POST['email']);
    $result = queryMysql("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows)
      echo  "<span class='taken'>&nbsp;&#x2718; " .
            "This username is taken</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "This username is available</span>";
  }

  if (isset($_POST['acode']))
  {
    $accesscode   = sanitizeString($_POST['acode']);
    $result2 = queryMysql("SELECT * FROM problems_table WHERE accesscode='$accesscode'");

    
    if ($result2->num_rows) {
      header("Location: student-input.php");
  }
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "This code is not valid</span>";
  }
?>