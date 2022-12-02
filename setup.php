<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php
require_once 'functions.php';
createTable('users', 
            'email VARCHAR(255) NOT NULL, 
            pass VARCHAR(16) NOT NULL, 
            firstname VARCHAR(255) NOT NULL, 
            lastname VARCHAR(255) NOT NULL, 
            role VARCHAR(16) NOT NULL, 
            PRIMARY KEY (email)');
createTable('problems_table', 
            'accesscode INT(6) NOT NULL, 
            email VARCHAR(255) NOT NULL, 
            title VARCHAR(255) NOT NULL, 
            problem LONGTEXT NOT NULL, 
            input VARCHAR(255) NOT NULL,
            pout VARCHAR(255) NOT NULL,
            PRIMARY KEY (accesscode)');
?>

<br>...done.
</body>
</html>
