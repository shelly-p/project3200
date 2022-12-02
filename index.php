<?php
  require_once 'header.php';
  if ($loggedin) {
    header("Location: dashboard.php");
}
?>

<div class="w-100 vh-100 m-auto">
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Code checker</h1>
            <p>Welcome to Code Checker where you can
                enter your code to see if it will give the
                result you need.
                (only Python for now)
            </p>
        </div>

        <div class="row justify-content-evenly">
            <div class="col-5 text-center">
                <a class="btn btn-primary blue-button" href="login.php">Student</a>
            </div>

            <div class="col-5 text-center">
                <a class="btn btn-primary pink-button" href="login.php">Teacher</a>
            </div>
        </div>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Project 3200</span>
        </div>
    </footer>

    </span><br><br>
  </body>
</html>
