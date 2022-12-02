<?php
  session_start();

  echo "<!DOCTYPE html><html><head>";

  require_once 'functions.php';

  if (isset($_SESSION['email']))
  {
    $email    = $_SESSION['email'];
    $loggedin = TRUE;
    if (isset($_POST['accesscode']))
    {
     $acode = $_POST['accesscode'];
    }
  }
  else $loggedin = FALSE;

  echo "<title>$appname</title><link rel='stylesheet' "         .
       "href='css/style.css' type='text/css'>"                 .
       "<link rel='stylesheet' href='css/bootstrap.css' type='text/css'>" .
       "<link rel='stylesheet' href='css/main.css' type='text/css'>" .
       "<script src='js/bootstrap.bundle.js'></script>".
       "</head><body>";

  if ($loggedin)
    echo "<nav class='navbar navbar-expand-sm navbar-light bg-header fw-bold'>".
         "<div class='container-fluid'><ul class='navbar-nav'>" .
         "<li class='nav-item'><a class='nav-link' href='dashboard.php'>Home</a></li>" .
         "<li class='nav-item'><a class='nav-link' href='dashboard.php'>Dashboard</a></li>"         .
         "<li class='nav-item'><a class='nav-link' href='logout.php'>Log out</a></li></ul></div></nav>";
  else
    echo "<nav class='navbar navbar-expand-sm navbar-light bg-header fw-bold'>".
         "<div class='container-fluid'><ul class='navbar-nav'>" .
         "<li class='nav-item'><a class='nav-link' href='index.php'>Home</a></li>"  .
         "<li class='nav-item'><a class='nav-link' href='signup.php'>Sign up</a></li>"            .
         "<li class='nav-item'><a class='nav-link' href='login.php'>Log in</a></li></ul></div></nav>";
?>