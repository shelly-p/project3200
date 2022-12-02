<?php
  require_once 'header.php';

  if (isset($_SESSION['email']))
  {
    destroySession();
    echo "<div class='main'>You have been logged out.";
    header("Location: index.php"); 
  }
  else echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
?>

    <br>
    <br>
    </div>
  </body>
</html>